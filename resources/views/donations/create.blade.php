
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fund {{ $project->title }} | ClimateShield</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            padding: 30px 16px;
            background: #f4f7fb;
            color: #172033;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 760px;
            margin: auto;
        }

        .card {
            background: white;
            border: 1px solid #e1e8f0;
            border-radius: 18px;
            padding: 26px;
            margin-bottom: 20px;
            box-shadow: 0 5px 18px rgba(20, 40, 70, .05);
        }

        h1 { margin-top: 0; }
        h2 { font-size: 20px; }

        .muted {
            color: #64748b;
            line-height: 1.6;
        }

        .qr {
            display: block;
            width: 230px;
            max-width: 100%;
            margin: 20px auto;
            border: 1px solid #e1e8f0;
            border-radius: 12px;
        }

        label {
            display: block;
            font-weight: 700;
            margin: 16px 0 7px;
        }

        input {
            display: block;
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 9px;
            font: inherit;
        }

        button, .back {
            display: inline-block;
            border: 0;
            border-radius: 9px;
            padding: 13px 18px;
            background: #08a7e5;
            color: white;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
        }

        button { width: 100%; margin-top: 22px; }

        .error { color: #b91c1c; font-size: 14px; }
        .notice {
            padding: 13px;
            background: #eff6ff;
            border-radius: 10px;
            line-height: 1.6;
        }
    </style>
</head>
<body>
<div class="container">

    <p><a class="back" href="{{ route('projects') }}">← Back to Projects</a></p>

    <section class="card">
        <h1>🌱 Fund This Project</h1>

        <h2>{{ $project->title }}</h2>

        <p class="muted">{{ $project->description }}</p>

        <div class="notice">
            <strong>Current amount raised:</strong>
            ₱{{ number_format((float) $project->current_value, 2) }}

            <br>

            <strong>Funding target:</strong>
            ₱{{ number_format((float) $project->target_value, 2) }}
        </div>
    </section>

    <section class="card">
        <h2>1. Pay using GCash</h2>

        <p class="muted">
            Scan the official ClimateShield payment QR using your
            GCash app. Enter the donation amount on the payment
            screen and confirm the recipient before paying.
        </p>

        <img
            class="qr"
            src="{{ asset('images/gcash-qr.png') }}"
            alt="ClimateShield GCash payment QR code"
        >

        <p class="muted">
            Replace this image with your authorized payment QR.
            Never use a personal QR without the account holder's
            permission.
        </p>
    </section>

    <section class="card">
        <h2>2. Submit your donation details</h2>

        <p class="muted">
            After paying, enter your GCash transaction reference
            and upload a screenshot or image of the receipt.
            Your donation will remain pending until verified.
        </p>

        <form
            action="{{ route('donations.store', $project) }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf

            <label for="donor_name">Full name</label>
            <input
                id="donor_name"
                name="donor_name"
                value="{{ old('donor_name') }}"
                maxlength="100"
                required
            >
            @error('donor_name')
                <p class="error">{{ $message }}</p>
            @enderror

            <label for="donor_email">Email address</label>
            <input
                id="donor_email"
                type="email"
                name="donor_email"
                value="{{ old('donor_email') }}"
                maxlength="150"
                required
            >
            @error('donor_email')
                <p class="error">{{ $message }}</p>
            @enderror

            <label for="donor_phone">Contact number (optional)</label>
            <input
                id="donor_phone"
                name="donor_phone"
                value="{{ old('donor_phone') }}"
                maxlength="30"
            >

            <label for="amount">Donation amount (PHP)</label>
            <input
                id="amount"
                type="number"
                name="amount"
                value="{{ old('amount') }}"
                min="1"
                max="1000000"
                step="0.01"
                required
            >
            @error('amount')
                <p class="error">{{ $message }}</p>
            @enderror

            <label for="reference_number">GCash reference number</label>
            <input
                id="reference_number"
                name="reference_number"
                value="{{ old('reference_number') }}"
                maxlength="100"
                required
            >
            @error('reference_number')
                <p class="error">{{ $message }}</p>
            @enderror

            <label for="proof">Payment receipt (JPG, PNG or WEBP; max 2 MB)</label>
            <input
                id="proof"
                type="file"
                name="proof"
                accept=".jpg,.jpeg,.png,.webp"
                required
            >
            @error('proof')
                <p class="error">{{ $message }}</p>
            @enderror

            <button type="submit">Submit Donation for Verification</button>
        </form>
    </section>
</div>
</body>
</html>
