<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7f5;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        h1 {
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 6px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 15px;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        button,
        .cancel {
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            font-size: 15px;
        }

        button {
            background: #198754;
            color: white;
        }

        .cancel {
            background: #ddd;
            color: #333;
        }

        .error {
            color: #b00020;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Edit Project</h1>

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

    <form action="{{ route('projects.update', $project) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Project Title</label>
            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title', $project->title) }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea
                id="description"
                name="description"
                required
            >{{ old('description', $project->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <select id="category" name="category" required>
                <option value="Environment" {{ old('category', $project->category) === 'Environment' ? 'selected' : '' }}>
                    Environment
                </option>
                <option value="Energy" {{ old('category', $project->category) === 'Energy' ? 'selected' : '' }}>
                    Energy
                </option>
                <option value="Water" {{ old('category', $project->category) === 'Water' ? 'selected' : '' }}>
                    Water
                </option>
                <option value="Community" {{ old('category', $project->category) === 'Community' ? 'selected' : '' }}>
                    Community
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" required>
                <option value="Active" {{ old('status', $project->status) === 'Active' ? 'selected' : '' }}>
                    Active
                </option>
                <option value="Funding" {{ old('status', $project->status) === 'Funding' ? 'selected' : '' }}>
                    Funding
                </option>
                <option value="Completed" {{ old('status', $project->status) === 'Completed' ? 'selected' : '' }}>
                    Completed
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="current_value">Current Value</label>
            <input
                type="number"
                id="current_value"
                name="current_value"
                value="{{ old('current_value', $project->current_value) }}"
                min="0"
                required
            >
        </div>

        <div class="form-group">
            <label for="target_value">Target Value</label>
            <input
                type="number"
                id="target_value"
                name="target_value"
                value="{{ old('target_value', $project->target_value) }}"
                min="1"
                required
            >
        </div>

        <div class="form-group">
            <label for="unit">Unit</label>
            <input
                type="text"
                id="unit"
                name="unit"
                value="{{ old('unit', $project->unit) }}"
                placeholder="e.g. PHP Raised, Trees Planted"
                required
            >
        </div>

        <div class="buttons">
            <button type="submit">Update Project</button>

            <a href="{{ route('projects.index') }}" class="cancel">
                Cancel
            </a>
        </div>

    </form>

</div>

</body>
</html>