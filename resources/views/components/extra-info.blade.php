<!-- resources/views/components/extra-info.blade.php -->
<div class="border p-2 mb-2 bg-white shadow">
    <strong class="text-lg">Extra Information:</strong>
    <ul class="mt-4 text-gray-600">
        <li>WiFi: {{ $boardinghouse->extraInfo->wifi ?? 'No' }}</li>
        <li>Air Conditioning: {{ $boardinghouse->extraInfo->air_conditioning ?? 'No' }}</li>
        <li>Kitchen Use: {{ $boardinghouse->extraInfo->kitchen_use ?? 'No' }}</li>
        <li>Number of CR: {{ $boardinghouse->extraInfo->number_of_CR ?? 0 }}</li>
    </ul>
    @if(!$boardinghouse->extraInfo)
        <p class="text-gray-500 mt-4">No extra information available.</p>
    @endif
</div>
