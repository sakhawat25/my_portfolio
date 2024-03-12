@extends('admin.layout.app')

@section('css')
    <script src="https://cdn.tiny.cloud/1/1qvedc8bwtfg6jqsy6i3g4tbrb6ga00kvjep7zztfu5sxlt8/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        var updateRoute = "{{ route('admin.academics.education.update', ':id') }}";
        var updateCertificateRoute = "{{ route('admin.academics.certificate.update', ':id') }}";
        var publicImageUrl = "{{ url('images') }}";
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <script src="{{ asset('assets/admin/js/academics.js') }}"></script>
@endsection

@section('content')
    <!-- Education Section -->
    <div class="mb-24">
        <div class="bg-teal-400 inline-block text-center text-white py-3 px-5 mb-5 uppercase"><strong>Education</strong>
        </div>
        @foreach ($educations as $education)
            <div class="w-full px-3 py-4 bg-white border border-gray-300 shadow-md flex flex-col gap-2 mb-5">
                <div class="flex align-middle justify-between">
                    <strong class="text-xl uppercase md:text-lg">{{ $education->title }}</strong>
                    <p class="text-xl md:text-lg">{{ \Carbon\Carbon::parse($education->start_date)->format('M Y') }} -
                        {{ \Carbon\Carbon::parse($education->end_date)->format('M Y') ?? 'Present' }}</p>
                    <div class="flex gap-3">
                        <button id="editEducationButton"
                            class="outline-none text-teal-400 hover:text-teal-500 focus:outline-none" title="Edit"
                            data-target-url="{{ route('admin.academics.education.show', $education->id) }}">
                            <i class="fa fa-pencil"></i>
                        </button>

                        <form action="{{ route('admin.academics.education.delete', $education->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit"
                                class="outline-none text-red-400 h-full hover:text-red-500 focus:outline-none deleteEducationButton"
                                title="Delete">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <p class="text-lg">{{ $education->institution }}</p>
                @if ($education->grade)
                    <p class="uppercase">{{ $education->grade_type }}: {{ $education->grade }}</p>
                @endif
                <div>
                    {!! $education->description !!}
                </div>
            </div>
        @endforeach

        <button id="addEducationButton"
            class="bg-teal-400 float-right focus:outline-none hover:bg-teal-500 outline-none p-2 px-4 text-lg text-white">
            <i class="fa fa-plus"></i>
        </button>
    </div>

    <!-- Certificates Section -->
    <div class="mb-24">
        <div class="bg-teal-400 inline-block text-center text-white py-3 px-5 mb-5 uppercase"><strong>Certificates</strong>
        </div>
        @foreach ($certificates as $certificate)
            <div class="w-full px-3 py-4 bg-white border border-gray-300 shadow-md flex flex-col gap-4 mb-5">
                <div class="flex align-middle justify-between">
                    <strong class="text-xl uppercase md:text-lg">{{ $certificate->title }}</strong>
                    <div class="flex gap-3">
                        <button id="editCertificateButton"
                            class="outline-none text-teal-400 hover:text-teal-500 focus:outline-none" title="Edit"
                            data-target-url="{{ route('admin.academics.certificate.show', $certificate->id) }}">
                            <i class="fa fa-pencil"></i>
                        </button>

                        <form action="{{ route('admin.academics.certificate.delete', $certificate->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit"
                                class="outline-none text-red-400 h-full hover:text-red-500 focus:outline-none deleteCertificateButton"
                                title="Delete">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="flex gap-4 justify-start">
                    <div class="flex align-middle justify-start">
                        <label
                            class="bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out">
                            Provider
                        </label>
                        <div class="border-2 border-teal-400 px-2 py-1">{{ $certificate->provider }}</div>
                    </div>
                    <div class="flex align-middle justify-start">
                        <label
                            class="bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out">
                            Issue Date
                        </label>
                        <div class="border-2 border-teal-400 px-2 py-1">
                            {{ \Carbon\Carbon::parse($certificate->issue_date)->format('M Y') }}</div>
                    </div>
                    @if ($certificate->expiry_date)
                        <div class="flex align-middle justify-start">
                            <label
                                class="bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out">
                                Expiry Date
                            </label>
                            <div class="border-2 border-teal-400 px-2 py-1">
                                {{ \Carbon\Carbon::parse($certificate->expiry_date)->format('M Y') }}</div>
                        </div>
                    @endif
                </div>

                <div>
                    {!! $certificate->description !!}
                </div>


                <div class="h-64 w-1/4 md:h-40">
                    @if ($certificate->image)
                        <img src="{{ asset('images/' . $certificate->image) }}" alt="{{ $certificate->title }}"
                            class="h-full object-contain w-full">
                    @else
                        <img src="{{ asset('images/no-image.jpg') }}" alt="No image" class="h-full object-contain w-full">
                    @endif
                </div>

            </div>
        @endforeach

        <button id="addCertificateButton"
            class="bg-teal-400 float-right focus:outline-none hover:bg-teal-500 outline-none p-2 px-4 text-lg text-white mb-5">
            <i class="fa fa-plus"></i>
        </button>
    </div>

    <!-- Modal to add education record -->
    <dialog id="addEducationModal" class="modal w-1/2 md:w-full"
        data-show-modal=@if (session()->has('showAddEducationModal')) {{ session('showAddEducationModal') }} @else {{ false }} @endif>
        <div class="modal-box p-6">
            <div class="h6 mb-5 uppercase">Add Education Record</div>
            <form action="{{ route('admin.academics.education.store') }}" id="addEducationForm" method="POST">
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

                    @error('institution')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror
                    <div class="flex">
                        <label
                            class="w-1/3 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Institution&nbsp;*</label>
                        <input type="text" name="institution" id="institution" value="{{ old('institution') }}"
                            class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">
                    </div>

                    @error('grade_type')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror
                    <div class="flex">
                        <label
                            class="w-1/3 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Grade
                            Type</label>
                        <select name="grade_type" id="grade_type"
                            class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">
                            <option value="">Select grade type</option>
                            <option value="cgpa">CGPA</option>
                            <option value="percentage">Percentage</option>
                            <option value="grade">Grade</option>
                        </select>
                    </div>

                    @error('grade')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror
                    <div class="flex">
                        <label
                            class="w-1/3 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Grade</label>
                        <input type="text" name="grade" id="grade" value="{{ old('grade') }}"
                            class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">
                    </div>

                    @error('start_date')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror
                    <div class="flex">
                        <label
                            class="w-1/3 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Start
                            Date&nbsp;*</label>
                        <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}"
                            class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">
                    </div>

                    <div class="flex gap-2">
                        <input type="checkbox" name="currently_studying" id="currently_studying" value="1">
                        <label for="currently_studying">Currently Studying</label>
                    </div>

                    @error('end_date')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror
                    <div class="flex" id="end_date_wrapper">
                        <label
                            class="w-1/3 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">End
                            Date</label>
                        <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}"
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
                </div>
            </form>
            <div class="flex gap-2 modal-action mt-5">
                <form method="dialog">
                    <button
                        class="bg-gray-500 text-white px-6 py-2 outline-none focus:outline-none hover:bg-gray-600">Close</button>
                </form>
                <button form="addEducationForm" type="submit"
                    class="bg-teal-400 text-white px-6 py-2 outline-none focus:outline-none hover:bg-teal-500">Add</button>
            </div>
        </div>
    </dialog>

    <!-- Modal to edit education record -->
    <dialog id="editEducationModal" class="modal w-1/2 md:w-full"
        data-show-modal=@if (session()->has('showEditEducationModal')) {{ session('showEditEducationModal') }} @else {{ false }} @endif>
        <div class="modal-box p-6">
            <div class="h6 mb-5 uppercase">Edit Education Record</div>
            <form id="editEducationForm" method="POST">
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

                    @error('institution')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror
                    <div class="flex">
                        <label
                            class="w-1/4 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Institution&nbsp;*</label>
                        <input type="text" name="institution" id="edit_institution" value="{{ old('institution') }}"
                            class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">
                    </div>

                    @error('grade_type')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror
                    <div class="flex">
                        <label
                            class="w-1/4 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Grade
                            Type</label>
                        <select name="grade_type" id="edit_grade_type"
                            class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">
                            <option value="">Select grade type</option>
                            <option value="cgpa">CGPA</option>
                            <option value="percentage">Percentage</option>
                            <option value="grade">Grade</option>
                        </select>
                    </div>

                    @error('grade')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror
                    <div class="flex">
                        <label
                            class="w-1/4 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Grade</label>
                        <input type="text" name="grade" id="edit_grade" value="{{ old('grade') }}"
                            class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">
                    </div>

                    @error('start_date')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror
                    <div class="flex">
                        <label
                            class="w-1/4 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Start
                            Date&nbsp;*</label>
                        <input type="date" name="start_date" id="edit_start_date" value="{{ old('start_date') }}"
                            class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">
                    </div>

                    <div class="flex gap-2">
                        <input type="checkbox" name="currently_studying" id="edit_currently_studying" value="1">
                        <label for="edit_currently_studying">Currently Studying</label>
                    </div>

                    @error('end_date')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror
                    <div class="flex" id="edit_end_date_wrapper">
                        <label
                            class="w-1/4 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">End
                            Date</label>
                        <input type="date" name="end_date" id="edit_end_date" value="{{ old('end_date') }}"
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
                </div>
            </form>
            <div class="flex gap-2 modal-action mt-5">
                <form method="dialog">
                    <button
                        class="bg-gray-500 text-white px-6 py-2 outline-none focus:outline-none hover:bg-gray-600">Close</button>
                </form>
                <button form="editEducationForm" type="submit"
                    class="bg-teal-400 text-white px-6 py-2 outline-none focus:outline-none hover:bg-teal-500">Update</button>
            </div>
        </div>
    </dialog>

    <!-- Modal to add certificate record -->
    <dialog id="addCertificateModal" class="modal w-1/2 md:w-full"
        data-show-modal=@if (session()->has('showAddCertificateModal')) {{ session('showAddCertificateModal') }} @else {{ false }} @endif>
        <div class="modal-box p-6">
            <div class="h6 mb-5 uppercase">Add Certificate Record</div>
            <form action="{{ route('admin.academics.certificate.store') }}" id="addCertificateForm" method="POST"
                enctype="multipart/form-data">
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

                    @error('provider')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror
                    <div class="flex">
                        <label
                            class="w-1/3 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Institution&nbsp;*</label>
                        <input type="text" name="provider" id="provider" value="{{ old('provider') }}"
                            class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">
                    </div>

                    @error('issue_date')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror
                    <div class="flex">
                        <label
                            class="w-1/3 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Issue
                            Date&nbsp;*</label>
                        <input type="date" name="issue_date" id="issue_date" value="{{ old('issue_date') }}"
                            class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">
                    </div>

                    @error('expiry_date')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror
                    <div class="flex">
                        <label
                            class="w-1/3 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Expiry
                            Date</label>
                        <input type="date" name="expiry_date" id="expiry_date" value="{{ old('expiry_date') }}"
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

                    @error('image')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror

                    <div class="flex">
                        <label
                            class="bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600">Certificate</label>
                    </div>

                    <div class="flex flex-col items-center pb-10 gap-2">
                        <div class="flex justify-center">
                            <div class="relative w-1/4 certificate-container">
                                <img id='certificate-image' src="{{ asset('images/no-image.jpg') }}" alt="No image"
                                    class="w-full" />
                                <button id="select-certificate-button"
                                    class="hidden absolute bg-teal-400 inset-0 opacity-75 outline-none focus:outline-none"
                                    title="Update Certificate">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <input type="file" name="image" id="certificate-image-input" class="hidden">
                            </div>
                        </div>
                        <button id="view-certificate-button"
                            class="bg-teal-400 py-2 px-10 text-white text-sm uppercase inset-0 outline-none focus:outline-none hover:bg-teal-500"
                            title="View Certificate">View</button>
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
                </div>
            </form>
            <div class="flex gap-2 modal-action mt-5">
                <form method="dialog">
                    <button
                        class="bg-gray-500 text-white px-6 py-2 outline-none focus:outline-none hover:bg-gray-600">Close</button>
                </form>
                <button form="addCertificateForm" type="submit"
                    class="bg-teal-400 text-white px-6 py-2 outline-none focus:outline-none hover:bg-teal-500">Add</button>
            </div>
        </div>
    </dialog>

    <!-- Modal to edit certificate record -->
    <dialog id="editCertificateModal" class="modal w-1/2 md:w-full"
        data-show-modal=@if (session()->has('showEditCertificateModal')) {{ session('showEditCertificateModal') }} @else {{ false }} @endif>
        <div class="modal-box p-6">
            <div class="h6 mb-5 uppercase">Edit Certificate Record</div>
            <form id="editCertificateForm" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="flex flex-col gap-3">
                    @error('title')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror
                    <div class="flex">
                        <label
                            class="w-1/3 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Title&nbsp;*</label>
                        <input type="text" name="title" id="edit_certificate_title" value="{{ old('title') }}"
                            class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">
                    </div>

                    @error('provider')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror
                    <div class="flex">
                        <label
                            class="w-1/3 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Institution&nbsp;*</label>
                        <input type="text" name="provider" id="edit_provider" value="{{ old('provider') }}"
                            class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">
                    </div>

                    @error('issue_date')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror
                    <div class="flex">
                        <label
                            class="w-1/3 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Issue
                            Date&nbsp;*</label>
                        <input type="date" name="issue_date" id="edit_issue_date" value="{{ old('issue_date') }}"
                            class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">
                    </div>

                    @error('expiry_date')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror
                    <div class="flex">
                        <label
                            class="w-1/3 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Expiry
                            Date</label>
                        <input type="date" name="expiry_date" id="edit_expiry_date" value="{{ old('expiry_date') }}"
                            class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">
                    </div>

                    @error('sort')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror
                    <div class="flex">
                        <label
                            class="w-1/3 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Sort</label>
                        <input type="number" name="sort" id="edit_certificate_sort" value="{{ old('sort') }}"
                            class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">
                    </div>

                    @error('image')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror

                    <div class="flex">
                        <label
                            class="bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600">Certificate</label>
                    </div>

                    <div class="flex flex-col items-center pb-10 gap-2">
                        <div class="flex justify-center">
                            <div class="relative w-1/4 edit-certificate-container">
                                <img id='edit-certificate-image' src="{{ asset('images/no-image.jpg') }}" alt="No image"
                                    class="w-full" />
                                <button id="edit-select-certificate-button"
                                    class="hidden absolute bg-teal-400 inset-0 opacity-75 outline-none focus:outline-none"
                                    title="Update Certificate">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <input type="file" name="image" id="edit-certificate-image-input" class="hidden">
                            </div>
                        </div>
                        <button id="edit-view-certificate-button"
                            class="bg-teal-400 py-2 px-10 text-white text-sm uppercase inset-0 outline-none focus:outline-none hover:bg-teal-500"
                            title="View Certificate">View</button>
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
                        <textarea name="description" id="edit_certificate_description" rows="10"
                            class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">{{ old('description') }}</textarea>
                    </div>
                </div>
            </form>
            <div class="flex gap-2 modal-action mt-5">
                <form method="dialog">
                    <button
                        class="bg-gray-500 text-white px-6 py-2 outline-none focus:outline-none hover:bg-gray-600">Close</button>
                </form>
                <button form="editCertificateForm" type="submit"
                    class="bg-teal-400 text-white px-6 py-2 outline-none focus:outline-none hover:bg-teal-500">Update</button>
            </div>
        </div>
    </dialog>
    </div>
@endsection
