<?php
include_once 'temp.php';
include_once 'Database.php';
class Clothes {
    
    var $id;
    var $color;
    var $low;
    var $medium;
    var $high;
    var $type;
    var $username;
    var $clean;
    var $description;    
    
//    function __construct(
//        $id,
//        $color,
//        $low,
//        $medium,
//        $high,
//        $type,
//        $username,
//        $clean,
//        $description
//    ) {
//        $this->id = $id;
//        $this->color = $color;
//        $this->low = $low;
//        $this->medium = $medium;
//        $this->high = $high;
//        $this->type = $type;
//        $this->username = $username;
//        $this->clean = $clean;
//        $this->description = $description;
//    }
//    
    function __construct(       
        $color,
        $low,
        $medium,
        $high,
        $type,
        $username,
        $clean,
        $description
    ) {
        $this->id = null;
        $this->color = $color;
        $this->low = $low;
        $this->medium = $medium;
        $this->high = $high;
        $this->type = $type;
        $this->username = $username;
        $this->clean = $clean;
        $this->description = $description;
    }
    
    static function mapRowToClothes($row)
    {
        $clothes = new Clothes(                
            $row["color"],
            $row["low"],
            $row["medium"],
            $row["high"],
            $row["type"],
            $row["username"],
            $row["clean"],
            $row["description"]
        );
        $clothes->id = $row["id"];
        return $clothes;        
    }
    
    //returns clothes with the id, or false if id is not found in DB
    static function getClothesFromDB($clothes_id)
    {        
        $db = Database::getDB();
        $sql = "SELECT * FROM Clothes c WHERE c.id = :id";
        $stmt = $db->prepare($sql);
        $result = $stmt->execute(array(":id" => $clothes_id));
        $rows = $stmt->fetchAll();
        if(sizeof($rows) > 0)
        {            
            $row = $rows[0];            
            $clothes = new Clothes(                
                $row["color"],
                $row["low"],
                $row["medium"],
                $row["high"],
                $row["type"],
                $row["username"],
                $row["clean"],
                $row["description"]
            );
            $clothes->id = $clothes_id;
            $result = $clothes;            
        }
        else {
            $result = FALSE;            
        }
        return $result;
    }
    
    static function getClosetFromDB($clothes_username)
    {
        $db = Database::getDB();
        $sql = "SELECT * FROM Clothes c WHERE c.username = :username";
        $stmt = $db->prepare($sql);
        $result = $stmt->execute(array(":username" => $clothes_username));        
        $rows = $stmt->fetchAll();        
        $closet;
        for($i = 0; $i < sizeof($rows); $i++)
        {
            $row = $rows[$i];
            $clothes = Clothes::mapRowToClothes($row);
            $closet[$i] = $clothes;
        }
        return $closet;
    }
    
    public function updateClothesInDB()
    {
        $db = Database::getDB();
        //set up query string        
        $sql = "UPDATE Clothes c SET c.color = :color, c.low = :low, c.medium = :medium, c.high = :high, c.type = :type, c.clean = :clean, c.description = :description WHERE c.id = :id";
        //prepare the statement
        $stmt = $db->prepare($sql);
        $stmt->execute(array(
            ":color" => $this->color,
            ":low" => $this->low,
            ":medium" => $this->medium,
            ":high" => $this->high,
            ":type" => $this->type,
            ":clean" => $this->clean,
            ":description" => $this->description,
            ":id" => $this->id
        ));
        return $stmt->rowCount();
    }
    
    public function addClothesToDB() {
        $db = Database::getDB();        
        $sql = "INSERT INTO Clothes(color, low, medium, high, type, username, clean, description) VALUES (:color, :low, :medium, :high, :type, :username, :clean, :description)";        
        //prepare the statement
        $stmt = $db->prepare($sql);
        $stmt->execute(array(
            ":color" => $this->color,
            ":low" => $this->low,
            ":medium" => $this->medium,
            ":high" => $this->high,
            ":type" => $this->type,
            ":username" => $this->username,
            ":clean" => $this->clean,
            ":description" => $this->description,
        ));        
        return $stmt->rowCount();
    }    
    
    //static method Clothes[] makeoutfit(Clothes[]);
    public static function makeoutfit($Clothes){
        $temp = -1;
        $ctemp;
        if(Temp::getTemp(Temp::$athens) >= 70)
            $temp = 3;
        if((Temp::getTemp(Temp::$athens) < 70) && (Temp::getTemp(Temp::$athens) >= 50))
            $temp = 2;
        if(Temp::getTemp(Temp::$athens) < 50)
            $temp = 1;
        for($t = 0; $t < count($Clothes); $t++){
            if($Clothes[$t]->high == TRUE && $temp == 3){
                $ctemp[$t] = $Clothes[$t];
            }
            elseif($Clothes[$t]->medium == TRUE && $temp == 2){
                $ctemp[$t] = $Clothes[$t];
            }
            elseif($Clothes[$t]->low == TRUE && $temp == 1){
                $ctemp[$t] = $Clothes[$t];
            }
        }
        $Clothes = array_values($ctemp);
        $outfit;
        for($x = 0; $x < count($Clothes); $x++){
            if ($Clothes[$x]->clean == TRUE) {
                for($i = 0; $i < count($Clothes); $i++){
                    if($Clothes[$x]->type != $Clothes[$i]->type){
                        if ($Clothes[$i]->clean == TRUE) {
                            if($Clothes[$x]->matches($Clothes[$i]) == TRUE){
                                for($j = 0; $j < count($Clothes); $j++){
                                    if(($Clothes[$x]->type != $Clothes[$j]->type)&&($Clothes[$i]->type != $Clothes[$j]->type)){
                                        if ($Clothes[$j]->clean == TRUE) {
                                            if(($Clothes[$j]->matches($Clothes[$x]) == TRUE)&&($Clothes[$j]->matches($Clothes[$i]) == TRUE)){
                                            $outfit[0] = $Clothes[$x];
                                            $outfit[1] = $Clothes[$i];
                                            $outfit[2] = $Clothes[$j];
                                            }
                                        }
                                    
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return $outfit;
    }
    public function matches($Clothes){
        if ($this->color == 'black' && ($Clothes->color == 'red' || $Clothes->color == 'orange' || $Clothes->color == 'yellow' || $Clothes->color == 'green' || $Clothes->color == 'blue' || $Clothes->color == 'purple' ||  $Clothes->color == 'white' || $Clothes->color == 'black'))
            return true;
        elseif ($this->color == 'red' && ($Clothes->color == 'black' || $Clothes->color == 'white' || $Clothes->color == 'blue'))
            return true;
        elseif ($this->color == 'orange' && ($Clothes->color == 'black' || $Clothes->color == 'white' || $Clothes->color == 'blue'))
            return true;
        elseif ($this->color == 'yellow' && ($Clothes->color == 'black' || $Clothes->color == 'white' || $Clothes->color == 'blue'))
            return true;
        elseif ($this->color == 'green' && ($Clothes->color == 'black' || $Clothes->color == 'white' || $Clothes->color == 'blue'))
            return true;
        elseif ($this->color == 'blue' && ($Clothes->color == 'red' || $Clothes->color == 'orange' || $Clothes->color == 'yellow'|| $Clothes->color == 'green'|| $Clothes->color == 'purple'|| $Clothes->color == 'white'|| $Clothes->color == 'black'))
            return true;
        elseif ($this->color == 'purple' && ($Clothes->color == 'black' || $Clothes->color == 'white' || $Clothes->color == 'blue'))
            return true;
        elseif ($this->color == 'white' && ($Clothes->color == 'black' || $Clothes->color == 'red' || $Clothes->color == 'orange'|| $Clothes->color == 'yellow'|| $Clothes->color == 'green'|| $Clothes->color == 'blue'|| $Clothes->color == 'purple'))
            return true;
        elseif ($this->color == 'black' && ($Clothes->color == 'white' || $Clothes->color == 'red' || $Clothes->color == 'orange'|| $Clothes->color == 'yellow'|| $Clothes->color == 'green'|| $Clothes->color == 'blue'|| $Clothes->color == 'purple'))
            return true;
    }
}

?>