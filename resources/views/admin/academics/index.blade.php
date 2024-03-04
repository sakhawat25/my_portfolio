@extends('admin.layout.app')

@section('css')
@endsection

@section('script')
<script src="{{ asset('assets/admin/js/academics.js') }}"></script>
@endsection

@section('content')
    <div class="bg-gray-100 flex-1 p-6 justify-center md:mt-20">
        @if ($errors->any())
            <x-error-flash-message-component />
        @endif

        @if (session()->has('message'))
            <x-success-flash-message-component :message="session('message')" />
        @endif

        <div class="bg-teal-400 inline-block text-center text-white py-3 px-5 mb-5 uppercase"><strong>Education</strong>
        </div>
        <div class="w-full px-3 py-4 bg-white border border-gray-300 shadow-md flex flex-col gap-2">
            <div class="flex align-middle justify-between">
                <strong class="text-xl uppercase md:text-lg">BSc (Computer Science)</strong>
                <p class="text-xl md:text-lg">2017 - 2021</p>
                <div class="flex gap-3">
                    <i class="fad fa-pencil"></i>
                    <i class="fad fa-trash"></i>
                </div>
            </div>
            <p class="text-lg">University Of Sindh</p>
            <div>
                <p>Description:</p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. A ab dolorem necessitatibus veniam expedita
                    inventore nihil quaerat eius reprehenderit non, animi excepturi praesentium, aperiam illum asperiores
                    cum
                    et! Exercitationem, veritatis.
                </p>
            </div>
        </div>
        <button onclick="addEducationModal.showModal()"
            class="bg-teal-400 float-right focus:outline-none hover:bg-teal-500 my-3 outline-none p-2 px-4 text-lg text-white">
            <i class="fa fa-plus"></i>
        </button>

        <!-- Modal to add education record -->
        <dialog id="addEducationModal" class="modal w-1/2 md:w-full">
            <div class="modal-box p-6">
                <form action="" id="addEducationForm">
                    <div class="flex flex-col gap-3">
                        <div class="flex">
                            <label
                                class="w-1/4 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Title</label>
                            <input type="text" name="title" id="title"
                                class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">
                        </div>
                        <div class="flex">
                            <label
                                class="w-1/4 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Institution</label>
                            <input type="text" name="institution" id="institution"
                                class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">
                        </div>
                        <div class="flex">
                            <label
                                class="w-1/4 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Start Date</label>
                            <input type="date" name="start_date" id="start_date"
                                class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">
                        </div>
                        <div class="flex gap-2">
                            <input type="checkbox" name="currently_studying" id="currently_studying">
                            <label for="currently_studying">Currently Studying</label>
                        </div>
                        <div class="flex" id="end_date_wrapper">
                            <label
                                class="w-1/4 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">End Date</label>
                            <input type="date" name="end_date" id="end_date"
                                class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">
                        </div>
                        <div class="flex">
                            <label
                                class="w-1/4 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Sort</label>
                            <input type="number" name="sort" id="sort"
                                class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">
                        </div>
                        <div class="flex flex-col gap-2">
                            <div class="flex">
                                <label
                                class="w-1/4 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Description</label>
                                <div class="w-full"></div>
                            </div>
                            <textarea name="description" id="description" rows="10" class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900"></textarea>
                        </div>
                    </div>
                </form>
                <div class="flex gap-2 modal-action mt-5">
                    <form method="dialog">
                        <button
                            class="bg-gray-500 text-white px-6 py-2 outline-none focus:outline-none hover:bg-gray-600">Close</button>
                    </form>
                    <button form="addEducationForm" type="submit" class="bg-teal-400 text-white px-6 py-2 outline-none focus:outline-none hover:bg-teal-500">Add</button>
                </div>
            </div>
        </dialog>
    </div>
@endsection
