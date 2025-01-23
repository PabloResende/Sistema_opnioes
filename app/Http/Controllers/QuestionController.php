<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    // Formulário para criar perguntas
    public function create()
    {
        $questions = Question::all();
        return view('questions.create', compact('questions'));
    }

    // Armazenar perguntas no banco
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

    public function link()
        {
            $questions = Question::all();

            return view('questions.link', compact('questions'));
        }
    public function index()
        {
            return view('index');
        }

    public function edit($id)
    {
        $question = Question::findOrFail($id); // Encontra a pergunta pelo ID ou retorna 404
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

}
