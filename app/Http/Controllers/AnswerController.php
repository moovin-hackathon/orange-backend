<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    public function get()
    {
        $answers = DB::table('answers')->get();

        return response()->json([
            $answers
        ]);
    }
}
