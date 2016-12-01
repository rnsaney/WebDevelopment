<?php
include 'navigation.php';
include 'Clothes.php';
include 'ClosetArray.php';
$closet = Closet::getCloset();

//table of all clothes
foreach($closet as $c)
{
    
    echo $c->description;
    echo '</br>';
}

?>