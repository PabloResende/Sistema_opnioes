<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    // Formulário para criar perguntas
    public function create()
    {
        return view('questions.create');
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

        return redirect()->route('questions.index')->with('success', 'Pergunta criada com sucesso!');
    }

    public function link()
        {
            $questions = Question::all();

            return view('questions.link', compact('questions'));
        }
    public function index()
        {
            $questions = Question::all();
            return view('questions.index', compact('questions'));
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

        return redirect()->route('questions.index')->with('success', 'Pergunta atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()->route('questions.index')->with('success', 'Pergunta excluída com sucesso!');
    }

}
