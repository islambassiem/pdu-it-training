<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="p-6 max-w-4xl mx-auto leading-relaxed text-gray-800 bg-white shadow-lg rounded-lg">

            <h1 class="text-4xl font-extrabold mb-8 text-blue-800">
                📚 IT Awareness Training & Quiz
            </h1>

            <p class="mb-6 border-b pb-4 text-lg">
                Welcome! This program provides you with the essential knowledge and skills needed to maintain a **secure
                digital environment** for yourself and our organization.
            </p>

            <h2 class="text-2xl font-semibold mt-8 mb-4 flex items-center text-blue-700">
                <span class="mr-2">🎯</span> What is the Goal?
            </h2>
            <p class="mb-6">
                The goal is to transform abstract security concepts into **actionable, everyday habits**. By
                understanding common threats like phishing, proper data handling, and secure device management, you
                become the first and most critical line of defense against cyberattacks.
            </p>

            <h2 class="text-2xl font-semibold mt-8 mb-4 flex items-center text-blue-700">
                <span class="mr-2">📝</span> How the Quiz Works
            </h2>

            <p class="mb-6">
                This training is divided into a series of short, focused lessons. Each lesson follows a simple,
                **enforced two-step structure** to ensure comprehension before proceeding:
            </p>

            <div class="space-y-6 border-l-4 border-blue-200 pl-4">

                <div class="p-4 bg-blue-50 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold mb-2 text-blue-800">1. Watch the Video (The Obligation)</h3>
                    <ul class="list-disc ml-6 space-y-2 text-sm text-gray-700">
                        <li>
                            <span class="font-semibold">Automatic Unlocking:</span>
                            You are **obliged to watch the entire video**. The controls are disabled to prevent
                            skipping.
                        </li>
                        <li>
                            <span class="font-semibold">Completion:</span>
                            Once the video ends, the system automatically marks it as watched, and the quiz below will
                            instantly unlock.
                        </li>
                    </ul>
                </div>

                <div class="p-4 bg-green-50 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold mb-2 text-green-800">2. Complete the Quiz (The Assessment)</h3>
                    <ul class="list-disc ml-6 space-y-2 text-sm text-gray-700">
                        <li>
                            <span class="font-semibold">Format:</span>
                            A short, multiple-choice quiz appears, related directly to the video content.
                        </li>
                        <li>
                            <span class="font-semibold">Submission:</span>
                            You must select an answer for every question. Your score will be displayed immediately upon
                            submission.
                        </li>
                    </ul>
                </div>
            </div>

            <h2 class="text-2xl font-semibold mt-8 mb-4 flex items-center text-blue-700">
                <span class="mr-2">💡</span> Important Notes
            </h2>
            <ul class="list-disc ml-6 space-y-3 text-gray-700">
                <li>
                    <span class="font-semibold">Review:</span>
                    The video remains available at the top of the page for you to review at any time, even after you've
                    completed the quiz.
                </li>
                {{-- <li>
                    <span class="font-semibold">Progress Tracking:</span>
                    Your progress and scores are automatically saved, allowing you to pick up where you left off.
                </li> --}}
                <li>
                    <span class="font-semibold">Next Steps:</span>
                    Proceed to the next module using the navigation panel once a module is complete.
                </li>
            </ul>

            <p class="mt-8 pt-4 border-t text-lg italic text-center text-gray-600">
                We encourage you to engage fully with the material. Your vigilance is our security.
            </p>
        </div>
    </div>
</x-layouts.app>
