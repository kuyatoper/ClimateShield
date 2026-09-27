<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $hazard->title }} - ClimateShield</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f7f5;
            color: #1f2937;
            padding: 30px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .header {
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .header p {
            color: #6b7280;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .detail {
            padding: 18px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .detail:last-child {
            border-bottom: none;
        }

        .label {
            font-size: 13px;
            font-weight: bold;
            color: #6b7280;
            text-transform: uppercase;
            margin-bottom: 6px;
        }

        .value {
            font-size: 17px;
        }

        .description {
            line-height: 1.6;
            white-space: pre-line;
        }

        .badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: bold;
            text-transform: capitalize;
        }

        .severity-low {
            background: #dcfce7;
            color: #166534;
        }

        .severity-moderate {
            background: #fef3c7;
            color: #92400e;
        }

        .severity-high {
            background: #fed7aa;
            color: #9a3412;
        }

        .severity-critical {
            background: #fee2e2;
            color: #991b1b;
        }

        .status-active {
            background: #dcfce7;
            color: #166534;
        }

        .status-resolved {
            background: #e5e7eb;
            color: #374151;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            display: inline-block;
            padding: 12px 18px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 15px;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #374151;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-secondary:hover {
            background: #d1d5db;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Hazard Details</h1>
        <p>View the complete information for this environmental hazard.</p>
    </div>

    <div class="card">

        <div class="detail">
            <div class="label">Hazard Title</div>
            <div class="value">{{ $hazard->title }}</div>
        </div>

        <div class="detail">
            <div class="label">Type</div>
            <div class="value">{{ $hazard->type }}</div>
        </div>

        <div class="detail">
            <div class="label">Location</div>
            <div class="value">{{ $hazard->location }}</div>
        </div>

        <div class="detail">
            <div class="label">Severity</div>
            <div class="value">
                <span class="badge severity-{{ $hazard->severity }}">
                    {{ $hazard->severity }}
                </span>
            </div>
        </div>

        <div class="detail">
            <div class="label">Status</div>
            <div class="value">
                <span class="badge status-{{ $hazard->status }}">
                    {{ $hazard->status }}
                </span>
            </div>
        </div>

        <div class="detail">
            <div class="label">Description</div>
            <div class="value description">{{ $hazard->description }}</div>
        </div>

        <div class="detail">
            <div class="label">Created</div>
            <div class="value">
                {{ $hazard->created_at->format('F d, Y h:i A') }}
            </div>
        </div>

        <div class="detail">
            <div class="label">Last Updated</div>
            <div class="value">
                {{ $hazard->updated_at->format('F d, Y h:i A') }}
            </div>
        </div>

        <div class="actions">
            <a href="{{ route('hazards.index') }}" class="btn btn-secondary">
                Back to Hazards
            </a>

            <a href="{{ route('hazards.edit', $hazard) }}" class="btn btn-primary">
                Edit Hazard
            </a>
        </div>

    </div>

</div>

</body>
</html>