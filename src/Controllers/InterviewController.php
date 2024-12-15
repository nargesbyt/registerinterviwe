<?php

namespace App\Controllers;

use App\Models\CareerField;
use App\Models\Interview;
use Carbon\Carbon;
use Jenssegers\Blade\Blade;
use Laminas\Diactoros\Response;
use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Morilog\Jalali\Jalalian;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Rakit\Validation\ErrorBag;

class InterviewController extends BaseController
{
    public function index(ServerRequestInterface $request): ResponseInterface
    {
        // Get the current page from the query string (default is 1)
        $page = (int) ($request->getQueryParams()['page'] ?? 1);

        // Set the number of records per page
        $recordsPerPage = 10;

        // Fetch the interviews for the current page
        $interviews = Interview::list($page, $recordsPerPage);
        foreach ($interviews as $interview) {
            if (isset($interview['interviewDate'])) {
                // Convert the Gregorian interview date to Persian
                $gregorianDate = new \DateTime($interview['interviewDate']);
                $carbonDate = Carbon::instance($gregorianDate); // Convert DateTime to Carbon instance

                // Convert to Jalali (Persian) date
                $persianDate = Jalalian::fromCarbon($carbonDate);
                
                $interview['interviewDate'] = $persianDate->format('Y/m/d'); // You can customize the format
            }
        }

        // Get the total number of interviews
        $totalCount = Interview::getTotalCount();

        // Calculate total pages
        $totalPages = ceil($totalCount / $recordsPerPage);

        // Pass data to the view
        return new HtmlResponse($this->render('interviews.index', [
            'interviews' => $interviews,
            'currentPage' => $page,
            'totalPages' => $totalPages,
        ]));
    }

    public function get(ServerRequestInterface $request): ResponseInterface
    {   $id = $request->getAttribute('id');
        $interview = Interview::getById((int)$id);
        return new HtmlResponse($this->render('interviews.show', ['interview' => $interview]));
        
    }


    public function create(ServerRequestInterface $request): ResponseInterface
    {
        $response = new Response();
        if ($request->getMethod() == 'GET') {
            $careerFields = CareerField::list();
            //var_dump($careerFields);die;
            $errors = session()->flash('errors')?? new ErrorBag();
            $response->getBody()->write($this->render('interviews.create',['careerFields'=>$careerFields , 'errors'=>$errors]));
            return $response;
        }
        $params = (array)$request->getParsedBody();
        $age = isset($params['age']) && is_numeric($params['age']) ? (int) $params['age'] : null;
        $maritalStatus = isset($params['maritalStatus']) && is_numeric($params['maritalStatus']) ? (int) $params['maritalStatus'] : null;
        $childNum = isset($params['childNum']) && is_numeric($params['childNum']) ? (int) $params['childNum'] : null;
        $internship = isset($params['internship']) && is_numeric($params['internship']) ? (int) $params['internship'] : null;
        $englishLevel = isset($params['englishLevel']) && is_numeric($params['englishLevel']) ? (int) $params['englishLevel'] : null;
        $computerSkill = isset($params['computerSkill']) && is_numeric($params['computerSkill']) ? (int) $params['computerSkill'] : null;
        $knowAboutUs = isset($params['knowAboutUs']) && is_numeric($params['knowAboutUs']) ? (int) $params['knowAboutUs'] : null;
        $haveFriendHere = isset($params['haveFriendHere']) && is_numeric($params['haveFriendHere']) ? (int) $params['haveFriendHere'] : null;
        $characterType = isset($params['characterType']) && is_numeric($params['characterType']) ? (int) $params['characterType'] : null;
        $migrateIntention = isset($params['migrateIntention']) && is_numeric($params['migrateIntention']) ? (int) $params['migrateIntention'] : null;
        
        //var_dump($params);die;

        // Sanitize input parameters before validation and saving
        $params = $this->sanitize($params);

        // Validate and sanitize interview date and time (they should already be validated in the frontend)
        // Retrieve the Gregorian Date from the hidden field
        $gregorianDate = $params['gregorianDatetime'] ?? null;

        // Remove unnecessary fields from $params before saving to the database
        unset($params['interviewDate']); // Remove Persian interviewDate
        unset($params['interviewTime']); // Remove interviewTime

        if (!$gregorianDate) {
            // If no gregorianDate was set, return an error response
            $response->getBody()->write('Gregorian date is missing');
            return $response->withStatus(400, 'Bad Request');
        }

        try {
            // Validate and format the Gregorian date
            $dateTime = new \DateTime($gregorianDate);  // This will throw an exception if invalid
            $gregorianDate = $dateTime->format('Y-m-d H:i:s');  // Store it in a standardized format
        } catch (\Exception $e) {
            // If the Gregorian date format is invalid, return an error
            $response->getBody()->write('Invalid Gregorian date format');
            return $response->withStatus(400, 'Bad Request');
        }

        // Add the Gregorian date to the params for saving
        $params['interviewDate'] = $gregorianDate; // This will be stored in the database
        
    
        //var_dump($params);die;
        
        $validation = $this->validate($params, [
            'firstname' => 'required',
            'lastname' => 'required',
            'interviewDate' => 'required',
            //'age' => 'min'
            'careerFieldId'=>'required',

        ]);

        if ($validation->fails()) {
            session()->flash('errors',$validation->errors());
            $errors = $validation->errors()->all();
            $response->getBody()->write($this->render('interviews.create', ['errors' => $errors]));
            return $response;
        }
        //var_dump($params);die;
        $result = Interview::save($params);
        if($result){
             return new RedirectResponse('/interview');
        }
        var_dump($response->getBody()->write('error with database')); die;
        return $response->withStatus(500,'server error');
    
    }

    // Sanitize the input parameters
    private function sanitize(array $params): array
    {
        foreach ($params as $key => $value) {
            // Sanitize strings by trimming and removing unwanted characters
            if (is_string($value)) {
                $params[$key] = htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
            }

            // Optionally, you can sanitize dates if they are in a specific format (e.g., YYYY/MM/DD)
            if ($key === 'interviewDate') {
                // If you need to ensure the date is valid, you can perform a check here as well
                $params[$key] = $this->sanitizeDate($value);
            }

            // Optionally, you can sanitize numeric values (for example, careerFieldId) if required
            if (in_array($key, ['careerFieldId'], true)) {
                $params[$key] = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
            }
        }
        return $params;
    }

    // Optional: If you need a specific date format validation and sanitation
    private function sanitizeDate($date)
    {
        // Ensure the date is in a valid format (e.g., YYYY/MM/DD) before storing
        $date = trim($date);
        $dateParts = explode('/', $date);
        if (count($dateParts) === 3) {
            $year = (int)$dateParts[0];
            $month = (int)$dateParts[1];
            $day = (int)$dateParts[2];

            // You can add more checks here for valid Persian dates
            if ($year >= 1300 && $month >= 1 && $month <= 12 && $day >= 1 && $day <= 31) {
                return $date; // Return valid date
            }
        }
        return null; // Return null if date is not valid
    }
        
    public function edit(ServerRequestInterface $request): ResponseInterface
    {
        $response = new Response();
        $params = $request->getParsedBody();
        
        if(Interview::update($params)){
            return new RedirectResponse('/interview');
        }

    }
    /*public function find(ServerRequestInterface $requst,$interviewDate):ResponseInterface
    {

    }*/
}
