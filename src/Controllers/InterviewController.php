<?php

namespace App\Controllers;

use App\Models\CareerField;
use App\Models\Interview;
use App\Services\DateConversionService;
use App\Services\PaginationService;
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

        // Convert interview dates to Persian format
        (new DateConversionService())->convertInterviewDates($interviews);

        // Get the total number of interviews
        $totalCount = Interview::getTotalCount();
        $paginationService = new PaginationService();
        $totalPages = $paginationService->calculateTotalPages($totalCount, $recordsPerPage);

        // Return response with rendered view
        return new HtmlResponse($this->render('interviews.index', [
            'interviews' => $interviews,
            'currentPage' => $page,
            'totalPages' => $totalPages,
        ]));

    }

    public function get(ServerRequestInterface $request): ResponseInterface
    {
        $id = $request->getAttribute('id');
        $interview = Interview::getById((int)$id);
        return new HtmlResponse($this->render('interviews.show', ['interview' => $interview]));
    }

    private function convertStringFields(array $params): array
    {
        $careerFieldId = isset($params['careerFieldId']) ? (int) $params['careerFieldId'] : null;
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

        $params['age'] = $age;
        $params['maritalStatus'] = $maritalStatus;
        $params['childNum'] = $childNum;
        $params['internship'] = $internship;
        $params['englishLevel'] = $englishLevel;
        $params['computerSkill'] = $computerSkill;
        $params['knowAboutUs'] = $knowAboutUs;
        $params['haveFriendHere'] = $haveFriendHere;
        $params['characterType'] = $characterType;
        $params['migrateIntention'] = $migrateIntention;
        $params['careerFieldId'] = $careerFieldId;
        return $params;
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

    // If you need a specific date format validation and sanitation
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

    public function create(ServerRequestInterface $request): ResponseInterface
    {
        $response = new Response();

        if ($request->getMethod() == 'GET') {
            return $this->handleGetRequest($response);
        }

        $params = (array) $request->getParsedBody();
        $params = $this->sanitize($this->convertStringFields($params));

        $gregorianDate = $params['gregorianDatetime'] ?? null;
        $params = $this->removeUnnecessaryFields($params);

        if (!$gregorianDate) {
            return $this->handleError($response, 'Gregorian date is missing', 400);
        }

        // Handle and validate the Gregorian date
        $gregorianDate = $this->handleGregorianDate($gregorianDate, $response);
        if ($gregorianDate === null) {
            return $this->handleError($response, 'Invalid Gregorian date format', 400);
        }

        $params['interviewDate'] = $gregorianDate;

        // Validate input fields
        $validation = $this->validateInterviewData($params);
        if ($validation->fails()) {
            return $this->handleValidationErrors($validation, $response);
        }

        // Save the interview record
        $result = $this->saveInterviewData($params);
        if ($result) {
            return new RedirectResponse('/interview');
        }

        return $this->handleError($response, 'Error with database', 500);
    }

    private function handleGetRequest(ResponseInterface $response): ResponseInterface
    {
        $careerFields = CareerField::list();
        $errors = session()->flash('errors') ?? new ErrorBag();
        $response->getBody()->write($this->render('interviews.create', ['careerFields' => $careerFields, 'errors' => $errors]));
        return $response;
    }

    private function handleError(ResponseInterface $response, string $message, int $statusCode): ResponseInterface
    {
        $response->getBody()->write($message);
        return $response->withStatus($statusCode, 'Bad Request');
    }

    private function handleGregorianDate(string $gregorianDate, ResponseInterface $response): ?string
    {
        try {
            $dateTime = new \DateTime($gregorianDate);  // This will throw an exception if invalid
            return $dateTime->format('Y-m-d H:i:s');
        } catch (\Exception $e) {
            return null; // Invalid date format
        }
    }

    private function removeUnnecessaryFields(array $params): array
    {
        unset($params['interviewDate']); // Remove Persian interviewDate
        unset($params['interviewTime']); // Remove interviewTime
        return $params;
    }

    private function validateInterviewData(array $params)
    {
        return $this->validate($params, [
            'firstname' => 'required|max:20',
            'lastname' => 'required|max:20|regex:/^[\x{0600}-\x{06FF}\x{0750}-\x{077F}\x{08A0}-\x{08FF}\x{FB50}-\x{FEFF}\x{0650}\x{064B}\x{064C}\x{064D}\x{0652}\x{0670}\x{0671}]+$/u',
            'interviewDate' => 'required',
            'careerFieldId' => 'required|numeric',
            'education' => 'max:50',
            'age' => 'numeric|between:1,99',
            'address' => 'max:50',
            'maritalStatus' => 'numeric|min:0|max:4',
            'childNum' => 'numeric|between:0,10',
            'phoneNum' => 'max:11',
            'employmentHistory' => 'max:10000',
            'fatherJob' => 'max:20',
            'internship' => 'integer|in:0,1',
            'englishLevel' => 'integer',
            'computerSkill' => 'integer',
            'characterType' => 'integer',
            'haveFriendHere' => 'integer',
            'knoeAboutUs' => 'integer',
            'migrateIntention' => 'integer'
        ]);
    }

    private function handleValidationErrors($validation, ResponseInterface $response): ResponseInterface
    {
        session()->flash('errors', $validation->errors());
        $errors = $validation->errors()->all();
        $response->getBody()->write($this->render('interviews.create', ['errors' => $errors]));
        return $response;
    }

    private function saveInterviewData(array $params): bool
    {
        return Interview::save($params);
    }

    public function editForm(ServerRequestInterface $request): ResponseInterface
    {
        $id = $request->getAttribute('id');
        $interview = Interview::getById($id);
        if ($interview === null) {
            return new Response('Interview not found', 404);
        }

        if (isset($interview['interviewDate'])) {
            // Convert the Gregorian interview date to Persian
            $gregorianDate = new \DateTime($interview['interviewDate']);
            $carbonDate = Carbon::instance($gregorianDate); // Convert DateTime to Carbon instance

            // Convert to Jalali (Persian) date
            $persianDate = Jalalian::fromCarbon($carbonDate);

            $interview['interviewDate'] = $persianDate->format('Y/m/d'); // You can customize the format
            $interview['interviewTime'] = $carbonDate->format('H:i:s');
        }
        $careerFields = CareerField::list();

        // Render a view with the interview data
        return new HtmlResponse($this->render('interviews.edit', [
            'interview' => $interview,
            'careerFields' => $careerFields
        ]));
    }

    public function update(ServerRequestInterface $request): ResponseInterface
    {
        $response = new Response();
        $id = $request->getAttribute('id');
        $params = (array) $request->getParsedBody();
        //var_dump($params);die;
        $params = $this->sanitize($this->convertStringFields($params));
        $gregorianDate = $params['gregorianDatetime'] ?? null;


        $params = $this->removeUnnecessaryFields($params);

        if (!$gregorianDate) {
            return $this->handleError($response, 'Gregorian date is missing', 400);
        }

        // Handle and validate the Gregorian date
        $gregorianDate = $this->handleGregorianDate($gregorianDate, $response);
        if ($gregorianDate === null) {
            return $this->handleError($response, 'Invalid Gregorian date format', 400);
        }

        $params['interviewDate'] = $gregorianDate;

        // Validate input fields
        $validation = $this->validateInterviewData($params);
        if ($validation->fails()) {
            return $this->handleValidationErrors($validation, $response);
        }
        if (Interview::update($params, $id)) {
            return new RedirectResponse('/interview');
        } else {
            return new Response('Failed to update interview.', 500);
        }
    }

    /*public function find(ServerRequestInterface $requst,$interviewDate):ResponseInterface
    {

    }*/
}
