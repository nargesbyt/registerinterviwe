<?php namespace App\Models;
use RedBeanPHP\R;

class Interview
{
    public static function save($data=array())
    {   
        $interview =R::dispense('interview');
        $interview->firstname = $data['firstname'];
        $interview->lastname = $data['lastname'];
        $interview->interview_date = $data['interview_date'];
        $interview->education = $data['education'];
        $interview->age = $data['age'];
        $interview->address_residence = $data['address_residence'];
        $interview->marital_status = $data['marital_status'];
        $interview->child_num = $data['child_num'];
        $interview->phone_num = $data['phone_num'];
        $interview->gender = $data['gender'];
        $interview->father_job = $data['father_job'];
        $interview->additional_detailes = $data['additional_detailes'];

        $interview->resume_file = $data['resume_file'];

        $interview->career_field_id = $data['career_field_id'];

        $interview->employment_history_id = $data['employment_history_id'];

        $interview->user_id = $data['user_id'];

        R::store($interview);
        
    }

    public static function getById($id)
    {   
        return R::load('interview',$id);
       
    }
    public static function all(){
        return R::findAll('interview');
    }
    
}