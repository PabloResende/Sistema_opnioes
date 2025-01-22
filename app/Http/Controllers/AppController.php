<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function download()
    {
        // Lógica para fornecer o link de download do aplicativo
        return view('app.download');
    }
}
