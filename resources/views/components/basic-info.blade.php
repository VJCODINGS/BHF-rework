<!-- resources/views/components/basic-info.blade.php -->
<div class="flex-1 bg-gray-100 p-4 shadow">
    <div class="flex items-center space-x-2">
        <h3 class="text-xl md:text-2xl font-semibold text-gray-900">{{ $boardinghouse->name }}</h3>
        <span class="text-gray-500">|</span>
        <p class="text-gray-600 capitalize text-sm">{{ $boardinghouse->gender }}</p>
    </div>

    <a href="{{ $boardinghouse->maplink }}" class="text-gray-600 hover:underline hover:text-gray-800 text-sm">{{ $boardinghouse->address }}</a>

    <div class="flex items-center space-x-2 mt-4">
        <div class="flex">
            @for($i = 1; $i <= 5; $i++)
                <svg class="w-5 h-5 {{ $i <= $boardinghouse->averageRating() ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927C9.432 1.926 10.568 1.926 10.951 2.927l1.34 3.68a1 1 0 00.95.69h3.862c1.042 0 1.471 1.335.632 1.974l-3.124 2.277a1 1 0 00-.364 1.118l1.34 3.68c.383 1.001-.756 1.833-1.633 1.274l-3.124-2.277a1 1 0 00-1.176 0L5.18 17.65c-.878.559-2.016-.273-1.633-1.274l1.34-3.68a1 1 0 00-.364-1.118L1.399 8.27c-.839-.639-.41-1.974.632-1.974h3.861a1 1 0 00.951-.69l1.34-3.68z" />
                </svg>
            @endfor
        </div>
        <span class="text-lg text-gray-700 font-semibold">
            {{ number_format($boardinghouse->averageRating() ?? 0, 1) }} / 5
        </span>
        <span class="text-sm text-gray-500">({{ $boardinghouse->reviews()->count() }} reviews)</span>
    </div>

    <div class="border p-4 mt-4 bg-white shadow-md">
        <h2 class="text-md font-semibold text-gray-800 mb-4">Amenities</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-600 text-sm">
            <div class="flex items-center">
                <span class="font-medium w-48">WiFi:</span>
                <span>{{ $boardinghouse->extraInfo->wifi ?? 'No' }}</span>
            </div>
            <div class="flex items-center">
                <span class="font-medium w-48">Secure Entry System:</span>
                <span>{{ $boardinghouse->extraInfo->secure_entry_system ?? 'No' }}</span>
            </div>
            <div class="flex items-center">
                <span class="font-medium w-48">Air Conditioning:</span>
                <span>{{ $boardinghouse->extraInfo->air_conditioning ?? 'No' }}</span>
            </div>
            <div class="flex items-center">
                <span class="font-medium w-48">Kitchen Use:</span>
                <span>{{ $boardinghouse->extraInfo->kitchen_use ?? 'No' }}</span>
            </div>
            <div class="flex items-center">
                <span class="font-medium w-48">Laundry Facilities:</span>
                <span>{{ $boardinghouse->extraInfo->laundry_facilities ?? 'No' }}</span>
            </div>
            <div class="flex items-center">
                <span class="font-medium w-48">Storage Spaces:</span>
                <span>{{ $boardinghouse->extraInfo->storage_spaces ?? 'No' }}</span>
            </div>
            <div class="flex items-center">
                <span class="font-medium w-48">Parking Area:</span>
                <span>{{ $boardinghouse->extraInfo->parking_area ?? 'No' }}</span>
            </div>
            <div class="flex items-center">
                <span class="font-medium w-48">Pet Friendly:</span>
                <span>{{ $boardinghouse->extraInfo->pet_friendly ?? 'No' }}</span>
            </div>
            <div class="flex items-center">
                <span class="font-medium w-48">Study Area:</span>
                <span>{{ $boardinghouse->extraInfo->study_area ?? 'No' }}</span>
            </div>
            <div class="flex items-center">
                <span class="font-medium w-48">Recreational Facilities:</span>
                <span>{{ $boardinghouse->extraInfo->recreational_facilities ?? 'No' }}</span>
            </div>
            <div class="flex items-center">
                <span class="font-medium w-48">Backyard or Garden Access:</span>
                <span>{{ $boardinghouse->extraInfo->backyard_or_garden_access ?? 'No' }}</span>
            </div>
            <div class="flex items-center">
                <span class="font-medium w-48">Number of CR:</span>
                <span>{{ $boardinghouse->extraInfo->number_of_CR ?? 0 }}</span>
            </div>
        </div>
    </div>
</div>
