<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Response;
use App\Models\Question;

class ResponseController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        $responses = Response::with('question')->get();
        return view('responses.index', compact('questions', 'responses'));
    }
    public function store(Request $request)
    {
        $responses = $request->input('responses', []);

        foreach ($responses as $questionId => $responseData) {
            $rating = $responseData['rating'] ?? null;
            $radio = $responseData['radio'] ?? null;
            $comment = isset($responseData['comment']) && !empty(trim($responseData['comment'])) ? $responseData['comment'] : null;

            if ($rating !== null || $radio !== null || $comment !== null) {
                Response::create([
                    'question_id' => $questionId,
                    'rating' => $rating,
                    'radio' => $radio,
                    'comment' => $comment,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Respostas enviadas com sucesso!');
    }

}
