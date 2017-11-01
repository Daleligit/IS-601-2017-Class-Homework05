<?php
    class dbConn{
        protected static $db;

        private function __construct() {
            global $errorMas;
            try {
                self::$db = new PDO( 'mysql:host=' . CONNECTION .';dbname=' . DATABASE, USERNAME, PASSWORD );
                self::$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            }
            catch (PDOException $e) {
                $errorMas .= htmlTags::changeRow("Connection Error: " . $e->getMessage());
            }
        }

        public static function getConnection() {
            if (!self::$db) {
                new dbConn();
            }
            $results = self::$db;
            return $results;
        }
    }
?>