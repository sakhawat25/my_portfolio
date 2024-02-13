<div class="relative mb-4 flex flex-col">
    <div id="{{ $field }}_error" class="hidden normal-case text-red-500 text-sm font-medium pb-1">
        This is an error
    </div>
    <div class="flex">
        <label
            class="w-1/4 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/3">
            {{ $label }}
        </label>
        <form id="{{ $field }}_form" action="{{ route('admin.profile.updateField', $field) }}" method="POST"
            class="flex-grow">
            @csrf
            @method('PATCH')
            <input type="{{ $type }}" name="{{ $field }}" id="{{ $field }}"
                class="border border-teal-400 h-full outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900"
                value="{{ $value }}" disabled>
        </form>
        <div class="flex action-buttons">
            <button id="edit_btn_{{ $field }}"
                class="edit-btn inline-block rounded-none px-2 py-2 text-xs font-medium uppercase leading-normal text-primary transition duration-200 ease-in-out hover:bg-teal-500 hover:text-white focus:outline-none"
                data-inputid="{{ $field }}" title="Edit">
                <i class="fad fa-pencil"></i>
            </button>
            <button id="save_btn_{{ $field }}" type="submit"
                class="hidden save-btn inline-block rounded-none px-2 py-2 text-xs font-medium uppercase leading-normal text-primary transition duration-200 ease-in-out hover:bg-teal-500 hover:text-white focus:outline-none"
                data-inputid="{{ $field }}" data-edit-btn-id="edit_btn_{{ $field }}"
                data-form-id="{{ $field }}_form" data-error-div-id="{{ $field }}_error" title="Save">
                <i class="fad fa-check-double"></i>
            </button>
        </div>
    </div>
</div>
