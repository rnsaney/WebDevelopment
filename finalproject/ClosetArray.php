<?php
    class Closet {

        static function getCloset() {
            $closet;
            $closet[0] = new Clothes(0,'blue',FALSE,TRUE,TRUE,'shirt','test',TRUE,'blue tshirt');
            $closet[1] = new Clothes(1,'red',FALSE,TRUE,TRUE,'shirt','test',TRUE,'red nike tshirt');
            $closet[2] = new Clothes(2,'black',TRUE,TRUE,TRUE,'pants','test',TRUE,'black pants');
            $closet[3] = new Clothes(3,'black',TRUE,TRUE,TRUE,'shoes','test',TRUE,'black shoes');
            $closet[4] = new Clothes(4,'blue',TRUE,TRUE,TRUE,'pants','test',TRUE,'jeans');
            $closet[5] = new Clothes(5,'yellow',FALSE,FALSE,TRUE,'shoes','test',TRUE,'yellow flip flops');
            $closet[6] = new Clothes(6,'green',FALSE,TRUE,TRUE,'shirt','test',TRUE,'green t-shirt');
            $closet[7] = new Clothes(7,'white',TRUE,TRUE,TRUE,'pants','test',TRUE,'khaki pants');
            $closet[8] = new Clothes(8,'black',TRUE,TRUE,TRUE,'pants','test',TRUE,'black jeans');
            $closet[9] = new Clothes(9,'red',FALSE,FALSE,TRUE,'pants','test',TRUE,'red shorts');
            $closet[10] = new Clothes(10,'purple',FALSE,FALSE,TRUE,'shirt','test',TRUE,'purple tank top');
            $closet[11] = new Clothes(11,'orange',TRUE,FALSE,FALSE,'shoes','test',TRUE,'orange boots');
            $closet[12] = new Clothes(12,'yellow',FALSE,TRUE,FALSE,'shirt','test',TRUE,'long-sleeve yellow shirt');
            $closet[13] = new Clothes(13,'purple',FALSE,TRUE,TRUE,'shoes','test',TRUE,'purple sneakers');
            $closet[14] = new Clothes(14,'blue',TRUE,TRUE,TRUE,'shoes','test',TRUE,'blue running shoes');

            return $closet;
        }
    }
?>