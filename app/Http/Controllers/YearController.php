<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YearController extends Controller
{
    public function get()
    {
        return response()->json([
            'Primeiro Ano',
            'Segundo Ano',
            'Terceiro Ano',
        ]);
    }
}
