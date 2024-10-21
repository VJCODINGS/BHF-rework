<div class="border p-2 mb-2 bg-white shadow">
    <strong class="text-lg">Leave a Review:</strong>
    <form method="POST" class="mt-4">
        @csrf
        <div class="mb-4">
            <label for="rating" class="block text-gray-700">Rating:</label>
            <div class="flex items-center mt-2 star-rating">
                <input type="radio" name="rating" id="star5" value="5" class="hidden" required>
                <label for="star5" class="star text-2xl cursor-pointer">&#9733;</label>

                <input type="radio" name="rating" id="star4" value="4" class="hidden" required>
                <label for="star4" class="star text-2xl cursor-pointer">&#9733;</label>

                <input type="radio" name="rating" id="star3" value="3" class="hidden" required>
                <label for="star3" class="star text-2xl cursor-pointer">&#9733;</label>

                <input type="radio" name="rating" id="star2" value="2" class="hidden" required>
                <label for="star2" class="star text-2xl cursor-pointer">&#9733;</label>

                <input type="radio" name="rating" id="star1" value="1" class="hidden" required>
                <label for="star1" class="star text-2xl cursor-pointer">&#9733;</label>
            </div>
        </div>

        <div class="mb-4">
            <label for="comment" class="block text-gray-700">Comment:</label>
            <textarea name="comment" id="comment" rows="4" class="mt-1 block w-full rounded-md shadow-sm border-gray-300" required></textarea>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow hover:bg-indigo-700">Submit Review</button>
        </div>
    </form>
</div>

<style>
    .star {
        color: #d1d5db;
    }

    .star:hover, .star:hover ~ .star {
        color: #fbbf24;
    }

    input[type="radio"]:checked + label,
    input[type="radio"]:checked + label ~ label {
        color: #fbbf24;
    }
</style>

<script>
    document.querySelectorAll('.star-rating input[type="radio"]').forEach((radio) => {
        radio.addEventListener('change', function () {
            const allStars = this.parentElement.querySelectorAll('.star');
            allStars.forEach(star => star.style.color = '#d1d5db');

            let currentStar = this.nextElementSibling;
            while (currentStar) {
                currentStar.style.color = '#fbbf24';
                currentStar = currentStar.previousElementSibling;
            }
        });
    });
</script>
