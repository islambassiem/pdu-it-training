<?php

namespace App\Http\Controllers;

use App\Models\Video;

class VideoController extends Controller
{
    public function showVideoQuiz(int $id)
    {
        $video = Video::findOrFail($id);
        return view('video-quiz-page', ['video' => $video]);
    }
}
