@extends('admin.layout.app')

@section('css')
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    @livewireStyles
@endsection

@section('script')
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script src="{{ asset('assets/admin/js/custom.js') }}"></script>
    @livewireScripts
@endsection

@section('content')
    <div class="bg-gray-100 flex-1 p-6 justify-center md:mt-20">
        <div class="grid grid-cols-2 gap-6 xl:grid-cols-1">
            <div class="w-full px-3 py-4 bg-white border border-gray-300 shadow-md">
                <div class="flex flex-col items-center pb-10">
                    <form class="self-end">
                        <div class="flex items-center space-x-6">
                            <div class="shrink-0">
                                <img id='preview_img' class="h-16 w-16 object-cover rounded-full"
                                    src="{{ asset('images/profile_pic.png') }}" alt="Bonnie image" />
                            </div>
                            <label class="block">
                                <span class="sr-only">Choose profile photo</span>
                                <input type="file" id="image" name="image" />
                            </label>
                        </div>
                    </form>

                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Sakhawat Hussain</h5>
                    <p>
                        <span id="title" class="text-sm text-gray-500"
                            data-typed-items="Laravel Developer, Backend Developer"></span>
                    </p>
                </div>

                <livewire:InputBox label="First Name" type="text" field="first_name" value="Sakhawat Hussain" />

                <div class="relative mb-4 flex flex-wrap items-stretch">
                    <label
                        class="w-1/4 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/3">
                        Last Name
                    </label>
                    <input type="text"
                        class="relative m-0 -ml-0.5 block flex-auto border border-solid border-teal-400 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium outline-none transition duration-200 ease-in-out focus:border-teal-500 focus:text-gray-900 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none md:w-1/2"
                        value="Hussain" />
                    <button
                        class="inline-block rounded-none px-2 py-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:bg-teal-500 hover:text-white focus:outline-none">
                        <i class="fad fa-pencil"></i>
                    </button>
                    <button
                        class="inline-block rounded-none px-2 py-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:bg-teal-500 hover:text-white focus:outline-none"
                        style="display: none">
                        <i class="fad fa-ban"></i>
                    </button>
                    <button
                        class="inline-block rounded-none px-2 py-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:bg-teal-500 hover:text-white focus:outline-none"
                        style="display: none">
                        <i class="fad fa-check-double"></i>
                    </button>
                </div>

                <div class="relative mb-4 flex flex-wrap items-stretch">
                    <label
                        class="w-1/4 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/3">
                        Email
                    </label>
                    <input type="text"
                        class="relative m-0 -ml-0.5 block flex-auto border border-solid border-teal-400 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium outline-none transition duration-200 ease-in-out focus:border-teal-500 focus:text-gray-900 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none md:w-1/2"
                        value="sakhawathussainkaka@gmail.com" />
                    <button
                        class="inline-block rounded-none px-2 py-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:bg-teal-500 hover:text-white focus:outline-none">
                        <i class="fad fa-pencil"></i>
                    </button>
                    <button
                        class="inline-block rounded-none px-2 py-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:bg-teal-500 hover:text-white focus:outline-none"
                        style="display: none">
                        <i class="fad fa-ban"></i>
                    </button>
                    <button
                        class="inline-block rounded-none px-2 py-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:bg-teal-500 hover:text-white focus:outline-none"
                        style="display: none">
                        <i class="fad fa-check-double"></i>
                    </button>
                </div>

                <div class="relative mb-4 flex flex-wrap items-stretch">
                    <label
                        class="w-1/4 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/3">
                        Github
                    </label>
                    <input type="text"
                        class="relative m-0 -ml-0.5 block flex-auto border border-solid border-teal-400 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium outline-none transition duration-200 ease-in-out focus:border-teal-500 focus:text-gray-900 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none md:w-1/2"
                        value="https://www.github.com" />
                    <button
                        class="inline-block rounded-none px-2 py-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:bg-teal-500 hover:text-white focus:outline-none">
                        <i class="fad fa-pencil"></i>
                    </button>
                    <button
                        class="inline-block rounded-none px-2 py-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:bg-teal-500 hover:text-white focus:outline-none"
                        style="display: none">
                        <i class="fad fa-ban"></i>
                    </button>
                    <button
                        class="inline-block rounded-none px-2 py-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:bg-teal-500 hover:text-white focus:outline-none"
                        style="display: none">
                        <i class="fad fa-check-double"></i>
                    </button>
                </div>

                <div class="relative mb-4 flex flex-wrap items-stretch">
                    <label
                        class="w-1/4 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/3">
                        Linkedin
                    </label>
                    <input type="text"
                        class="relative m-0 -ml-0.5 block flex-auto border border-solid border-teal-400 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium outline-none transition duration-200 ease-in-out focus:border-teal-500 focus:text-gray-900 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none md:w-1/2"
                        value="https://www.linkedin.com" />
                    <button
                        class="inline-block rounded-none px-2 py-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:bg-teal-500 hover:text-white focus:outline-none">
                        <i class="fad fa-pencil"></i>
                    </button>
                    <button
                        class="inline-block rounded-none px-2 py-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:bg-teal-500 hover:text-white focus:outline-none"
                        style="display: none">
                        <i class="fad fa-ban"></i>
                    </button>
                    <button
                        class="inline-block rounded-none px-2 py-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:bg-teal-500 hover:text-white focus:outline-none"
                        style="display: none">
                        <i class="fad fa-check-double"></i>
                    </button>
                </div>

                <div class="relative mb-4 flex flex-wrap items-stretch">
                    <label
                        class="w-1/4 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/3">
                        Facebook
                    </label>
                    <input type="text"
                        class="relative m-0 -ml-0.5 block flex-auto border border-solid border-teal-400 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium outline-none transition duration-200 ease-in-out focus:border-teal-500 focus:text-gray-900 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none md:w-1/2"
                        value="https://www.facebook.com" />
                    <button
                        class="inline-block rounded-none px-2 py-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:bg-teal-500 hover:text-white focus:outline-none">
                        <i class="fad fa-pencil"></i>
                    </button>
                    <button
                        class="inline-block rounded-none px-2 py-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:bg-teal-500 hover:text-white focus:outline-none"
                        style="display: none">
                        <i class="fad fa-ban"></i>
                    </button>
                    <button
                        class="inline-block rounded-none px-2 py-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:bg-teal-500 hover:text-white focus:outline-none"
                        style="display: none">
                        <i class="fad fa-check-double"></i>
                    </button>
                </div>

                <div class="relative mb-4 flex flex-wrap items-stretch">
                    <label
                        class="w-1/4 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/3">
                        Twitter
                    </label>
                    <input type="text"
                        class="relative m-0 -ml-0.5 block flex-auto border border-solid border-teal-400 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium outline-none transition duration-200 ease-in-out focus:border-teal-500 focus:text-gray-900 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none md:w-1/2"
                        value="https://www.twitter.com" />
                    <button
                        class="inline-block rounded-none px-2 py-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:bg-teal-500 hover:text-white focus:outline focus:outline-teal-500">
                        <i class="fad fa-pencil"></i>
                    </button>
                    <button
                        class="inline-block rounded-none px-2 py-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:bg-teal-500 hover:text-white focus:outline-none"
                        style="display: none">
                        <i class="fad fa-ban"></i>
                    </button>
                    <button
                        class="inline-block rounded-none px-2 py-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:bg-teal-500 hover:text-white focus:outline-none"
                        style="display: none">
                        <i class="fad fa-check-double"></i>
                    </button>
                </div>

                <div class="relative mb-4 flex flex-wrap items-stretch">
                    <label
                        class="w-1/4 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/3">
                        Birth date
                    </label>
                    <input type="date"
                        class="relative m-0 -ml-0.5 block flex-auto border border-solid border-teal-400 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium outline-none transition duration-200 ease-in-out focus:border-teal-500 focus:text-gray-900 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none md:w-1/2" />
                    <button
                        class="inline-block rounded-none px-2 py-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:bg-teal-500 hover:text-white focus:outline focus:outline-teal-500"
                        title="edit">
                        <i class="fad fa-pencil"></i>
                    </button>
                    <button
                        class="inline-block rounded-none px-2 py-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:bg-red-500 hover:text-white focus:outline-none"
                        title="cancel" style="display: none">
                        <i class="fad fa-ban"></i>
                    </button>
                    <button
                        class="inline-block rounded-none px-2 py-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:bg-teal-500 hover:text-white focus:outline-none"
                        title="save" style="display: none">
                        <i class="fad fa-check-double"></i>
                    </button>
                </div>
            </div>

            <div class="w-full px-3 py-4 bg-white border border-gray-300 shadow-md">

                <div class="flex flex-col py-2">
                    <label
                        class="w-1/4 inline-block rounded-none px-2 py-2 text-md font-medium uppercase leading-normal transition duration-150 ease-in-out md:w-1/3">
                        Titles
                    </label>

                    <input type="text"
                        class="tagify w-full relative m-0 my-2 -ml-0.5 block flex-auto border border-solid border-teal-400 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium outline-none transition duration-200 ease-in-out focus:border-teal-500 focus:text-gray-900 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none"
                        value="Backend Developer, Laravel" />
                </div>

                <div class="flex flex-col py-2">
                    <label
                        class="w-1/4 inline-block rounded-none px-2 py-2 text-md font-medium uppercase leading-normal transition duration-150 ease-in-out md:w-1/3">
                        CV
                    </label>

                    <input
                        class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-teal-400 bg-clip-padding px-2 py-2 text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-teal-500 focus:text-neutral-700 focus:shadow-te-primary focus:outline-none"
                        type="file" id="formFile" />
                </div>

                <div class="flex flex-col py-2">
                    <label
                        class="w-full inline-block rounded-none px-2 py-2 text-md font-medium uppercase leading-normal transition duration-150 ease-in-out">
                        Preview CV
                    </label>

                    <div class="flex justify-center">
                        <img src="{{ asset('images/profile_pic.png') }}" alt="" srcset=""
                            class="h-24 object-scale-down w-1/2">
                    </div>
                </div>

                <div class="flex flex-col py-2">
                    <label
                        class="w-1/4 inline-block rounded-none px-2 py-2 text-md font-medium uppercase leading-normal transition duration-150 ease-in-out md:w-1/3">
                        About
                    </label>

                    <textarea rows="5"
                        class="w-full relative m-0 my-2 -ml-0.5 block flex-auto border border-solid border-teal-400 bg-transparent bg-clip-padding px-2 py-2 text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium outline-none transition duration-200 ease-in-out focus:border-teal-500 focus:text-gray-900 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none">Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, corrupti? Obcaecati similique vitae voluptas ipsam velit pariatur quisquam placeat impedit sequi veniam nobis in molestias aperiam fugiat, neque omnis rerum?</textarea>
                </div>

                <div class="flex justify-end py-2">
                    <button
                        class="w-full bg-teal-400 inline-block rounded-none px-6 py-2 text-sm font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-teal-500">
                        Update
                    </button>
                </div>

            </div>
        </div>
    </div>
@endsection
