<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request('search');

        $projects = $this->getProjects($search);

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $validatedData = $request->validated();

        // Extract tags if present
        if ($validatedData['tags']) {
            $tags = json_decode($request->tags);
            $tagsArray = [];

            foreach ($tags as $tag) {
                array_push($tagsArray, $tag->value);
            }
            $tags = join(', ', $tagsArray);

            $validatedData['tags'] = $tags;
        }

        // Upload image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.date('d-m-Y').'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $validatedData['image'] = $imageName;
        }

        // Create slug
        $slug = Str::slug($validatedData['title']);
        $validatedData['slug'] = $slug;

        Project::create($validatedData);

        return redirect()->route('projects.index')->with('message', 'Record added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
    }

    private function getProjects($search = null)
    {
        $query = Project::select(
            'id',
            'title',
            'organization',
            'image',
            'category',
            'sort',
            'status',
        )
            ->orderBy('sort', 'ASC');

        if ($search) {
            $query->where('title', 'like', '%'.$search.'%')
                ->orWhere('organization', 'like', '%'.$search.'%')
                ->orWhere('category', 'like', '%'.$search.'%');
        }

        $projects = $query->paginate(10);

        return $projects;
    }
}
