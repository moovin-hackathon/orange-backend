<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    /**
     * @var $answer
     */
    private $answer;
    public function __construct(Answer $answer)
    {
        $this->answer = $answer;
    }

    public function get($id = null)
    {
        if (!empty($id)) {
            $answers = $this->answer->find($id);

            $answers['questions'] = $answers->question()->getResults();

            return $answers;
        }

        $answers = $this->answer->get();
        foreach ($answers as &$answer) {
            $answer['questions'] = $answer->question()->getResults();
        }

        return $answers;
    }
}
