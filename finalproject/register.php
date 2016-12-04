<?php  //register.php
    include_once "Database.php";
    include_once "User.php";
    
    $username = $_POST["username"];
    $user = User::getUserFromDB($username);        
    //if the username does not exist already
    if($user == null)
    {
        $password = $_POST["password"];
        if($username == "" or $password == "")
        {
            header("location: index.php?registerfailure=emptyfield");
        }
        else {
            $count = User::addUserToDB(new User($username, $password, 30605));
            //successfully created new user, go to homepage
            if($count == 1)
            {
                setcookie("username", $username);
                header("location: homepage.php");
            } 
            //not successful
            else {        
                header("location: index.php?registerfailure=db_connection_failure");
            }
        }        
    }
    //username exists already
    else {
        header("location: index.php?registerfailure=unavailable_username");
    }
?>