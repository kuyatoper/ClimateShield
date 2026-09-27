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

        return view('project', compact('projects'));
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