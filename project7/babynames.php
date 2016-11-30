<?php include("nameInfo.php"); ?>
<?php
    #GLOBALS
    $nameInfo = array();
    $nameRank = array();

    function getNameData() {        
        $myfile = fopen("meanings.txt", "r") or die("Unable to open file!");
        $result = array();
        while(!feof($myfile)) {
            $line = fgets($myfile);      
            if (strpos($line, ' - ') === false) {
                $separated = explode(' ',$line, 2);
                $name = $separated[0];
                $desc = $separated[1];
                $meaning = new nameInfo($name, $desc);
                $result[$meaning->get_name()] =  new nameInfo($name, $desc);
                $nameInfo[$meaning->get_name()] = $meaning;
                //echo $nameInfo[$meaning->get_name()]->get_text() . "<br> ";
            }
        }
        fclose($myfile);
        return $result;
    }
    function getRankData() {
        $myfile = fopen("rank.txt", "r") or die("Unable to open file!");
        $result = array();
        while(!feof($myfile)) {
            $line = fgets($myfile);
            $split = explode(" ", $line, 3);            
            $name = strtoupper($split[0]);            
            $gender = $split[1];                        
            $data = explode(" ", $split[2]);
            $data[sizeof($data)-1] = explode("\n", $data[sizeof($data)-1])[0];
            if(isset($result[$name])) //capture a second listing of a name (male/female)
            {            
                $result[$name."2"] = array("name" => $name, "gender" => $gender, "data" => $data);    
            }
            else {
                $result[$name] = array("name" => $name, "gender" => $gender, "data" => $data);    
            }
        }
        return $result;
    }
    $nameInfo = getNameData();
    $nameRank = getRankData();

    if($_GET["type"] == "list")
    {        
        $list = array();
        foreach($nameInfo as $info)
        {
            $list[$info->get_name()] = $info->get_name() . "\n";            
        }
        foreach($nameRank as $info)
        {
            $list[$info["name"]] = $info["name"] . "\n";                        
        }
        foreach($list as $info)
        {
            echo $info;
        }
    }

    if($_GET["type"] == "meaning")
    {
        $name = $_GET["name"];
        echo "The name <strong>" . $name . "</strong> means ... </br>" ;
        echo "<hr>";
        if(isset($nameInfo[$name]))
        {            
            echo "<q><i>" . $nameInfo[$name]->get_text() . "</i></q>";
        }
        else 
        {
            echo "<i>No meaning info found for " . $name . ".</i>";
        }
    }

    if($_GET["type"] == "rank"){
        $name = $_GET["name"];
        $gender = $_GET["gender"];  
        header("Content-type: text/xml");
        echo "<?xml version='1.0' encoding='UTF-8'?>";
        
        $genderCorrect = true;
        if(isset($nameRank[$name]))
        {
            $genderCorrect = $nameRank[$name]["gender"] == $gender;
            if(!$genderCorrect)
            {
                if(isset($nameRank[$name."2"]))
                {
                    $genderCorrect = $nameRank[$name."2"]["gender"] == $gender;
                    if($genderCorrect)
                    {
                        $name = $name . "2"; //changed the name to second listing
                    }
                }
            }
        }
        if(isset($nameRank[$name]) && $genderCorrect)
        {
            echo "<baby name='".$name."' gender='".$gender."'>";
            $year = 1890;
            foreach($nameRank[$name]["data"] as $rank)
            {
                echo "<rank year='".$year."'>".$rank."</rank>";
                $year = $year + 10;
            }
            echo "</baby>";
        }
    }

    if($_GET["type"] == "graphDataNoMeaning"){        
        foreach($nameRank as $rankinfo)
        {
            if(!isset($nameInfo[$rankinfo["name"]]))
            {
                echo json_encode($rankinfo) . "<br>";  
            }            
        }   
    }
?>