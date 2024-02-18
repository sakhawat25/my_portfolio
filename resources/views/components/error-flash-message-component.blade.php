<div class="bg-red-100 border border-red-400 text-red-700 mb-4 px-4 py-3 rounded relative" role="alert">
    <span class="block normal-case sm:inline">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </span>
    <button id="close-error-message-button"
        class="absolute outline-none top-0 bottom-0 right-0 px-4 py-3 focus:outline-none hover:bg-red-200">
        <i class="fa fa-times"></i>
    </button>
</div>
