<!-- resources/views/components/house-policies.blade.php -->
<div class="border mb-2 p-1 bg-white shadow-sm">
    @if($boardinghouse->policies)
        <div class="mb-2">
            <strong class="text-base font-medium">Policies:</strong>
            <div class="policies-content overflow-hidden transition-all duration-300" id="policies" style="max-height: 6rem;">
                <p class="text-gray-600 text-sm leading-relaxed">{!! nl2br(e($boardinghouse->policies)) !!}</p>
            </div>
            <button id="toggle-policies-button" class="text-sm text-blue-500 hover:text-blue-600 transition-colors mt-1" onclick="togglePolicies('policies', 'toggle-policies-button')">Read more</button>
        </div>
    @else
        <p class="text-gray-500 text-sm">No policies available.</p>
    @endif

</div>

<script>
    function togglePolicies(sectionId, buttonId) {
        const content = document.getElementById(sectionId);
        const button = document.getElementById(buttonId);
        const isCollapsed = content.style.maxHeight === '6rem';

        content.style.maxHeight = isCollapsed ? content.scrollHeight + 'px' : '6rem';
        button.textContent = isCollapsed ? 'Show less' : 'Read more';
    }
</script>
