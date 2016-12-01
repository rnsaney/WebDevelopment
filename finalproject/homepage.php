<?php
include 'navigation.php';
//include 'temp.php';
include 'Clothes.php';
include 'ClosetArray.php';

date_default_timezone_set('America/New_York');
echo "The time is " . date("h:i");
echo "</br>";

echo "ATHENS TEMP: " . Temp::getTemp(Temp::$athens);
echo "</br>";

$outfit = Clothes::makeoutfit(Closet::getCloset());
foreach($outfit as $a)
{
    echo $a->description;
    echo "</br>";
}

?>