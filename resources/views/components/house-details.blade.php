<!-- resources/views/components/house-details.blade.php -->
<div class="border mb-2 p-2 bg-white shadow">
    @if($boardinghouse->maplink)
        <div class="mb-4">
            <strong class="text-lg">Map Link:</strong>
            <a href="{{ $boardinghouse->maplink }}" target="_blank" class="text-blue-600 underline">View on Map</a>
        </div>
    @else
        <p class="text-gray-500">No map link available.</p>
    @endif

    @if($boardinghouse->description)
        <div class="mb-4">
            <strong class="text-lg">Description:</strong>
            <p class="text-gray-600">{{ $boardinghouse->description }}</p>
        </div>
    @else
        <p class="text-gray-500">No description available.</p>
    @endif

    @if($boardinghouse->policies)
        <div class="mb-4">
            <strong class="text-lg">Policies:</strong>
            <p class="text-gray-600">{{ $boardinghouse->policies }}</p>
        </div>
    @else
        <p class="text-gray-500">No policies available.</p>
    @endif

    @if($boardinghouse->curfew)
        <div class="mb-4">
            <strong class="text-lg">Curfew:</strong>
            <p class="text-gray-600">{{ $boardinghouse->curfew->format('H:i') }}</p>
        </div>
    @else
        <p class="text-gray-500">No curfew specified.</p>
    @endif
</div>
