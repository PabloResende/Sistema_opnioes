<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Response;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    // Mostrar as perguntas em um link
    public function show($id)
    {
        $questions = Question::all(); // Todas as perguntas criadas

        return view('survey.show', compact('questions'));
    }

    // Armazenar respostas
    public function store(Request $request, $id)
    {
        foreach ($request->input('responses') as $questionId => $response) {
            Response::create([
                'question_id' => $questionId,
                'rating' => $response['rating'],
                'opinion' => $response['opinion'] ?? null,
            ]);
        }

        return redirect()->route('survey.show', $id)->with('success', 'Respostas enviadas com sucesso!');
    }
}
