<html>

    <?php
    include 'navigation.php';    
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
          
                <td id="outfit">

                            <?php
                                $outfit = Clothes::makeoutfit(Closet::getCloset());
                                //echo json_encode($outfit);
                                foreach($outfit as $a)
                                {                               
                                    echo $a->description;                                
                                    echo "</br>";
                                }
                            ?>                    

                </td>
            <td id="time">
                <?php
                    date_default_timezone_set('America/New_York');
                    echo "<span style='font-size: 30px'> TIME: </span></br>";
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