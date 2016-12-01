<?php
    include "navigation.php";
    $username = "";
    if(isset($_COOKIE["username"])) {
        $username = $_COOKIE["username"];
    }
    else {
        $username = "unknown";
    }
    
?>
    //account form
    echo '<h1>Account Information</h1>';
    echo '<form action="register.php" method="post">';
    echo 'Username: ' . $username;
    echo '<br>';
    echo 'Password: <input type="text" name="password">';
    echo '<br>';
//    echo 'Zip Code: <input type="text" name="zipcode">';
//    echo '<br>';
//    echo 'Laundry Day: <input type="text" name="laundryday">';
//    echo '<br>';
    echo '<input type="submit" value="update">';
    echo '</form>';
?>