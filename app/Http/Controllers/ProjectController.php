<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\File;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('index', compact('projects'));
    }

    public function store(Request $request)
    {
        $project = Project::create([
            'name' => $request->name
        ]);

        $project->files()->create([
            'name' => 'index.html',
            'content' => '<h1>Hello World</h1>'
        ]);

        return redirect('/');
    }

    public function open($id)
    {
        $project = Project::with('files')->findOrFail($id);
        return view('editor', compact('project'));
    }

    public function save(Request $request)
    {
        $file = File::find($request->file_id);
        $file->content = $request->content;
        $file->save();

        return response()->json(['ok' => true]);
    }
}