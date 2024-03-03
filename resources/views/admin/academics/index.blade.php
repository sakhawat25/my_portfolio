@extends('admin.layout.app')

@section('css')
@endsection

@section('script')
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
        <button
            class="bg-teal-400 float-right focus:outline-none hover:bg-teal-500 my-3 outline-none p-2 px-4 text-lg text-white">
            <i class="fa fa-plus"></i>
        </button>
    </div>
@endsection
