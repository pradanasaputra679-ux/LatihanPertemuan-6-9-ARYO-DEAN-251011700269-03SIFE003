<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $projects = Project::where('status', 'Published')
            ->latest()
            ->take(6)
            ->get();

        return view('portfolio.home', compact('projects'));
    }

    public function projects()
    {
        $projects = Project::where('status', 'Published')
            ->latest()
            ->paginate(9);

        return view('portfolio.projects', compact('projects'));
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)
            ->where('status', 'Published')
            ->firstOrFail();

        return view('portfolio.detail', compact('project'));
    }
}
