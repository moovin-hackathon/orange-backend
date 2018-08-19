<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'middleware' => ['cors'],
], function ($router) {

    Route::get('/years', 'YearController@get');

    Route::get('/questions', 'QuestionController@get');
    Route::get('/questions/{id}', 'QuestionController@get');

    Route::get('/answers', 'AnswerController@get');
    Route::get('/answers/{id}', 'AnswerController@get');

    Route::get('/subjects', 'SubjectController@get');
    Route::get('/subjects/{year}', 'SubjectController@get');
    Route::post('/subjects', 'SubjectController@post');
});