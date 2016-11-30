
<?php include("top.html"); ?>

<?php
//Variables
$textFile = file_get_contents("singles.txt");
$singles = explode("\n", $textFile);
$notInFile = false;
//Get User Information
$userName = $_GET["name"];
$userInfo = array();
foreach ($singles as $people) {
	$userInfo = explode(",", $people);
	if($userInfo[0] == $userName){   
		break;
	}
}
//Function to check personality match
function checkPersona($matchPersona, $userPersona){
	for($i=0; $i<4; $i++){
		if ($matchPersona[$i] == $userPersona[$i]){
			return true;
		}
	}
}
//Function to create match array
function createMatches(){
    //the array of strings from the singles.txt
	global $singles;
    //the current user info array (a string) 
	global $userInfo;
	$matches = $singles;
	$arraySize = sizeof($matches);
	
	//Test for gender compatibility
    //Filter the array of all users into only those that match
	for ($i=0; $i<$arraySize; $i++){
		$matchInfo = explode(",", $matches[$i]);
		$location = $i+1;
		if ($matchInfo[1] == $userInfo[1]){
			unset($matches[$i]); //remove same gender from array
		}
		else if ((
            $matchInfo[2] < $userInfo[5] || 
            $matchInfo[2] > $userInfo[6]) || 
                 ($userInfo[2] < $matchInfo[5] || $userInfo[2] > $matchInfo[6])){
			unset($matches[$i]); //remove ages outside range from array
		}
        else if ($matchInfo[4] != $userInfo[4]){
			unset($matches[$i]); //remove different OS from array
		}
		else if (!checkPersona(str_split($matchInfo[3]), str_split($userInfo[3])))
		{
			unset($matches[$i]); //remove incompatible personas from array
		}
	}
	$matches = array_values($matches); //re-indexes the array
	return $matches;
}
//Function to get matches
function displayMatches(){
	$matches = createMatches();
	for ($i=0; $i<sizeof($matches); $i++) {
		$rawMatch = explode(",", $matches[$i]);
		printMatches($rawMatch);
	}
}

function mapUserNameToPictureFile($name){
    $underlineNoSpaces = str_replace(" ","_",$name);
    $lowercase = strtolower($underlineNoSpaces);
    $filename = "Images/" . $lowercase . ".jpg";
    //echo $filename;
    if(file_exists($filename)){
        return $filename;
    }
    else{
        return "https://webster.cs.washington.edu/images/nerdluv/user.jpg";
    }
}

//Function to display matches
function printMatches($rawMatch){
    $imagefile = mapUserNameToPictureFile($rawMatch[0]);
	echo "<div class='match'>
		<p><img src='" . $imagefile . "' alt='user icon' />
		" . $rawMatch[0] . "</p>
		<ul>
			<li><strong>gender:</strong>" . $rawMatch[1] . "</li>
			<li><strong>age:</strong>" . $rawMatch[2] . "</li>
			<li><strong>type:</strong>" . $rawMatch[3] . "</li>
			<li><strong>OS:</strong>" . $rawMatch[4] . "</li>                        
		</ul>
		</div>";
}
?>


<h1>Matches for <?=$userName?></h1>

<?php displayMatches();?>
	

<?php include("bottom.html"); ?>