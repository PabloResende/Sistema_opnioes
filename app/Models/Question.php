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
    ];

    public function responses()
    {
        return $this->hasMany(Response::class);
    }
}
