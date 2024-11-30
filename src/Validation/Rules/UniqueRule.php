<?php  namespace App\Validation\Rules;

use App\Application;
use PDO;
use Rakit\Validation\Rule;

class UniqueRule extends Rule
{
    protected $message = ":attribute must be unique in the database.";
    protected $fillableParams = ['table', 'column'];
    protected $pdo;

    public function __construct()
    {
        $this->pdo = Application::$app->pdo;
    }

    public function check($value):bool
    {
        $this->requireParameters(['table', 'column']);

        // getting parameters
        $column = $this->parameter('column');
        $table = $this->parameter('table');



        // do query
        $stmt = $this->pdo->prepare("select count(*) as count from `{$table}` where `{$column}` = :value");
        $stmt->bindParam(':value', $value);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        // true for valid, false for invalid
        return intval($data['count']) === 0;
    }
    
}