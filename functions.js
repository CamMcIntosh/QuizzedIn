/* General  functions for HTML */
function removeAllChildren (nodeID) {
  var myNode = document.getElementById(nodeID);
  while (myNode.firstChild) {
    myNode.removeChild(myNode.firstChild);
  }
}

/* Functions for create.php page */
function addAnswers (n) {
  removeAllChildren("wrongAnswers")
  for (var i = 1; i <= n; i++) {
    var div = document.createElement("div");
    div.innerHTML = document.getElementById("answerTemplate").innerHTML;
    var answerNumText = document.createElement("pre");
    var answerInput = document.createElement("input");
    answerNumText.innerHTML = "Wrong Answer "+i+": ";
    answerInput.setAttribute("name", "a"+(i+1)); answerInput.setAttribute("type", "text");
    div.appendChild(answerNumText); div.appendChild(answerInput);
    document.getElementById("wrongAnswers").appendChild(div);
  }
}

function addTrueFalse () {
  removeAllChildren("wrongAnswers");
}
