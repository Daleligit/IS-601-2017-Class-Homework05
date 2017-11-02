<?php
    class dbConn{
        protected static $db;
        protected static $errMas;

        private function __construct() {
            try {
                self::$db = new PDO( 'mysql:host=' . CONNECTION .';dbname=' . DATABASE, USERNAME, PASSWORD );
                self::$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            }
            catch (PDOException $e) {
                self::$errMas .= htmlTags::changeRow("Connection Error: " . $e->getMessage());
            }
        }

        public static function getConnection(&$connErr) {
            if (!self::$db) {
                new dbConn();
            }
            $connErr .=  self::$errMas;
            return self::$db;
        }
    }
?>