<?php

// Class for holding quiz objects
class Quiz {
	public $id;
	public $title;
	public $questions;
	public $attempts;

	function __construct ($t) {
		$this->id = "";
    	$this->title = $t;
    	$this->questions = [];
    	$this->attempts = [];
    }
    
    function addAttempt ($a) {
    	array_push($this->attempts, $a);
    }
    
    function addQuestion ($q) {
    	array_push($this->questions, $q);
    }
    
    function removeQuestion ($q) {
    	// IMPLEMENT THIS FUNCTION
    }
}

// Class for holding question objects
class Question {
	public $id;
	public $category;
	public $type;
	public $qText;
	public $rghtAns;
	public $userAns;
	public $wrngAns;

	function __construct ($c, $t, $q, $ra, $wa) {
    	$this->category = $c;
    	$this->type = $t;
    	$this->qText = $q;
    	$this->rghtAns = $ra;
    	$this->wrngAns = $wa;
    }

    function gradeQuestion () {
    	return $userAns == $rghtAns;
    }
}

// Class for holding quiz attempt objects
class QuizAttempt {
  	public $quiz;
    public $score;
    public $qsMissed;
    public $startTime;
    public $endTime;

    function __construct () {
    	$this->startTime = date(DATE_ATOM); //ISO 8601 date-time
    }

	// Grades quiz by checking if each question is correct and storing the score
    function gradeQuiz () {
    	$qs = $this->quiz->questions;
    	$total = count($qs);
    	$correct = 0;
      	for ($i = 0; $i < $total; $i++) {
        	if ($qs[$i]->gradeQuestion()) {
        	$correct++;
        	} else {
        		array_push($this->qsMissed, $qs[$i]);
    		}
    	}
    	$this->score = ($correct/$total)*100;
    	return $this->score;
    }

	// Grades quiz and logs end time
    function finishAttempt () {
    	$this->endTime = date(DATE_ATOM);
    	return gradeQuiz();
    }
}

?>
