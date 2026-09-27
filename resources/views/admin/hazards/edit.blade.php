<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Hazard - ClimateShield</title>

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

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 15px;
        }

        textarea {
            min-height: 130px;
            resize: vertical;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #2563eb;
        }

        .error {
            color: #dc2626;
            font-size: 14px;
            margin-top: 5px;
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
        <h1>Edit Hazard</h1>
        <p>Update the information for this environmental hazard.</p>
    </div>

    <div class="card">

        <form action="{{ route('hazards.update', $hazard) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Hazard Title</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title', $hazard->title) }}"
                    required
                >

                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="type">Hazard Type</label>
                <input
                    type="text"
                    id="type"
                    name="type"
                    value="{{ old('type', $hazard->type) }}"
                    required
                >

                @error('type')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input
                    type="text"
                    id="location"
                    name="location"
                    value="{{ old('location', $hazard->location) }}"
                    required
                >

                @error('location')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="severity">Severity</label>
                <select id="severity" name="severity" required>
                    <option value="low" {{ old('severity', $hazard->severity) === 'low' ? 'selected' : '' }}>
                        Low
                    </option>

                    <option value="moderate" {{ old('severity', $hazard->severity) === 'moderate' ? 'selected' : '' }}>
                        Moderate
                    </option>

                    <option value="high" {{ old('severity', $hazard->severity) === 'high' ? 'selected' : '' }}>
                        High
                    </option>

                    <option value="critical" {{ old('severity', $hazard->severity) === 'critical' ? 'selected' : '' }}>
                        Critical
                    </option>
                </select>

                @error('severity')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="active" {{ old('status', $hazard->status) === 'active' ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="resolved" {{ old('status', $hazard->status) === 'resolved' ? 'selected' : '' }}>
                        Resolved
                    </option>
                </select>

                @error('status')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>

                <textarea
                    id="description"
                    name="description"
                    required
                >{{ old('description', $hazard->description) }}</textarea>

                @error('description')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="actions">
                <a href="{{ route('hazards.index') }}" class="btn btn-secondary">
                    Cancel
                </a>

                <button type="submit" class="btn btn-primary">
                    Update Hazard
                </button>
            </div>

        </form>

    </div>

</div>

</body>
</html>