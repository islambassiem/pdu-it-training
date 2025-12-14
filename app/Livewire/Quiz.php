<?php

namespace App\Livewire;

use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Quiz extends Component
{
    public Video $video;

    public $quizQuestions = [];

    public $userAnswers = [];

    public $videoWatched = false;

    public $quizCompleted = false;

    public $score = null;

    protected $listeners = ['video-watched' => 'checkProgress'];

    public function mount(Video $video)
    {
        $this->video = $video;

        // Ensure the quiz and its questions are loaded
        if ($video->quiz) {
            $this->quizQuestions = $video->quiz->questions;

            // Initialize empty answers array
            foreach ($this->quizQuestions as $index => $question) {
                $this->userAnswers[$index] = null;
            }
        }

        $this->checkProgress();
    }

    public function checkProgress()
    {
        $progress = Auth::user()->videoProgress()
            ->where('video_id', $this->video->id)
            ->first();

        if ($progress) {
            // Crucially, this must access the pivot table data!
            $this->videoWatched = $progress->pivot->video_watched;

            $this->score = $progress->pivot->quiz_score;
            if ($this->score !== null) {
                $this->quizCompleted = true;
            }
        }
    }

    public function submitQuiz()
    {
        // Dynamically create validation rules based on loaded quizQuestions
        $rules = [];
        foreach ($this->quizQuestions as $index => $question) {
            $rules["userAnswers.{$index}"] = 'required';
        }

        // 1. Basic validation to ensure all questions are answered
        $validated = $this->validate($rules, [
            'required' => 'Please select an answer for all questions.',
        ]);

        // 2. Score the quiz
        $correctAnswers = 0;
        foreach ($this->quizQuestions as $index => $question) {
            $correctOptionKey = $question['correct_option_key'] ?? null;
            $userSelectedAnswer = $this->userAnswers[$index];

            if ($userSelectedAnswer === $correctOptionKey) {
                $correctAnswers++;
            }
        }

        $this->score = $correctAnswers;

        // 3. Update the user's progress
        Auth::user()->videoProgress()->updateExistingPivot($this->video->id, [
            'quiz_score' => $this->score,
            'completed_at' => now(),
        ]);

        $this->quizCompleted = true;
        // session()->flash('quiz_message', "Quiz submitted! Your score is: {$this->score}/count($this->quizQuestions).");
    }

    public function render()
    {
        return view('livewire.quiz');
    }
}
