<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClimateShield Admin</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7f5;
            color: #1f2937;
        }

        .header {
            background: #166534;
            color: white;
            padding: 24px 40px;
        }

        .header h1 {
            margin: 0 0 6px;
            font-size: 28px;
        }

        .header p {
            margin: 0;
            opacity: 0.9;
        }

        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .welcome {
            margin-bottom: 30px;
        }

        .welcome h2 {
            margin-bottom: 8px;
        }

        .welcome p {
            color: #6b7280;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
        }

        .card h3 {
            margin-top: 0;
            margin-bottom: 10px;
        }

        .card p {
            color: #6b7280;
            line-height: 1.5;
        }

        .button {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 16px;
            background: #166534;
            color: white;
            text-decoration: none;
            border-radius: 7px;
        }

        .button:hover {
            background: #14532d;
        }

        .back {
            display: inline-block;
            margin-top: 30px;
            color: #166534;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>ClimateShield Admin Panel</h1>
        <p>Manage ClimateShield community data</p>
    </div>

    <div class="container">

        <div class="welcome">
            <h2>Welcome, Admin</h2>
            <p>
                Use the tools below to manage the information displayed
                throughout the ClimateShield dashboard.
            </p>
        </div>

        <div class="cards">

            <div class="card">
                <h3>⚠️ Manage Hazards</h3>
                <p>
                    Add, edit, update, and delete environmental hazard reports.
                </p>

                <a href="{{ route('hazards.index') }}" class="button">
                    Manage Hazards
                </a>
            </div>

            <div class="card">
                <h3>🌱 Manage Projects</h3>
                <p>
                    Manage sustainability and community climate-action projects.
                </p>

                <a href="{{ route('projects.index') }}" class="button">
                    Manage Projects
                </a>
            </div>

            <div class="card">
                <h3>📊 Main Dashboard</h3>
                <p>
                    View the public ClimateShield dashboard, including live
                    environmental information.
                </p>

                <a href="{{ route('dashboard') }}" class="button">
                    View Dashboard
                </a>
            </div>

            <div class="card">
                <h3>🗺️ Climate Map</h3>
                <p>
                    View the ClimateShield environmental hazard map.
                </p>

                <a href="{{ route('map') }}" class="button">
                    Open Map
                </a>
            </div>

        </div>

        <a href="{{ route('dashboard') }}" class="back">
            ← Back to ClimateShield Dashboard
        </a>

    </div>

</body>
</html>