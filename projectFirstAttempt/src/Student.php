<?php
namespace Itb;
use Mattsmithdev\PdoCrud\DatabaseTable;

/**
 * Created by PhpStorm.
 * User: matt
 * Date: 26/01/2016
 * Time: 10:44
 *
 * represent DVD objects for use in voting system
 *
 */
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

    public function getTitle()
    {
        return $this->username;
    }

    public function getCategory()
    {
        return $this->lastGrade;
    }

    public function getPrice()
    {
        return $this->currentGrade;
    }

    public function getVoteAverage()
    {
        return $this->password;
    }

    public function getNumVotes()
    {
        return $this->dateJoined;
    }


//    /**
//     * function will exit with first return
//     * so conditions ordered strongest test first, down to weakest test ...
//     *
//     * @return string
//     */
//    public function getStarImageHTML()
//    {
//        $message = 'num votes = ' . $this->numVotes;
//        die($message);
//
//        if ($this->numVotes < 1){
//            return '(no votes yet)';
//        }
//
//        if ($this->voteAverage > 80){
//            return  '<img src="images/stars5.png" alt="five starts star">';
//        }
//
//        if ($this->voteAverage > 60){
//            return  '<img src="images/stars4.png" alt="four star">';
//        }
//
//        if ($this->voteAverage > 45){
//            return  '<img src="images/stars3.png" alt="three star">';
//        }
//
//        if ($this->voteAverage > 25){
//            return  '<img src="images/stars2.png" alt="two star">';
//        }
//
//        if ($this->voteAverage > 10){
//            return  '<img src="images/stars1.png" alt="one star">';
//        }
//
//        // if get here, just give half a star
//        return  '<img src="images/starsHalf.png" alt="half star">';
//
//    }

}