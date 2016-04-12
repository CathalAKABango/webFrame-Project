<?php
namespace Itb;



use Mattsmithdev\PdoCrud\DatabaseManager;

class StudentRepository extends DatabaseManager
{
    public function getAll()
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $statement = $connection->prepare('SELECT * from student');
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Itb\\Student');
        $statement->execute();

        /*
        $dvds = [];
        while ($dvd = $statement->fetch()) {

            $outputAsString = true;
            $message = print_r($dvd, $outputAsString);
            $log->addDebug($message);

            print '<pre>';
            print_r($dvd);

            // append Dvd object to end of our array
            $dvds[] = $dvd;
        }
        */

        $student = $statement->fetchAll();

        return $student;
    }

    public function getOneById($id)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $statement = $connection->prepare('SELECT * from student WHERE id=:id');
        $statement->bindParam(':id', $id);
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Itb\\Student');
        $statement->execute();

        if ($student = $statement->fetch()) {
            return $student;
        } else {
            return null;
        }
    }


}