<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projects = Project::orderBy('id')->get();
        return view('home.index', compact('projects'));
    }
    function show(Project $project)
    {
        return view('home.show', compact('project'));
    }
}
