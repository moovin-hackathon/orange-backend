<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * @var $question
     */
    private $question;
    public function __construct(Question $question)
    {
        $this->question = $question;
    }

    /**
     * Retorna perguntas e respostas.
     * Caso seja passado um id, retorna apenas uma.
     *
     * @param null $id
     *
     * @return Model|Model[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|mixed|null
     */
    public function get($id = null)
    {
        if (!empty($id)) {
            $question = $this->question->find($id);

            $question['answers'] = $question->answers()->getResults();

            return $question;
        }

        $questions = $this->question->get();
        foreach ($questions as &$question) {
            $question['answers'] = $question->answers()->getResults();
        }

        return $questions;
    }
}
