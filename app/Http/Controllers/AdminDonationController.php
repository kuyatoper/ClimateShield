<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminDonationController extends Controller
{
    public function index(): View
    {
        $donations = Donation::with('project')
            ->latest()
            ->paginate(15);

        return view('admin.donations.index', compact('donations'));
    }

    public function proof(Donation $donation): StreamedResponse
    {
        abort_unless(
            Storage::disk('local')->exists($donation->proof_path),
            404
        );

        return Storage::disk('local')->download(
            $donation->proof_path,
            'donation-proof-' . $donation->id
        );
    }

    public function approve(Donation $donation): RedirectResponse
    {
        DB::transaction(function () use ($donation) {
            $lockedDonation = Donation::whereKey($donation->id)
                ->lockForUpdate()
                ->firstOrFail();

            if ($lockedDonation->status !== 'pending') {
                abort(409, 'This donation has already been reviewed.');
            }

            $project = $lockedDonation->project()
                ->lockForUpdate()
                ->firstOrFail();

            $project->increment(
                'current_value',
                $lockedDonation->amount
            );

            $lockedDonation->update([
                'status' => 'approved',
                'reviewed_by' => auth()->id(),
                'reviewed_at' => now(),
            ]);
        });

        return redirect()
            ->route('admin.donations.index')
            ->with('success', 'Donation approved and project total updated.');
    }

    public function reject(Donation $donation): RedirectResponse
    {
        request()->validate([
            'admin_note' => ['nullable', 'string', 'max:1000'],
        ]);

        DB::transaction(function () use ($donation) {
            $lockedDonation = Donation::whereKey($donation->id)
                ->lockForUpdate()
                ->firstOrFail();

            if ($lockedDonation->status !== 'pending') {
                abort(409, 'This donation has already been reviewed.');
            }

            $lockedDonation->update([
                'status' => 'rejected',
                'reviewed_by' => auth()->id(),
                'reviewed_at' => now(),
                'admin_note' => request()->input('admin_note'),
            ]);
        });

        return redirect()
            ->route('admin.donations.index')
            ->with('success', 'Donation rejected.');
    }
}
