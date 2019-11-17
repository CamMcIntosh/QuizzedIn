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
    public $question;
    public $rightAnswer;
    public $userAnswer;

    function __construct ($q, $ra) {
      $this->question = $q;
      $this->rightAnswer = $ra;
    }

    function gradeQuestion () {
      return $userAnswer == $rightAnswer;
    }
  }

  // The correct answer will always be the first in the array of possible answers
  class MCQuestion extends Question {
    public $possibleAnswers;

    function __construct ($ques, $posAns) {
      $this->question = $ques;
      $this->possibleAnswers = $posAns;
      $this->rightAnswer = $posAns[0];
    }
  }

  class TFQuestion extends Question {

  }

  class FIBQuestion extends Question {

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
      $this->score = $correct/$total;
      return $this->score;
    }

    function finishAttempt () {
      $this->endTime = date(DATE_ATOM);
      return gradeQuiz();
    }
  }

 ?>
