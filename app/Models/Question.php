<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Response;


class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'response_types',
    ];

    protected $casts = [
        'response_types' => 'array',
    ];


    public function responses()
    {
        return $this->hasMany(Response::class);
    }
}
