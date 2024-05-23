<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.projects.index', ['projects' => Project::orderByDesc('id')->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $validated = $request->validated();

        $slug = Str::slug($request->title, '-');

        $validated['slug'] = $slug;

        //dd($validated);


        $preview_path = Storage::put('previews', $validated['preview']);

        $validated['preview'] = $preview_path;

        //dd($validated);

        $project = Project::create($validated);

        return to_route('admin.projects.index')->with('message', "Project '$project->title' created successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $validated = $request->validated();

        $slug = Str::slug($request->title, '-');
        $validated['slug'] = $slug;
        //dd($validated);
        if ($request->has('preview')) {

            if ($project->preview) {
                Storage::delete($project->preview);
            }

            $preview_path = Storage::put('previews', $validated['preview']);
            $validated['preview'] = $preview_path;
        }




        $project->update($validated);

        return to_route('admin.projects.show', compact('project'))->with('message', "Project '$project->title' updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->preview) {
            Storage::delete($project->preview);
        }

        $project->delete();

        return to_route('admin.projects.index')->with('message', "Project '$project->title' deleted successfully!");
    }
}
