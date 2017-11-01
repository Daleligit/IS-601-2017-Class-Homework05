<?php
    class collection {
        static public function homeworkSearch() {
            global $errorMas;
            $db = dbConn::getConnection();
            if (empty($errorMas)) {
                $tableName = get_called_class();
                $sql = 'SELECT * FROM ' . $tableName . ' WHERE id < 6';
                try {
                    $statement = $db->prepare($sql);
                    $statement->execute();
                    $class = static::$modelName;
                    $statement->setFetchMode(PDO::FETCH_CLASS, $class);
                    $recordsSet = $statement->fetchAll();
                } catch (PDOException $e){
                    $errorMas .= 'SQL query error: ' . $e->getMessage();
                }
                return $recordsSet;
            }
        }
    }
?>