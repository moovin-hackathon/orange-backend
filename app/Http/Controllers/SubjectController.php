<?php

namespace App\Http\Controllers;

use App\Subject as Model;

class SubjectController extends Controller
{
    /**
     * @var Model
     */
    protected $subject;

    public function __construct(Model $subject)
    {
        $this->subject = $subject;
    }

    /**
     * Retorna disciplinas.
     * Caso seja passado um id, retorna apenas uma.
     *
     * @param string|null  $year
     * @return Model|Model[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|mixed|null
     */
    public function get($year = null)
    {
        if (!empty($year)) {
            $subjects = $this->subject
                ->select('subjects.*', 'questions.*')
                ->leftJoin('questions', 'questions.subject_id', '=', 'subjects.id')
                ->where('year', '=', $year)
                ->get();

            $subjectsTemp[null] = 'Escolha';
            foreach ($subjects as &$subject) {
                $subjectsTemp[$subject['id']] = $subject['name'];
            }

            return $subjectsTemp;
        }

        $subjects = $this->subject->get();
        foreach ($subjects as &$subject) {
            $subject['questions'] = $subject->questions()->getResults();
        }

        return response()->json(
            $subjects
        );
    }
}
