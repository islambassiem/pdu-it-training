{{-- In: resources/views/livewire/quiz.blade.php --}}

<div class="">
    <h3 class="mb-4">Quiz Time!</h3>

    @if (session()->has('quiz_message'))
        <div class="mt-4 p-4 bg-yellow-100 text-yellow-800 rounded-lg font-bold">
            {{ session('quiz_message') }}
        </div>
    @endif

    @if (!$videoWatched)
        <div class="p-6 bg-red-100 text-red-700 border border-red-200 rounded-lg">
            ⚠️ You must watch the video first before attempting the quiz.
        </div>
    @elseif ($quizCompleted)
        <div class="p-6 bg-green-100 text-green-700 border border-green-200 rounded-lg">
            ✅ **Quiz Completed!** Your final score was **{{ $score }}/{{ count($quizQuestions) }}**.
        </div>

        <h3 class="text-2xl font-bold mb-4 text-blue-800">Review Your Answers</h3>
        <div class="space-y-8">
            @foreach ($quizQuestions as $index => $question)
                @php
                    $correctKey = $question['correct_option_key'];
                    // Get the user's selected key (safely access the array)
                    $userKey = (json_decode($userAnswers))[$index] ?? null;
                    $isCorrect = ($userKey === $correctKey);

                    // Determine CSS classes for visual feedback
                    $cardClass = $isCorrect ? 'border-green-400 bg-green-50' : 'border-red-400 bg-red-50';
                @endphp

                <div class="p-4 border-l-4 {{ $cardClass }} shadow-md rounded-lg">

                    {{-- Question Status and Text --}}
                    <div class="flex items-start mb-4">
                        <span class="text-xl mr-3 {{ $isCorrect ? 'text-green-600' : 'text-red-600' }}">
                            {{ $isCorrect ? '👍' : '❌' }}
                        </span>
                        <p class="font-semibold text-lg">
                            Q{{ $index + 1 }}: {{ $question['question_text'] }}
                        </p>
                    </div>

                    {{-- Options Review --}}
                    <div class="space-y-2 ml-7">
                        @foreach ($question['options'] as $key => $optionText)
                            @php
                                $isUserSelection = ($key === $userKey);
                                $isCorrectOption = ($key === $correctKey);

                                $optionClass = 'text-gray-700 p-2 rounded';

                                if ($isCorrectOption) {
                                    // Highlight the correct answer in green
                                    $optionClass = 'bg-green-200 font-bold text-green-800 p-2 rounded border border-green-300';
                                } elseif ($isUserSelection && !$isCorrect) {
                                    // Highlight the wrong answer selected by the user in red
                                    $optionClass = 'bg-red-200 font-bold text-red-800 p-2 rounded border border-red-300';
                                }
                            @endphp

                            <div class="flex items-center {{ $optionClass }}">
                                <span class="mr-2 text-sm font-mono">{{ $key }}.</span>
                                <span>{{ $optionText }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <form wire:submit.prevent="submitQuiz">
            @foreach($quizQuestions as $index => $question)
                <div class="bg-white p-6 rounded-lg shadow-md mb-6 border-l-4 border-blue-500">
                    <p class="font-semibold text-lg mb-4">
                        {{ $index + 1 }}. {{ $question['question_text'] }}
                    </p>

                    @foreach($question['options'] as $key => $option)
                        <div class="mb-2">
                            <label class="inline-flex items-center">
                                <input type="radio" class="form-radio text-blue-600" wire:model.live="userAnswers.{{ $index }}"
                                    value="{{ $key }}">
                                <span class="ml-2 text-gray-700">{{ $option }}</span>
                            </label>
                        </div>
                    @endforeach

                    @error("userAnswers.{$index}")
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            @endforeach

            <div class="mt-6 bg-green-500">
                <button type="submit"
                    class="w-full px-4 py-2 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700"
                    wire:loading.attr="disabled">
                    Submit Quiz
                </button>
            </div>
        </form>
    @endif
</div>
