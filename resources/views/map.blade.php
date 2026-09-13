<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ClimateShield — District Map</title>
  @if (file_exists(public_path('build/manifest.json')))
    @vite('resources/css/map.css')
  @endif
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="">

  <style>
    :root {
      --bg-body: #F8F9FA;
      --bg-card: #FFFFFF;
      --bg-subtle: #F1F5F9;
      --border-color: #E2E8F0;
      --text-main: #0F172A;
      --text-muted: #64748B;
      --primary-blue: #0EA5E9;
      --danger-red: #EF4444;
      --warning-amber: #F59E0B;
      --success-green: #10B981;
      --shadow-sm: 0 1px 3px rgba(15, 23, 42, 0.05);
      --shadow-md: 0 8px 20px rgba(14, 165, 233, 0.18);
      --radius-md: 12px;
      --radius-lg: 18px;
      --radius-pill: 9999px;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background:
        radial-gradient(circle at 8% 8%, rgba(14, 165, 233, 0.12), transparent 28%),
        radial-gradient(circle at 92% 32%, rgba(16, 185, 129, 0.1), transparent 24%),
        linear-gradient(135deg, #f8fafc 0%, #eef6f7 100%);
      color: var(--text-main);
      display: flex;
      justify-content: stretch;
      min-height: 100vh;
    }

    .app-container {
      width: 100%;
      max-width: none;
      min-height: 100vh;
      position: relative;
      display: flex;
      flex-direction: column;
      overflow: hidden;
      box-shadow: 0 0 60px rgba(15, 23, 42, 0.08);
    }

    header {
      position: sticky; top: 0; z-index: 100;
      background-color: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(10px);
      padding: 14px 20px;
      border-bottom: 1px solid var(--border-color);
      display: flex; justify-content: space-between; align-items: center;
    }
    .brand-title { font-size: 1.2rem; font-weight: 800; }
    .brand-title span { color: var(--primary-blue); }
    header > div:last-child { animation: fade-slide-in 0.55s 0.12s both; }

    /* Map Controls Bar */
    .filter-bar {
      display: flex; gap: 8px; padding: 12px 20px;
      background: white; border-bottom: 1px solid var(--border-color);
      overflow-x: auto;
    }
    .filter-chip {
      font-size: 0.75rem; font-weight: 700; padding: 6px 14px;
      border-radius: var(--radius-pill); border: 1px solid var(--border-color);
      background: var(--bg-body); color: var(--text-muted); cursor: pointer; white-space: nowrap;
      transition: transform 0.2s ease, background-color 0.2s ease, color 0.2s ease, box-shadow 0.2s ease;
    }
    .filter-chip.active { background: var(--primary-blue); color: white; border-color: var(--primary-blue); }
    .filter-chip:hover { transform: translateY(-2px); color: var(--primary-hover); box-shadow: 0 5px 12px rgba(14, 165, 233, 0.14); }
    .filter-chip.active:hover { color: white; background: var(--primary-hover); }
    .filter-chip:focus-visible, .map-pin:focus-visible, .nav-item:focus-visible {
      outline: 3px solid rgba(14, 165, 233, 0.35);
      outline-offset: 3px;
    }

    .search-bar {
      display: flex; gap: 8px; padding: 10px 20px;
      background: white; border-bottom: 1px solid var(--border-color);
    }

    .search-input {
      min-width: 0; flex: 1; padding: 10px 12px; border: 1px solid var(--border-color);
      border-radius: var(--radius-md); background: var(--bg-body); color: var(--text-main);
      font: inherit; font-size: 0.78rem;
    }

    .search-button {
      border: 0; border-radius: var(--radius-md); padding: 0 14px; background: var(--primary-blue);
      color: white; font: inherit; font-size: 0.78rem; font-weight: 800; cursor: pointer;
      transition: transform 0.2s ease, background-color 0.2s ease, box-shadow 0.2s ease;
    }

    .search-button:hover { background: var(--primary-hover); transform: translateY(-2px); box-shadow: var(--shadow-md); }

    .search-results {
      position: absolute; top: 112px; left: 20px; right: 20px; z-index: 10;
      display: grid; gap: 4px; padding: 6px; background: rgba(255, 255, 255, 0.97);
      border: 1px solid var(--border-color); border-radius: var(--radius-md); box-shadow: var(--shadow-lg);
    }

    .search-results[hidden] { display: none; }

    .search-result {
      border: 0; border-radius: 8px; padding: 9px 10px; background: transparent; color: var(--text-main);
      text-align: left; font: inherit; font-size: 0.74rem; cursor: pointer;
    }

    .search-result:hover, .search-result:focus-visible { background: var(--bg-subtle); outline: none; }

    /* Interactive Map Canvas Simulator */
    .map-wrapper {
      position: relative; flex: 1; min-height: calc(100vh - 220px);
      background: #dbe7ec;
      overflow: hidden;
      animation: map-reveal 0.7s ease both;
    }

    #climateMap { position: absolute; inset: 0; }
    .leaflet-container { font: inherit; }
    .leaflet-control-zoom a { color: var(--text-main); }
    .climate-marker {
      width: 34px; height: 34px; border: 3px solid white; border-radius: 50%;
      display: flex; align-items: center; justify-content: center; color: white;
      font-size: 0.95rem; font-weight: 800; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.28);
      animation: pin-pop 0.55s both, pin-pulse 3.2s 1.2s ease-in-out infinite;
    }

    .map-wrapper::after {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(180deg, rgba(15, 23, 42, 0.03), transparent 42%, rgba(15, 23, 42, 0.12));
      pointer-events: none;
      z-index: 1;
    }

    /* Map Pins */
    .map-pin {
      position: absolute; width: 36px; height: 36px; border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      color: white; font-size: 1rem; cursor: pointer;
      box-shadow: 0 4px 10px rgba(0,0,0,0.25);
      transform: translate(-50%, -50%); transition: transform 0.2s;
      z-index: 2;
      animation: pin-pop 0.55s both, pin-pulse 3.2s 1.2s ease-in-out infinite;
    }
    .map-pin:nth-child(2) { animation-delay: 0.12s, 1.7s; }
    .map-pin:nth-child(3) { animation-delay: 0.24s, 2.2s; }
    .map-pin:hover { transform: translate(-50%, -50%) scale(1.15); animation-play-state: paused; }
    .pin-flood { background: var(--danger-red); border: 2px solid white; }
    .pin-tree { background: var(--warning-amber); border: 2px solid white; }
    .pin-green { background: var(--success-green); border: 2px solid white; }

    /* Map Popup Drawer */
    .map-drawer {
      position: absolute; bottom: 80px; left: 16px; right: 16px;
      background: white; border-radius: var(--radius-lg); padding: 16px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.15); border: 1px solid var(--border-color);
      transition: all 0.3s ease;
      z-index: 3;
      animation: drawer-in 0.65s 0.3s both;
    }
    .drawer-title { font-weight: 800; font-size: 0.95rem; display: flex; justify-content: space-between; }
    .drawer-sub { font-size: 0.75rem; color: var(--text-muted); margin-top: 2px; }
    .drawer-desc { font-size: 0.85rem; margin-top: 8px; color: var(--text-main); }

    /* Bottom Nav */
    .bottom-nav {
      position: fixed; bottom: 0; left: 50%; transform: translateX(-50%);
      width: 100%; max-width: none; height: 62px; background: white;
      border-top: 1px solid var(--border-color); display: flex; justify-content: space-around; align-items: center; z-index: 100;
    }
    .nav-item { color: var(--text-muted); font-size: 0.7rem; font-weight: 700; text-decoration: none; display: flex; flex-direction: column; align-items: center; gap: 3px; }
    .nav-item.active { color: var(--primary-blue); }
    .nav-item { transition: color 0.2s ease, transform 0.2s ease; }
    .nav-item:hover { color: var(--primary-hover); transform: translateY(-3px); }

    @keyframes fade-slide-in {
      from { opacity: 0; transform: translateX(10px); }
      to { opacity: 1; transform: translateX(0); }
    }

    @keyframes map-reveal {
      from { opacity: 0; transform: scale(1.03); }
      to { opacity: 1; transform: scale(1); }
    }

    @keyframes pin-pop {
      from { opacity: 0; transform: translate(-50%, -50%) scale(0.5); }
      to { opacity: 1; transform: translate(-50%, -50%) scale(1); }
    }

    @keyframes pin-pulse {
      0%, 100% { box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25); }
      50% { box-shadow: 0 0 0 8px rgba(14, 165, 233, 0.12), 0 6px 14px rgba(0, 0, 0, 0.28); }
    }

    @keyframes drawer-in {
      from { opacity: 0; transform: translateY(18px); }
      to { opacity: 1; transform: translateY(0); }
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
    <header>
      <div class="brand-title">Climate<span>Shield</span></div>
      <div style="font-size: 0.8rem; font-weight: 700;">🗺️ District Live Map</div>
    </header>

    <div class="filter-bar">
      <button class="filter-chip active" onclick="filterPins('all', this)">All Layers</button>
      <button class="filter-chip" onclick="filterPins('flood', this)">🌊 Floods</button>
      <button class="filter-chip" onclick="filterPins('tree', this)">⚡ Hazards</button>
      <button class="filter-chip" onclick="filterPins('green', this)">🌳 Eco-Projects</button>
    </div>

    <form class="search-bar" id="placeSearchForm">
      <input class="search-input" id="placeSearchInput" type="search" placeholder="Search a place in the Philippines" aria-label="Search a place in the Philippines" autocomplete="off">
      <button class="search-button" type="submit">Search</button>
    </form>

    <div class="map-wrapper">
      <div id="climateMap" aria-label="ClimateShield live district map"></div>
      <div class="search-results" id="searchResults" hidden></div>

      <!-- Drawer Info Box -->
      <div class="map-drawer" id="mapDrawer">
        <div class="drawer-title" id="dTitle">Select a pin on the map</div>
        <div class="drawer-sub" id="dSub">Tap icons above to view real-time hazards</div>
        <p class="drawer-desc" id="dDesc">Live GPS coordinates updating every 30 seconds.</p>
      </div>
    </div>

    <nav class="bottom-nav">
      <a href="{{ route('dashboard') }}" class="nav-item">Dashboard</a>
      <a href="{{ route('map') }}" class="nav-item active">Map</a>
      <a href="{{ route('projects') }}" class="nav-item">Projects</a>
      <a href="{{ route('guides') }}" class="nav-item">Guides</a>
    </nav>
  </div>

  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
  <script>
    const mapReports = [
      { category: 'flood', position: [14.5995, 120.9842], title: '🌊 Flash Flood Alert', location: 'Manila City Center', description: 'Water depth: 1.2 ft. Road closed to sedans.', color: '#EF4444', icon: '!' },
      { category: 'tree', position: [14.6091, 121.0223], title: '⚡ Fallen Tree Branch', location: 'Quezon City', description: 'Blocking northbound traffic. Cleanup team en route.', color: '#F59E0B', icon: '🌳' },
      { category: 'green', position: [14.5547, 121.0244], title: '🌱 Urban Tree Canopy', location: 'Makati Greenway', description: '350 new saplings planted this month.', color: '#10B981', icon: '🌳' }
    ];

    const philippinesBounds = L.latLngBounds([4.2, 116.5], [21.5, 127.0]);
    const climateMap = L.map('climateMap', {
      zoomControl: true,
      attributionControl: true,
      maxBounds: philippinesBounds,
      maxBoundsViscosity: 1,
      minZoom: 5
    }).setView([14.5995, 120.9842], 6);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; OpenStreetMap contributors'
    }).addTo(climateMap);

    const reportMarkers = mapReports.map((report) => {
      const icon = L.divIcon({
        className: '',
        html: `<div class="climate-marker" style="background:${report.color}">${report.icon}</div>`,
        iconSize: [34, 34],
        iconAnchor: [17, 17]
      });
      const marker = L.marker(report.position, { icon, title: report.location }).addTo(climateMap);
      marker.on('click', () => showDrawer(report.title, report.location, report.description));
      return { category: report.category, marker };
    });

    let searchMarker;
    const searchForm = document.getElementById('placeSearchForm');
    const searchInput = document.getElementById('placeSearchInput');
    const searchResults = document.getElementById('searchResults');

    function showSearchMessage(message) {
      searchResults.innerHTML = `<div class="search-result" role="status">${message}</div>`;
      searchResults.hidden = false;
    }

    function renderSearchResults(places) {
      searchResults.innerHTML = '';
      places.forEach((place) => {
        const result = document.createElement('button');
        result.type = 'button';
        result.className = 'search-result';
        result.textContent = place.display_name;
        result.addEventListener('click', () => {
          const coordinates = [Number(place.lat), Number(place.lon)];
          climateMap.setView(coordinates, 14, { animate: true });
          searchMarker?.remove();
          searchMarker = L.marker(coordinates).addTo(climateMap).bindPopup(`<strong>${place.display_name}</strong>`).openPopup();
          searchResults.hidden = true;
        });
        searchResults.appendChild(result);
      });
      searchResults.hidden = places.length === 0;
    }

    searchForm.addEventListener('submit', async (event) => {
      event.preventDefault();
      const query = searchInput.value.trim();
      if (!query) return;

      showSearchMessage('Searching Philippine locations...');
      try {
        const response = await fetch(`https://nominatim.openstreetmap.org/search?format=jsonv2&addressdetails=1&countrycodes=ph&limit=5&q=${encodeURIComponent(query)}`, {
          headers: { Accept: 'application/json' }
        });
        if (!response.ok) throw new Error('Search request failed');
        const places = await response.json();
        if (!places.length) {
          showSearchMessage('No Philippine location found. Try a city, landmark, or province.');
          return;
        }
        renderSearchResults(places);
      } catch (error) {
        showSearchMessage('Search is unavailable right now. Please try again.');
      }
    });

    document.addEventListener('click', (event) => {
      if (!searchForm.contains(event.target) && !searchResults.contains(event.target)) {
        searchResults.hidden = true;
      }
    });

    function showDrawer(title, sub, desc) {
      document.getElementById('dTitle').textContent = title;
      document.getElementById('dSub').textContent = '📍 ' + sub;
      document.getElementById('dDesc').textContent = desc;
    }

    function filterPins(category, btn) {
      document.querySelectorAll('.filter-chip').forEach(c => c.classList.remove('active'));
      btn.classList.add('active');
      reportMarkers.forEach(({ category: pinCategory, marker }) => {
        const shouldShow = category === 'all' || pinCategory === category;
        if (shouldShow) {
          marker.addTo(climateMap);
        } else {
          marker.remove();
        }
      });
    }
  </script>
</body>
</html>