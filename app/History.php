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
        'userId',
        'questionId',
        'selectedAnswerId',
        'currentDate',
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
}
