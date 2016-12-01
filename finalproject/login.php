<?php
//login
if(!isset($_POST["username"]) || $_POST["username"] == "")
{
    header("location: index.php?badusername=");
}
else
{
    setcookie("username", $_POST["username"]);
    header("location: homepage.php");
}
?>