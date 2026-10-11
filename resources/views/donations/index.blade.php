
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Verification | ClimateShield</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            padding: 28px 16px;
            background: #f4f7fb;
            color: #172033;
            font-family: Arial, sans-serif;
        }

        .container { max-width: 1200px; margin: auto; }

        .panel {
            background: white;
            border: 1px solid #e1e8f0;
            border-radius: 16px;
            padding: 22px;
            margin-bottom: 20px;
            overflow-x: auto;
        }

        h1 { margin-top: 0; }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px;
        }

        th, td {
            padding: 13px 10px;
            text-align: left;
            border-bottom: 1px solid #e5eaf1;
            vertical-align: top;
        }

        th { color: #64748b; font-size: 13px; }

        .status {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 20px;
            background: #fff7ed;
            color: #c2410c;
            font-size: 12px;
            font-weight: 700;
        }

        .approved { background: #dcfce7; color: #166534; }
        .rejected { background: #fee2e2; color: #991b1b; }

        .btn {
            display: inline-block;
            padding: 9px 12px;
            border: 0;
            border-radius: 7px;
            color: white;
            text-decoration: none;
            cursor: pointer;
            font-weight: 700;
            margin: 3px 0;
        }

        .blue { background: #079fe0; }
        .green { background: #059669; }
        .red { background: #dc2626; }

        textarea {
            width: 170px;
            padding: 8px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
        }

        .notice {
            padding: 12px;
            border-radius: 9px;
            background: #ecfdf5;
            margin-bottom: 15px;
        }

        .muted { color: #64748b; }
    </style>
</head>
<body>
<div class="container">

    <section class="panel">
        <h1>Donation Verification</h1>
        <p class="muted">
            Review the payment reference and verify the actual
            transaction in the authorized receiving GCash account
            before approving a donation.
        </p>

        @if (session('success'))
            <div class="notice">{{ session('success') }}</div>
        @endif
    </section>

    <section class="panel">
        <table>
            <thead>
            <tr>
                <th>Donor</th>
                <th>Project</th>
                <th>Amount</th>
                <th>Payment Reference</th>
                <th>Proof</th>
                <th>Status</th>
                <th>Review</th>
            </tr>
            </thead>

            <tbody>
            @forelse ($donations as $donation)
                <tr>
                    <td>
                        <strong>{{ $donation->donor_name }}</strong>
                        <br>
                        {{ $donation->donor_email }}
                        @if ($donation->donor_phone)
                            <br>{{ $donation->donor_phone }}
                        @endif
                    </td>

                    <td>
                        {{ $donation->project?->title ?? 'Project deleted' }}
                    </td>

                    <td>
                        ₱{{ number_format((float) $donation->amount, 2) }}
                    </td>

                    <td>{{ $donation->reference_number }}</td>

                    <td>
                        <a
                            class="btn blue"
                            href="{{ route('admin.donations.proof', $donation) }}"
                        >
                            View Receipt
                        </a>
                    </td>

                    <td>
                        <span class="status {{ $donation->status }}">
                            {{ ucfirst($donation->status) }}
                        </span>

                        @if ($donation->admin_note)
                            <p class="muted">{{ $donation->admin_note }}</p>
                        @endif
                    </td>

                    <td>
                        @if ($donation->status === 'pending')
                            <form
                                method="POST"
                                action="{{ route('admin.donations.approve', $donation) }}"
                                onsubmit="return confirm('Confirm that you verified this payment in the receiving account?');"
                            >
                                @csrf
                                <button class="btn green" type="submit">
                                    Approve
                                </button>
                            </form>

                            <form
                                method="POST"
                                action="{{ route('admin.donations.reject', $donation) }}"
                                onsubmit="return confirm('Reject this donation submission?');"
                            >
                                @csrf

                                <textarea
                                    name="admin_note"
                                    maxlength="1000"
                                    placeholder="Reason (optional)"
                                ></textarea>

                                <button class="btn red" type="submit">
                                    Reject
                                </button>
                            </form>
                        @else
                            <span class="muted">Already reviewed</span>
                            @if ($donation->reviewed_at)
                                <br>
                                <small>
                                    {{ $donation->reviewed_at->format('M d, Y h:i A') }}
                                </small>
                            @endif
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No donations have been submitted yet.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div style="margin-top: 20px">
            {{ $donations->links() }}
        </div>
    </section>

</div>
</body>
</html>
