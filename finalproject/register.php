<?php
//register.php
//successful new user created
setcookie("username", $_POST["username"]);
header("location: homepage.php");
//not successful -> index.php
?>