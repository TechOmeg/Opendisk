<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $projects = Project::where('user_id', Auth::id())->latest()->get();

        $totalProjects = $projects->count();

        $webProjects = $projects->where('type', 'Web')->count();

        $mobileProjects = $projects->where('type', 'Mobile')->count();

        $pythonProjects = $projects->where('language', 'Python')->count();

        return view('dashboard.index', compact(
            'projects',
            'totalProjects',
            'webProjects',
            'mobileProjects',
            'pythonProjects'
        ));
    }
}