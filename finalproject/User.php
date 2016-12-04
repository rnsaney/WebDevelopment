<?php
    include_once "Database.php";
    class User {
        var $username;
        var $password;
        var $zipcode; 
        
        function __construct(
            $username,
            $password,
            $zipcode
        ){
            $this->username = $username; 
            $this->password = $password;
            $this->zipcode  = $zipcode;
        }
        
        static function getUserFromDB($username) {
            $db = Database::getDB();
            $stmt = $db->prepare("SELECT * FROM Users u WHERE u.username = ?");
            $stmt->execute(array($username));
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(sizeof($rows) > 0)
            {
                $user = new User($username, $rows[0]['password'], $rows[0]['zipcode']);                
                return $user;
            }
            else {
                return null;
            }        
        }
        
        static function addUserToDB($user) {
            $db = Database::getDB();
            $stmt = $db->prepare("INSERT INTO Users(username, password, zipcode) VALUES (?, ?, ?)");
            $stmt->bindValue(1, $user->username, PDO::PARAM_STR);
            $stmt->bindValue(2, $user->password, PDO::PARAM_STR);
            $stmt->bindValue(3, $user->zipcode, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount();
        }
        
        static function updatePassword($username, $password) {
            $db = Database::getDB();
            $stmt = $db->prepare("UPDATE Users u SET u.password=? WHERE u.username=?");
            $stmt->bindValue(1, $password, PDO::PARAM_STR);
            $stmt->bindValue(2, $username, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->rowCount();
        }
        
        static function updateZipcode($username, $zipcode) {
            $db = Database::getDB();
            $stmt = $db->prepare("UPDATE Users u SET u.zipcode=? WHERE u.username=?");
            $stmt->bindValue(1, $zipcode, PDO::PARAM_INT);
            $stmt->bindValue(2, $username, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->rowCount();
        }
    }
?>