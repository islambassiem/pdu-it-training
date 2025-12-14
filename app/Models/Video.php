<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['title', 'vimeo_id', 'quiz_id', 'duration'];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_video_progress')
            ->withPivot(['video_watched', 'quiz_score', 'completed_at']);
    }
}
