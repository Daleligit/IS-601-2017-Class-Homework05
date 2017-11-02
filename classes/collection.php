<?php
    class collection {
        static public function find(&$connErr, &$sqlErr, $query) {
            $db = dbConn::getConnection($connErr);
            if (empty($connErr)) {
                $tableName = get_called_class();
                $sql = 'SELECT * FROM ' . $tableName . ' WHERE ' . $query;
                try {
                    $statement = $db->prepare($sql);
                    $statement->execute();
                    $class = static::$modelName;
                    $statement->setFetchMode(PDO::FETCH_CLASS, $class);
                    $recordsSet = $statement->fetchAll();
                } catch (PDOException $e){
                    $sqlErr .= htmlTags::changeRow('SQL query error: ' . $e->getMessage());
                }
                return $recordsSet;
            }
        }
    }
?>