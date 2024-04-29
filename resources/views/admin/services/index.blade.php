@extends('admin.layout.app')

@section('css')
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        var updateRoute = "{{ route('admin.services.update', ':id') }}";
        var publicImageUrl = "{{ url('images') }}";
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <script src="{{ asset('assets/admin/js/services.js') }}"></script>
@endsection

@section('content')
    <!-- Services Section -->
    <div class="mb-24">
        <div class="bg-teal-400 inline-block text-center text-white py-3 px-5 mb-5 uppercase"><strong>Services</strong>
        </div>
        @forelse ($services as $service)
            <div class="w-full px-3 py-4 bg-white border border-gray-300 shadow-md flex flex-col gap-4 mb-5">
                <div class="flex align-middle justify-between">
                    <strong class="text-xl uppercase md:text-lg">{{ $service->title }}</strong>
                    <div class="flex gap-3">
                        <button id="editServiceButton"
                            class="edit-service-button outline-none text-teal-400 hover:text-teal-500 focus:outline-none" title="Edit"
                            data-target-url="{{ route('admin.services.show', $service->id) }}">
                            <i class="fa fa-pencil"></i>
                        </button>

                        <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit"
                                class="outline-none text-red-400 h-full hover:text-red-500 focus:outline-none deleteServiceButton"
                                title="Delete">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <fieldset class="border border-gray-400 normal-case px-4 py-1">
                    <legend class="bg-gray-300 p-2">Description</legend>
                    {!! $service->description !!}
                </fieldset>

                <div class="border border-gray-400 flex flex-col md:w-1/4 w-1/12">
                    <div class="bg-gray-400 p-2 text-center">Logo</div>
                    @if ($service->logo)
                        <img src="{{ asset('images/' . $service->logo) }}" alt="{{ $service->title }}"
                            class="h-full object-contain w-full">
                    @else
                        <img src="{{ asset('images/no-image.jpg') }}" alt="No image" class="h-full object-contain w-full">
                    @endif
                </div>
            </div>
        @empty
            <div class="w-full px-3 py-4 bg-white border border-gray-300 shadow-md flex flex-col gap-3 mb-5">
                <div class="bg-gray-300 h-4 mb-2 rounded-full w-56">
                </div>
                <div class="bg-gray-300 h-3 rounded-full">
                </div>
                <div class="bg-gray-300 h-3 rounded-full">
                </div>
                <div class="bg-gray-300 h-3 rounded-full">
                </div>
                <div class="bg-gray-300 h-3 rounded-full">
                </div>
            </div>
        @endforelse

        <button id="addServiceButton"
            class="bg-teal-400 float-right focus:outline-none hover:bg-teal-500 outline-none p-2 px-4 text-lg text-white mb-5">
            <i class="fa fa-plus"></i>
        </button>
    </div>

    <!-- Modal to add service record -->
    <dialog id="addServiceModal" class="modal w-1/2 md:w-full"
        data-show-modal=@if (session()->has('showAddServiceModal')) {{ session('showAddServiceModal') }} @else {{ false }} @endif>
        <div class="modal-box p-6">
            <div class="h6 mb-5 uppercase">Add Service Record</div>
            <form action="{{ route('admin.services.store') }}" id="addServiceForm" method="POST">
                @csrf
                <div class="flex flex-col gap-3">
                    @error('title')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror
                    <div class="flex">
                        <label
                            class="w-1/3 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Title&nbsp;*</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}"
                            class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">
                    </div>

                    @error('sort')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror
                    <div class="flex">
                        <label
                            class="w-1/3 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Sort</label>
                        <input type="number" name="sort" id="sort" value="{{ old('sort') }}"
                            class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">
                    </div>

                    @error('description')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror
                    <div class="flex flex-col gap-2">
                        <div class="flex">
                            <label
                                class="w-1/3 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Description</label>
                            <div class="w-full"></div>
                        </div>
                        <textarea name="description" id="description" rows="10"
                            class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">{{ old('description') }}</textarea>
                    </div>

                    @error('logo')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror

                    <div class="flex">
                        <label
                            class="bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600">Logo</label>
                    </div>

                    <div class="flex flex-col items-center pb-10 gap-2">
                        <div class="flex justify-center">
                            <div class="relative w-1/4 service-logo-container">
                                <img id='service-image' src="{{ asset('images/no-image.jpg') }}" alt="No image"
                                    class="w-full" />
                                <button id="select-logo-button"
                                    class="hidden absolute bg-teal-400 inset-0 opacity-75 outline-none focus:outline-none"
                                    title="Update Logo">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <input type="file" name="logo" id="service-logo-input" class="hidden">
                            </div>
                        </div>
                        <button id="view-logo-button"
                            class="bg-teal-400 py-2 px-10 text-white text-sm uppercase inset-0 outline-none focus:outline-none hover:bg-teal-500"
                            title="View Logo">View</button>
                    </div>
                </div>
            </form>
            <div class="flex gap-2 modal-action mt-5">
                <form method="dialog">
                    <button
                        class="bg-gray-500 text-white px-6 py-2 outline-none focus:outline-none hover:bg-gray-600">Close</button>
                </form>
                <button form="addServiceForm" type="submit"
                    class="bg-teal-400 text-white px-6 py-2 outline-none focus:outline-none hover:bg-teal-500">Add</button>
            </div>
        </div>
    </dialog>

    <!-- Modal to edit service record -->
    <dialog id="editServiceModal" class="modal w-1/2 md:w-full"
        data-show-modal=@if (session()->has('showEditServiceModal')) {{ session('showEditServiceModal') }} @else {{ false }} @endif>
        <div class="modal-box p-6">
            <div class="h6 mb-5 uppercase">Edit Service Record</div>
            <form id="editServiceForm" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="flex flex-col gap-3">
                    @error('title')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror
                    <div class="flex">
                        <label
                            class="w-1/4 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Title&nbsp;*</label>
                        <input type="text" name="title" id="edit_title" value="{{ old('title') }}"
                            class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">
                    </div>

                    @error('sort')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror
                    <div class="flex">
                        <label
                            class="w-1/4 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Sort</label>
                        <input type="number" name="sort" id="edit_sort" value="{{ old('sort') }}"
                            class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">
                    </div>

                    @error('description')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror
                    <div class="flex flex-col gap-2">
                        <div class="flex">
                            <label
                                class="w-1/4 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Description</label>
                            <div class="w-full"></div>
                        </div>
                        <textarea name="description" id="edit_description" rows="10"
                            class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">{{ old('description') }}</textarea>
                    </div>

                    @error('logo')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror

                    <div class="flex">
                        <label
                            class="bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600">Logo</label>
                    </div>

                    <div class="flex flex-col items-center pb-10 gap-2">
                        <div class="flex justify-center">
                            <div class="relative w-1/4 edit-logo-container">
                                <img id='edit-logo-image' src="{{ asset('images/no-image.jpg') }}" alt="No image"
                                    class="w-full" />
                                <button id="edit-select-logo-button"
                                    class="hidden absolute bg-teal-400 inset-0 opacity-75 outline-none focus:outline-none"
                                    title="Update logo">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <input type="file" name="logo" id="edit-logo-input" class="hidden">
                            </div>
                        </div>
                        <button id="edit-view-logo-button"
                            class="bg-teal-400 py-2 px-10 text-white text-sm uppercase inset-0 outline-none focus:outline-none hover:bg-teal-500"
                            title="View logo">View</button>
                    </div>
                </div>
            </form>
            <div class="flex gap-2 modal-action mt-5">
                <form method="dialog">
                    <button
                        class="bg-gray-500 text-white px-6 py-2 outline-none focus:outline-none hover:bg-gray-600">Close</button>
                </form>
                <button form="editServiceForm" type="submit"
                    class="bg-teal-400 text-white px-6 py-2 outline-none focus:outline-none hover:bg-teal-500">Update</button>
            </div>
        </div>
    </dialog>
    </div>
@endsection
