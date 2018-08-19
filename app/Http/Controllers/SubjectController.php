<?php

namespace App\Http\Controllers;

use App\Subject as Model;

class SubjectController extends Controller
{
    /**
     * @var Model
     */
    protected $subject;

    public function __construct(Model $subject = null)
    {
        $this->subject = $subject;
    }

    /**
     * Retorna disciplinas.
     * Caso seja passado um id, retorna apenas uma.
     *
     * @param null $id
     *
     * @return Model|Model[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|mixed|null
     */
    public function get($id = null)
    {
        if (!empty($id)) {
            $subject = $this->subject->find($id);

            $subject['questions'] = $subject->questions()->getResults();

            return $subject;
        }

        $subjects = $this->subject->get();
        foreach ($subjects as &$subject) {
            $subject['questions'] = $subject->questions()->getResults();
        }

        return $subjects;
    }
}
