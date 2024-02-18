@props(['message'])

<div class="bg-green-100 border border-green-400 text-green-700 mb-4 px-4 py-3 rounded relative" role="alert">
    <span class="block normal-case sm:inline">
        {{ $message }}
    </span>
    <button id="close-success-message-button"
        class="absolute outline-none top-0 bottom-0 right-0 px-4 py-3 focus:outline-none hover:bg-green-200">
        <i class="fa fa-times"></i>
    </button>
</div>
