<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        // Lógica para obter notificações do usuário
        return view('notifications.index');
    }
}
