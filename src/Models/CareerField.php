<?php
namespace App\Models;

use App\Application;
use PDO;

class CareerField{
    private PDO $pdo;  
    public function __construct()
    {
        $this->pdo = Application::$app->pdo;
    }
    public static function list() {
        // Fetch career fields from the database
        $pdo = Application::$app->pdo;
        $stmt = $pdo->query('SELECT id, field FROM careerFields');
        $careerFields = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $careerFields;
    } 
}