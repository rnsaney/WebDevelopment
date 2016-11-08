//  This program populates a page with information 
//  about baby name popularity over the past decades


//var NUM_CALLS = 0;   //Used to keep only two name data on the graph at once

window.onload = function() {
	babySelect();
//	document.getElementById("allnames").onchange = pageData;
//	clearButton();
//    document.getElementById("Clear").onclick = clearGraph;
    document.getElementById("search").onclick = pageData;
};

// Creates a "Clear" button that clears the graph and name meaning
function clearButton() {
	var clear = document.createElement("button");
	clear.style.height = 25 + "px";
	clear.style.width = 45 + "px";
	clear.id = "Clear";
	clear.innerHTML = "Clear";
	document.getElementById("namearea").appendChild(clear);    
}

// When clear button is clicked, clears graph and name meaning and any error text
function clearGraph() {
    document.getElementById("resultsarea").style.display = "none";
	document.getElementById("graph").innerHTML = "";
	document.getElementById("meaning").innerHTML = "";
	document.getElementById("errors").innerHTML = "";
}
	
//This function retrieves baby name data from webster
function babySelect() {
    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            populateNames(xhttp);
        }
    };
    xhttp.open("GET", "babynames.php?type=list", true);
    xhttp.send();
}

//This function populates the list of baby names with data
function populateNames(ajax) {
    console.log(ajax);
	var names = ajax.responseText.trim().split("\n");
	names.sort();
	for (var i = 0; i < names.length; i++) {        
		var option = document.createElement("option");
		option.innerHTML = names[i];
		option.value = names[i];
        document.getElementById("allnames").add(option);		
	}
}

//This function fetches the name meaning data and the
//graph data and sends it to their respective functions
function pageData() {
    var chosenName = document.getElementById("allnames").value;
    var gender = (document.getElementById("genderm").checked) ? "m" : "f";
	if (chosenName != "") {                  
//		if (NUM_CALLS == 2) {					// If there is data from two names up, clear the graph
//			document.getElementById("graph").innerHTML = "";
//			NUM_CALLS = 0;
//		}
        document.getElementById("graph").innerHTML = "";
        document.getElementById("resultsarea").style.display = "";
                
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("meaning").innerHTML = xhttp.responseText;
            }
        };
        xhttp.open("GET", "babynames.php?type=meaning&name="+chosenName, true);
        xhttp.send();
        
        var xhttp2 = new XMLHttpRequest();
        xhttp2.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                graphData(xhttp2);
            }
        };
        xhttp2.open("GET", "babynames.php?type=rank&name="+chosenName+"&gender="+gender, true);
        xhttp2.send();
        
	}
}
	
//This function puts the bars, rank number, and year into the graph
function graphData(ajax) {
    console.log(ajax);
	//NUM_CALLS++;
    if(ajax.responseXML){
        document.getElementById("graph").style.display = "";
        document.getElementById("norankdata").style.display = "none";
        var nameData = ajax.responseXML.getElementsByTagName("baby")[0];
        var rank = nameData.getElementsByTagName("rank");
        // Loop over the number of ranking data to create the graph info
        for (var i = 0; i < rank.length; i++) {	
            var leftCalculation = 10 + 60 * i;
            var rankNum = rank[i].firstChild.nodeValue;
            var bar = document.createElement("div");
            bar.innerHTML = rankNum;
            bar.className = bar.className + " ranking";
            // This code compares makes the second name's bars blue 
//            if (NUM_CALLS > 1) {
//                bar.style.backgroundColor = "blue";									
//            }
            // If the name is in top 10, attatch popular class
            if (rankNum >= 1 && rankNum <= 10) {
                bar.className = bar.className + " popular";
            }
            if (rankNum == 0) {
                bar.style.top = 250 + "px";
            } else {
                bar.style.top = (250 - Math.floor((1000 - rankNum) / 4)) + "px";
            }

            //bar.style.display = "none";
            document.getElementById("graph").appendChild(bar);
            //bar.appear();														//Makes the bars fade in
            bar.style.left = (leftCalculation) + "px";

            var year = document.createElement("label");
            year.innerHTML = rank[i].getAttribute("year");
            year.style.left = (leftCalculation) + "px";
            year.className = "year";
            document.getElementById("graph").appendChild(year);
            //year.pulsate();														//Makes the years pulsate
        }
    } else {
        document.getElementById("graph").style.display = "none";
        document.getElementById("norankdata").style.display = "";
    }
}

//This function throws a descriptive error 
function ajaxFailure(ajax, exception) {
  $("errors").innerHTML = "There was an error!:" + 
        " The status of the server: " + ajax.status + " " + ajax.statusText + 
        "; The server has this to tell you: " + ajax.responseText;
}
