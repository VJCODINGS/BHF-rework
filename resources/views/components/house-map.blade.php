<div class="border mb-2 p-1 bg-white shadow-sm">
    @if($boardinghouse->maplink)
        <div class="mb-2 flex flex-col items-center">
            <a href="{{ $boardinghouse->maplink }}" target="_blank" class="text-blue-600 underline text-sm">
                <img src="{{ asset('/images/map.jpg') }}" alt="">
            </a>
            <a href="{{ $boardinghouse->maplink }}">
                <h4 class="text-center mt-2">SEE MAP</h4>
            </a>
        </div>
    @else
        <img src="{{ asset('/images/no_map.png') }}" alt="no location available">
        <p class="text-gray-500 text-sm text-center mt-2">No map link available.</p>
    @endif
</div>
