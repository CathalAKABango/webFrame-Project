<?php

namespace Itb\model;

use Mattsmithdev\PdoCrud\DatabaseTable;
use Mattsmithdev\PdoCrud\DatabaseManager;

class attendence extends DatabaseTable
{
    /**
     * declaring the variable id
     * @var $id
     */
    private $id;
    /**
     * declaring variable date
     * @var $date
     */
    private $date;

    /**
     * declaring a student name variable
     * @var $studentname
     */
    private $username;

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

   

    /**
     * function to get the id
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * fnction to set the id
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * function to get the date
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * functon to set the date
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
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

        $sql = 'SELECT * FROM attendences WHERE username=:username';
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