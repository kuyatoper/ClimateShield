<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ClimateShield — Eco Projects</title>
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
    .brand-title { font-size: 1.2rem; font-weight: 800; }
    .brand-title span { color: var(--primary-blue); }

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
  </style>
</head>
<body>

  <div class="app-container">
    <header>
      <div class="brand-title">Climate<span>Shield</span></div>
      <div style="font-size: 0.8rem; font-weight: 700;">🌱 Eco Projects</div>
    </header>

    <main>
      <div class="section-title">Community Sustainability Initiatives</div>

      <div class="card">
        <div class="project-header">
          <div class="project-title">🌳 Urban Canopy Expansion</div>
          <span class="badge">Active</span>
        </div>
        <p style="font-size: 0.85rem; color: var(--text-muted);">Planting 1,500 shade trees to mitigate urban heat island effects in low-canopy neighborhoods.</p>
        <div class="progress-bar"><div class="progress-fill" style="width: 82%;"></div></div>
        <div class="meta-grid">
          <div><strong>1,240 / 1,500</strong> Trees Planted</div>
          <div style="text-align: right;"><strong>82%</strong> Funded</div>
        </div>
        <button class="btn-action" onclick="alert('Thank you for volunteering! Check your email for location updates.')">Join Volunteer Team</button>
      </div>

      <div class="card">
        <div class="project-header">
          <div class="project-title">☀️ Solar Microgrid Station</div>
          <span class="badge">Funding</span>
        </div>
        <p style="font-size: 0.85rem; color: var(--text-muted);">Installing community solar batteries to maintain power during storm blackouts.</p>
        <div class="progress-bar"><div class="progress-fill" style="width: 65%; background: var(--primary-blue);"></div></div>
        <div class="meta-grid">
          <div><strong>$13,000 / $20,000</strong> Raised</div>
          <div style="text-align: right;"><strong>65%</strong> Complete</div>
        </div>
        <button class="btn-action" style="background: var(--text-main);" onclick="alert('Redirecting to secure micro-donation portal...')">Pledge Support ($10)</button>
      </div>
    </main>

    <nav class="bottom-nav">
      <a href="{{ route('dashboard') }}" class="nav-item">Dashboard</a>
      <a href="{{ route('map') }}" class="nav-item">Map</a>
      <a href="{{ route('projects') }}" class="nav-item active">Projects</a>
      <a href="{{ route('guides') }}" class="nav-item">Guides</a>
    </nav>
  </div>

</body>
</html>