<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YearController extends Controller
{
    public function get()
    {
        return response()->json([
            '1º Ano',
            '2º Ano',
            '3º Ano',
        ]);
    }
}
