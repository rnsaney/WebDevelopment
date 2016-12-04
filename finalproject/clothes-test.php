<?php
    include_once 'Clothes.php';
//    
    $shirt = new Clothes('blue',FALSE,TRUE,TRUE,'shirt','test',TRUE,'blue tshirt');
    $tshirt = new Clothes('red',FALSE,TRUE,TRUE,'shirt','test',TRUE,'red nike tshirt');
    $pants = new Clothes('black',TRUE,TRUE,TRUE,'pants','test',TRUE,'black pants');
    $shoes = new Clothes('black',TRUE,TRUE,TRUE,'shoes','test',TRUE,'black shoes');
    $pants2 = new Clothes('blue',TRUE,TRUE,TRUE,'pants','test',TRUE,'jeans');
    $shoes2 = new Clothes('yellow',FALSE,FALSE,TRUE,'shoes','test',TRUE,'yellow flip flops');
    $closet = array($shirt, $tshirt, $pants, $shoes, $pants2, $shoes2);
//    $outfit = Clothes::makeoutfit($closet);
        
    echo json_encode(Clothes::getClosetFromDB("richard"));

?>