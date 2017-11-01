<?php
    class dbConn{
        protected static $db;
        protected static $results;

        private function __construct() {
            try {
                self::$db = new PDO( 'mysql:host=' . CONNECTION .';dbname=' . DATABASE, USERNAME, PASSWORD );
                self::$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            }
            catch (PDOException $e) {
                 echo htmlTags::changeRow("Connection Error: " . $e->getMessage());
            }
        }

        public static function getConnection() {
            if (!self::$db) {
                new dbConn();
            }
            return self::$db;
        }
    }
?>