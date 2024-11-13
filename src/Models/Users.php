<?php 

    /*namespace App\Models;*/
    require_once 'db.php';

    class User extends Database{
        protected $id;
        public function __construct(protected $firstname=null,protected $lastname=null,protected $username=null,
            protected $email=null,protected $is_admin=null,protected $is_active=null,protected $password=null)
        {}

        public function register($user){

            //validation must be done.email & username must be unique
            $statement = $this->conn->prepare("insert into users(firstname,lastname,username,email,password)
             values (:firstname ,:lastname,:username,:email,:password)");
            $statement->bindParam($user['firstname'],$user['lastname'],$user['email'],$user['password']);
            $statement->execute();
            echo $statement->rowCount();

        }

        public function getUserByUsername($username){
            $statement = $this->conn->prepare("select * from users where username= :username");
            $statement->bindParam(':username',$username);
            $statement->execute();
            $user = $statement->fetchAll(PDO::FETCH_OBJ);
            return $user;

        }
    

    
    }