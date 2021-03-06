<?php
/**
 * class for the technique table in database
 */

namespace Itb\model;

use Mattsmithdev\PdoCrud\DatabaseTable;

/**
 * Class technique
 * @package Itb\model
 */
class technique extends DatabaseTable
{
    /**
     * decalring the variable id
     * @var $id
     */
    private $id;

    /**
     * declaring varibale for the description
     * @var $description
     */
    private $description;

    /**
     * function to get the deacription
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * function to set the description
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * function to get the id
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


//    /**
//     * function to get the description
//     * @return mixed
//     */
//    public function getDecription()
//    {
//        return $this->decription;
//    }
//
//    /**
//     * function to set the decription
//     * @param mixed $decription
//     */
//    public function setDecription($decription)
//    {
//        $this->decription = $decription;
//    }
}
