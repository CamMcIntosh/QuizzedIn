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
    	return strtolower($this->userAns) == strtolower($this->rghtAns);
    }
}

// Class for holding quiz attempt objects
class QuizAttempt {
	public $id;
  	public $quiz;
  	public $user;
  	public $correct;
    public $score;
    public $qsMissed;
    public $startTime;
    public $endTime;

    function __construct ($q, $st) {
    	$this->quiz = $q;
    	$this->startTime = $st; //ISO 8601 date-time
    }

	// Grades quiz by checking if each question is correct and storing the score
    function gradeQuiz () {
    	$qs = $this->quiz->questions;
    	$total = count($qs);
    	$correct = 0;
    	$this->qsMissed = [];
      	for ($i = 0; $i < $total; $i++) {
        	if ($qs[$i]->gradeQuestion()) {
        		$correct++;
        	} else {
        		array_push($this->qsMissed, $qs[$i]);
    		}
    	}
    	$this->correct = $correct;
    	$this->score = ($correct/$total)*100;
    	$this->endTime = date(DATE_ATOM);
    }
}

?>
