<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ClimateShield — Readiness Guides</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <style>
    :root {
      --bg-body: #F8F9FA; --bg-card: #FFFFFF; --bg-subtle: #F1F5F9;
      --border-color: #E2E8F0; --text-main: #0F172A; --text-muted: #64748B;
      --primary-blue: #0EA5E9; --danger-red: #EF4444;
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
    .search-box { width: 100%; padding: 10px 14px; border-radius: var(--radius-pill); border: 1px solid var(--border-color); background: white; margin-bottom: 16px; font-size: 0.85rem; }

    .accordion { background: white; border-radius: var(--radius-lg); border: 1px solid var(--border-color); margin-bottom: 12px; overflow: hidden; }
    .accordion-header { padding: 16px; font-weight: 800; font-size: 0.9rem; cursor: pointer; display: flex; justify-content: space-between; align-items: center; }
    .accordion-content { padding: 0 16px 16px; font-size: 0.85rem; color: var(--text-muted); display: none; line-height: 1.5; }
    .accordion.open .accordion-content { display: block; }

    .checklist-item { display: flex; gap: 8px; margin-top: 8px; align-items: center; font-size: 0.8rem; }

    .bottom-nav { position: fixed; bottom: 0; left: 50%; transform: translateX(-50%); width: 100%; max-width: none; height: 62px; background: white; border-top: 1px solid var(--border-color); display: flex; justify-content: space-around; align-items: center; }
    .nav-item { color: var(--text-muted); font-size: 0.7rem; font-weight: 700; text-decoration: none; display: flex; flex-direction: column; align-items: center; }
    .nav-item.active { color: var(--primary-blue); }
  </style>
</head>
<body>

  <div class="app-container">
    <header>
      <div class="brand-title">Climate<span>Shield</span></div>
      <div style="font-size: 0.8rem; font-weight: 700;">📚 Safety Guides</div>
    </header>

    <main>
      <input type="text" class="search-box" placeholder="🔍 Search preparedness guides...">

      <div class="accordion open">
        <div class="accordion-header" onclick="this.parentElement.classList.toggle('open')">
          <span>🌊 Flood Safety Protocols</span>
          <span>▼</span>
        </div>
        <div class="accordion-content">
          <p>If water rises above curbside, follow these steps immediately:</p>
          <div class="checklist-item"><input type="checkbox"> Move electronic items to elevated tables or upper floors.</div>
          <div class="checklist-item"><input type="checkbox"> Never drive or walk through moving floodwater.</div>
          <div class="checklist-item"><input type="checkbox"> Keep go-bag with emergency medication near doorway.</div>
        </div>
      </div>

      <div class="accordion">
        <div class="accordion-header" onclick="this.parentElement.classList.toggle('open')">
          <span>☀️ Extreme Heat Spot Response</span>
          <span>▼</span>
        </div>
        <div class="accordion-content">
          <p>During Level 3 heat alerts above 35°C:</p>
          <div class="checklist-item"><input type="checkbox"> Locate nearest District Cooling Station on live map.</div>
          <div class="checklist-item"><input type="checkbox"> Check on elderly neighbors twice daily.</div>
        </div>
      </div>

      <div class="accordion">
        <div class="accordion-header" onclick="this.parentElement.classList.toggle('open')">
          <span>⚡ Power Outage Prep</span>
          <span>▼</span>
        </div>
        <div class="accordion-content">
          <p>In case of power loss during storms:</p>
          <div class="checklist-item"><input type="checkbox"> Keep refrigerators closed to preserve food temperature.</div>
          <div class="checklist-item"><input type="checkbox"> Switch to battery-powered LED lights instead of candles.</div>
        </div>
      </div>
    </main>

    <nav class="bottom-nav">
      <a href="{{ route('dashboard') }}" class="nav-item">Dashboard</a>
      <a href="{{ route('map') }}" class="nav-item">Map</a>
      <a href="{{ route('projects') }}" class="nav-item">Projects</a>
      <a href="{{ route('guides') }}" class="nav-item active">Guides</a>
    </nav>
  </div>

</body>
</html>
