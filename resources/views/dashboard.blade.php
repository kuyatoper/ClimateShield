<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ClimateShield — Dashboard</title>
  @if (file_exists(public_path('build/manifest.json')))
    @vite('resources/css/dashboard.css')
  @endif

  <!-- Typography: Plus Jakarta Sans -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <style>
    /* ==========================================================================
       1. Design System & CSS Variables
       ========================================================================== */
    :root {
      /* Backgrounds & Neutrals */
      --bg-body: #F8F9FA;
      --bg-card: #FFFFFF;
      --bg-subtle: #F1F5F9;
      --border-color: #E2E8F0;

      /* Text Hierarchy */
      --text-main: #0F172A;
      --text-muted: #64748B;
      --text-inverse: #FFFFFF;

      /* Primary Brand & Status Palette */
      --primary-blue: #0EA5E9;   /* Sky Blue */
      --primary-hover: #0284C7;
      --danger-red: #EF4444;     /* Coral Red */
      --danger-bg: #FEF2F2;
      --warning-amber: #F59E0B;  /* Amber */
      --warning-bg: #FFFBEB;
      --success-green: #10B981;  /* Emerald Green */
      --success-bg: #ECFDF5;

      /* Shadows & Radii */
      --shadow-sm: 0 1px 3px rgba(15, 23, 42, 0.05);
      --shadow-md: 0 8px 20px rgba(14, 165, 233, 0.18);
      --shadow-lg: 0 12px 28px rgba(15, 23, 42, 0.15);
      
      --radius-sm: 8px;
      --radius-md: 12px;
      --radius-lg: 18px;
      --radius-pill: 9999px;

      --transition-fast: 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
      background:
        radial-gradient(circle at 8% 8%, rgba(14, 165, 233, 0.12), transparent 28%),
        radial-gradient(circle at 92% 32%, rgba(16, 185, 129, 0.1), transparent 24%),
        linear-gradient(135deg, #f8fafc 0%, #eef6f7 100%);
      color: var(--text-main);
      line-height: 1.5;
      display: flex;
      justify-content: stretch;
      -webkit-font-smoothing: antialiased;
    }

    /* App Container Shell */
    .app-container {
      width: 100%;
      max-width: none;
      background-color: var(--bg-body);
      min-height: 100vh;
      position: relative;
      overflow: hidden;
      box-shadow: 0 0 60px rgba(15, 23, 42, 0.08);
    }

    /* ==========================================================================
       2. Sticky Header
       ========================================================================== */
    header {
      position: sticky;
      top: 0;
      z-index: 100;
      background-color: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      padding: 14px 20px;
      border-bottom: 1px solid var(--border-color);
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .brand-title {
      font-size: 1.2rem;
      font-weight: 800;
      display: flex;
      align-items: center;
      gap: 6px;
      letter-spacing: -0.4px;
    }

    .brand-title span {
      color: var(--primary-blue);
    }

    .brand-title svg {
      animation: shield-pulse 3s ease-in-out infinite;
    }

    .header-pills {
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .location-pill {
      font-size: 0.75rem;
      font-weight: 600;
      background: var(--bg-subtle);
      padding: 6px 12px;
      border-radius: var(--radius-pill);
      color: var(--text-main);
      border: 1px solid var(--border-color);
      transition: transform var(--transition-fast), box-shadow var(--transition-fast);
    }

    .location-pill:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow-sm);
    }

    .sos-pill {
      font-size: 0.75rem;
      font-weight: 800;
      background: var(--danger-bg);
      color: var(--danger-red);
      border: 1px solid rgba(239, 68, 68, 0.25);
      padding: 6px 12px;
      border-radius: var(--radius-pill);
      cursor: pointer;
      transition: var(--transition-fast);
    }

    .sos-pill:hover {
      background-color: var(--danger-red);
      color: var(--text-inverse);
      transform: translateY(-2px) scale(1.03);
      box-shadow: 0 8px 18px rgba(239, 68, 68, 0.25);
    }

    button:focus-visible, a:focus-visible, input:focus-visible, select:focus-visible, textarea:focus-visible {
      outline: 3px solid rgba(14, 165, 233, 0.35);
      outline-offset: 3px;
    }

    /* ==========================================================================
       3. Main Canvas & Layout
       ========================================================================== */
    main {
      padding: 16px 20px 140px; /* 140px padding ensures content is not covered by FAB */
    }

    .section-head {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 22px 0 12px;
    }

    .section-head:first-of-type {
      margin-top: 4px;
    }

    .section-title {
      font-size: 0.75rem;
      font-weight: 800;
      text-transform: uppercase;
      letter-spacing: 0.8px;
      color: var(--text-muted);
    }

    .view-all {
      font-size: 0.8rem;
      font-weight: 700;
      color: var(--primary-blue);
      text-decoration: none;
    }

    /* ==========================================================================
       4. Real-Time Top Metrics Grid
       ========================================================================== */
    .metrics-row {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 10px;
    }

    .metric-card {
      background: var(--bg-card);
      border-radius: var(--radius-lg);
      padding: 12px;
      border: 1px solid var(--border-color);
      box-shadow: var(--shadow-sm);
      animation: rise-in 0.55s both;
      transition: transform var(--transition-fast), box-shadow var(--transition-fast), border-color var(--transition-fast);
    }

    .metric-card:nth-child(2) { animation-delay: 0.08s; }
    .metric-card:nth-child(3) { animation-delay: 0.16s; }

    .metric-card:hover {
      transform: translateY(-5px);
      border-color: rgba(14, 165, 233, 0.45);
      box-shadow: var(--shadow-md);
    }

    .metric-label {
      font-size: 0.65rem;
      font-weight: 700;
      color: var(--text-muted);
      text-transform: uppercase;
    }

    .metric-val {
      font-size: 1.4rem;
      font-weight: 800;
      margin: 2px 0 4px;
      line-height: 1.1;
    }

    .metric-tag {
      font-size: 0.65rem;
      font-weight: 700;
      padding: 2px 6px;
      border-radius: var(--radius-pill);
      display: inline-block;
    }

    .tag-good { background: var(--success-bg); color: var(--success-green); }
    .tag-danger { background: var(--danger-bg); color: var(--danger-red); }
    .tag-warn { background: var(--warning-bg); color: var(--warning-amber); }

    /* ==========================================================================
       5. Cards & Feed Items
       ========================================================================== */
    .card {
      background: var(--bg-card);
      border-radius: var(--radius-lg);
      padding: 16px;
      border: 1px solid var(--border-color);
      box-shadow: var(--shadow-sm);
      margin-bottom: 12px;
      position: relative;
      animation: rise-in 0.6s 0.18s both;
      transition: transform var(--transition-fast), box-shadow var(--transition-fast), border-color var(--transition-fast);
    }

    .card:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 26px rgba(15, 23, 42, 0.1);
      border-color: rgba(14, 165, 233, 0.32);
    }

    .card.critical { border-left: 5px solid var(--danger-red); }
    .card.warning { border-left: 5px solid var(--warning-amber); }

    .card-title-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 4px;
    }

    .card-title {
      font-size: 0.95rem;
      font-weight: 800;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .card-title.critical { color: var(--danger-red); }
    .card-title.warning { color: var(--warning-amber); }

    .time-stamp {
      font-size: 0.75rem;
      color: var(--text-muted);
      font-weight: 500;
    }

    .location-text {
      font-size: 0.75rem;
      font-weight: 600;
      color: var(--text-muted);
      margin-bottom: 8px;
    }

    .card-desc {
      font-size: 0.85rem;
      color: var(--text-main);
      margin-bottom: 12px;
      line-height: 1.45;
    }

    .btn-confirm {
      background: var(--bg-body);
      border: 1px solid var(--border-color);
      padding: 6px 14px;
      border-radius: var(--radius-pill);
      font-size: 0.75rem;
      font-weight: 700;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 4px;
      transition: var(--transition-fast);
      color: var(--text-main);
    }

    .btn-confirm:hover, .btn-confirm.active {
      background: var(--success-bg);
      border-color: var(--success-green);
      color: var(--success-green);
      transform: translateX(3px);
    }

    /* Progress Indicators */
    .progress-bar {
      width: 100%;
      height: 8px;
      background: var(--bg-subtle);
      border-radius: var(--radius-pill);
      overflow: hidden;
      margin: 10px 0 6px;
    }

    .progress-fill {
      height: 100%;
      background: var(--success-green);
      border-radius: var(--radius-pill);
      transition: width 0.4s ease;
      animation: progress-in 1.2s 0.35s both;
    }

    .progress-meta {
      display: flex;
      justify-content: space-between;
      font-size: 0.75rem;
      color: var(--text-muted);
    }

    /* ==========================================================================
       6. Floating Action Button & Bottom Nav
       ========================================================================== */
    .fab-button {
      position: fixed;
      bottom: 75px;
      left: 50%;
      transform: translateX(-50%);
      width: calc(100% - 40px);
      max-width: 440px;
      background-color: var(--primary-blue);
      color: var(--text-inverse);
      border: none;
      padding: 14px;
      border-radius: var(--radius-pill);
      font-size: 0.9rem;
      font-weight: 800;
      cursor: pointer;
      box-shadow: var(--shadow-md);
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 8px;
      z-index: 90;
      transition: var(--transition-fast);
    }

    .fab-button:hover {
      background-color: var(--primary-hover);
      box-shadow: var(--shadow-lg);
      transform: translateX(-50%) translateY(-4px);
    }

    .fab-button::after {
      content: '';
      position: absolute;
      inset: 0;
      border-radius: inherit;
      background: linear-gradient(110deg, transparent 25%, rgba(255, 255, 255, 0.28) 50%, transparent 75%);
      transform: translateX(-120%);
      animation: button-shine 4s 1.5s infinite;
      pointer-events: none;
    }

    .bottom-nav {
      position: fixed;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 100%;
      max-width: none;
      height: 62px;
      background: var(--bg-card);
      border-top: 1px solid var(--border-color);
      display: flex;
      justify-content: space-around;
      align-items: center;
      z-index: 100;
    }

    .nav-item {
      color: var(--text-muted);
      font-size: 0.7rem;
      font-weight: 700;
      text-decoration: none;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 3px;
      background: none;
      border: none;
      cursor: pointer;
      transition: var(--transition-fast);
    }

    .nav-item svg {
      width: 20px;
      height: 20px;
      fill: none;
      stroke: currentColor;
      stroke-width: 2.2;
      stroke-linecap: round;
      stroke-linejoin: round;
    }

    .nav-item.active {
      color: var(--primary-blue);
    }

    .nav-item:hover {
      color: var(--primary-hover);
      transform: translateY(-3px);
    }

    /* ==========================================================================
       7. Modal & Overlays
       ========================================================================== */
    .modal-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(15, 23, 42, 0.45);
      backdrop-filter: blur(4px);
      z-index: 200;
      display: flex;
      justify-content: center;
      align-items: flex-end;
      opacity: 0;
      pointer-events: none;
      transition: var(--transition-fast);
    }

    .modal-overlay.active {
      opacity: 1;
      pointer-events: auto;
    }

    .modal-sheet {
      background: var(--bg-card);
      width: 100%;
      max-width: 480px;
      border-radius: var(--radius-lg) var(--radius-lg) 0 0;
      padding: 24px;
      box-shadow: var(--shadow-lg);
      transform: translateY(100%);
      transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .modal-overlay.active .modal-sheet {
      transform: translateY(0);
    }

    .modal-head {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 16px;
    }

    .modal-title {
      font-size: 1.1rem;
      font-weight: 800;
    }

    .close-btn {
      background: none;
      border: none;
      font-size: 1.2rem;
      color: var(--text-muted);
      cursor: pointer;
    }

    .form-group {
      margin-bottom: 12px;
    }

    .form-label {
      display: block;
      font-size: 0.72rem;
      font-weight: 800;
      text-transform: uppercase;
      color: var(--text-muted);
      margin-bottom: 4px;
    }

    .form-input, .form-select, .form-textarea {
      width: 100%;
      padding: 10px 12px;
      border-radius: var(--radius-md);
      border: 1px solid var(--border-color);
      background: var(--bg-body);
      font-family: inherit;
      font-size: 0.85rem;
      color: var(--text-main);
    }

    .form-textarea {
      resize: none;
      height: 70px;
    }

    @keyframes rise-in {
      from { opacity: 0; transform: translateY(16px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes progress-in {
      from { width: 0; }
    }

    @keyframes shield-pulse {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.08) rotate(-2deg); }
    }

    @keyframes button-shine {
      0%, 55% { transform: translateX(-120%); }
      75%, 100% { transform: translateX(120%); }
    }

    @media (prefers-reduced-motion: reduce) {
      *, *::before, *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        scroll-behavior: auto !important;
        transition-duration: 0.01ms !important;
      }
    }
  </style>
</head>
<body>

  <div class="app-container">
    
    <!-- Header -->
    <header>
      <div class="brand-title">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0EA5E9" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
        </svg>
        Climate<span>Shield</span>
      </div>
      <div class="header-pills">
        <div class="location-pill">Welcome, {{ auth()->user()->name }}</div>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="location-pill" type="submit">Log out</button>
        </form>
        <button class="sos-pill" onclick="triggerSOS()">SOS</button>
      </div>
    </header>

    <main>

      <!-- Real-Time Metrics Row -->
      <div class="section-head">
        <div class="section-title">Live Station Metrics</div>
      </div>

      <div class="metrics-row">
        <div class="metric-card">
          <div class="metric-label">AQI</div>
          <div class="metric-val">42</div>
          <span class="metric-tag tag-good">Good</span>
        </div>
        <div class="metric-card">
          <div class="metric-label">Flood Risk</div>
          <div class="metric-val">HIGH</div>
          <span class="metric-tag tag-danger">Level 3</span>
        </div>
        <div class="metric-card">
          <div class="metric-label">Temp</div>
          <div class="metric-val">31°C</div>
          <span class="metric-tag tag-warn">Heat Spot</span>
        </div>
      </div>

      <!-- Hazard Feed -->
      <div class="section-head">
        <div class="section-title">Active Hazard Reports</div>
      </div>

      <div id="hazardFeed">

        <!-- Critical Card -->
        <div class="card critical">
          <div class="card-title-row">
            <span class="card-title critical">⚠️ Flash Flood Warning</span>
            <span class="time-stamp">12m ago</span>
          </div>
          <div class="location-text">📍 Main Street & 5th Ave Intersection</div>
          <p class="card-desc">Water levels rising rapidly due to clogged drainage. High clearance vehicles only.</p>
          <button class="btn-confirm" onclick="toggleVote(this, 18)">
            ▲ Confirm Hazard ( <span class="num">18</span> )
          </button>
        </div>

        <!-- Warning Card -->
        <div class="card warning">
          <div class="card-title-row">
            <span class="card-title warning">⚡ Fallen Tree Branch</span>
            <span class="time-stamp">42m ago</span>
          </div>
          <div class="location-text">📍 Oak Ridge Residential Zone</div>
          <p class="card-desc">Large branch blocking northbound lane. Utility workers notified.</p>
          <button class="btn-confirm" onclick="toggleVote(this, 9)">
            ▲ Confirm Hazard ( <span class="num">9</span> )
          </button>
        </div>

      </div>

      <!-- Sustainability Goals -->
      <div class="section-head">
        <div class="section-title">Sustainability Goals</div>
        <a href="{{ route('projects') }}" class="view-all">View All</a>
      </div>

      <div class="card">
        <div class="card-title-row">
          <span class="card-title">🌳 Urban Canopy Project</span>
          <span style="color: var(--success-green); font-weight: 800; font-size: 0.85rem;">1,240 / 1,500</span>
        </div>
        <div class="progress-bar">
          <div class="progress-fill" style="width: 82%;"></div>
        </div>
        <div class="progress-meta">
          <span>Target: 1,500 Trees</span>
          <span>82% Completed</span>
        </div>
      </div>

      <div class="card">
        <div class="card-title-row">
          <span class="card-title">☀️ Solar Microgrid Access</span>
          <span style="color: var(--success-green); font-weight: 800; font-size: 0.85rem;">65% Target</span>
        </div>
        <div class="progress-bar">
          <div class="progress-fill" style="width: 65%;"></div>
        </div>
        <div class="progress-meta">
          <span>District Objective</span>
          <span>65% Completed</span>
        </div>
      </div>

    </main>

    <!-- Floating Action Button -->
    <button class="fab-button" onclick="openReportModal()">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
      Report Environmental Hazard
    </button>

    <!-- Navigation -->
    <nav class="bottom-nav">
      <a href="{{ route('dashboard') }}" class="nav-item active">
        <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
        Dashboard
      </a>
      <a href="{{ route('map') }}" class="nav-item">
        <svg viewBox="0 0 24 24"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"/><line x1="8" y1="2" x2="8" y2="18"/><line x1="16" y1="6" x2="16" y2="22"/></svg>
        Map
      </a>
      <a href="{{ route('projects') }}" class="nav-item">
        <svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        Projects
      </a>
      <a href="{{ route('guides') }}" class="nav-item">
        <svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
        Guides
      </a>
    </nav>

  </div>

  <!-- Bottom Sheet Modal for Hazard Reporting -->
  <div class="modal-overlay" id="reportModal">
    <div class="modal-sheet">
      <div class="modal-head">
        <div class="modal-title">Submit Hazard Alert</div>
        <button class="close-btn" onclick="closeReportModal()">✕</button>
      </div>

      <form id="hazardForm" onsubmit="addHazardReport(event)">
        <div class="form-group">
          <label class="form-label">Hazard Type</label>
          <select class="form-select" id="formType" required>
            <option value="critical">⚠️ Flash Flood / High Water</option>
            <option value="warning">⚡ Fallen Tree / Branch Block</option>
            <option value="warning">🔥 Urban Heat Spot</option>
            <option value="critical">⚡ Damaged Power Lines</option>
          </select>
        </div>

        <div class="form-group">
          <label class="form-label">Location / Landmark</label>
          <input type="text" class="form-input" id="formLocation" placeholder="e.g. 7th St & Park Avenue" required>
        </div>

        <div class="form-group">
          <label class="form-label">Details & Notes</label>
          <textarea class="form-textarea" id="formDesc" placeholder="Describe the current risk status..." required></textarea>
        </div>

        <button type="submit" class="fab-button" style="position: static; width: 100%; transform: none; margin-top: 10px;">
          Submit Community Report
        </button>
      </form>
    </div>
  </div>

  <!-- JavaScript Logic -->
  <script>
    function toggleVote(btn, initialCount) {
      const numSpan = btn.querySelector('.num');
      const isActive = btn.classList.contains('active');

      if (isActive) {
        btn.classList.remove('active');
        numSpan.textContent = initialCount;
      } else {
        btn.classList.add('active');
        numSpan.textContent = initialCount + 1;
      }
    }

    function openReportModal() {
      document.getElementById('reportModal').classList.add('active');
    }

    function closeReportModal() {
      document.getElementById('reportModal').classList.remove('active');
    }

    function addHazardReport(e) {
      e.preventDefault();

      const type = document.getElementById('formType').value;
      const location = document.getElementById('formLocation').value;
      const desc = document.getElementById('formDesc').value;

      const isCritical = type === 'critical';
      const typeLabel = isCritical ? '⚠️ Flash Flood / High Risk' : '⚡ Environmental Warning';
      const cardClass = isCritical ? 'critical' : 'warning';

      const feed = document.getElementById('hazardFeed');
      const newCard = document.createElement('div');
      newCard.className = `card ${cardClass}`;

      newCard.innerHTML = `
        <div class="card-title-row">
          <span class="card-title ${cardClass}">${typeLabel}</span>
          <span class="time-stamp">Just now</span>
        </div>
        <div class="location-text">📍 ${location}</div>
        <p class="card-desc">${desc}</p>
        <button class="btn-confirm" onclick="toggleVote(this, 1)">
          ▲ Confirm Hazard ( <span class="num">1</span> )
        </button>
      `;

      feed.prepend(newCard);
      closeReportModal();
      document.getElementById('hazardForm').reset();
    }

    function triggerSOS() {
      alert("🚨 SOS Emergency Alert Sent!\nYour location has been transmitted to Metro District emergency response services.");
    }
  </script>
</body>
</html>