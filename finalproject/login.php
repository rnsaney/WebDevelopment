<?php //login.php
    include_once "Database.php";
    include_once "User.php";
    
    $username = $_POST["username"];
    $user = User::getUserFromDB($username);
    //if the username does exist
    if($user != null)
    {        
        $password = $_POST["password"];
        //correct password, go to homepage
        if($user->password == $password)
        {            
            setcookie("username", $username);
            header("location: homepage.php");
        }
        //failed password, back to index.php
        else
        {
            header("location: index.php?loginfailure=password_incorrect");
        }
    }
    //the username does not exists, back to index.php
    else {
        header("location: index.php?loginfailure=username_not_exists");
    }
?>