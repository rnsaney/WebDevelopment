<html>

<head>
    <title>Git Dressed</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="Stylesheet.css">
</head>

<body style='margin:5%'>
    <table width="100%">
        <tr>
            <th colspan="2"><span style="color:#FFC38A">GIT</span>DRESSED</th>
        </tr>
        <tr>
            <td width="50%">
                <div class="container-fluid  bg-1">
                    <h2>Sign In</h2> Already have an account? Sign in below!
                    <div>
                        <br>
                    </div>
                    <form action="login.php" method="post">

                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="username" type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <br>
                        <div class="button">
                            <input type="submit" value="Sign In">
                        </div>
                    </form>
                    <div>
                        <br>
                        <?php
                            if ($_GET["loginfailure"] == "username_not_exists") {
                                echo "<span class='errorspan'>Username does not exist!</span>";
                            }
                            elseif($_GET["loginfailure"]=="password_incorrect")
                            {
                                echo "<span class='errorspan'>Incorrect Password!</span>";
                            }else{
                                echo "<br>";
                            }
                        ?>
                    </div>
                </div>
            </td>
            <td width="50%">
                <div class="container-fluid bg-2">

                    <h2>Register</h2> Create an account. It's free!
                    <div>
                        <br>
                    </div>
                    <form action="register.php" method="post">

                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="username" type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <br>
                        <div class="button">
                            <input type="submit" value="Register">
                        </div>                    
                    </form>
                    <div>
                        <br>
                        <?php
                            if($_GET["registerfailure"] == "emptyfield")
                            {
                                echo "<span class='errorspan'>Both username and password cannot be empty!</span>";
                            }
                            elseif($_GET["registerfailure"] == "unavailable_username")
                            {
                                echo "<span class='errorspan'>Username unavailable!</span>";
                            } elseif ($_GET["registerfailure"] == "db_connection_failure") {
                                echo "<span class='errorspan'>Database transaction unsuccessful!</span>";
                            }else{
                                echo "<br>";
                            }
                        ?>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</body>

</html>
<?php
    setcookie("username", "", time() - 3600);    
?>