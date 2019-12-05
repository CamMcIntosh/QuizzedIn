/*------ General  functions for HTML ------*/
function removeAllChildren (nodeID) {
  	var myNode = document.getElementById(nodeID);
	while (myNode.firstChild) {
    	myNode.removeChild(myNode.firstChild);
	}
}

/*------ Functions for create.php page ------*/
// Changes correctAnswer and wrongAnswers divs in create.php for FIB and mult. choice questions
function addAnswers (n) {
	// Removing all child elements and adding the correct answer input
	removeAllChildren("correctAnswer");
	var div = document.createElement("div");
	div.innerHTML = "Correct Answer: ";
	var input = document.createElement("input");
	input.setAttribute("type", "text"); input.setAttribute("name", "a1");
	input.required = true;
	div.appendChild(input);
	document.getElementById("correctAnswer").appendChild(div);

	// Removing all child elemetns and adding all extra answers needed
  	removeAllChildren("wrongAnswers")
	for (var i = 1; i <= n; i++) {
		div = document.createElement("div");
		var answerNumText = document.createElement("span");
		var answerInput = document.createElement("input");
		answerNumText.innerHTML = "Wrong Answer "+i+": ";
		answerInput.setAttribute("name", "a"+(i+1)); answerInput.setAttribute("type", "text");
		if (i == 1) { answerInput.required = true; }
		div.appendChild(answerNumText); div.appendChild(answerInput);
		document.getElementById("wrongAnswers").appendChild(div);
	}
}

// Changes correctAnswer and wrongAnswers divs in create.php for T/F questions
function addTrueFalse () {
	// Removing all child elements
	removeAllChildren("correctAnswer");
	removeAllChildren("wrongAnswers");

	// Adding correct input for T/F questions
	var div = document.createElement("div");
	div.innerHTML = "Answer: ";
	// Adding True radio button
	var input1 = document.createElement("input");
	input1.setAttribute("type", "radio"); input1.setAttribute("name", "a1"); input1.setAttribute("value", "true"); input1.setAttribute("id", "t1");
	input1.required = true; input1.checked = true;
	input1.onclick = function() { document.getElementById("f2").checked = true; };
	div.appendChild(input1);
	var span1 = document.createElement("span")
	span1.innerHTML = "True  "
	div.appendChild(span1);
	// Adding False
	var input2 = document.createElement("input");
	input2.setAttribute("type", "radio"); input2.setAttribute("name", "a1"); input2.setAttribute("value", "false"); input2.setAttribute("id", "f1");
	input2.onclick = function() { document.getElementById("t2").checked = true; };
	div.appendChild(input2);
	var span2 = document.createElement("span")
	span2.innerHTML = "False"
	div.appendChild(span2);
    // Adding hidden true
    var input3 = document.createElement("input");
    input3.setAttribute("type", "radio"); input3.setAttribute("name", "a2"); input3.setAttribute("value", "true"); input3.setAttribute("id", "t2");
    input3.required = true; 
    input3.style.visibility = "hidden";
    div.appendChild(input3);
    // Adding hidden false
    var input4 = document.createElement("input");
    input4.setAttribute("type", "radio"); input4.setAttribute("name", "a2"); input4.setAttribute("value", "false"); input4.setAttribute("id", "f2");
    input4.checked = true;
    input4.style.visibility = "hidden";
    div.appendChild(input4);

    document.getElementById("correctAnswer").appendChild(div);
}

function updatehref (id, max) {
	var button = document.getElementById(id);
	var max = document.getElementById("max").value;
	var href = button.name;
	var url = new URL(href, "https://quizzedin.000webhostapp.com"); //Change this if we ever move the site
	var params = new URLSearchParams(url.search.slice(1));
    params.append("max", max);
    url.search = params.toString();
	location.assign(url);
	return false;
}
