@extends('admin.layout.app')

@section('script')
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script src="{{ asset('assets/admin/js/dashboard.js') }}"></script>
@endsection

@section('content')
    <div class="grid grid-cols-2 gap-6 xl:grid-cols-1">
        <!-- update section -->
        <div class="card bg-teal-400 border-teal-400 shadow-md text-white">
            <div class="card-body flex flex-row">
                <!-- image -->
                <div class="img-wrapper w-40 h-40 flex justify-center items-center">
                    <img src="{{ asset('images/' . $user->image) }}" alt="Profile image" />
                </div>
                <!-- end image -->

                <!-- info -->
                <div class="py-2 ml-10">
                    <h1 class="h6">{{ $user->first_name }} {{ $user->last_name }}</h1>
                    <p class="text-white text-xs">
                        <span id="title" data-typed-items="{{ $user->titles }}"></span>
                    </p>

                    <p class="text-white tex-xs mt-4">
                        {{ Str::limit($user->introduction, 100, '...') }}
                    </p>
                </div>
                <!-- end info -->
            </div>
        </div>
        <!-- end update section -->

        <div class="flex flex-col">
            <div class="grid grid-cols-2 gap-6 h-full">
                <div
                    class="card flex justify-evenly items-center transition duration-500 ease-in-out shadow-lg transform hover:-translate-y-1 hover:scale-105">
                    <div class="h1 text-indigo-700 flex items-center justify-center size-14">
                        <i class="fad fa-code"></i>
                    </div>
                    <div class="flex flex-col items-center justify-evenly">
                        <h5 class="h3 mt-4 mb-2"><span class="counter-value" data-target="236.18">05</span></h5>
                        <p class="text-slate-500 dark:text-zink-200">Skills</p>
                    </div>
                </div>

                <div
                    class="card flex justify-evenly items-center transition duration-500 ease-in-out shadow-lg transform hover:-translate-y-1 hover:scale-105">
                    <div class="h1 text-red-700 flex items-center justify-center size-14">
                        <i class="fad fa-sitemap"></i>
                    </div>
                    <div class="flex flex-col items-center justify-evenly">
                        <h5 class="h3 mt-4 mb-2"><span class="counter-value" data-target="236.18">05</span></h5>
                        <p class="text-slate-500 dark:text-zink-200">Projects</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6 card col-span-2 xl:col-span-1 shadow-lg">
        <div class="flex justify-between card-header">
            <span>Recent Activities</span>
            <a href="#"
                class="bg-teal-400 hover:bg-teal-500 text-white text-sm font-semibold me-2 px-3 py-1 rounded inline-flex items-center justify-center">
                view All
            </a>
        </div>

        <table class="table-auto w-full text-left">
            <thead>
                <tr>
                    <th class="px-2 py-2 border-r"></th>
                    <th class="px-4 py-2 border-r">Description</th>
                    <th class="px-4 py-2 border-r text-center">Action</th>
                    <th class="px-4 py-2">date</th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                <tr class="hover:bg-gray-300">
                    <td class="text-center border border-l-0 px-2 py-2">
                        <i class="fad fa-circle"></i>
                    </td>
                    <td class="border border-l-0 px-4 py-2">
                        Added one experience record
                    </td>
                    <td class="border border-l-0 px-4 py-2 text-center">
                        <a href="#"
                            class="bg-teal-400 hover:bg-teal-500 text-white text-sm font-semibold me-2 px-3 py-1 rounded inline-flex items-center justify-center">
                            view
                        </a>
                    </td>
                    <td class="border border-l-0 border-r-0 px-4 py-2">
                        <span class="num-2"></span> minutes ago
                    </td>
                </tr>
                <tr class="hover:bg-gray-300">
                    <td class="text-center border border-l-0 px-2 py-2">
                        <i class="fad fa-circle"></i>
                    </td>
                    <td class="border border-l-0 px-4 py-2">
                        Added one experience record
                    </td>
                    <td class="border border-l-0 px-4 py-2 text-center">
                        <a href="#"
                            class="bg-teal-400 hover:bg-teal-500 text-white text-sm font-semibold me-2 px-3 py-1 rounded inline-flex items-center justify-center">
                            view
                        </a>
                    </td>
                    <td class="border border-l-0 border-r-0 px-4 py-2">
                        <span class="num-2"></span> minutes ago
                    </td>
                </tr>
                <tr class="hover:bg-gray-300">
                    <td class="text-center border border-l-0 px-2 py-2">
                        <i class="fad fa-circle"></i>
                    </td>
                    <td class="border border-l-0 px-4 py-2">
                        Added one experience record
                    </td>
                    <td class="border border-l-0 px-4 py-2 text-center">
                        <a href="#"
                            class="bg-teal-400 hover:bg-teal-500 text-white text-sm font-semibold me-2 px-3 py-1 rounded inline-flex items-center justify-center">
                            view
                        </a>
                    </td>
                    <td class="border border-l-0 border-r-0 px-4 py-2">
                        <span class="num-2"></span> minutes ago
                    </td>
                </tr>
                <tr class="hover:bg-gray-300">
                    <td class="text-center border border-l-0 px-2 py-2">
                        <i class="fad fa-circle"></i>
                    </td>
                    <td class="border border-l-0 px-4 py-2">
                        Added one experience record
                    </td>
                    <td class="border border-l-0 px-4 py-2 text-center">
                        <a href="#"
                            class="bg-teal-400 hover:bg-teal-500 text-white text-sm font-semibold me-2 px-3 py-1 rounded inline-flex items-center justify-center">
                            view
                        </a>
                    </td>
                    <td class="border border-l-0 border-r-0 px-4 py-2">
                        <span class="num-2"></span> minutes ago
                    </td>
                </tr>
                <tr class="hover:bg-gray-300">
                    <td class="text-center border border-l-0 px-2 py-2">
                        <i class="fad fa-circle"></i>
                    </td>
                    <td class="border border-l-0 px-4 py-2">
                        Added one experience record
                    </td>
                    <td class="border border-l-0 px-4 py-2 text-center">
                        <a href="#"
                            class="bg-teal-400 hover:bg-teal-500 text-white text-sm font-semibold me-2 px-3 py-1 rounded inline-flex items-center justify-center">
                            view
                        </a>
                    </td>
                    <td class="border border-l-0 border-r-0 px-4 py-2">
                        <span class="num-2"></span> minutes ago
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mt-6 card col-span-2 xl:col-span-1 shadow-lg">
        <div class="flex justify-between card-header">
            <span>Recent Messages</span>
            <a href="#"
                class="bg-teal-400 hover:bg-teal-500 text-white text-sm font-semibold me-2 px-3 py-1 rounded inline-flex items-center justify-center">
                view All
            </a>
        </div>


        <table class="table-auto w-full text-left">
            <thead>
                <tr>
                    <th class="border-r px-2 py-2"></th>
                    <th class="px-4 py-2 border-r">Sender</th>
                    <th class="px-4 py-2 border-r">Subject</th>
                    <th class="px-4 py-2 border-r text-center">Replied</th>
                    <th class="px-4 py-2 border-r text-center">Action</th>
                    <th class="px-4 py-2">date</th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                <tr class="hover:bg-gray-300">
                    <td class="border border-l-0 text-center px-2 py-2">
                        <i class="fad fa-circle"></i>
                    </td>
                    <td class="border border-l-0 px-4 py-2">
                        John Doe
                    </td>
                    <td class="border border-l-0 px-4 py-2">
                        This is a Subject from John Doe..
                    </td>
                    <td class="border border-l-0 px-4 py-2 text-center text-indigo-700">
                        <i class="fad fa-check"></i>
                    </td>
                    <td class="border border-l-0 px-4 py-2 text-center">
                        <a href="#"
                            class="bg-teal-400 hover:bg-teal-500 text-white text-sm font-semibold me-2 px-3 py-1 rounded inline-flex items-center justify-center">
                            view
                        </a>
                        <a href="#"
                            class="bg-teal-400 hover:bg-teal-500 text-white text-sm font-semibold me-2 px-3 py-1 rounded inline-flex items-center justify-center">
                            reply
                        </a>
                    </td>
                    <td class="border border-l-0 border-r-0 px-4 py-2">
                        <span class="num-2"></span> minutes ago
                    </td>
                </tr>
                <tr class="hover:bg-gray-300">
                    <td class="border border-l-0 text-center px-2 py-2">
                        <i class="fad fa-circle"></i>
                    </td>
                    <td class="border border-l-0 px-4 py-2">
                        John Doe
                    </td>
                    <td class="border border-l-0 px-4 py-2">
                        This is a Subject from John Doe..
                    </td>
                    <td class="border border-l-0 px-4 py-2 text-center text-indigo-700">
                        <i class="fad fa-check"></i>
                    </td>
                    <td class="border border-l-0 px-4 py-2 text-center">
                        <a href="#"
                            class="bg-teal-400 hover:bg-teal-500 text-white text-sm font-semibold me-2 px-3 py-1 rounded inline-flex items-center justify-center">
                            view
                        </a>
                        <a href="#"
                            class="bg-teal-400 hover:bg-teal-500 text-white text-sm font-semibold me-2 px-3 py-1 rounded inline-flex items-center justify-center">
                            reply
                        </a>
                    </td>
                    <td class="border border-l-0 border-r-0 px-4 py-2">
                        <span class="num-2"></span> minutes ago
                    </td>
                </tr>
                <tr class="hover:bg-gray-300">
                    <td class="border border-l-0 text-center px-2 py-2">
                        <i class="fad fa-circle"></i>
                    </td>
                    <td class="border border-l-0 px-4 py-2">
                        John Doe
                    </td>
                    <td class="border border-l-0 px-4 py-2">
                        This is a Subject from John Doe..
                    </td>
                    <td class="border border-l-0 px-4 py-2 text-center text-indigo-700">
                        <i class="fad fa-check"></i>
                    </td>
                    <td class="border border-l-0 px-4 py-2 text-center">
                        <a href="#"
                            class="bg-teal-400 hover:bg-teal-500 text-white text-sm font-semibold me-2 px-3 py-1 rounded inline-flex items-center justify-center">
                            view
                        </a>
                        <a href="#"
                            class="bg-teal-400 hover:bg-teal-500 text-white text-sm font-semibold me-2 px-3 py-1 rounded inline-flex items-center justify-center">
                            reply
                        </a>
                    </td>
                    <td class="border border-l-0 border-r-0 px-4 py-2">
                        <span class="num-2"></span> minutes ago
                    </td>
                </tr>
                <tr class="hover:bg-gray-300">
                    <td class="border border-l-0 text-center px-2 py-2">
                        <i class="fad fa-circle"></i>
                    </td>
                    <td class="border border-l-0 px-4 py-2">
                        John Doe
                    </td>
                    <td class="border border-l-0 px-4 py-2">
                        This is a Subject from John Doe..
                    </td>
                    <td class="border border-l-0 px-4 py-2 text-center text-indigo-700">
                        <i class="fad fa-check"></i>
                    </td>
                    <td class="border border-l-0 px-4 py-2 text-center">
                        <a href="#"
                            class="bg-teal-400 hover:bg-teal-500 text-white text-sm font-semibold me-2 px-3 py-1 rounded inline-flex items-center justify-center">
                            view
                        </a>
                        <a href="#"
                            class="bg-teal-400 hover:bg-teal-500 text-white text-sm font-semibold me-2 px-3 py-1 rounded inline-flex items-center justify-center">
                            reply
                        </a>
                    </td>
                    <td class="border border-l-0 border-r-0 px-4 py-2">
                        <span class="num-2"></span> minutes ago
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
@endsection
