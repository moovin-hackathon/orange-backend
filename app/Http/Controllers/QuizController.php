<?php

namespace App\Http\Controllers;

use App\History;
use App\Question;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /** @var Question */
    private $question;

    /** @var History */
    private $history;

    /**
     * Constroi um objeto QuizController.
     * @param Question|null $question
     * @param History $history
     */
    public function __construct(Question $question = null, History $history = null)
    {
        $this->question = $question;
        $this->history = $history;
    }

    public function get(Request $request)
    {
        if (!empty($request->all()['user_id'])) {
            $data = $request->all();
            $data['currentDate'] = (new \DateTime())->format('Y-m-d');
            $this->history->make($request->all())->save();
            
            return;
        }

        if (!empty($request->all()['year'])) {
            $this->question = $this->question->where('year', '=', $request->all()['year']);
        }

        if (!empty($request->all()['subject'])) {
            $this->question = $this->question->where('subject_id', '=', $request->all()['subject']);
        }

        if (!empty($request->all()['totalQuestions'])) {
            $this->question = $this->question->limit($request->all()['totalQuestions']);
        }

        $questions = $this->question->inRandomOrder()->get();

        foreach ($questions as &$question) {
            $question['subject'] = $question->subject()->getResults();
            $question['answers'] = $question->answers()->getResults();
            $question['answerSelected'] = null;
        }

        return $questions;
    }

    public function post(Request $request)
    {
        print_r($request->all());
        die('asd');
    }
}
