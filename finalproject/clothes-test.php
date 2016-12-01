<?php
    include 'Clothes.php';
    $shirt = new Clothes(0,'blue',FALSE,TRUE,TRUE,'shirt','test',TRUE,'blue tshirt');
    $tshirt = new Clothes(1,'red',FALSE,TRUE,TRUE,'shirt','test',TRUE,'red nike tshirt');
    $pants = new Clothes(2,'black',TRUE,TRUE,TRUE,'pants','test',TRUE,'black pants');
    $shoes = new Clothes(3,'black',TRUE,TRUE,TRUE,'shoes','test',TRUE,'black shoes');
    $pants2 = new Clothes(4,'blue',TRUE,TRUE,TRUE,'pants','test',TRUE,'jeans');
    $shoes2 = new Clothes(5,'yellow',FALSE,FALSE,TRUE,'shoes','test',TRUE,'yellow flip flops');
    $closet = array($shirt, $tshirt, $pants, $shoes, $pants2, $shoes2);
    $outfit = Clothes::makeoutfit($closet);
    echo $outfit[0]->id;
    echo "<br>";
    echo $outfit[1]->id;
    echo "<br>";
    echo $outfit[2]->id;

?>