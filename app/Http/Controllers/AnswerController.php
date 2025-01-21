<?php

// app/Http/Controllers/AnswerController.php
namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function store(Request $request, $questionId)
    {
        $request->validate(['content' => 'required']);
        Answer::create([
            'content' => $request->content,
            'question_id' => $questionId,
            'user_id' => auth()->id(),
        ]);
        return redirect()->back();
    }
}
