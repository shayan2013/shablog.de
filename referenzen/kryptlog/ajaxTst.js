
var pageCounter = 1;
var btn = document.getElementById("ajaxBtn");
btn.addEventListener("click", function loadDoc2() {
		var ourRequest = new XMLHttpRequest();
		ourRequest.open('GET','https://learnwebcode.github.io/json-example/animals-' + pageCounter + '.json');
		ourRequest.onload = function() {
			var ourData = JSON.parse(ourRequest.responseText);
			renderHTML(ourData);
		};
		ourRequest.send();
		pageCounter++;
		if (pageCounter > 3) {
			btn.classList.add("hide-me");
		}

});

function renderHTML(data) {
	var animalContainer = document.getElementById("ajTest");
	var htmlString = "";
	
	for (i = 0; i < data.length; i++) {
		htmlString += "<p>" + data[i].name + " is a " + data[i].species + 
		"that likes to eat ";
		for (ii = 0; ii < data[i].foods.likes.length; ii++) {
			if (ii == 0) {
				htmlString += data[i].foods.likes[ii];
			} else {
				htmlString += " and " + data[i].foods.likes[ii];
			}
		}
		htmlString += ' and dislikes ';
		for (ii = 0; ii < data[i].foods.dislikes.length; ii++) {
			if (ii == 0) {
				htmlString += data[i].foods.dislikes[ii];
			} else {
				htmlString += " and " + data[i].foods.dislikes[ii];
			}
		}		
		
		htmlString += '.</p>';
	}
	animalContainer.insertAdjacentHTML('beforeend', htmlString);
}


var btn2 = document.getElementById("ajaxmlBtn");
btn2.addEventListener("click", function loadDoc() {
  var xhttp = new XMLHttpRequest();	
  xhttp.onreadystatechange = function() {
	      if (this.readyState == 4 && this.status == 200) {
					alert("hello");
			        myFunction(this);
		  }
  };
  xhttp.open("GET", "breackfastMenu.xml", true);
  xhttp.send();
});
function myFunction(xml) {
  var i;
  var xmlDoc = xml.responseXML;
  var table="<tr><th>name</th><th>price</th></tr>";
  var x = xmlDoc.getElementsByTagName("breakfast_menu");
  
  for (i = 0; i <x.length; i++) { 
    table += "<tr><td>" +
    x[i].getElementsByTagName("food")[0].childNodes[0].nodeValue +
    "</td><td>" +
    x[i].getElementsByTagName("name")[0].childNodes[0].nodeValue +
    "</td></tr>";
  }
  document.getElementById("ajTable").innerHTML = table;
}