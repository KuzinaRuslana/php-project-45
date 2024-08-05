<?php

namespace Php\Project\Games\Prime;

use function Php\Project\Engine\startGame;

use const Php\Project\Engine\NUMBER_OF_QUESTIONS;

const GAME_TASK = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";

function runGame()
{
    $questionsAndAnswers = generateQuestionsAndAnswers();
    startGame($questionsAndAnswers, GAME_TASK);
}

function generateQuestionsAndAnswers()
{
    $res = [];

    for ($i = 0; $i < NUMBER_OF_QUESTIONS; $i++) {
        $question = mt_rand(0, 100);
        $answer = isPrime($question);

        $res[$i][] = $question;
        $res[$i][] = $answer;
    }

    return $res;
}

function isPrime(int $question)
{
    if ($question <= 1) {
        return 'no';
    }

    for ($i = 2; $i < $question; $i++) {
        if ($question % $i === 0) {
            return 'no';
        }
    }

    return 'yes';
}
