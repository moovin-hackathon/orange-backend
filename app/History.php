<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'question_id',
        'selectedAnswer_id',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function answers()
    {
        return $this->belongsToMany('App\Answer');
    }
}
