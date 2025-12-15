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

        // =========================================================================
        // FIX: Ensure the record is created if it doesn't exist before checking progress
        // =========================================================================
        Auth::user()->videoProgress()->firstOrCreate(
            ['video_id' => $this->video->id]
        );

        $this->checkProgress();
    }

    public function checkProgress()
    {
        $progress = Auth::user()->videoProgress()
            ->where('video_id', $this->video->id)
            ->first();

        if ($progress) {
            // Crucially, this must access the pivot table data!
            $this->videoWatched = $progress->progress->video_watched;

            $this->score = $progress->progress->quiz_score;
            if ($this->score !== null) {
                $this->quizCompleted = true;
                // ==============================================
                // ADDED: Load saved answers back into userAnswers for review
                // Laravel automatically handles decoding the JSON from the database
                // ==============================================
                $this->userAnswers = $progress->progress->user_answers ?? [];
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
            // ==============================================
            // ADDED: Saving the user's answers array (will be JSON encoded)
            // ==============================================
            'user_answers' => $this->userAnswers,
            'completed_at' => now(),
        ]);

        $this->quizCompleted = true;

        // Crucial: Re-run checkProgress to load the saved answers/score back into the component state
        $this->checkProgress();
    }

    public function render()
    {
        return view('livewire.quiz');
    }
}
