<!-- resources/views/components/photos-section.blade.php -->
<div class="border p-2 mb-2 bg-white shadow">
    <strong class="text-lg">Photos:</strong>
    <div class="flex overflow-x-auto gap-2 mt-4 pb-2" style="max-width: 100%;">
        @if($boardinghouse->photos->isNotEmpty())
            @foreach($boardinghouse->photos as $photo)
                <div class="relative w-32 h-32 flex-shrink-0 overflow-hidden shadow-lg cursor-pointer hover:scale-105 transition-transform duration-200" onclick="openModal('{{ asset('storage/' . $photo->photo_path) }}')">
                    <img src="{{ asset('storage/' . $photo->photo_path) }}" alt="Boarding House Photo" class="w-full h-full object-cover">
                </div>
            @endforeach
        @else
            <p class="col-span-2 text-center text-gray-500">No photos available.</p>
        @endif
    </div>
</div>

<div id="photoModal" class="fixed inset-0 bg-black bg-opacity-70 flex justify-center items-center z-50" style="display: none;" onclick="closeModal(event)">
    <div class="relative max-w-3xl max-h-[90%] p-4 flex justify-center items-center" onclick="event.stopPropagation()">
        <img id="modalImage" src="" alt="Full Size Photo" class="max-w-full max-h-[80vh] object-contain rounded-lg shadow-lg">
    </div>
    <span class="fixed top-4 right-4 text-white text-4xl cursor-pointer" onclick="closeModal()">&times;</span>
</div>

<script>
    function openModal(src) {
        document.getElementById('modalImage').src = src;
        document.getElementById('photoModal').style.display = 'flex'; // Show modal
    }

    function closeModal(event) {
        const modal = document.getElementById("photoModal");
        if (event) {
            event.preventDefault();
            if (event.target.id === 'photoModal') {
                modal.style.display = 'none'; // Hide modal
            }
        } else {
            modal.style.display = 'none'; // Hide modal
        }
    }
</script>
