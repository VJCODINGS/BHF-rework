<!-- resources/views/components/profile-picture.blade.php -->
<div class="mb-6 md:mb-0 flex-shrink-0 w-full md:w-96 h-64 overflow-hidden shadow-lg bg-gray-200 flex items-center justify-center">
    @if($boardinghouse->profile_picture)
        <img src="{{ asset('storage/' . $boardinghouse->profile_picture) }}" alt="Profile Picture" class="w-full h-full object-cover">
    @else
        <p class="text-gray-500">No Profile Picture Available</p>
    @endif
</div>
