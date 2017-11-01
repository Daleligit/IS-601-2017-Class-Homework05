<?php
    class collection {
        static public function findAll() {
            $db = dbConn::getConnection();
            $tableName = get_called_class();
            $sql = 'SELECT * FROM ' . $tableName;
            $statement = $db->prepare($sql);
            $statement->execute();
            $class = static::$modelName;
            $statement->setFetchMode(PDO::FETCH_CLASS, $class);
            $recordsSet =  $statement->fetchAll();
            return $recordsSet;
        }
    }
?>