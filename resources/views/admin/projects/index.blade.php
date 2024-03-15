@extends('admin.layout.app')

@section('css')
    <style>
        /* CHECKBOX TOGGLE SWITCH */
        /* @apply rules for documentation, these do not work as inline style */
        .toggle-checkbox:checked {
            @apply: right-0 border-green-400;
            right: 0;
            border-color: #68D391;
        }

        .toggle-checkbox:checked+.toggle-label {
            @apply: bg-green-400;
            background-color: #68D391;
        }
    </style>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('assets/admin/js/projects.js') }}"></script>
@endsection

@section('content')
    <div class="flex flex-col">
        <div class="flex justify-between py-2 align-middle">
            <a href="{{ route('projects.create') }}" class="bg-teal-400 hover:bg-teal-500 px-3 py-2 text-white">
                <i class="fa fa-plus text-lg"></i>
            </a>
            <form action="{{ route('projects.index') }}" class="flex" method="GET">
                @csrf
                <input type="text" name="search" id="search"
                    class="bg-gray-300 focus:outline-none font-normal px-5 rounded-l-full text-center text-gray-600"
                    placeholder="Search here">
                <button class="bg-teal-400 hover:bg-teal-500 px-5 text-white">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="font font-light min-w-full text-center text-sm text-surface">
                        <thead class="bg-teal-400 border-b border-teal-500 text-white">
                            <tr>
                                <th scope="col" class=" px-6 py-4">Title</th>
                                <th scope="col" class=" px-6 py-4">Organization</th>
                                <th scope="col" class=" px-6 py-4">Image</th>
                                <th scope="col" class=" px-6 py-4">Category</th>
                                <th scope="col" class=" px-6 py-4">Sort</th>
                                <th scope="col" class=" px-6 py-4">Status</th>
                                <th scope="col" class=" px-6 py-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($projects as $project)
                                <tr class="border-b hover:bg-gray-200">
                                    <td class="whitespace-nowrap  px-6 py-4">{{ $project->title }}</td>
                                    <td class="whitespace-nowrap  px-6 py-4">{{ $project->organization }}</td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <img src="{{ asset('images/' . $project->image) }}" alt="No image"
                                            class="h-16 object-contain w-full">
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">{{ $project->category }}</td>
                                    <td class="whitespace-nowrap  px-6 py-4">{{ $project->sort }}</td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div
                                            class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in">
                                            <input type="checkbox" name="toggle" id="toggle"
                                                class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" />
                                            <label for="toggle"
                                                class="bg-gray-400 block cursor-pointer h-6 overflow-hidden rounded-full toggle-label"></label>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="align-middle flex gap-2 justify-center">
                                            <a href="{{ route('projects.show', $project->id) }}" title="show">
                                                <i class="fa-eye fa px-1 text-lg text-teal-400 hover:text-teal-500"></i>
                                            </a>
                                            <a href="{{ route('projects.edit', $project->id) }}" title="edit">
                                                <i class="fa-pencil fa px-1 text-lg text-blue-400 hover:text-blue-500"></i>
                                            </a>
                                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" title="Delete">
                                                    <i class="fa-trash fa text-lg text-red-500 hover:text-red-600"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr class="border-b">
                                    <td class="whitespace-nowrap  px-6 py-4 font-medium">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <td class="whitespace-nowrap  px-6 py-4 font-medium">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <td class="whitespace-nowrap  px-6 py-4 font-medium">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <td class="whitespace-nowrap  px-6 py-4 font-medium">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <td class="whitespace-nowrap  px-6 py-4 font-medium">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <td class="whitespace-nowrap  px-6 py-4 font-medium">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <td class="whitespace-nowrap  px-6 py-4 font-medium">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <td class="whitespace-nowrap  px-6 py-4 font-medium">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <td class="whitespace-nowrap  px-6 py-4 font-medium">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <td class="whitespace-nowrap  px-6 py-4 font-medium">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <td class="whitespace-nowrap  px-6 py-4 font-medium">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div class="bg-gray-300 h-2 rounded-full w-full"></div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="my-4">
        @if ($projects)
            <div class="flex justify-end">
                {!! $projects->appends(Request::all())->links() !!}
            </div>
        @endif
    </div>
    </div>
@endsection
