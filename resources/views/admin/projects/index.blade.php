@extends('admin.layout.app')

@section('css')
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('assets/admin/js/projects.js') }}"></script>
    @livewireScripts
@endsection

@section('content')
    <div class="mt-6 card col-span-2 xl:col-span-1 shadow-lg">
        <table class="table-auto w-full text-left">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-r">Description</th>
                    <th class="px-4 py-2 border-r text-center">Action</th>
                    <th class="px-4 py-2">date</th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                <tr class="hover:bg-gray-300">
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
    </div>
@endsection
