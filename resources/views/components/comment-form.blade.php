<div class="border p-2 mb-2 bg-white shadow">
    <form id="reviewForm" method="POST" action="{{ route('reviews.store', $boardinghouse->id) }}" class="space-y-4">
        @csrf
        <div class="flex items-center mb-2">
            <label class="block text-gray-700 font-semibold">Rate:</label>
            <div class="flex items-center ml-4 star-rating">
                <label class="star text-2xl cursor-pointer" data-value="5">&#9733;</label>
                <label class="star text-2xl cursor-pointer" data-value="4">&#9733;</label>
                <label class="star text-2xl cursor-pointer" data-value="3">&#9733;</label>
                <label class="star text-2xl cursor-pointer" data-value="2">&#9733;</label>
                <label class="star text-2xl cursor-pointer" data-value="1">&#9733;</label>
                <input type="hidden" name="rating" id="rating" value="">
            </div>
        </div>

        <div class="mb-2">
            <textarea name="comment" id="comment" rows="4" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Share your thoughts...">{{ old('comment') }}</textarea>
            @error('comment')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div id="warningMessage" class="text-red-600 hidden">
            Please provide at least a rating or a comment before submitting your review.
        </div>

        @if ($errors->any())
            <div class="text-red-600">
                {{ $errors->first() }}
            </div>
        @endif

        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Submit Review</button>
        </div>
    </form>
</div>

<style>
    .star {
        color: #d1d5db;
    }

    .star:hover,
    .star:hover ~ .star {
        color: #fbbf24;
    }

    input[type="hidden"]:valid + label,
    input[type="hidden"]:valid + label ~ label {
        color: #fbbf24;
    }
</style>

<script>
    const stars = document.querySelectorAll('.star-rating .star');
    const ratingInput = document.getElementById('rating');

    stars.forEach(star => {
        star.addEventListener('click', function() {
            const value = this.getAttribute('data-value');
            ratingInput.value = value;

            stars.forEach(s => {
                s.style.color = s.getAttribute('data-value') <= value ? '#fbbf24' : '#d1d5db';
            });
        });
    });

    document.getElementById('reviewForm').addEventListener('submit', function(event) {
        const rating = ratingInput.value;
        const comment = this.querySelector('textarea[name="comment"]').value.trim();

        if (!rating && !comment) {
            event.preventDefault();
            document.getElementById('warningMessage').classList.remove('hidden');
        } else {
            document.getElementById('warningMessage').classList.add('hidden');
        }
    });
</script>
