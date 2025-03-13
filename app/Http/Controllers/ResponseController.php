<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Response;
use App\Models\Question; // Certifique-se de incluir o modelo Question

class ResponseController extends Controller
{
    public function index()
    {
        // Buscando todas as perguntas
        $questions = Question::all();

        // Buscando todas as respostas se necessário
        $responses = Response::with('question')->get();

        // Retornando a view
        return view('responses.index', compact('questions', 'responses'));
    }  

    public function store(Request $request)
    {
        $response = new Response();
        $response->question_id = $request->question_id;
        $response->rating = $request->rating ?? null;
        $response->radio = $request->radio ?? null;
        $response->comment = $request->comment ?? null;
        $response->save();

        return redirect()->route('responses.index')->with('success', 'Resposta enviada com sucesso!');
    }


}
