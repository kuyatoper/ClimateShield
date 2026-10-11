@php
    $progress = $project->target_value > 0
        ? min(100, round(($project->current_value / $project->target_value) * 100))
        : 0;

    $status = strtolower(trim($project->status));

    $statusClass = match ($status) {
        'completed', 'complete', 'finished' => 'status-completed',
        'ongoing', 'active', 'in progress' => 'status-ongoing',
        default => 'status-upcoming',
    };

    $icon = match (strtolower($project->category)) {
        'environment' => '🌳',
        'energy' => '☀️',
        default => '🌱',
    };
@endphp


<div class="card project-card">

    <div class="project-header">

        <div>
            <div class="project-title">
                {{ $icon }} {{ $project->title }}
            </div>

            <div class="project-category">
                {{ $project->category }}
            </div>
        </div>

        <span class="badge {{ $statusClass }}">
            {{ ucfirst($project->status) }}
        </span>

    </div>


    <p class="project-description">
        {{ $project->description }}
    </p>

    @if ($project->start_date || $project->end_date)
    <div class="project-dates">

        📅

        @if ($project->start_date)
            {{ $project->start_date->format('M d, Y') }}
        @endif

        @if ($project->start_date && $project->end_date)
            —
        @endif

        @if ($project->end_date)
            {{ $project->end_date->format('M d, Y') }}
        @endif

    </div>
@endif

    <div class="progress-header">
        <span>Project Progress</span>
        <strong>{{ $progress }}%</strong>
    </div>

    <div class="progress-bar">

        <div
            class="progress-fill"
            style="width: {{ $progress }}%;"
        ></div>

    </div>


    <div class="project-stats">

        <div>
            <span>Current</span>

            <strong>
                {{ number_format($project->current_value, 0) }}
                {{ $project->unit }}
            </strong>
        </div>

        <div>
            <span>Target</span>

            <strong>
                {{ number_format($project->target_value, 0) }}
                {{ $project->unit }}
            </strong>
        </div>

    </div>

<div style="margin-top: 18px;">
    <a
        href="{{ route('donations.create', $project) }}"
        style="
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 20px;
            border-radius: 10px;
            background: #08a7e5;
            color: white;
            font-weight: 700;
            text-decoration: none;
            transition: background 0.2s ease;
        "
    >
        💚 Fund This Project
    </a>
</div>


</div>