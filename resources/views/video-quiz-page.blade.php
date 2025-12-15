{{-- In: resources/views/video-quiz-page.blade.php --}}

<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Video & Quiz
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                {{-- 1. Video Player Component --}}
                @livewire('video-player', ['video' => $video])

                <hr class="my-8 border-t border-gray-200">
                
                {{-- 2. Quiz Component (Enabled after video is watched) --}}
                @livewire('quiz', ['video' => $video])
            </div>
        </div>
    </div>
</x-layouts.app>
