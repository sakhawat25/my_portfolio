@extends('admin.layout.app')

@section('css')
    <script src="https://cdn.tiny.cloud/1/1qvedc8bwtfg6jqsy6i3g4tbrb6ga00kvjep7zztfu5sxlt8/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <script src="{{ asset('assets/admin/js/projects.js') }}"></script>
@endsection

@section('content')
    <!-- Breadcrumb -->
    <nav class="w-full rounded-md">
        <ol class="flex list-none">
            <li>
                <a href="{{ route('projects.index') }}"
                    class="active:text-primary-accent-300 dark:text-primary-400 duration-150 ease-in-out focus:text-primary-accent-300 hover:text-primary-accent-300 hover:text-teal-500 motion-reduce:transition-none text-teal-400 transition">Home</a>
            </li>
            <li>
                <span class="mx-2 text-gray-500">/</span>
            </li>
            <li class="text-gray-500">Add Project</li>
        </ol>
    </nav>

    <div class="bg-white border border-gray-300 md:p-5 md:w-full mx-auto p-10 shadow-md w-10/12">
        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col gap-3">
                @error('title')
                    <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                @enderror
                <div class="flex h-10">
                    <label
                        class="w-1/3 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Title&nbsp;*</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                        class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900" placeholder="Enter Title">
                </div>

                @error('organization')
                    <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                @enderror
                <div class="flex h-10">
                    <label
                        class="w-1/3 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Organization&nbsp;*</label>
                    <input type="text" name="organization" id="organization" value="{{ old('organization') }}"
                        class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900" placeholder="Enter Organization">
                </div>

                @error('tags')
                    <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                @enderror
                <div class="flex h-10">
                    <label
                        class="w-1/3 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">
                        Tags
                    </label>

                    <input type="text" name="tags"
                        class="tagify border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900"
                        value="{{ old('tags') }}" placeholder="Web Designing, Web Development" />
                </div>

                @error('category')
                    <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                @enderror
                <div class="flex h-10">
                    <label
                        class="w-1/3 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Category&nbsp;*</label>
                    <input type="text" name="category" id="category" value="{{ old('category') }}"
                        class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900" placeholder="Enter Category">
                </div>

                @error('website')
                    <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                @enderror
                <div class="flex h-10">
                    <label
                        class="w-1/3 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Website</label>
                    <input type="text" name="website" id="website" value="{{ old('website') }}"
                        class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900" placeholder="https://www.example.com">
                </div>

                @error('start_date')
                    <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                @enderror
                <div class="flex h-10">
                    <label
                        class="w-1/3 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Start Date&nbsp;*</label>
                    <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}"
                        class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">
                </div>

                @error('end_date')
                    <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                @enderror
                <div class="flex h-10">
                    <label
                        class="w-1/3 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">End Date&nbsp;*</label>
                    <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}"
                        class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">
                </div>

                @error('description')
                    <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                @enderror
                <div class="flex flex-col gap-2">
                    <div class="flex">
                        <label
                            class="w-1/3 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Description&nbsp;*</label>
                        <div class="w-full"></div>
                    </div>
                    <textarea name="description" id="description" rows="10"
                        class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900" placeholder="Enter project description...">{{ old('description') }}</textarea>
                </div>

                @error('image')
                    <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                @enderror
                <div class="flex flex-col gap-2">
                    <div class="flex">
                        <label
                            class="w-1/3 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Image&nbsp;*</label>
                        <div class="w-full"></div>
                    </div>

                    <div class="flex flex-col items-center pb-10 gap-2">
                        <div class="flex justify-center">
                            <div class="relative w-1/4 project-image-container">
                                <img id='project-image'
                                    src="{{ asset('images/no-image.jpg') }}"
                                    alt="project image" class="w-full" />
                                <button id="select-image-button"
                                    class="hidden absolute bg-teal-400 inset-0 opacity-75 outline-none focus:outline-none"
                                    title="Upload image">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <input type="file" name="image" id="project-image-input" class="hidden">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end mt-6 py-2">
                <button type="submit"
                    class="bg-teal-400 inline-block rounded-none px-6 py-2 text-sm font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-teal-500 focus:outline-none">
                    Add
                </button>
            </div>
        </form>
    </div>
    </div>
@endsection
