<!-- resources/views/components/basic-info.blade.php -->
<div class="flex-1 bg-gray-100 p-2 shadow">
    <h3 class="text-3xl md:text-4xl font-semibold mb-4 md:mb-6">{{ $boardinghouse->name }}</h3>
    <div class="mb-4">
        <strong class="text-lg text-gray-700">Address:</strong>
        <p class="text-gray-600">{{ $boardinghouse->address }}</p>
    </div>
    <div class="mb-4">
        <strong class="text-lg text-gray-700">Gender:</strong>
        <p class="text-gray-600">{{ ucfirst($boardinghouse->gender) }}</p>
    </div>
</div>
