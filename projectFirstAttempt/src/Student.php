<?php
namespace Itb;
use Mattsmithdev\PdoCrud\DatabaseTable;


class Student extends DatabaseTable
{
    /**
     * the objects unique ID
     * @var int
     */
    private $id;

    /**
     * @var string $title
     */
    private $username;


    /**
     * (should become ID of separate CATEGORY class ...)
     * @var string $category
     */
    private $lastGrade;

    /**
     * @var float
     */
    private $currentGrade;

    /**
     * integer value from 0 .. 100
     * @var integer
     */
    private $password;

    /**
     * @var integer
     */
    private $dateJoined;


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    public function setUsername($username)
    {
        $this->username = $username;
    }


    public function getUsername()
    {
        return $this->username;
    }

    public function setLastGrade($lastGrade)
    {
        $this->lastGrade = $lastGrade;
    }

    public function getLastGrade()
    {
        return $this->lastGrade;
    }

    public function getCurrentGrade()
    {
        return $this->currentGrade;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setDateJoined($dateJoined)
    {
        $this->dateJoined = $dateJoined;
    }
    public function getDateJoined()
    {
        return $this->dateJoined;
    }
}