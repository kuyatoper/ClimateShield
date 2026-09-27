<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ClimateShield — Add Hazard</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-body: #F8F9FA;
            --bg-card: #FFFFFF;
            --bg-subtle: #F1F5F9;
            --border-color: #E2E8F0;

            --text-main: #0F172A;
            --text-muted: #64748B;

            --primary-blue: #0EA5E9;
            --primary-hover: #0284C7;

            --danger-red: #EF4444;
            --danger-bg: #FEF2F2;

            --warning-amber: #F59E0B;
            --success-green: #10B981;
            --success-bg: #ECFDF5;

            --radius-md: 12px;
            --radius-lg: 18px;
            --radius-pill: 9999px;

            --shadow-sm: 0 1px 3px rgba(15, 23, 42, 0.05);
            --shadow-md: 0 8px 20px rgba(14, 165, 233, 0.18);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background:
                radial-gradient(circle at 8% 8%, rgba(14, 165, 233, 0.12), transparent 28%),
                radial-gradient(circle at 92% 32%, rgba(16, 185, 129, 0.1), transparent 24%),
                linear-gradient(135deg, #f8fafc 0%, #eef6f7 100%);
            color: var(--text-main);
            min-height: 100vh;
        }

        header {
            background: rgba(255, 255, 255, 0.92);
            border-bottom: 1px solid var(--border-color);
            padding: 14px 20px;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            font-size: 1.2rem;
            font-weight: 800;
        }

        .brand span {
            color: var(--primary-blue);
        }

        .back-link {
            text-decoration: none;
            color: var(--text-muted);
            font-size: 0.8rem;
            font-weight: 700;
        }

        .back-link:hover {
            color: var(--primary-blue);
        }

        main {
            max-width: 750px;
            margin: 0 auto;
            padding: 30px 20px 60px;
        }

        .page-title {
            font-size: 1.6rem;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .page-subtitle {
            color: var(--text-muted);
            font-size: 0.85rem;
            margin-bottom: 24px;
        }

        .form-card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            padding: 22px;
            box-shadow: var(--shadow-sm);
        }

        .form-group {
            margin-bottom: 17px;
        }

        label {
            display: block;
            font-size: 0.72rem;
            font-weight: 800;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-bottom: 6px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 11px 13px;
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            background: var(--bg-subtle);
            color: var(--text-main);
            font-family: inherit;
            font-size: 0.85rem;
            outline: none;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.12);
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .error-box {
            background: var(--danger-bg);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: var(--danger-red);
            border-radius: var(--radius-md);
            padding: 12px 14px;
            margin-bottom: 20px;
            font-size: 0.8rem;
        }

        .error-box ul {
            margin-left: 18px;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 22px;
        }

        .btn {
            border: none;
            border-radius: var(--radius-pill);
            padding: 11px 18px;
            font-family: inherit;
            font-size: 0.8rem;
            font-weight: 800;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            justify-content: center;
            align-items: center;
        }

        .btn-primary {
            background: var(--primary-blue);
            color: white;
            box-shadow: var(--shadow-md);
        }

        .btn-primary:hover {
            background: var(--primary-hover);
        }

        .btn-secondary {
            background: var(--bg-subtle);
            color: var(--text-main);
            border: 1px solid var(--border-color);
        }

        @media (max-width: 600px) {
            .actions {
                flex-direction: column;
            }

            .actions .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<header>
    <div class="brand">
        Climate<span>Shield</span> Admin
    </div>

    <a href="{{ route('hazards.index') }}" class="back-link">
        ← Back to Hazards
    </a>
</header>

<main>

    <h1 class="page-title">Add Hazard</h1>

    <p class="page-subtitle">
        Create a new environmental hazard report for the ClimateShield system.
    </p>

    @if ($errors->any())
        <div class="error-box">
            <strong>Please correct the following:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-card">

        <form method="POST" action="{{ route('hazards.store') }}">
            @csrf

            <div class="form-group">
                <label for="title">Hazard Title</label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title') }}"
                    placeholder="e.g. Flash Flood Warning"
                    required
                >
            </div>

            <div class="form-group">
                <label for="type">Hazard Type</label>

                <input
                    type="text"
                    id="type"
                    name="type"
                    value="{{ old('type') }}"
                    placeholder="e.g. Flood, Landslide, Typhoon"
                    required
                >
            </div>

            <div class="form-group">
    <label for="location">Location</label>

    <input
        type="text"
        id="location"
        name="location"
        value="{{ old('location') }}"
        placeholder="e.g. Main Street & 5th Avenue"
        required
    >
</div>

<div class="form-group">
    <label for="latitude">Latitude</label>

    <input
        type="number"
        step="any"
        id="latitude"
        name="latitude"
        value="{{ old('latitude') }}"
        placeholder="e.g. 10.3157"
        required
    >
</div>

<div class="form-group">
    <label for="longitude">Longitude</label>

        <input
            type="number"
            step="any"
            id="longitude"
            name="longitude"
            value="{{ old('longitude') }}"
            placeholder="e.g. 123.8854"
            required
            >
            </div>

            <div class="form-group">
                <label for="severity">Severity</label>

                <select id="severity" name="severity" required>
                    <option value="">Select severity</option>
                    <option value="low" {{ old('severity') === 'low' ? 'selected' : '' }}>
                        Low
                    </option>
                    <option value="moderate" {{ old('severity') === 'moderate' ? 'selected' : '' }}>
                        Moderate
                    </option>
                    <option value="high" {{ old('severity') === 'high' ? 'selected' : '' }}>
                        High
                    </option>
                    <option value="critical" {{ old('severity') === 'critical' ? 'selected' : '' }}>
                        Critical
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status</label>

                <select id="status" name="status" required>
                    <option value="active" {{ old('status', 'active') === 'active' ? 'selected' : '' }}>
                        Active
                    </option>
                    <option value="resolved" {{ old('status') === 'resolved' ? 'selected' : '' }}>
                        Resolved
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Description</label>

                <textarea
                    id="description"
                    name="description"
                    placeholder="Describe the hazard and current situation..."
                    required
                >{{ old('description') }}</textarea>
            </div>

            <div class="actions">

                <a
                    href="{{ route('hazards.index') }}"
                    class="btn btn-secondary"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Create Hazard
                </button>

            </div>

        </form>

    </div>

</main>

</body>
</html>