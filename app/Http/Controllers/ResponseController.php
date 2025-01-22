<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public function index()
    {
        // Lógica para obter as respostas
        return view('responses.index');
    }
}
