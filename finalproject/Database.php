<?php
    class Database {
        public static function getDB() {
            $user="gitdress_user";
            $password="computerscience";
            $database="gitdress_db";
            $host = "localhost";
            $db = new PDO('mysql:host='.$host.';dbname='.$database.';charset=utf8', $user, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);            
            return $db;
        }
    }
?>