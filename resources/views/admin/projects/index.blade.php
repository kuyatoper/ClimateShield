<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Projects - ClimateShield</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: #f5f7f6;
        }

        h1 {
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        .btn-primary {
            background: #198754;
            margin-bottom: 20px;
        }

        .btn-edit {
            background: #0d6efd;
        }

        .btn-delete {
            background: #dc3545;
            border: none;
            padding: 8px 12px;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #e9ecef;
        }

        .empty {
            text-align: center;
            color: #777;
        }

        form {
            display: inline;
        }
    </style>
</head>

<body>

    <h1>ClimateShield Projects</h1>

    <a href="{{ route('projects.create') }}" class="btn btn-primary">
        + Add Project
    </a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Progress</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($projects as $project)

                <tr>
                    <td>{{ $project->id }}</td>

                    <td>
                        <strong>{{ $project->title }}</strong>
                        <br>
                        {{ $project->description }}
                    </td>

                    <td>{{ $project->category }}</td>

                    <td>{{ $project->status }}</td>

                    <td>
                        {{ number_format($project->current_value) }}
                        /
                        {{ number_format($project->target_value) }}
                        {{ $project->unit }}
                    </td>

                    <td>

                        <a
                            href="{{ route('projects.edit', $project) }}"
                            class="btn btn-edit"
                        >
                            Edit
                        </a>

                        <form
                            action="{{ route('projects.destroy', $project) }}"
                            method="POST"
                            onsubmit="return confirm('Delete this project?')"
                        >
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn-delete">
                                Delete
                            </button>
                        </form>

                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="6" class="empty">
                        No projects found.
                    </td>
                </tr>

            @endforelse
        </tbody>
    </table>

</body>
</html>