@extends('admin.layout.app')

@section('css')
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    @livewireStyles
@endsection

@section('script')
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('assets/admin/js/custom.js') }}"></script>
    @livewireScripts
@endsection

@section('content')
    <div class="bg-gray-100 flex-1 p-6 justify-center md:mt-20">
        @if ($errors->any())
            <x-error-flash-message-component />
        @endif

        @if (session()->has('message'))
            <x-success-flash-message-component :message="session('message')" />
        @endif

        <div class="grid grid-cols-2 gap-6 xl:grid-cols-1">
            <div class="w-full px-3 py-4 bg-white border border-gray-300 shadow-md">
                <div class="bg-gray-400 w-full text-center py-5 mb-5 uppercase"><strong>Bio Data</strong></div>
                <div class="flex flex-col items-center pb-10 gap-2">
                    <div class="flex justify-center">
                        <div class="relative w-1/4 profile-picture-container">
                            <img id='profile_picture' src="{{ asset('images/' . $user->image) }}"
                                alt="{{ $user->first_name }}" class="w-full rounded-full" />
                            <button id="select-picture-button"
                                class="hidden absolute bg-teal-400 inset-0 opacity-75 rounded-full outline-none focus:outline-none"
                                title="Change Image">
                                <i class="fa fa-pencil"></i>
                            </button>
                            <form action="{{ route('admin.profile.updatePicture') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="image" id="profile-image" class="hidden">
                            </form>
                        </div>
                    </div>

                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $user->first_name }}
                        {{ $user->last_name }}</h5>
                    <p>
                        <span id="title" class="text-sm text-gray-500" data-typed-items="{{ $user->titles }}"></span>
                    </p>
                </div>

                <livewire:InputBox label="First Name" type="text" field="first_name" value="{{ $user->first_name }}" />
                <livewire:InputBox label="last Name" type="text" field="last_name" value="{{ $user->last_name }}" />
                <livewire:InputBox label="Email" type="text" field="email" value="{{ $user->email }}" />
                <livewire:InputBox label="Github" type="text" field="github_link" value="{{ $user->github_link }}" />
                <livewire:InputBox label="Linkedin" type="text" field="linkedin_link"
                    value="{{ $user->linkedin_link }}" />
                <livewire:InputBox label="Twitter" type="text" field="twitter_link" value="{{ $user->twitter_link }}" />
                <livewire:InputBox label="Address" type="text" field="address" value="{{ $user->address }}" />
                <livewire:InputBox label="Birth date" type="date" field="date_of_birth"
                    value="{{ $user->date_of_birth }}" />
                <livewire:InputBox label="Country" type="text" field="country" value="{{ $user->country }}" />
                <livewire:InputBox label="State" type="text" field="state" value="{{ $user->state }}" />
                <livewire:InputBox label="City" type="text" field="city" value="{{ $user->city }}" />
            </div>

            <div class="w-full px-3 py-4 bg-white border border-gray-300 shadow-md">
                <div class="bg-gray-400 w-full text-center py-5 mb-5 uppercase"><strong>Personal Information</strong></div>
                <form action="{{ route('admin.profile.updatePersonalInfo') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col py-2">
                        <label
                            class="w-1/4 inline-block rounded-none px-2 py-2 text-md font-medium uppercase leading-normal transition duration-150 ease-in-out md:w-1/3">
                            Titles
                        </label>

                        <input type="text" name="titles"
                            class="tagify w-full relative m-0 my-2 -ml-0.5 block flex-auto border border-solid border-teal-400 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium outline-none transition duration-200 ease-in-out focus:border-teal-500 focus:text-gray-900 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none"
                            value="{{ old('titles') ?? $user->titles }}" />
                    </div>

                    <div class="flex flex-col py-2">
                        <label
                            class="w-1/4 inline-block rounded-none px-2 py-2 text-md font-medium uppercase leading-normal transition duration-150 ease-in-out md:w-1/3">
                            CV
                        </label>

                        <div class="flex flex-col items-center pb-10 gap-2">
                            <div class="flex justify-center">
                                <div class="relative w-1/4 cv-container">
                                    <img id='cv-picture' src="{{ asset('images/' . $user->cv_image) }}" alt="cv"
                                        class="w-full" />
                                    <button id="select-cv-button"
                                        class="hidden absolute bg-teal-400 inset-0 opacity-75 outline-none focus:outline-none"
                                        title="Update CV">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <input type="file" name="cv" id="cv-image-input" class="hidden">
                                    <input type="hidden" name="cv_image" id="cv_image">
                                </div>
                            </div>
                            <button id="view-cv-button"
                                class="bg-teal-400 py-2 px-10 text-white text-sm uppercase inset-0 outline-none focus:outline-none hover:bg-teal-500"
                                title="View CV" data-cv-path="{{ asset('files/' . $user->cv) }}">VIEW CV</button>
                        </div>
                    </div>

                    <div class="flex flex-col py-2">
                        <label
                            class="w-1/4 inline-block rounded-none px-2 py-2 text-md font-medium uppercase leading-normal transition duration-150 ease-in-out md:w-1/3">
                            About
                        </label>

                        <textarea rows="5" name="introduction"
                            class="w-full relative m-0 my-2 -ml-0.5 block flex-auto border border-solid border-teal-400 bg-transparent bg-clip-padding px-2 py-2 text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium outline-none transition duration-200 ease-in-out focus:border-teal-500 focus:text-gray-900 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none">{{ $user->introduction }}</textarea>
                    </div>

                    <div class="flex justify-end py-2">
                        <button type="submit"
                            class="w-full bg-teal-400 inline-block rounded-none px-6 py-2 text-sm font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-teal-500">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
