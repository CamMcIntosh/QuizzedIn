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
  input1.setAttribute("type", "radio"); input1.setAttribute("name", "a1"); input1.setAttribute("value", "true");
  input1.required = true;
  div.appendChild(input1);
  var span1 = document.createElement("span")
  span1.innerHTML = "True  "
  div.appendChild(span1);
  // Adding False
  var input2 = document.createElement("input");
  input2.setAttribute("type", "radio");
  input2.setAttribute("name", "a1");
  input2.setAttribute("value", "false");
  input2.innerHTML = "False";
  div.appendChild(input2);
  var span2 = document.createElement("span")
  span2.innerHTML = "False"
  div.appendChild(span2);

  document.getElementById("correctAnswer").appendChild(div);
}


/*------ Functions for categories.php page ------*/
// Loading this script tag "<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>" and a <div> with id="topics" will load the categories entries
$(document).ready(function() {
    $.ajax({
        type: "get",
        url: "https://opentdb.com/api_category.php",
        beforeSend: function() {
            $("#topics").html("Loading...");
        },
        timeout: 10000,
        error: function(xhr, status, error) {
            alert("Error: " + xhr.status + " - " + error);
        },
        dataType: "json",
        success: function(data) {
            $("#topics").html("");
            $.each(data, function() {
                $.each(this, function(key, value) {
                    var cat = value.name.toLowerCase().replace(/: /g, "-").replace(/&/g, "and").replace(/ /g, "_");
                    $("#topics").append(
                        "<a href='./categories/"+cat+".php'>"+value.name+"</a><br>"
                    );
                });
            });
        }
    });
});
