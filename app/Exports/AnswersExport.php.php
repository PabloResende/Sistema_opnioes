<?php

// app/Exports/AnswersExport.php
namespace App\Exports;

use App\Models\Answer;
use Maatwebsite\Excel\Concerns\FromCollection;

class AnswersExport implements FromCollection
{
    public function collection()
    {
        return Answer::all(); // Coleta todas as respostas
    }
}
