<?php

    include_once  './../config/config.php';

    class Database{
        
        protected $conn;

        public function connectDB(){
            $dsn = "mysql:host=DB_HOST;dbname=DB_NAME;charset=UTF8";
            try{
                $this->conn = new PDO($dsn,DB_USER,DB_PASS);
                /*if ($this->conn){
                    echo "connected to database DB_NAME successfully";
                }*/
        
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
            
    }
}