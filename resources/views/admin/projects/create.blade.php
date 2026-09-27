<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Project - ClimateShield</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: #f5f7f6;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .btn {
            padding: 10px 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background: #198754;
            color: white;
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
            margin-left: 8px;
        }

        .error {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Add Sustainability Project</h1>

    @if ($errors->any())
        <div class="error">
            <strong>Please fix the following:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('projects.store') }}" method="POST">

        @csrf

        {{-- Project Title --}}
        <div class="form-group">
            <label for="title">Project Title</label>

            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title') }}"
                required
            >
        </div>

        {{-- Description --}}
        <div class="form-group">
            <label for="description">Description</label>

            <textarea
                id="description"
                name="description"
                required
            >{{ old('description') }}</textarea>
        </div>

        {{-- Category --}}
        <div class="form-group">
            <label for="category">Category</label>

            <select id="category" name="category" required>
                <option value="">Select category</option>

                <option value="Environment"
                    {{ old('category') == 'Environment' ? 'selected' : '' }}>
                    Environment
                </option>

                <option value="Energy"
                    {{ old('category') == 'Energy' ? 'selected' : '' }}>
                    Energy
                </option>

                <option value="Water"
                    {{ old('category') == 'Water' ? 'selected' : '' }}>
                    Water
                </option>

                <option value="Community"
                    {{ old('category') == 'Community' ? 'selected' : '' }}>
                    Community
                </option>
            </select>
        </div>

        {{-- Status --}}
        <div class="form-group">
            <label for="status">Status</label>

            <select id="status" name="status" required>
                <option value="">Select status</option>

                <option value="Active"
                    {{ old('status') == 'Active' ? 'selected' : '' }}>
                    Active
                </option>

                <option value="Funding"
                    {{ old('status') == 'Funding' ? 'selected' : '' }}>
                    Funding
                </option>

                <option value="Completed"
                    {{ old('status') == 'Completed' ? 'selected' : '' }}>
                    Completed
                </option>
            </select>
        </div>

        {{-- Current Value --}}
        <div class="form-group">
            <label for="current_value">Current Value</label>

            <input
                type="number"
                id="current_value"
                name="current_value"
                value="{{ old('current_value', 0) }}"
                min="0"
                required
            >
        </div>

        {{-- Target Value --}}
        <div class="form-group">
            <label for="target_value">Target Value</label>

            <input
                type="number"
                id="target_value"
                name="target_value"
                value="{{ old('target_value') }}"
                min="1"
                required
            >
        </div>

        {{-- Unit --}}
        <div class="form-group">
            <label for="unit">Unit</label>

            <input
                type="text"
                id="unit"
                name="unit"
                value="{{ old('unit') }}"
                placeholder="e.g. PHP Raised, Trees Planted"
                required
            >
        </div>

        <button type="submit" class="btn btn-primary">
            Save Project
        </button>

        <a href="{{ route('projects.index') }}" class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

</body>
</html>