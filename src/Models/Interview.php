<?php namespace App\Models;

use App\Application;
use DateTime;
use PDO;
//use RedBeanPHP\R;

class Interview
{ 
    private PDO $pdo;  
    public function __construct()
    {
        $this->pdo = Application::$app->pdo;
    }

    public static function save(array $data=[]):bool
    {   
        /*$interview =R::dispense('interview');
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

        R::store($interview);*/
        $pdo = Application::$app->pdo;
        $statement = $pdo->prepare('Insert into `interviews` 
        (firstname,lastname,interview_date,education,age,address_residence,marital_status,child_num,phone_num,
        gender,father_job,additional_details,resume_file,career_field_id,employment_history_id,user_id) values 
        (:firstname , :lastname , :interview_date, :education , :age , :address_residence , :marital_status,:child_num , 
        :phone_num , :gender ,:father_job , :additional_datails , :resume_file, :career_field_id, :employment_history_id ,:user_id)');
    
        $result = $statement->execute($data);
        return $result;
        
    }

    public static function getById($id): ?array
    {   
        //return R::load('interview',$id);
        $pdo = Application::$app->pdo;
        $statement = $pdo->prepare('Select * From `interviews` where id=:id');
        $statement->execute(['id' => $id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
        

       
    }
    public static function list(): ?array{
        $pdo = Application::$app->pdo;
        $statement = $pdo->query('Select * From `interviews`');
        return $statement->fetchAll(PDO::FETCH_ASSOC);
        //return R::findAll('interview');
    }

    public static function update(array $params){
        $interview = self::getById($params['id']);
        if($interview !== null ){
            $pdo = Application::$app->pdo;
            $statement = $pdo->prepare('Update `interviews` set firstname=:firstname , lastname=:lastname where id=:id');
            $statement->bindParam('id',$params['id']);
            $statement->bindParam('firstname',$params['firstname']);
            $statement->bindParam('lastname',$params['lastname']);
            return $statement->execute();
        }
    
    }

    public static function delete(int $id){
        $interview = self::getById($id);
        if($interview !== null ){
            $pdo = Application::$app->pdo;
            $statement = $pdo->prepare('Delete From `interviews`  where id=:id');
            $statement->bindParam('id',$id);
            return $statement->execute();
        }
    } 
    public static function findByDate(DateTime $interviewDate){
        $pdo = Application::$app->pdo;
        $statement = $pdo->prepare('Select * from `interviews` Where interview_date=:interviewDate');
        $statement->execute(['interviewDate'=>$interviewDate]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}