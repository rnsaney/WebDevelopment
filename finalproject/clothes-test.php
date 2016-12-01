<?php
    include 'Clothes.php';
    $shirt = new Clothes(0,'blue',0,1,1,'shirt','test',true,'blue tshirt');
    $tshirt = new Clothes(1,'red',0,1,1,'shirt','test',true,'red nike tshirt');
    $pants = new Clothes(2,'black',0,1,1,'pants','test',true,'black pants');
    $shoes = new Clothes(3,'black',0,1,1,'shoes','test',true,'black shoes');
    $pants2 = new Clothes(4,'blue',0,1,1,'pants','test',true,'jeans');
    $shoes2 = new Clothes(5,'yellow',0,1,1,'shoes','test',true,'yellow shoes');
    $closet = array($shirt, $tshirt, $pants, $shoes, $pants2, $shoes2);
    $outfit = Clothes::makeoutfit($closet);
  
?>