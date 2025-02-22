<div class="relative inline-block text-left">
<button id="tooltipButton" class="bg-gray-200 px-4 py-2 rounded-md text-sm font-medium hover:bg-gray-300 hover:text-blue-600">        🔍 Search Tips
    </button>

    <div id="tooltipBox" class="text-black absolute left-0 mt-2 w-64 bg-white border border-gray-300 rounded-md shadow-lg p-4 text-sm hidden">
        <p class="font-bold mb-2">Refine Your Search:</p>
        <ul class="list-disc pl-4 space-y-1">
            <li><strong>Title:</strong> <code>intitle:Harry Potter</code></li>
            <li><strong>Author:</strong> <code>inauthor:J.K. Rowling</code></li>
            <li><strong>Publisher:</strong> <code>inpublisher:Penguin</code></li>
            <li><strong>Subject:</strong> <code>subject:Science</code></li>
            <li><strong>ISBN:</strong> <code>isbn:9783161484100</code></li>
            <li><strong>Library of Congress:</strong> <code>lccn:2002022641</code></li>
            <li><strong>OCLC Number:</strong> <code>oclc:16627444</code></li>
        </ul>
    </div>
</div>

<script>
    document.getElementById("tooltipButton").addEventListener("click", function() {
        let tooltip = document.getElementById("tooltipBox");
        tooltip.classList.toggle("hidden");
    });
</script>