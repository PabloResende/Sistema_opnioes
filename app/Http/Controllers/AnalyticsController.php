<?php

// app/Http/Controllers/AnalyticsController.php
namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AnswersExport;
use Mail;

class AnalyticsController extends Controller
{
    public function index()
    {
        // Pega todas as respostas
        $answers = Answer::with('question.user')->get();
        return view('analytics.index', compact('answers'));
    }

    public function exportExcel()
    {
        return Excel::download(new AnswersExport, 'opinioes.xlsx'); // Exporta para Excel
    }

    public function sendEmail(Request $request)
    {
        $email = $request->email;

        // Envia o arquivo Excel para o email
        Mail::send('emails.analytics', [], function($message) use ($email) {
            $message->to($email)
                    ->subject('Relatório de Opiniões')
                    ->attach(storage_path('app/opinioes.xlsx'));
        });

        return redirect()->route('analytics.index')->with('success', 'Email enviado com sucesso!');
    }
}
