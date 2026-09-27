<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ClimateShield — Hazard Management</title>

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
            --warning-bg: #FFFBEB;

            --success-green: #10B981;
            --success-bg: #ECFDF5;

            --radius-sm: 8px;
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
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(10px);
            padding: 14px 20px;
            border-bottom: 1px solid var(--border-color);

            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
        }

        .brand {
            font-size: 1.2rem;
            font-weight: 800;
            white-space: nowrap;
        }

        .brand span {
            color: var(--primary-blue);
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .user-pill {
            background: var(--bg-subtle);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-pill);
            padding: 7px 12px;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .logout-btn {
            background: var(--danger-bg);
            color: var(--danger-red);
            border: 1px solid rgba(239, 68, 68, 0.2);
            border-radius: var(--radius-pill);
            padding: 7px 12px;
            font-family: inherit;
            font-size: 0.75rem;
            font-weight: 800;
            cursor: pointer;
        }

        main {
            width: 100%;
            max-width: 1100px;
            margin: 0 auto;
            padding: 28px 20px 60px;
        }

        .page-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-bottom: 22px;
        }

        .page-title {
            font-size: 1.6rem;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .page-subtitle {
            margin-top: 4px;
            color: var(--text-muted);
            font-size: 0.85rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            border: none;
            border-radius: var(--radius-pill);
            padding: 10px 16px;
            font-family: inherit;
            font-size: 0.8rem;
            font-weight: 800;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .btn-primary {
            background: var(--primary-blue);
            color: white;
            box-shadow: var(--shadow-md);
        }

        .btn-primary:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: var(--bg-subtle);
            color: var(--text-main);
            border: 1px solid var(--border-color);
        }

        .btn-danger {
            background: var(--danger-bg);
            color: var(--danger-red);
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .alert {
            padding: 12px 14px;
            border-radius: var(--radius-md);
            margin-bottom: 18px;
            font-size: 0.82rem;
            font-weight: 700;
        }

        .alert-success {
            background: var(--success-bg);
            color: #047857;
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        .empty-state {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            padding: 40px 20px;
            text-align: center;
            box-shadow: var(--shadow-sm);
        }

        .empty-state h2 {
            font-size: 1rem;
            margin-bottom: 6px;
        }

        .empty-state p {
            color: var(--text-muted);
            font-size: 0.8rem;
            margin-bottom: 18px;
        }

        .hazard-list {
            display: grid;
            gap: 14px;
        }

        .hazard-card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            padding: 18px;
            box-shadow: var(--shadow-sm);
            transition: 0.2s ease;
        }

        .hazard-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .hazard-top {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            align-items: flex-start;
        }

        .hazard-title {
            font-size: 1rem;
            font-weight: 800;
        }

        .hazard-type {
            color: var(--text-muted);
            font-size: 0.75rem;
            margin-top: 3px;
        }

        .badge {
            display: inline-block;
            padding: 5px 9px;
            border-radius: var(--radius-pill);
            font-size: 0.65rem;
            font-weight: 800;
            text-transform: uppercase;
        }

        .severity-low {
            background: var(--success-bg);
            color: var(--success-green);
        }

        .severity-moderate {
            background: var(--warning-bg);
            color: var(--warning-amber);
        }

        .severity-high,
        .severity-critical {
            background: var(--danger-bg);
            color: var(--danger-red);
        }

        .hazard-info {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin: 16px 0;
        }

        .info-box {
            background: var(--bg-subtle);
            border-radius: var(--radius-md);
            padding: 10px;
        }

        .info-label {
            color: var(--text-muted);
            font-size: 0.65rem;
            font-weight: 800;
            text-transform: uppercase;
            margin-bottom: 2px;
        }

        .info-value {
            font-size: 0.8rem;
            font-weight: 700;
        }

        .hazard-description {
            font-size: 0.82rem;
            line-height: 1.5;
            margin-bottom: 16px;
        }

        .hazard-actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .delete-form {
            display: inline;
        }

        @media (max-width: 650px) {
            header {
                align-items: flex-start;
            }

            .header-right {
                flex-direction: column;
                align-items: flex-end;
            }

            .page-head {
                align-items: flex-start;
                flex-direction: column;
            }

            .page-head .btn {
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

    <div class="header-right">
        @auth
            <div class="user-pill">
                {{ auth()->user()->name }}
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">
                    Log out
                </button>
            </form>
        @endauth
    </div>
</header>

<main>

    <div class="page-head">
        <div>
            <h1 class="page-title">Hazard Management</h1>
            <p class="page-subtitle">
                Create, review, update, and remove environmental hazard reports.
            </p>
        </div>

        <a href="{{ route('hazards.create') }}" class="btn btn-primary">
            + Add Hazard
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($hazards->isEmpty())

        <div class="empty-state">
            <h2>No hazards reported yet</h2>
            <p>
                Create your first hazard report to start populating the ClimateShield system.
            </p>

            <a href="{{ route('hazards.create') }}" class="btn btn-primary">
                Create First Hazard
            </a>
        </div>

    @else

        <div class="hazard-list">

            @foreach ($hazards as $hazard)

                <article class="hazard-card">

                    <div class="hazard-top">
                        <div>
                            <div class="hazard-title">
                                {{ $hazard->title }}
                            </div>

                            <div class="hazard-type">
                                {{ $hazard->type }}
                            </div>
                        </div>

                        <span class="badge severity-{{ $hazard->severity }}">
                            {{ $hazard->severity }}
                        </span>
                    </div>

                    <div class="hazard-info">

                        <div class="info-box">
                            <div class="info-label">Location</div>
                            <div class="info-value">
                                {{ $hazard->location }}
                            </div>
                        </div>

                        <div class="info-box">
                            <div class="info-label">Status</div>
                            <div class="info-value">
                                {{ ucfirst($hazard->status) }}
                            </div>
                        </div>

                    </div>

                    <p class="hazard-description">
                        {{ $hazard->description }}
                    </p>

                    <div class="hazard-actions">

                        <a
                            href="{{ route('hazards.show', $hazard) }}"
                            class="btn btn-secondary"
                        >
                            View
                        </a>

                        <a
                            href="{{ route('hazards.edit', $hazard) }}"
                            class="btn btn-primary"
                        >
                            Edit
                        </a>

                        <form
                            method="POST"
                            action="{{ route('hazards.destroy', $hazard) }}"
                            class="delete-form"
                            onsubmit="return confirm('Are you sure you want to delete this hazard?');"
                        >
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>

                    </div>

                </article>

            @endforeach

        </div>

    @endif

</main>

</body>
</html>