<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ClimateShield — Project Management</title>

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

            --success-green: #10B981;
            --success-bg: #ECFDF5;

            --warning-amber: #F59E0B;
            --warning-bg: #FFFBEB;

            --purple: #8B5CF6;
            --purple-bg: #F5F3FF;

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
                radial-gradient(
                    circle at 8% 8%,
                    rgba(14, 165, 233, 0.12),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 92% 32%,
                    rgba(16, 185, 129, 0.10),
                    transparent 24%
                ),
                linear-gradient(
                    135deg,
                    #f8fafc 0%,
                    #eef6f7 100%
                );

            color: var(--text-main);
            min-height: 100vh;
        }

        /* HEADER */

        header {
            position: sticky;
            top: 0;
            z-index: 100;

            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(10px);

            border-bottom: 1px solid var(--border-color);

            padding: 14px 20px;

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
        .brand-title {
      font-size: 1.2rem;
      font-weight: 800;
      display: flex;
      align-items: center;
      gap: 6px;
      letter-spacing: -0.4px;
    }

    .brand-title span {
      color: var(--primary-blue);
    }

    .brand-title svg {
      animation: shield-pulse 3s ease-in-out infinite;
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

            transition: 0.2s ease;
        }

        .logout-btn:hover {
            background: #FEE2E2;
        }

        /* MAIN */

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

        /* BUTTONS */

        .btn {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            text-decoration: none;

            border: none;

            border-radius: var(--radius-pill);

            padding: 10px 16px;

            font-family: inherit;

            font-size: 0.75rem;

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

        .btn-secondary:hover {
            background: #E2E8F0;
        }

        .btn-danger {
            background: var(--danger-bg);

            color: var(--danger-red);

            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .btn-danger:hover {
            background: #FEE2E2;
        }

        /* PROJECT LIST */

        .project-list {
            display: grid;
            gap: 14px;
        }

        .project-card {
            background: var(--bg-card);

            border: 1px solid var(--border-color);

            border-radius: var(--radius-lg);

            padding: 18px;

            box-shadow: var(--shadow-sm);

            transition: 0.2s ease;
        }

        .project-card:hover {
            transform: translateY(-2px);

            box-shadow: var(--shadow-md);
        }

        /* PROJECT TOP */

        .project-top {
            display: flex;

            justify-content: space-between;

            align-items: flex-start;

            gap: 15px;
        }

        .project-title {
            font-size: 1rem;

            font-weight: 800;

            margin-bottom: 4px;
        }

        .project-description {
            color: var(--text-muted);

            font-size: 0.76rem;

            line-height: 1.5;
        }

        /* BADGES */

        .badges {
            display: flex;

            flex-wrap: wrap;

            gap: 6px;

            justify-content: flex-end;
        }

        .badge {
            display: inline-block;

            padding: 5px 9px;

            border-radius: var(--radius-pill);

            font-size: 0.63rem;

            font-weight: 800;

            text-transform: uppercase;

            white-space: nowrap;
        }

        .category-badge {
            background: var(--purple-bg);

            color: var(--purple);
        }

        .status-completed {
            background: var(--success-bg);

            color: var(--success-green);
        }

        .status-funding {
            background: var(--warning-bg);

            color: var(--warning-amber);
        }

        .status-ongoing {
            background: rgba(14, 165, 233, 0.10);

            color: var(--primary-blue);
        }

        .status-planned {
            background: var(--bg-subtle);

            color: var(--text-muted);
        }

        /* PROJECT INFO */

        .project-info {
            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

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

            font-size: 0.62rem;

            font-weight: 800;

            text-transform: uppercase;

            margin-bottom: 3px;
        }

        .info-value {
            font-size: 0.78rem;

            font-weight: 700;
        }

        /* PROGRESS */

        .progress-section {
            margin: 15px 0 16px;
        }

        .progress-header {
            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 7px;
        }

        .progress-label {
            color: var(--text-muted);

            font-size: 0.65rem;

            font-weight: 800;

            text-transform: uppercase;
        }

        .progress-value {
            font-size: 0.72rem;

            font-weight: 800;
        }

        .progress-bar {
            width: 100%;

            height: 8px;

            background: var(--bg-subtle);

            border-radius: var(--radius-pill);

            overflow: hidden;
        }

        .progress-fill {
            height: 100%;

            background: var(--primary-blue);

            border-radius: var(--radius-pill);

            transition: width 0.3s ease;
        }

        /* ACTIONS */

        .project-actions {
            display: flex;

            gap: 8px;

            flex-wrap: wrap;
        }

        .delete-form {
            display: inline;
        }

        /* EMPTY */

        .empty-state {
            background: var(--bg-card);

            border: 1px solid var(--border-color);

            border-radius: var(--radius-lg);

            padding: 45px 20px;

            text-align: center;

            box-shadow: var(--shadow-sm);
        }

        .empty-icon {
            font-size: 2rem;

            margin-bottom: 10px;
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

        /* RESPONSIVE */

        @media (max-width: 700px) {

            .page-head {
                flex-direction: column;

                align-items: flex-start;
            }

            .page-head .btn {
                width: 100%;
            }

            .project-top {
                flex-direction: column;
            }

            .badges {
                justify-content: flex-start;
            }

            .project-info {
                grid-template-columns: 1fr;
            }

        }

        @media (max-width: 500px) {

            header {
                align-items: flex-start;
            }

            .header-right {
                flex-direction: column;

                align-items: flex-end;
            }

            .user-pill {
                display: none;
            }

            main {
                padding: 24px 15px 45px;
            }

        }
    </style>
</head>

<body>

<header>

    <div class="brand-title">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0EA5E9" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
        </svg>
        Climate<span> Shield</span>Admin
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

            <h1 class="page-title">
                Project Management
            </h1>

            <p class="page-subtitle">
                Create, review, update, and manage ClimateShield community projects.
            </p>

        </div>

        <a
            href="{{ route('projects.create') }}"
            class="btn btn-primary"
        >
            + Add Project
        </a>

    </div>


    @if ($projects->isEmpty())

        <div class="empty-state">

            <div class="empty-icon">
                🌱
            </div>

            <h2>
                No projects found
            </h2>

            <p>
                Create your first ClimateShield project to start tracking
                community climate-action activities.
            </p>

            <a
                href="{{ route('projects.create') }}"
                class="btn btn-primary"
            >
                Create First Project
            </a>

        </div>

    @else

        <div class="project-list">

            @foreach ($projects as $project)

                <article class="project-card">

                    <div class="project-top">

                        <div>

                            <div class="project-title">
                                {{ $project->title }}
                            </div>

                            <div class="project-description">
                                {{ $project->description }}
                            </div>

                        </div>


                        <div class="badges">

                            <span class="badge category-badge">
                                {{ $project->category }}
                            </span>

                            <span class="badge status-{{ strtolower($project->status) }}">
                                {{ $project->status }}
                            </span>

                        </div>

                    </div>


                    <div class="project-info">

                        <div class="info-box">

                            <div class="info-label">
                                Project ID
                            </div>

                            <div class="info-value">
                                #{{ $project->id }}
                            </div>

                        </div>


                        <div class="info-box">

                            <div class="info-label">
                                Current Progress
                            </div>

                            <div class="info-value">
                                {{ number_format($project->current_value) }}
                                {{ $project->unit }}
                            </div>

                        </div>


                        <div class="info-box">

                            <div class="info-label">
                                Target
                            </div>

                            <div class="info-value">
                                {{ number_format($project->target_value) }}
                                {{ $project->unit }}
                            </div>

                        </div>

                    </div>


                    @php
                        $progress = $project->target_value > 0
                            ? min(
                                100,
                                ($project->current_value / $project->target_value) * 100
                            )
                            : 0;
                    @endphp


                    <div class="progress-section">

                        <div class="progress-header">

                            <span class="progress-label">
                                Progress
                            </span>

                            <span class="progress-value">
                                {{ number_format($progress, 1) }}%
                            </span>

                        </div>


                        <div class="progress-bar">

                            <div
                                class="progress-fill"
                                style="width: {{ $progress }}%;"
                            ></div>

                        </div>

                    </div>


                    <div class="project-actions">

                        <a
                            href="{{ route('projects.edit', $project) }}"
                            class="btn btn-primary"
                        >
                            Edit
                        </a>


                        <form
                            action="{{ route('projects.destroy', $project) }}"
                            method="POST"
                            class="delete-form"
                            onsubmit="return confirm('Delete this project?')"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger"
                            >
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