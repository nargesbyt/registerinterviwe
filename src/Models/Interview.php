<?php

namespace App\Models;

use App\Application;
use DateTime;
use PDO;
use PDOException;

use RedBeanPHP\R;

class Interview extends \RedBeanPHP\SimpleModel
{
    private PDO $pdo;
    public function __construct()
    {
        $this->pdo = Application::$app->pdo;
    }

    /*$interview =R::dispense('interview');
        $interview->firstname = $data['firstname'];
        $interview->lastname = $data['lastname'];
        $interview->careerFieldId = $data['careerFieldId'];
        /*$interview->firstname = $data['firstname'];
        $interview->firstname = $data['firstname'];
        R::store($interview);*/
    public static function save(array $data = []): bool
    {

        $pdo = Application::$app->pdo;
        $statement = $pdo->prepare('Insert into `interviews` 
        (firstname,lastname,education,address,maritalStatus,phoneNum,
        interviewDate,careerFieldId,age,childNum,employmentHistory,fatherJob,
        reasonForJob,interviewResult,internship,freetime,englishLevel,employmentAdv,
        computerSkill,knowAboutUs,haveFriendHere,wayToCome,lastReadBook,characterType,
        coverType,migrateIntention) values 
        (:firstname , :lastname , :education , :address , :maritalStatus , 
        :phoneNum , :interviewDate, :careerFieldId ,:age, :childNum, :employmentHistory, :fatherJob,
        :reasonForJob, :interviewResult, :internship, :freetime, :englishLevel, :employmentAdv,
        :computerSkill, :knowAboutUs, :haveFriendHere, :wayToCome, :lastReadBook, :characterType,
        :coverType, :migrateIntention)');

        // Bind the parameters
        /*foreach ($data as $key => $value) {
            $statement->bindValue($key, $value);
        }*/
        //in case $data has got extra fields assign parameters one by one.


        $statement->bindParam('firstname', $data['firstname']);
        $statement->bindParam('lastname', $data['lastname']);
        $statement->bindParam('education', $data['education']);
        $statement->bindParam('age', $data['age']);
        $statement->bindParam('address', $data['address']);
        $statement->bindParam('maritalStatus', $data['maritalStatus']);
        $statement->bindParam('phoneNum', $data['phoneNum']);
        //$statement->bindParam('gender',intval($data['gender']));
        $statement->bindParam('interviewDate', $data['interviewDate']);
        //$statement->bindParam('interviewTime',$data['interviewTime']);
        $statement->bindParam('careerFieldId', $data['careerFieldId']);
        $statement->bindParam('childNum', $data['childNum']);
        $statement->bindParam('employmentHistory', $data['employmentHistory']);
        $statement->bindParam('fatherJob', $data['fatherJob']);
        $statement->bindParam('reasonForJob', $data['reasonForJob']);
        $statement->bindParam('interviewResult', $data['interviewResult']);
        $statement->bindParam('internship',                                                                                                                                                                                                                                                                           $data['internship']);
        $statement->bindParam('freetime', $data['freetime']);
        $statement->bindParam('englishLevel', $data['englishLevel']);
        $statement->bindParam('employmentAdv', $data['employmentAdv']);
        $statement->bindParam('computerSkill', $data['computerLiteracy']);
        $statement->bindParam('knowAboutUs', $data['knowAboutUs']);
        $statement->bindParam('haveFriendHere', $data['haveFriendHere']);
        $statement->bindParam('wayToCome', $data['wayToCome']);
        $statement->bindParam('lastReadBook', $data['lastReadBook']);
        $statement->bindParam('characterType', $data['characterType']);
        $statement->bindParam('coverType', $data['coverType']);
        $statement->bindParam('migrateIntention', $data['migrateIntention']);

        $result = $statement->execute();

        return $result;
    }

    public static function getById(int $id): ?array
    {
        //return R::load('interview',$id);
        $pdo = Application::$app->pdo;
        try {
            $statement = $pdo->prepare('Select * From `interviews` where id=:id');
            //var_dump($id);
            $statement->execute(['id' => $id]);
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            //var_dump($result);  // This should show the fetched row or 'false' if no match is found

            return $result === false ? null : $result;  // Return null if no results were found
        } catch (PDOException $e) {
            // Log or handle error here
            error_log("PDO Error: " . $e->getMessage());
            return null; // return null or handle differently
        }
    }
    public static function list(int $page = 1, int $recordsPerPage = 10): ?array
    {
        $pdo = Application::$app->pdo;
        // Calculate the offset based on the current page and records per page
        $offset = max(0, ($page - 1) * $recordsPerPage);

        // Prepare the query with LIMIT and OFFSET for pagination
        $statement = $pdo->prepare("SELECT interviews.*, careerFields.field 
        FROM interviews 
        LEFT JOIN careerFields ON interviews.careerFieldId = careerFields.id 
        LIMIT :limit OFFSET :offset");
        $statement->bindValue(':limit', $recordsPerPage, PDO::PARAM_INT);
        $statement->bindValue(':offset', $offset, PDO::PARAM_INT);
        $statement->execute();

        $interviews = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Loop through the interviews and transform the maritalStatus field
        foreach ($interviews as &$interview) {
            // Convert the integer value to a string for maritalStatus
            if (is_array($interview)) {
                $interview['maritalStatus'] = self::getMaritalStatusLabel($interview['maritalStatus']?? null);
                $interview['computerSkill'] = self::getComputerSkillLabel($interview['computerSkill']?? null);
                $interview['englishLevel'] = self::getEnglishLevelLabel($interview['englishLevel']?? null);
                $interview['field'] = $interview['field'] ?? 'نامشخص';  // In case careerField is null
                /*$interview['internship'] = self::getBoolLabel($interview['internship']?? null);
                $interview['knowAboutUs'] = self::getBoolLabel($interview['knowAboutUs']?? null);
                $interview['haveFriendHere'] = self::getBoolLabel($interview['haveFriendHere']?? null);
                $interview['migrateIntention'] = self::getBoolLabel($interview['migrateIntention']?? null);
                $interview['characterType'] = self::getcharacterTypeLabel($interview['characterType']?? null);*/
            }
        }


        return $interviews;
    }
    public static function getcharacterTypeLabel($characterType)
    {
        $characterTypes = [
            0 => 'برون گرا',
            1 => 'درون گرا'
        ];
        return $characterTypes[$characterType] ?? 'نامشخص';
    }

    public static function getBoolLabel($status)
    {
        $status = $status ?? 0;
        $status = [
            0 => 'خیر',
            1 => 'بله'
        ];
        return $status[$status] ?? 'نامشخص';
    }
    public static function getMaritalStatusLabel($status): string
    {
        $status = $status ?? 0;
        $statuses = [
            0 => 'مجرد',
            1 => 'متاهل',
            2 => 'نامزد',
            3 => 'مطلقه'
        ];

        // Return the appropriate status or 'نامشخص' if the value doesn't match any of the cases
        return $statuses[$status] ?? 'نامشخص';
    }
    public static function getEnglishLevelLabel($level): string
    {
        $level = $level ?? 0;
        $levels = [
            0 => 'صفر',
            1 => 'کم',
            2 => 'متوسط',
            3 => 'حرفه ای'
        ];

        // Return the appropriate status or 'نامشخص' if the value doesn't match any of the cases
        return $levels[$level] ?? 'نامشخص';
    }
    public static function getComputerSkillLabel($computerLevel): string
    {
        $computerLevel = $computerLevel ?? 0;
        $computerLevels = [
            0 => 'صفر',
            1 => 'کم',
            2 => 'متوسط',
            3 => 'حرفه ای'
        ];

        // Return the appropriate status or 'نامشخص' if the value doesn't match any of the cases
        return $computerLevels[$computerLevel] ?? 'نامشخص';
    }


    public static function getTotalCount(): int
    {
        $pdo = Application::$app->pdo;
        $statement = $pdo->query('SELECT COUNT(*) FROM `interviews`');
        return $statement->fetchColumn();
    }


    public static function update(array $params,$id): bool
    {
        $interview = self::getById($id);
        if ($interview !== null) {
            $pdo = Application::$app->pdo;

            // Prepare the update query with all necessary fields
            $statement = $pdo->prepare('
                UPDATE `interviews` SET 
                    firstname = :firstname,
                    lastname = :lastname,
                    careerFieldId = :careerFieldId,
                    interviewDate = :interviewDate,
                    age = :age,
                    address = :address,
                    maritalStatus = :maritalStatus,
                    childNum = :childNum,
                    computerSkill = :computerSkill,
                    phoneNum = :phoneNum,
                    employmentHistory = :employmentHistory,
                    fatherJob = :fatherJob,
                    reasonForJob = :reasonForJob,
                    internship = :internship,
                    knowAboutUs = :knowAboutUs,
                    haveFriendHere = :haveFriendHere,
                    wayToCome = :wayToCome,
                    freetime = :freetime,
                    lastReadBook = :lastReadBook,
                    characterType = :characterType,
                    coverType = :coverType,
                    employmentAdv = :employmentAdv,
                    englishLevel = :englishLevel,
                    migrateIntention = :migrateIntention,
                    interviewResult = :interviewResult
                WHERE id = :id
            ');
            var_dump($params);die;

            // Bind the parameters
            foreach ($params as $key => $value) {
                $statement->bindValue($key, $value);
            }

            return $statement->execute();
        }
        return false;
    }

    public static function delete(int $id)
    {
        $interview = self::getById($id);
        if ($interview !== null) {
            $pdo = Application::$app->pdo;
            $statement = $pdo->prepare('Delete From `interviews`  where id=:id');
            $statement->bindParam('id', $id);
            return $statement->execute();
        }
    }
    public static function findByDate(DateTime $interviewDate)
    {
        $pdo = Application::$app->pdo;
        $statement = $pdo->prepare('Select * from `interviews` Where interviewDate=:interviewDate');
        $statement->execute(['interviewDate' => $interviewDate]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}
