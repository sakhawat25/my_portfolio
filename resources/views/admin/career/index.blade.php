@extends('admin.layout.app')

@section('css')
    <script src="https://cdn.tiny.cloud/1/1qvedc8bwtfg6jqsy6i3g4tbrb6ga00kvjep7zztfu5sxlt8/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        var updateRoute = "{{ route('admin.career.experience.update', ':id') }}";
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <script src="{{ asset('assets/admin/js/career.js') }}"></script>
@endsection

@section('content')
    <!-- Experiences Section -->
    <div class="mb-24">
        <div class="bg-teal-400 inline-block text-center text-white py-3 px-5 mb-5 uppercase"><strong>Experiences</strong>
        </div>
        @forelse ($experiences as $experience)
            <div class="w-full px-3 py-4 bg-white border border-gray-300 shadow-md flex flex-col gap-4 mb-5">
                <div class="flex align-middle justify-between">
                    <strong class="text-xl uppercase md:text-lg">{{ $experience->position }}</strong>
                    <div class="flex gap-3">
                        <button id="editExperienceButton"
                            class="outline-none text-teal-400 hover:text-teal-500 focus:outline-none" title="Edit"
                            data-target-url="{{ route('admin.career.experience.show', $experience->id) }}">
                            <i class="fa fa-pencil"></i>
                        </button>

                        <form action="{{ route('admin.career.experience.delete', $experience->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit"
                                class="outline-none text-red-400 h-full hover:text-red-500 focus:outline-none deleteExperienceButton"
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
                            Organization
                        </label>
                        <div class="border-2 border-teal-400 px-2 py-1">{{ $experience->organization }}</div>
                    </div>
                    <div class="flex align-middle justify-start">
                        <label
                            class="bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out">
                            Start Date
                        </label>
                        <div class="border-2 border-teal-400 px-2 py-1">
                            {{ \Carbon\Carbon::parse($experience->start_date)->format('M Y') }}</div>
                    </div>
                    <div class="flex align-middle justify-start">
                        <label
                            class="bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out">
                            Expiry Date
                        </label>
                        <div class="border-2 border-teal-400 px-2 py-1">
                            {{ !empty($experience->end_date) ? \Carbon\Carbon::parse($experience->end_date)->format('M Y') : 'Currently Working' }}
                        </div>
                    </div>
                </div>

                <div>
                    {!! $experience->description !!}
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

        <button id="addExperienceButton"
            class="bg-teal-400 float-right focus:outline-none hover:bg-teal-500 outline-none p-2 px-4 text-lg text-white mb-5">
            <i class="fa fa-plus"></i>
        </button>
    </div>

    <!-- Skills Section -->
    <div class="mb-24">
        <div class="bg-teal-400 inline-block text-center text-white py-3 px-5 mb-5 uppercase"><strong>Soft Skills</strong>
        </div>
        <div class="w-full px-3 py-4 bg-white border border-gray-300 shadow-md flex flex-col gap-4 mb-5">
            <form action="{{ route('admin.career.skills.update', $user->id) }}" method="post" id="updateSkillsForm">
                @method('PUT')
                @csrf
                <input type="text" name="skills"
                    class="tagify w-full relative m-0 my-2 -ml-0.5 block flex-auto border border-solid border-teal-400 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium outline-none transition duration-200 ease-in-out focus:border-teal-500 focus:text-gray-900 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none"
                    value="{{ old('skills') ?? $user->skills }}" placeholder="PHP, Laravel, CSS" />
            </form>
            <button id="saveSkillsButton" form="updateSkillsForm"
                class="bg-teal-400 focus:outline-none hover:bg-teal-500 outline-none p-2 px-4 self-end text-lg text-white">
                Save
            </button>
        </div>
    </div>

    <!-- Technical Skills Section -->
    <div class="mb-24">
        <div class="bg-teal-400 inline-block text-center text-white py-3 px-5 mb-5 uppercase"><strong>Technical
                Skills</strong>
        </div>
        <div
            class="align-middle bg-white border border-gray-300 flex gap-4 flex-wrap justify-evenly mb-5 px-3 py-4 shadow-md w-full">
            @forelse ($technicalSkills as $technicalSkill)
                <div class="align-middle flex gap-2 items-center justify-between">
                    <form action="{{ route('admin.career.tech-skills.update', $technicalSkill->id) }}" method="POST"
                        class="w-1/2" id="tech-skill-update-form{{ $technicalSkill->id }}">
                        @method('PUT')
                        @csrf
                        <div class="flex flex-col">
                            <div>
                                <ul class="hidden mb-2 normal-case pl-5 text-red-600"
                                    id="errors-list{{ $technicalSkill->id }}">
                                </ul>
                            </div>
                            <div class="align-middle flex gap-2">
                                <input type="text" name="name" id="skill-name{{ $technicalSkill->id }}"
                                    class="border border-teal-400 focus:border-teal-500 focus:outline-none font-normal px-3"
                                    value="{{ $technicalSkill->name }}" disabled />
                                <div class="border border-teal-400 flex">
                                    <input type="text" name="level" id="skill-level{{ $technicalSkill->id }}"
                                        class="border border-teal-400 focus:border-teal-500 focus:outline-none font-normal px-3 w-20"
                                        value="{{ $technicalSkill->level }}" disabled />
                                    <div class="bg-gray-300 font-bold px-2 py-1">%</div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="align-middle flex gap-2 justify-evenly">
                        <button title="Update" data-form-id="tech-skill-update-form{{ $technicalSkill->id }}"
                            data-target-url="{{ route('admin.career.tech-skills.update', $technicalSkill->id) }}"
                            data-name-input-id="skill-name{{ $technicalSkill->id }}"
                            data-level-input-id="skill-level{{ $technicalSkill->id }}"
                            data-errors-list="errors-list{{ $technicalSkill->id }}"
                            class="update-btn bg-green-600 delete-tech-skill-btn focus:outline-none hover:bg-green-700 outline-none p-2 px-4 text-white hidden">
                            <i class="fa fa-check"></i>
                        </button>
                        <button title="Edit" data-name-input-id="skill-name{{ $technicalSkill->id }}"
                            data-level-input-id="skill-level{{ $technicalSkill->id }}"
                            class="bg-yellow-600 delete-tech-skill-btn edit-btn focus:outline-none hover:bg-yellow-800 outline-none p-2 px-4 text-white">
                            <i class="fa fa-pencil"></i>
                        </button>
                        <button title="Cancel" data-name-input-id="skill-name{{ $technicalSkill->id }}"
                            data-level-input-id="skill-level{{ $technicalSkill->id }}"
                            class="cancel-btn bg-yellow-700 delete-tech-skill-btn focus:outline-none hover:bg-yellow-800 outline-none p-2 px-4 text-white hidden">
                            <i class="fa fa-times"></i>
                        </button>

                        <form action="{{ route('admin.career.tech-skills.delete', $technicalSkill->id) }}" method="post"
                            id="technicalSkillDeleteForm{{ $technicalSkill->id }}" class="delete-tech-form">
                            @method('DELETE')
                            @csrf
                            <button form="technicalSkillDeleteForm{{ $technicalSkill->id }}" title="Delete"
                                class="delete-tech-btn bg-red-600 delete-tech-skill-btn focus:outline-none hover:bg-red-700 outline-none p-2 px-4 text-white">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
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
        </div>

        <button id="addTechBtn"
            class="bg-teal-400 float-right focus:outline-none hover:bg-teal-500 outline-none p-2 px-4 text-lg text-white mb-5">
            <i class="fa fa-plus"></i>
        </button>
    </div>

    <!-- Modal to add experience record -->
    <dialog id="addExperienceModal" class="modal w-1/2 md:w-full"
        data-show-modal=@if (session()->has('showAddExperienceModal')) {{ session('showAddExperienceModal') }} @else {{ false }} @endif>
        <div class="modal-box p-6">
            <div class="h6 mb-5 uppercase">Add Experience Record</div>
            <form action="{{ route('admin.career.experience.store') }}" id="addExperienceForm" method="POST">
                @csrf
                <div class="flex flex-col gap-3">
                    @error('position')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror
                    <div class="flex">
                        <label
                            class="w-1/3 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Position&nbsp;*</label>
                        <input type="text" name="position" id="position" value="{{ old('position') }}"
                            class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">
                    </div>

                    @error('organization')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror
                    <div class="flex">
                        <label
                            class="w-1/3 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Organization&nbsp;*</label>
                        <input type="text" name="organization" id="organization" value="{{ old('organization') }}"
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
                        <input type="checkbox" name="currently_working" id="currently_working" value="1">
                        <label for="currently_working">Currently Working</label>
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
                <button form="addExperienceForm" type="submit"
                    class="bg-teal-400 text-white px-6 py-2 outline-none focus:outline-none hover:bg-teal-500">Add</button>
            </div>
        </div>
    </dialog>

    <!-- Modal to edit experience record -->
    <dialog id="editExperienceModal" class="modal w-1/2 md:w-full"
        data-show-modal=@if (session()->has('showEditExperienceModal')) {{ session('showEditExperienceModal') }} @else {{ false }} @endif>
        <div class="modal-box p-6">
            <div class="h6 mb-5 uppercase">Edit Experience Record</div>
            <form id="editExperienceForm" method="POST">
                @method('PUT')
                @csrf
                <div class="flex flex-col gap-3">
                    @error('position')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror
                    <div class="flex">
                        <label
                            class="w-1/3 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Position&nbsp;*</label>
                        <input type="text" name="position" id="edit_position" value="{{ old('position') }}"
                            class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">
                    </div>

                    @error('organization')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror
                    <div class="flex">
                        <label
                            class="w-1/3 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Organization&nbsp;*</label>
                        <input type="text" name="organization" id="edit_organization"
                            value="{{ old('organization') }}"
                            class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">
                    </div>

                    @error('start_date')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror
                    <div class="flex">
                        <label
                            class="w-1/3 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Start
                            Date&nbsp;*</label>
                        <input type="date" name="start_date" id="edit_start_date" value="{{ old('start_date') }}"
                            class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">
                    </div>

                    <div class="flex gap-2">
                        <input type="checkbox" name="currently_working" id="edit_currently_working" value="1">
                        <label for="edit_currently_working">Currently Working</label>
                    </div>

                    @error('end_date')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror
                    <div class="flex" id="edit_end_date_wrapper">
                        <label
                            class="w-1/3 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">End
                            Date</label>
                        <input type="date" name="end_date" id="edit_end_date" value="{{ old('end_date') }}"
                            class="border border-teal-400 outline-none w-full bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">
                    </div>

                    @error('sort')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror
                    <div class="flex">
                        <label
                            class="w-1/3 bg-teal-400 inline-block rounded-none px-6 py-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-primary-600 md:w-1/2">Sort</label>
                        <input type="number" name="sort" id="edit_sort" value="{{ old('sort') }}"
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
                <button form="editExperienceForm" type="submit"
                    class="bg-teal-400 text-white px-6 py-2 outline-none focus:outline-none hover:bg-teal-500">Update</button>
            </div>
        </div>
    </dialog>

    <!-- Modal to add technical skill record -->
    <dialog id="addTechModal" class="modal w-1/2 md:w-full"
        data-show-modal=@if (session()->has('showAddTechModal')) {{ session('showAddTechModal') }} @else {{ false }} @endif>
        <div class="modal-box p-6">
            <div class="h6 mb-5 uppercase">Add Technical Skill</div>
            <form action="{{ route('admin.career.tech-skills.store') }}" id="addTechSkillForm" method="POST">
                @csrf
                <div class="flex flex-col gap-3">
                    @error('name')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror
                    <div class="flex">
                        <label
                            class="bg-teal-400 duration-150 ease-in-out font-medium hover:border-primary-600 inline-block leading-normal px-6 py-2 rounded-none text-white text-xs transition uppercase">Name&nbsp;*</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="border border-teal-400 outline-none bg-transparent px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-gray-800 text-sm font-medium transition duration-200 ease-in-out focus:outline-none focus:border-teal-500 focus-text-gray-900">
                    </div>

                    @error('level')
                        <div class="normal-case text-red-500 text-sm font-medium mt-3">{{ $message }}</div>
                    @enderror
                    <div class="flex">
                        <label
                            class="bg-teal-400 duration-150 ease-in-out font-medium hover:border-primary-600 inline-block leading-normal px-6 py-2 rounded-none text-white text-xs transition uppercase">Level&nbsp;&nbsp;&nbsp;</label>
                        <input type="text" name="level"
                            class="border border-teal-400 focus:border-teal-500 focus:outline-none font-normal px-3 w-20"
                            value="{{ old('level') }}" />
                        <div class="bg-gray-300 border border-gray-500 font-bold px-2 py-1">%</div>
                    </div>
                </div>
            </form>
            <div class="flex gap-2 modal-action mt-5">
                <form method="dialog">
                    <button
                        class="bg-gray-500 text-white px-6 py-2 outline-none focus:outline-none hover:bg-gray-600">Close</button>
                </form>
                <button form="addTechSkillForm" type="submit"
                    class="bg-teal-400 text-white px-6 py-2 outline-none focus:outline-none hover:bg-teal-500">Add</button>
            </div>
        </div>
    </dialog>
    </div>
@endsection
