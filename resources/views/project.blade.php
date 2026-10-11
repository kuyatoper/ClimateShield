<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ClimateShield — Eco Projects</title>
  @if (file_exists(public_path('build/manifest.json')))
    @vite('resources/css/project.css')
  @endif
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <style>
    :root {
      --bg-body: #F8F9FA; --bg-card: #FFFFFF; --bg-subtle: #F1F5F9;
      --border-color: #E2E8F0; --text-main: #0F172A; --text-muted: #64748B;
      --primary-blue: #0EA5E9; --success-green: #10B981;
      --shadow-sm: 0 1px 3px rgba(15, 23, 42, 0.05);
      --radius-lg: 18px; --radius-pill: 9999px;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: var(--bg-body); color: var(--text-main); display: flex; justify-content: stretch; min-height: 100vh; }

    .app-container {
      width: 100%; max-width: none; min-height: 100vh;
      padding-bottom: 90px;
    }

    header {
      position: sticky; top: 0; z-index: 100; background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(10px); padding: 14px 20px; border-bottom: 1px solid var(--border-color);
      display: flex; justify-content: space-between; align-items: center;
    }

.brand-title {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 1.5rem;
    font-weight: 800;
    letter-spacing: -0.8px;
    color: var(--text-main);
    white-space: nowrap;
}


.brand-title {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 1.5rem;
    font-weight: 800;
    letter-spacing: -0.8px;
    color: #0F172A;
    white-space: nowrap;
}

.brand-shield {
    width: 27px;
    height: 30px;
    flex-shrink: 0;
    color: #0EA5E9;
    display: block;
}

.brand-name {
    color: #0F172A;
}

.brand-name span {
    color: #0EA5E9;
}


    main { padding: 16px 20px; }
    .section-title { font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.8px; color: var(--text-muted); margin-bottom: 12px; }

    .card { background: white; border-radius: var(--radius-lg); padding: 18px; border: 1px solid var(--border-color); box-shadow: var(--shadow-sm); margin-bottom: 16px; }
    .project-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 8px; }
    .project-title { font-size: 1rem; font-weight: 800; }
    .badge { font-size: 0.7rem; font-weight: 700; padding: 4px 8px; border-radius: var(--radius-pill); background: #ECFDF5; color: var(--success-green); }

    .progress-bar { width: 100%; height: 8px; background: var(--bg-subtle); border-radius: var(--radius-pill); overflow: hidden; margin: 12px 0 6px; }
    .progress-fill { height: 100%; background: var(--success-green); }

    .meta-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; margin-top: 12px; font-size: 0.75rem; color: var(--text-muted); }
    .btn-action { width: 100%; margin-top: 14px; padding: 10px; background: var(--primary-blue); color: white; border: none; border-radius: var(--radius-pill); font-weight: 800; cursor: pointer; }

    .bottom-nav { position: fixed; bottom: 0; left: 50%; transform: translateX(-50%); width: 100%; max-width: none; height: 62px; background: white; border-top: 1px solid var(--border-color); display: flex; justify-content: space-around; align-items: center; }
    .nav-item { color: var(--text-muted); font-size: 0.7rem; font-weight: 700; text-decoration: none; display: flex; flex-direction: column; align-items: center; }
    .nav-item.active { color: var(--primary-blue); }

    .projects-intro {
    margin-bottom: 20px;
}

.projects-intro h1 {
    font-size: 1.45rem;
    font-weight: 800;
    margin-bottom: 6px;
}

.projects-intro p {
    color: var(--text-muted);
    font-size: 0.85rem;
}


/* Project tabs */

.project-tabs {
    display: flex;
    gap: 8px;
    overflow-x: auto;
    padding-bottom: 8px;
    margin-bottom: 18px;
}

.project-tab {
    border: 1px solid var(--border-color);
    background: white;
    color: var(--text-muted);
    padding: 9px 14px;
    border-radius: var(--radius-pill);
    font-family: inherit;
    font-weight: 800;
    font-size: 0.75rem;
    cursor: pointer;
    white-space: nowrap;
}

.project-tab span {
    margin-left: 4px;
    opacity: 0.7;
}

.project-tab.active {
    background: var(--primary-blue);
    border-color: var(--primary-blue);
    color: white;
}


/* Sections */

.project-section {
    display: none;
}

.project-section.active {
    display: block;
}

.project-dates {
    margin-top: 10px;
    font-size: 0.72rem;
    color: var(--text-muted);
    font-weight: 700;
}

/* Project card */

.project-card {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.project-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(15, 23, 42, 0.08);
}

.project-category {
    margin-top: 4px;
    font-size: 0.7rem;
    color: var(--text-muted);
    text-transform: uppercase;
    font-weight: 700;
    letter-spacing: 0.5px;
}

.project-description {
    font-size: 0.85rem;
    color: var(--text-muted);
    line-height: 1.6;
    margin-top: 12px;
}

.progress-header {
    display: flex;
    justify-content: space-between;
    margin-top: 16px;
    font-size: 0.75rem;
    color: var(--text-muted);
}

.progress-header strong {
    color: var(--text-main);
}

.project-stats {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-top: 14px;
}

.project-stats div {
    background: var(--bg-subtle);
    border-radius: 12px;
    padding: 10px;
}

.project-stats span {
    display: block;
    font-size: 0.65rem;
    color: var(--text-muted);
    margin-bottom: 3px;
}

.project-stats strong {
    font-size: 0.8rem;
}


/* Status colors */

.badge.status-upcoming {
    background: #FFF7ED;
    color: #F59E0B;
}

.badge.status-ongoing {
    background: #ECFDF5;
    color: #10B981;
}

.badge.status-completed {
    background: #EFF6FF;
    color: #3B82F6;
}


/* Empty state */

.empty-card {
    background: white;
    border: 1px solid var(--border-color);
    border-radius: var(--radius-lg);
    padding: 40px 20px;
    text-align: center;
    color: var(--text-muted);
}

.empty-card:first-letter {
    font-size: 2rem;
}

.empty-card h3 {
    color: var(--text-main);
    margin: 10px 0 5px;
}

.empty-card p {
    font-size: 0.8rem;
}

  </style>




</head>



<body>

  <div class="app-container">
    <header>

<div class="brand-title">
    <svg class="brand-shield"
         xmlns="http://www.w3.org/2000/svg"
         viewBox="0 0 24 24"
         fill="none"
         stroke="currentColor"
         stroke-width="2.2"
         stroke-linecap="round"
         stroke-linejoin="round"
         aria-hidden="true">
        <path d="M12 22s8-4 8-11V5l-8-3-8 3v6c0 7 8 11 8 11z"/>
    </svg>
    <span class="brand-name">Climate<span> Shield</span></span>
</div>

      <div style="font-size: 0.8rem; font-weight: 700;">🌱 Eco Projects</div>
    </header>

@if (session('success'))
    <div style="
        margin-bottom: 20px;
        padding: 14px 18px;
        border: 1px solid #a7f3d0;
        border-radius: 12px;
        background: #ecfdf5;
        color: #065f46;
    ">
        {{ session('success') }}
    </div>
@endif


    <main>

    <div class="section-title">Community Sustainability Initiatives</div>

    <div class="projects-intro">
        <h1>🌱 Sustainability Projects</h1>
        <p>
            Explore environmental initiatives and track their progress.
        </p>
    </div>

    <!-- Project Filters -->
    <div class="project-tabs">
        <button class="project-tab active" data-tab="all">
            All
            <span>{{ $projects->count() }}</span>
        </button>

        <button class="project-tab" data-tab="upcoming">
            Upcoming
            <span>{{ $upcomingProjects->count() }}</span>
        </button>

        <button class="project-tab" data-tab="ongoing">
            Ongoing
            <span>{{ $ongoingProjects->count() }}</span>
        </button>

        <button class="project-tab" data-tab="completed">
            Completed
            <span>{{ $completedProjects->count() }}</span>
        </button>
    </div>


    <!-- ALL PROJECTS -->
    <section class="project-section active" data-section="all">

        @forelse ($projects as $project)

            @include('partials.project-card', ['project' => $project])

        @empty

            <div class="empty-card">
                🌱
                <h3>No Projects Available</h3>
                <p>There are currently no sustainability projects.</p>
            </div>

        @endforelse

    </section>


    <!-- UPCOMING -->
    <section class="project-section" data-section="upcoming">

        @forelse ($upcomingProjects as $project)

            @include('partials.project-card', ['project' => $project])

        @empty

            <div class="empty-card">
                📅
                <h3>No Upcoming Projects</h3>
                <p>There are currently no planned sustainability projects.</p>
            </div>

        @endforelse

    </section>


    <!-- ONGOING -->
    <section class="project-section" data-section="ongoing">

        @forelse ($ongoingProjects as $project)

            @include('partials.project-card', ['project' => $project])

        @empty

            <div class="empty-card">
                🌱
                <h3>No Ongoing Projects</h3>
                <p>No sustainability projects are currently in progress.</p>
            </div>

        @endforelse

    </section>


    <!-- COMPLETED -->
    <section class="project-section" data-section="completed">

        @forelse ($completedProjects as $project)

            @include('partials.project-card', ['project' => $project])

        @empty

            <div class="empty-card">
                ✅
                <h3>No Completed Projects</h3>
                <p>Completed projects will appear here.</p>
            </div>

        @endforelse

    </section>

</main>

    <nav class="bottom-nav">
      <a href="{{ route('dashboard') }}" class="nav-item">Dashboard</a>
      <a href="{{ route('map') }}" class="nav-item">Map</a>
      <a href="{{ route('projects') }}" class="nav-item active">Projects</a>
      <a href="{{ route('guides') }}" class="nav-item">Guides</a>
    </nav>
  </div>

    <script>
    document.querySelectorAll('.project-tab').forEach(tab => {

        tab.addEventListener('click', () => {

            const selectedTab = tab.dataset.tab;

            // Update active tab
            document.querySelectorAll('.project-tab').forEach(item => {
                item.classList.remove('active');
            });

            tab.classList.add('active');

            // Update visible section
            document.querySelectorAll('.project-section').forEach(section => {
                section.classList.remove('active');
            });

            const target = document.querySelector(
                `.project-section[data-section="${selectedTab}"]`
            );

            if (target) {
                target.classList.add('active');
            }
        });

    });
</script>

</body>
</html>