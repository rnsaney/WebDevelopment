<?php
    //login 
    echo '<h1>Log In</h1>';
    echo '<form action="login.php" method="post">';
    echo 'Username: <input type="text" name="username">';
    echo '<br>';
    echo 'Password: <input type="text" name="password">';
    echo '<br>';
    echo '<input type="submit" value="login">';
    echo '</form>';        
    //create account form
    //account form
    echo '<h1>Register</h1>';
    echo '<form action="register.php" method="post">';
    echo 'Username: <input type="text" name="username">';
    echo '<br>';
    echo 'Password: <input type="text" name="password">';
    echo '<br>';
    echo 'Zip Code: <input type="text" name="zipcode">';
    echo '<br>';
    echo 'Laundry Day: <input type="text" name="laundryday">';
    echo '<br>';
    echo '<input type="submit" value="register">';
    echo '</form>';
?>
    
