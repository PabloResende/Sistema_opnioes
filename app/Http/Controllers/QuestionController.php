<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Response;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create()
    {
        $questions = Question::with('responses')->get();
        return view('questions.create', compact('questions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        Question::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('questions.create')->with('success', 'Pergunta criada com sucesso!');
    }

    public function edit($id)
    {
        $question = Question::findOrFail($id);
        return view('questions.edit', compact('question'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        $question = Question::findOrFail($id);
        $question->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('questions.create')->with('success', 'Pergunta atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()->route('questions.create')->with('success', 'Pergunta excluída com sucesso!');
    }

    public function storeSurvey(Request $request)
    {
        foreach ($request->input('responses') as $questionId => $response) {
            Response::create([
                'question_id' => $questionId,
                'rating' => $response['rating'],
                'opinion' => $response['opinion'] ?? null,
            ]);
        }

        return redirect()->route('questions.create')->with('success', 'Respostas enviadas com sucesso!');
    }
}
