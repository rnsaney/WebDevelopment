/*
Project 2
Team Lead: 
    Richard Saney
Team Members:
    Kathryn Soll
    Paige Marogil
    Frank Zhang
*/

function toUpper(mystring) {
    var sp = mystring.split(' ');
    var f, r;
    var word = new Array();
    for (var i = 0; i < sp.length; i++) {
        f = sp[i].substring(0, 1).toUpperCase();
        r = sp[i].substring(1);
        word[i] = f + r;
    }
    newstring = word.join(' ');
    sp = newstring.split('-');
    word = new Array();
    for (var i = 0; i < sp.length; i++) {
        f = sp[i].substring(0, 1).toUpperCase();
        r = sp[i].substring(1);
        word[i] = f + r;
    }
    newstring = word.join('-');
    return newstring;
}
$(document).ready(function () {
    //captalize the first name
    $('#fname').focusout(function () {
        var mystring = document.getElementById('fname').value;
        document.getElementById('fname').value = toUpper(mystring);
    });
    //capatlize the last name
    $('#lname').focusout(function () {
        var mystring = document.getElementById('lname').value;
        document.getElementById('lname').value = toUpper(mystring);
    });
    //alert if phone number is wrong
    $('#phoneNum').focusout(function () {
        var number = document.getElementById("phoneNum");
        var regEx = /(?:\d{3}|\(\d{3}\))([-\/\.])\d{3}\1\d{4}/;
        if (!(regEx.exec(number.value))) {
            window.alert(number.value + " is not a well formatted phone number." + "\nPlease use one of the following formats:" + "\n(###)-###-####" + "\nor\n###-###-####" + "\nor\n(###).###.####" + "\nor\n###.###.####");
        }
    });

    //autocomplete the city and populate the zip code
    $('#cityName').keyup(function () {
        var csvString = zipcodeCityCSV;
        //console.log(csvString);
        var csvObj = $.csv.toObjects(csvString);
        //console.log(csvObj);
        var inputCityPrefix = document.getElementById("cityName").value;
        console.log(inputCityPrefix);
        var filteredCityList = csvObj.filter(function (item) {
            return item.cityName.startsWith(inputCityPrefix);
        });
        //console.log(filteredCityList);
        var uniqueCityList = {};
        filteredCityList.forEach(function (item) {
            uniqueCityList[item.cityName] = {
                cityName: item.cityName,
                zipcode: item.zipcode
            };
        });
        var uniqueCityNamesList = [];
        for (key in uniqueCityList) {
            if (uniqueCityList.hasOwnProperty(key)) {
                uniqueCityNamesList.push(uniqueCityList[key]);
            }
        }
        var zipcodeOptionList = document.getElementById("zipCode");
        while (zipcodeOptionList.firstChild) {
            zipcodeOptionList.removeChild(zipcodeOptionList.firstChild);
        }
        //console.log(uniqueCityList);
        if (uniqueCityNamesList.length == 1) {
            var uniqueCity = uniqueCityNamesList[0].cityName;
            document.getElementById("cityName").value = uniqueCity;
            var allZipCodesForUniqueCity = filteredCityList.filter(function (item) {
                return item.cityName == uniqueCity;
            });
            var zipcodeOptionList = document.getElementById("zipCode");
            while (zipcodeOptionList.firstChild) {
                zipcodeOptionList.removeChild(zipcodeOptionList.firstChild);
            }
            allZipCodesForUniqueCity.forEach(function (item) {
                var optionNode = document.createElement("OPTION");
                optionNode.value = item.zipcode;
                optionNode.label = item.zipcode;
                zipcodeOptionList.appendChild(optionNode);
            });
        }

        //debug
        var span1 = document.getElementById("span1");
        span1.textContent = "";
        uniqueCityNamesList.forEach(function (item) {
            span1.textContent += item.cityName + " ";
        });

    });
});