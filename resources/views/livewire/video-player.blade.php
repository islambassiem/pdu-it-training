<div>
    <h2 class="font-bold mb-5 text-3xl">{{ $video->title }} ({{ $video->duration }} seconds)</h2>

    <div class="mb-4">
        <div id="vimeo-player" class="w-full aspect-video bg-black"></div>
    </div>

    @if (session()->has('success'))
        <div class="mt-4 p-3 bg-green-200 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif
</div>

{{-- ** Start JavaScript for Vimeo Player API ** --}}
<script src="https://player.vimeo.com/api/player.js"></script>

<script>
    // We must initialize the player whether it's watched or not, so the user can review it.
    // The conditional logic from before is removed, ensuring the player is always loaded.

    var iframe = document.getElementById('vimeo-player');

    var player = new Vimeo.Player(iframe, {
        id: '{{ $video->vimeo_id }}',
        autoplay: true,
        responsive: true,
        controls: true,
    });

    // Only set the 'ended' listener IF the video hasn't been watched yet.
    if (!{{ $videoWatched ? 'true' : 'false' }}) {
        player.on('ended', function () {
            Livewire.dispatch('videoEnded');
        });
    }
</script>
