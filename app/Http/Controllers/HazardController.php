<?php

namespace App\Http\Controllers;

use App\Models\Hazard;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HazardController extends Controller
{
    public function index(): View
    {
        $hazards = Hazard::latest()->get();

        return view('admin.hazards.index', compact('hazards'));
    }

    public function create(): View
    {
        return view('admin.hazards.create');
    }

    public function store(Request $request): RedirectResponse
{
    $validated = $request->validate([
        'title' => ['required', 'string', 'max:255'],
        'type' => ['required', 'string', 'max:255'],
        'description' => ['required', 'string'],
        'location' => ['required', 'string', 'max:255'],
        'latitude' => ['required', 'numeric', 'between:-90,90'],
        'longitude' => ['required', 'numeric', 'between:-180,180'],
        'severity' => ['required', 'in:low,moderate,high,critical'],
        'status' => ['required', 'in:active,resolved'],
    ]);

    Hazard::create($validated);

    return redirect()
        ->route('hazards.index')
        ->with('success', 'Hazard created successfully.');
    }

    public function show(Hazard $hazard): View
    {
        return view('admin.hazards.show', compact('hazard'));
    }

    public function edit(Hazard $hazard): View
    {
        return view('admin.hazards.edit', compact('hazard'));
    }

    public function update(Request $request, Hazard $hazard): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'location' => ['required', 'string', 'max:255'],
            'severity' => ['required', 'in:low,moderate,high,critical'],
            'status' => ['required', 'in:active,resolved'],
        ]);

        $hazard->update($validated);

        return redirect()
            ->route('hazards.index')
            ->with('success', 'Hazard updated successfully.');
    }

    public function destroy(Hazard $hazard): RedirectResponse
    {
        $hazard->delete();

        return redirect()
            ->route('hazards.index')
            ->with('success', 'Hazard deleted successfully.');
    }

    public function report(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'type' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

        Hazard::create([
            'title' => ucfirst($validated['type']) . ' Report',
            'type' => $validated['type'],
            'description' => $validated['description'],
            'location' => $validated['location'],
            'severity' => 'moderate',
            'status' => 'resolved',
        ]);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Hazard report submitted successfully.');
    }
}