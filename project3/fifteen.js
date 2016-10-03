"use strict";
var emptySpot = 16;

function init() {
    var puzzlearea = document.getElementById("puzzlearea");
    var boxes = puzzlearea.children;
    var i = 0;
    for (; i < boxes.length; i++) {
        boxes.item(i).className = "box";
        boxes.item(i).id = "pos" + (i + 1);
        boxes.item(i).style.backgroundPosition = backgroundImagePos(i);
        boxes.item(i).onclick = swap;
    }
    addHoverClassToAdjacent();
    var shuffleButton = document.getElementById("shufflebutton");
    shuffleButton.onclick = shuffle;
}

function swap(e) {
    console.log("Empty Spot: " + emptySpot);
    var clickedBoxId = e.target.id;
    var pos = parseInt(clickedBoxId.replace("pos", ""));
    console.log("Clicked Pos: " + pos);
    if (isAdjacentToEmptySpot(pos)) {
        e.target.id = "pos" + emptySpot;
        var emptyPos = emptySpot;
        emptySpot = pos;
    }
    console.log("Empty Spot: " + emptySpot);
    addHoverClassToAdjacent();
}

function addHoverClassToAdjacent() {
    var boxes = puzzlearea.children;
    var adjPos = generateAdjacentToEmptySpots();
    var i = 0;
    for (; i < boxes.length; i++) {
        boxes.item(i).className = "box";
    }
    for (i = 0; i < adjPos.length; i++) {
        var adjBox = document.getElementById("pos" + adjPos[i]);
        adjBox.className = "box boxHover";
    }
}

//0 indexed position
function backgroundImagePos(pos) {
    var horiz = ((pos) % 4) * -100;
    var vertical = Math.floor(pos / 4) * -100;
    var result = "" + horiz + "px " + vertical + "px";
    return result;
}

//1 indexed positions
function isAdjacentToEmptySpot(pos) {
    if (pos == emptySpot) return false;
    if (pos + 4 == emptySpot) return true; //above
    if (pos - 4 == emptySpot) return true; //below
    if (pos + 1 == emptySpot && pos % 4 != 0) return true; //left
    if (pos - 1 == emptySpot && pos % 4 != 1) return true; //right
    return false;
}

//1 indexed positions
function generateAdjacentToEmptySpots() {
    var positions = [];
    var i = 1;
    for (; i <= 16; i++) {
        if (isAdjacentToEmptySpot(i)) {
            positions.push(i);
        }
    }
    console.log(positions);
    return positions;
}



function shuffle(e) {
    var i = 0;
    var previousPos = emptySpot;
    (function shuffleIteration() {
        var positions = generateAdjacentToEmptySpots();
        positions = positions.filter(function (pos) {
            return pos != previousPos
        });
        var randIndex = Math.floor(Math.random() * positions.length);
        var swapPos = positions[randIndex];
        console.log("Swap Pos " + swapPos);
        previousPos = emptySpot;
        var divToClick = document.getElementById("pos" + swapPos);
        console.log(divToClick);
        divToClick.click();
        i++;
        if (i < 100) {
            setTimeout(shuffleIteration, 50);
        }
    })();
}

window.onload = init;