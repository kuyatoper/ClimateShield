<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
{
    $projects = Project::latest()->get();

    $upcomingProjects = $projects->filter(function ($project) {
        return $project->start_date
            && $project->start_date->isFuture();
    });

    $ongoingProjects = $projects->filter(function ($project) {
        return $project->start_date
            && $project->start_date->isPast()
            && (
                !$project->end_date ||
                $project->end_date->isFuture()
            )
            && strtolower(trim($project->status)) !== 'completed';
    });

    $completedProjects = $projects->filter(function ($project) {
    return strtolower(trim($project->status)) === 'completed'
        || (
            $project->target_value > 0 &&
            $project->current_value >= $project->target_value
        )
        || (
            $project->end_date &&
            $project->end_date->isPast()
        );
    });

    return view('project', compact(
        'projects',
        'upcomingProjects',
        'ongoingProjects',
        'completedProjects'
    ));
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'category' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
            'current_value' => ['required', 'numeric', 'min:0'],
            'target_value' => ['required', 'numeric', 'min:0'],
            'unit' => ['required', 'string', 'max:255'],
        ]);

        Project::create($validated);

        return redirect()
            ->route('projects')
            ->with('success', 'Project created successfully.');
    }
}