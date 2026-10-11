<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::latest()->get();

        return view('admin.projects.index', compact('projects'));
    }

    public function create(): View
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
    'title' => ['required', 'string', 'max:255'],
    'description' => ['required', 'string'],
    'category' => ['required', 'string', 'max:255'],
    'status' => ['required', 'string', 'max:255'],

    'start_date' => ['nullable', 'date'],
    'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],

    'current_value' => ['required', 'numeric', 'min:0'],
    'target_value' => ['required', 'numeric', 'min:0'],
    'unit' => ['required', 'string', 'max:255'],
    ]);

    if (
    $validated['target_value'] > 0 &&
    $validated['current_value'] >= $validated['target_value']
    ) {
    $validated['status'] = 'Completed';
    }

        Project::create($validated);

        return redirect()
    ->route('projects.index')
    ->with('success', 'Project created successfully.');
    }

    public function edit(Project $project): View
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
    'title' => ['required', 'string', 'max:255'],
    'description' => ['required', 'string'],
    'category' => ['required', 'string', 'max:255'],
    'status' => ['required', 'string', 'max:255'],

    'start_date' => ['nullable', 'date'],
    'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],

    'current_value' => ['required', 'numeric', 'min:0'],
    'target_value' => ['required', 'numeric', 'min:0'],
    'unit' => ['required', 'string', 'max:255'],
    ]);

    if (
    $validated['target_value'] > 0 &&
    $validated['current_value'] >= $validated['target_value']
) {
    $validated['status'] = 'Completed';
}

        $project->update($validated);

        return redirect()
    ->route('projects.index')
    ->with('success', 'Project deleted successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()
    ->route('projects.index')
    ->with('success', 'Project deleted successfully.');
    }
}