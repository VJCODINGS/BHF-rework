<!-- resources/views/components/reviews-section.blade.php -->
<div class="border p-2 mb-2 bg-white shadow">
    <strong class="text-lg">Reviews:</strong>
    <div class="mt-4">
        @if($boardinghouse->reviews->isNotEmpty())
            @foreach ($boardinghouse->reviews as $review)
                <div class="border-b py-4">
                    <div class="flex items-center space-x-2">
                        <strong class="text-gray-700">Rating:</strong>
                        <span class="text-yellow-500">{{ str_repeat('★', $review->rating) }}</span>
                        <span class="text-gray-600">{{ $review->rating }}/5</span>
                    </div>
                    <div class="mt-2">
                        <strong class="text-gray-700">Comment:</strong>
                        <p class="text-gray-600">{{ $review->comment }}</p>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-gray-500">No reviews yet.</p>
        @endif
    </div>
</div>
