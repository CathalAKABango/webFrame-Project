<?php
namespace Itb;



use Mattsmithdev\PdoCrud\DatabaseManager;

class StudentRepository extends DatabaseManager
{
    public function getAll()
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $statement = $connection->prepare('SELECT * from students');
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Itb\\Student');
        $statement->execute();
                $student = $statement->fetchAll();

        return $student;
    }

    public function getOneByUsername($username)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $statement = $connection->prepare('SELECT * from students WHERE username=:username');
        $statement->bindParam(':username', $username);
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Itb\\Student');
        $statement->execute();

        if ($student = $statement->fetch()) {
            return $student;
        } else {
            return null;
        }
    }
    public function getPassword($password)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $statement = $connection->prepare('SELECT * from student WHERE password=:password');
        $statement->bindParam(':password', $password);
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Itb\\Student');
        $statement->execute();

        if ($student = $statement->fetch()) {
            return $student;
        } else {
            return null;
        }
    }


}