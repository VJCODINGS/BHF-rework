<div class="border mb-2 p-1 bg-white shadow-sm">
    @if($boardinghouse->description)
        <div class="mb-2">
            <strong class="text-base font-medium">Description:</strong>
            <div class="description-content overflow-hidden transition-all duration-300" id="description" style="max-height: 6rem;">
                <p class="text-gray-600 text-sm leading-relaxed">{!! nl2br(e($boardinghouse->description)) !!}</p>
            </div>
            <button id="toggle-button" class="text-sm text-blue-500 hover:text-blue-600 transition-colors mt-1" onclick="toggleDescription('description')">Read more</button>
        </div>
    @else
        <p class="text-gray-500 text-sm">No description available.</p>
    @endif
</div>

<script>
    function toggleDescription(sectionId) {
        const content = document.getElementById(sectionId);
        const button = document.getElementById('toggle-button');
        const isCollapsed = content.style.maxHeight === '6rem';

        content.style.maxHeight = isCollapsed ? content.scrollHeight + 'px' : '6rem';
        button.textContent = isCollapsed ? 'Show less' : 'Read more';
    }
</script>
