<?php

  class Quiz {
    public $qID;
    public $questions;

    function __construct ($qs, $as) {
      $this->questions = $qs;
      $this->attempts = $as;
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
    public $quiz;
    public $score;
    public $questionsMissed;
    public $startTime;
    public $endTime;

    function __construct ($quiz) {
      $this->quiz = $quiz;
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
