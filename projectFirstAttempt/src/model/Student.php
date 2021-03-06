<?php
/**
 * class to run student
 */
namespace Itb\model;

use Mattsmithdev\PdoCrud\DatabaseTable;
use Mattsmithdev\PdoCrud\DatabaseManager;

/**
 * class for doing some functions on the student
 * Class Student
 * @package Itb\model
 */
class Student extends DatabaseTable
{
    /**
     * declaring the variable id
     * @var $id
     */
    private $id;

    /**
     * declarng the vriable username
     * @var string $username
     */
    private $username;


    /**
     * declaring the lastn grade variable
     * @var string $lastGrade
     */
    private $lastGrade;

    /**
     * declaring the variable for the currentGrade
     * @var currentGrade
     */
    private $currentGrade;

    /**
     * declaring password variable
     * @var password
     */
    private $password;

    /**
     * declaring date joined variable
     * @var $dateJoined
     */
    private $dateJoined;

    /**
     * funtion to get the id
     * @return int id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * funtion to set the username
     * @param $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * function to get the usernamme
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * funtion to set the lastgrade
     * @param $lastGrade
     */
    public function setLastGrade($lastGrade)
    {
        $this->lastGrade = $lastGrade;
    }

    /**
     * function to get the last grade
     * @return string
     */
    public function getLastGrade()
    {
        return $this->lastGrade;
    }

    /**
     * funtion to get the current grade
     * @return currentGrade
     */
    public function getCurrentGrade()
    {
        return $this->currentGrade;
    }

    /**
     * funtion to set the current grade
     * @param $currentGrade
     */
    public function setCurrentGrade($currentGrade)
    {
        $this->currentGrade = $currentGrade;
    }

    /**
     * function to get the password
     * @return password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * function to set the date joined
     * @param $dateJoined
     */
    public function setDateJoined($dateJoined)
    {
        $this->dateJoined = $dateJoined;
    }

    /**
     * function to get the date joined
     * @return mixed
     */
    public function getDateJoined()
    {
        return $this->dateJoined;
    }
    /**
     * hash the password before storing ...
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $this->password = $hashedPassword;
    }


    /**
     * function to get a single user by username
     * @param $username
     * @return mixed|null
     */
    public static function getOneByUsername($username)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = 'SELECT * FROM students WHERE username=:username';
        $statement = $connection->prepare($sql);
        $statement->bindParam(':username', $username, \PDO::PARAM_STR);
        $statement->setFetchMode(\PDO::FETCH_CLASS, __CLASS__);
        $statement->execute();

        if ($object = $statement->fetch()) {
            return $object;
        } else {
            return null;
        }
    }
}
