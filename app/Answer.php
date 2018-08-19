<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'questionId',
        'description',
        'correct',
    ];

    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
