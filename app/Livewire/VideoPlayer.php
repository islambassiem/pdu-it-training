<?php

namespace App\Livewire;

use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VideoPlayer extends Component
{
    public Video $video;

    // public $progress;

    public $videoWatched;

    protected $listeners = [
        'videoEnded' => 'markAsWatched', // This event is now dispatched by Vimeo JS
    ];

    public function mount(Video $video)
    {
        $this->video = $video;

        // =========================================================================
        // FIX: Use syncWithoutDetaching to guarantee the pivot record exists.
        // This attaches the user to the video if they aren't already attached.
        // Any pivot columns not specified here will use their database defaults (e.g., video_watched=false).
        // =========================================================================

        // Check if the pivot record exists by querying the relationship
        $progress = Auth::user()->videoProgress()->where('video_id', $this->video->id)->first();

        if (! $progress) {
            // If the record doesn't exist, create it with default pivot values.
            Auth::user()->videoProgress()->syncWithoutDetaching([
                $this->video->id => [
                    'video_watched' => false,
                    'quiz_score' => null,
                ],
            ]);

            // Re-query the progress record now that it exists
            $progress = Auth::user()->videoProgress()->where('video_id', $this->video->id)->first();
        }

        // Now $progress is guaranteed to be a Video model instance with pivot data
        if ($progress) {
            // Access the pivot data (progress or pivot, based on your User model alias)
            $progressData = $progress->progress ?? $progress->pivot;
            $this->videoWatched = $progressData->video_watched;
        }
    }

    public function markAsWatched()
    {
        // This logic handles the database update and component notification
        if (! $this->videoWatched) {
            Auth::user()->videoProgress()->updateExistingPivot($this->video->id, [
                'video_watched' => true,
            ]);
            $this->videoWatched = true;
            session()->flash('success', 'Video finished! The quiz is now unlocked.');
            $this->dispatch('video-watched');
        }
    }

    public function render()
    {
        return view('livewire.video-player');
    }
}
