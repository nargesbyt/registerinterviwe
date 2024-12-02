<?php namespace App\Models;

use App\Application;
use DateTime;
use PDO;
use PDOException;

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
        //$interview =R::dispense('interview');
       // R::store($interview);
        $pdo = Application::$app->pdo;
        $statement = $pdo->prepare('Insert into `interviews` 
        (firstname,lastname,education,age,address,maritalStatus,phoneNum,
        gender) values 
        (:firstname , :lastname , :education , :age , :address , :maritalStatus , 
        :phoneNum , :gender )');
        $statement->bindParam('firstname',$data['firstname']);
        $statement->bindParam('lastname',$data['lastname']);
        //$statement->bindParam('interview_date',time());
        $statement->bindParam('education',$data['education']);
        //var_dump((int)$data['age']);die;
        $statement->bindParam('age',intval($data['age']));
        $statement->bindParam('address',$data['address']);
        $statement->bindParam('maritalStatus',$data['maritalStatus']);
        $statement->bindParam('phoneNum',$data['phoneNum']);
        $statement->bindParam('gender',intval($data['gender']));
        
        $result = $statement->execute();
        //$result = $statement->execute($data);
       // var_dump($data);die;
        return $result;
        
    }

    public static function getById(int $id): ?array
    {   
        //return R::load('interview',$id);
        $pdo = Application::$app->pdo;
        try{
            $statement = $pdo->prepare('Select * From `interviews` where id=:id');
            //var_dump($id);
            $statement->execute(['id' => $id]);
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            //var_dump($result);  // This should show the fetched row or 'false' if no match is found

            return $result === false ? null : $result;  // Return null if no results were found
        }catch (PDOException $e) {
            // Log or handle error here
            error_log("PDO Error: " . $e->getMessage());
            return null; // return null or handle differently
        }
        
        

       
    }
    public static function list(): ?array{
        $pdo = Application::$app->pdo;
        $statement = $pdo->query('Select * From `interviews`');
        //var_dump($statement->fetchAll(PDO::FETCH_ASSOC));die;
        return $statement->fetchAll(PDO::FETCH_ASSOC);
        //return R::findAll('interview');
    }

    public static function update(array $params):bool{
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