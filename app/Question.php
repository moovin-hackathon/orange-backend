<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'year',
        'subjectId',
    ];

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
