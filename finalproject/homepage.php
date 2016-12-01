<html>

    <?php
    include 'navigation.php';
    //include 'temp.php';
    include 'Clothes.php';
    include 'ClosetArray.php';
    ?>

    <div class="container-fluid">

    <table width="100%">
        <tr>
            <td id="hello" colspan="3">
            <?php
                if(isset($_COOKIE["username"]))
                {
                    echo "Hello ". $_COOKIE["username"] . ", here's your outfit for today!";
                }
            ?>
            </td>
        </tr>
        <tr>
            <td>
                <br>
                <br>
                <br>
            </td>
        </tr>
        <tr>
            <div style = "background-color:purple">
                <td id="outfit">

                            <?php
                                $outfit = Clothes::makeoutfit(Closet::getCloset());
                                foreach($outfit as $a)
                                {                               
                                    echo $a->description;                                
                                    echo "</br>";
                                }
                            ?>                    

                </td>
            </div>
            <td id="time">
                <?php
                    date_default_timezone_set('America/New_York');
                    echo date("h:i");
                ?>
            </td>
            <td id="temp">
                <?php
                    echo "ATHENS TEMP: </br> <span style='font-size: 60px'>" . Temp::getTemp(Temp::$athens) . "</span>";                    
                ?>
            </td>            
        </tr>
    </table>
    </div>
</html>