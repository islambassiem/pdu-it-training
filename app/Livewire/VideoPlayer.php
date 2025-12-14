<?php

namespace App\Livewire;

use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VideoPlayer extends Component
{
    public Video $video;

    public $progress;

    public $videoWatched;

    protected $listeners = [
        'videoEnded' => 'markAsWatched', // This event is now dispatched by Vimeo JS
    ];

    public function mount(Video $video)
    {
        $this->video = $video;

        // Get or create the user's progress record
        $this->progress = Auth::user()->videoProgress()->where('video_id', $this->video->id)->first();
        if (! $this->progress) {
            // Create a new progress record if none exists
            Auth::user()->videoProgress()->attach($this->video->id, ['video_watched' => false]);
            $this->progress = Auth::user()->videoProgress()->where('video_id', $this->video->id)->first();
        }

        $this->videoWatched = $this->progress->pivot->video_watched;
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
