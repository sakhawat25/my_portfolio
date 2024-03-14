<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;

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
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
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
