<!-- resources/views/components/reviews-section.blade.php -->
<div class="border p-4 mb-4 bg-white shadow">
    <strong class="text-lg">Reviews:</strong>
    <div class="mt-4">
        @if($reviews->isNotEmpty())

            <div class="mt-2">
                {{ $reviews->links() }}
            </div>

            @foreach ($reviews as $review)
                <div class="border-b py-4">
                    <div class="flex items-center mt-2">
                        <i class="fas fa-user-circle text-gray-700 text-sm"></i>
                        <span class="text-gray-600 ml-1 text-sm">{{ $review->user->name }}</span>
                    </div>

                    <div class="flex items-center space-x-2">
                        <strong class="text-gray-700 text-sm">Rating:</strong>
                        @if($review->rating !== null)
                            <span class="text-yellow-500">{{ str_repeat('★', $review->rating) }}</span>
                            <span class="text-gray-600 text-sm">{{ $review->rating }}/5</span>
                        @else
                            <span class="text-gray-600 text-sm">No rating</span>
                        @endif
                    </div>

                    <div class="mt-2">
                        @if(!empty($review->comment))
                            <div class="bg-blue-100 text-gray-800 p-3 rounded-lg mt-1">
                                <p class="text-sm">{{ $review->comment }}</p>
                                <span class="text-gray-600 text-xs block mt-1">{{ $review->created_at->format('F j, Y, h:i A') }}</span>
                            </div>
                        @else
                            <p class="text-gray-600 text-sm">No comment provided.</p>
                            <p class="text-gray-600 text-xs block mt-1">{{ $review->created_at->format('F j, Y, h:i A') }}</p>
                        @endif
                    </div>
                </div>
            @endforeach

            <div class="mt-2">
                {{ $reviews->links() }}
            </div>
        @else
            <p class="text-gray-500">No reviews yet.</p>
        @endif
    </div>
</div>
