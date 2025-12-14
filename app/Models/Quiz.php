<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $casts = [
        'questions' => 'array',
    ];

    protected $fillable = ['questions'];

    public function video()
    {
        return $this->hasOne(Video::class);
    }
}
