<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        $projects = Project::orderBy('id')->get();
        return view('project.index', compact('projects'));
    }

    function show(Project $project)
    {
        return view('project.show', compact('project'));
    }
    function edit(Project $project)
    {
        return view('project.edit', compact('project'));
    }
    function update(Project $project)
    {
        $project->update($this->validateRequest());
        return redirect('/admin/projects/'. $project->id);
    }

    function store()
    {
        Project::create($this->validateRequest());
        return back();
    }
    function destroy(Project $project)
    {
        $project->delete();
        return redirect('admin/projects')->with('message', 'Project '.$project->title.' deleted');
    }
    private function validateRequest()
    {
        return request()->validate([
            'title' => 'required',
            'information' => 'required',
        ]);
    }

}
