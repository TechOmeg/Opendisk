<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectFile;
use App\Models\Team;

class ProjectController extends Controller
{
    // show create form
    public function create()
    {
        return view('projects.create');
    }

    // store project
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'language' => 'required',
            'type' => 'required'
        ]);

        $project = Project::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'description' => $request->description,
            'language' => $request->language,
            'type' => $request->type
        ]);

        return redirect()->route('projects.show', $project->id)
            ->with('success', 'Project created successfully!');
    }

    // show project dashboard (editor page)
    public function show($id)
    {
        $project = Project::with('files', 'teams')->findOrFail($id);
        return view('projects.show', compact('project'));
    }
}
