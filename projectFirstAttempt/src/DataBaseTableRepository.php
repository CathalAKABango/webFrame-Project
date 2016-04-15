<?php
/**
 * Created by PhpStorm.
 * User: cathal
 * Date: 15/04/2016
 * Time: 14:53
 */

namespace Itb;


class DataBaseTableRepository
{

    public function create($object)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $objectAsArrayForSqlInsert = DatatbaseUtility::objectToArrayLessId($object);
        $fields = array_keys($objectAsArrayForSqlInsert);
        $insertFieldList = DatatbaseUtility::fieldListToInsertString($fields);
        $valuesFieldList = DatatbaseUtility::fieldListToValuesString($fields);

//        $statement = $connection->prepare('INSERT into '. $this->tableName . ' (text, user, timestamp) value (:text, :user, :timestamp)');
        $statement = $connection->prepare('INSERT into '. $this->tableName . ' ' . $insertFieldList . $valuesFieldList);
        $statement->execute($objectAsArrayForSqlInsert);

        $queryWasSuccessful = ($statement->rowCount() > 0);
        if($queryWasSuccessful) {
            return $connection->lastInsertId();
        } else {
            return -1;
        }
    }


    public function add($id)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $statement = $connection->prepare('INSERT into ' . $this->tableName . ' WHERE id=:id');
        $statement->bindParam(':id', $id, \PDO::PARAM_INT);
        $queryWasSuccessful = $statement->execute();
        return $queryWasSuccessful;
    }
}