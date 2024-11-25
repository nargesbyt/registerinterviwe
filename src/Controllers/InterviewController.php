<?php namespace App\Controllers;

use App\Models\Interview;
use Jenssegers\Blade\Blade;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class InterviewController extends BaseController{

    public function show($id)
    {
        $interview = Interview::getById($id);
        echo $this->blade->render('interviews.show',['interview'=>$interview]);

    }  

    public function create()
    {
        echo $this->blade->render('interviews.create');
    }

    public function store()
    {
        $data=[
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'interview_date' => $_POST['interview_date'],
            'education' => $_POST['education'],
            'age'=> $_POST['age'],
            'address_residence' => $_POST['address_residence'],
            'marital_status' => $_POST['marital_status'],
            'child_num' => $_POST['child_num'],
            'phone_num'=> $_POST['phone_num'],
            'career_field_id'=> $_POST['career_field_id'],
            'gender' => $_POST['gender'],
            'employment_history_id' => $_POST['employment_history_id'],
            'father_job' => $_POST['father_job'],
            'additional_detailes'=> $_POST['additional_detailes'],
            'resume_file' => $_POST['resume_file']
        ];
        Interview::save($data);
        header('location: /');
        exit();

    }
}
   
  
