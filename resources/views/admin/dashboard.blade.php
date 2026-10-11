<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ClimateShield — Admin Panel</title>

    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

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

            --success-green: #10B981;
            --success-bg: #ECFDF5;

            --warning-amber: #F59E0B;
            --warning-bg: #FFFBEB;

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
            gap: 15px;
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
            background: #FEF2F2;
            color: #EF4444;

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

            padding: 35px 20px 60px;
        }

        .page-head {
            margin-bottom: 28px;
        }

        .page-title {
            font-size: 1.8rem;
            font-weight: 800;
            letter-spacing: -0.6px;
        }

        .page-subtitle {
            margin-top: 6px;

            color: var(--text-muted);

            font-size: 0.85rem;
        }

        /* WELCOME CARD */

        .welcome-card {
            background: var(--bg-card);

            border: 1px solid var(--border-color);

            border-radius: var(--radius-lg);

            padding: 24px;

            margin-bottom: 22px;

            box-shadow: var(--shadow-sm);

            position: relative;
            overflow: hidden;
        }

        .welcome-card::before {
            content: "";

            position: absolute;

            top: 0;
            left: 0;

            width: 5px;
            height: 100%;

            background: var(--primary-blue);
        }

        .welcome-card h2 {
            font-size: 1.15rem;
            font-weight: 800;

            margin-bottom: 7px;
        }

        .welcome-card p {
            color: var(--text-muted);

            font-size: 0.82rem;
            line-height: 1.6;
        }

        /* MANAGEMENT GRID */

        .section-title {
            font-size: 0.85rem;

            font-weight: 800;

            text-transform: uppercase;

            letter-spacing: 0.5px;

            color: var(--text-muted);

            margin-bottom: 12px;
        }

        .cards {
            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 16px;
        }

        .card {
            background: var(--bg-card);

            border: 1px solid var(--border-color);

            border-radius: var(--radius-lg);

            padding: 20px;

            box-shadow: var(--shadow-sm);

            transition: 0.2s ease;

            display: flex;
            flex-direction: column;
        }

        .card:hover {
            transform: translateY(-3px);

            box-shadow: var(--shadow-md);
        }

        .card-icon {
            width: 42px;
            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 12px;

            background: rgba(14, 165, 233, 0.10);

            font-size: 1.2rem;

            margin-bottom: 14px;
        }

        .card:nth-child(2) .card-icon {
            background: rgba(16, 185, 129, 0.10);
        }

        .card:nth-child(3) .card-icon {
            background: rgba(245, 158, 11, 0.10);
        }

        .card:nth-child(4) .card-icon {
            background: rgba(139, 92, 246, 0.10);
        }

        .card h3 {
            font-size: 1rem;

            font-weight: 800;

            margin-bottom: 7px;
        }

        .card p {
            color: var(--text-muted);

            font-size: 0.78rem;

            line-height: 1.55;

            margin-bottom: 18px;
        }

        /* BUTTON */

        .button {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            width: fit-content;

            margin-top: auto;

            padding: 9px 15px;

            background: var(--primary-blue);

            color: white;

            text-decoration: none;

            border-radius: var(--radius-pill);

            font-size: 0.75rem;

            font-weight: 800;

            transition: 0.2s ease;

            box-shadow: var(--shadow-md);
        }

        .button:hover {
            background: var(--primary-hover);

            transform: translateY(-1px);
        }

        /* QUICK INFO */

        .quick-info {
            display: grid;

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 12px;

            margin-top: 22px;
        }

        .info-card {
            background: var(--bg-subtle);

            border: 1px solid var(--border-color);

            border-radius: var(--radius-md);

            padding: 15px;
        }

        .info-label {
            font-size: 0.65rem;

            text-transform: uppercase;

            color: var(--text-muted);

            font-weight: 800;

            margin-bottom: 5px;
        }

        .info-value {
            font-size: 0.78rem;

            font-weight: 700;
        }

        /* FOOTER LINK */

        .back {
            display: inline-flex;

            margin-top: 28px;

            color: var(--primary-blue);

            text-decoration: none;

            font-size: 0.78rem;

            font-weight: 800;
        }

        .back:hover {
            color: var(--primary-hover);
        }

        /* RESPONSIVE */

        @media (max-width: 700px) {

            header {
                align-items: flex-start;
            }

            .header-right {
                flex-direction: column;
                align-items: flex-end;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .quick-info {
                grid-template-columns: 1fr;
            }

            .page-title {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 500px) {

            header {
                padding: 12px 15px;
            }

            .brand {
                font-size: 1rem;
            }

            .user-pill {
                display: none;
            }

            main {
                padding: 25px 15px 45px;
            }

            .welcome-card {
                padding: 20px;
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
        Climate<span>Shield</span>Admin
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

        <h1 class="page-title">
            Admin Panel
        </h1>

        <p class="page-subtitle">
            Manage ClimateShield environmental and community data.
        </p>

    </div>


    <div class="welcome-card">

        <h2>
            Welcome, Admin 👋
        </h2>

        <p>
            Use the management tools below to maintain the information
            displayed throughout the ClimateShield system.
        </p>

    </div>


    <div class="section-title">
        Management
    </div>


    <div class="cards">

        <!-- HAZARDS -->

        <div class="card">

            <div class="card-icon">
                ⚠️
            </div>

            <h3>
                Manage Hazards
            </h3>

            <p>
                Create, review, verify, update, and remove
                environmental hazard reports.
            </p>

            <a
                href="{{ route('hazards.index') }}"
                class="button"
            >
                Manage Hazards →
            </a>

        </div>


        <!-- PROJECTS -->

        <div class="card">

            <div class="card-icon">
                🌱
            </div>

            <h3>
                Manage Projects
            </h3>

            <p>
                Manage sustainability projects and
                community climate-action initiatives.
            </p>

            <a
                href="{{ route('projects.index') }}"
                class="button"
            >
                Manage Projects →
            </a>

        </div>


        <!-- DASHBOARD -->

        <div class="card">

            <div class="card-icon">
                📊
            </div>

            <h3>
                Main Dashboard
            </h3>

            <p>
                View the public ClimateShield dashboard
                and current environmental information.
            </p>

            <a
                href="{{ route('dashboard') }}"
                class="button"
            >
                View Dashboard →
            </a>

        </div>


        <!-- MAP -->

        <div class="card">

            <div class="card-icon">
                🗺️
            </div>

            <h3>
                Climate Map
            </h3>

            <p>
                View environmental hazard locations
                and geographic information.
            </p>

            <a
                href="{{ route('map') }}"
                class="button"
            >
                Open Map →
            </a>

        </div>

    </div>


    <!-- QUICK INFO -->

    <div class="quick-info">

        <div class="info-card">

            <div class="info-label">
                System
            </div>

            <div class="info-value">
                ClimateShield
            </div>

        </div>


        <div class="info-card">

            <div class="info-label">
                Access
            </div>

            <div class="info-value">
                Administrator
            </div>

        </div>


        <div class="info-card">

            <div class="info-label">
                Environment
            </div>

            <div class="info-value">
                Local Development
            </div>

        </div>

    </div>


    <a
        href="{{ route('dashboard') }}"
        class="back"
    >
        ← Back to ClimateShield Dashboard
    </a>

</main>

</body>
</html>