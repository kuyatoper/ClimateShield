<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DonationController extends Controller
{
    public function create(Project $project): View
    {
        return view('donations.create', compact('project'));
    }

    public function store(Request $request, Project $project): RedirectResponse
    {
        $validated = $request->validate([
            'donor_name' => ['required', 'string', 'max:100'],
            'donor_email' => ['required', 'email', 'max:150'],
            'donor_phone' => ['nullable', 'string', 'max:30'],
            'amount' => ['required', 'numeric', 'min:1', 'max:1000000'],
            'reference_number' => ['required', 'string', 'max:100'],
            'proof' => ['required', 'file', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $proofPath = $request->file('proof')->store('donation-proofs', 'local');

        Donation::create([
            'project_id' => $project->id,
            'donor_name' => $validated['donor_name'],
            'donor_email' => $validated['donor_email'],
            'donor_phone' => $validated['donor_phone'] ?? null,
            'amount' => $validated['amount'],
            'reference_number' => $validated['reference_number'],
            'proof_path' => $proofPath,
            'status' => 'pending',
        ]);

        return redirect()
            ->route('projects')
            ->with('success', 'Your donation was submitted and is awaiting payment verification.');
    }
}