<?php

	class Quiz {
		public $qID;
		public $title;
		public $questions;
		public $attempts;

	function __construct ($t) {
		$this->qID = "";
    	$this->title = $t;
    	$this->questions = [];
    	$this->attempts = [];
    }
    
    public static function fromSESSION ($sesVar) {
    	$instance = new self($sesVar['title']);
    	$instance->qID = $sesVar['qID'];
    	$instance->questions = $sesVar['questions'];
    	$instance->attempts = $sesVar['attempts'];
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

  class Question {
    public $category;
    public $type;
    public $question;
    public $correct_answer;
    public $user_answer;
    public $incorrect_answers;

    function __construct ($c, $t, $q, $ca, $ia) {
      $this->category = $c;
      $this->type = $t;
      $this->question = $q;
      $this->correct_answer = $ca;
      $this->incorrect_answers = $ia;
    }

    function gradeQuestion () {
      return $user_answer == $correct_answer;
    }
  }

  class QuizAttempt {
    public $score;
    public $questionsMissed;
    public $startTime;
    public $endTime;

    function __construct () {
      $this->startTime = date(DATE_ATOM); //ISO 8601 date-time
    }

    function gradeQuiz () {
      $qs = $this->quiz->questions;
      $total = count($qs);
      $correct = 0;
      for ($i = 0; $i < total; $i++) {
        if ($qs[$i]->gradeQuestion()) {
          $correct++;
        } else {
          array_push($this->questionsMissed, $qs[$i]);
        }
      }
      $this->score = ($correct/$total)*100;
      return $this->score;
    }

    function finishAttempt () {
      $this->endTime = date(DATE_ATOM);
      return gradeQuiz();
    }
  }

 ?>
