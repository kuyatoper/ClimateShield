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
  max-width: 1440px;
  margin: 0 auto;

  background-color: var(--bg-body);

  min-height: 100vh;

  position: relative;
  overflow: hidden;

  box-shadow:
    0 0 60px rgba(15, 23, 42, 0.08);
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
  width: 100%;
  max-width: 1180px;

  margin: 0 auto;

  padding: 24px 28px 150px;
}
@media (max-width: 700px) {
  main {
    padding: 18px 16px 140px;
  }
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

    .view-history {
  font-size: 0.75rem;
  font-weight: 800;
  color: var(--primary-blue);
  text-decoration: none;
  padding: 7px 11px;
  border-radius: var(--radius-pill);
  background: rgba(14, 165, 233, 0.08);
  border: 1px solid rgba(14, 165, 233, 0.15);
  transition: var(--transition-fast);
}

.view-history:hover {
  background: var(--primary-blue);
  color: var(--text-inverse);
  transform: translateY(-2px);
  box-shadow: var(--shadow-sm);
}

/* ==========================================================================
   3.5 Dashboard Status Header
   ========================================================================== */

.dashboard-status {
  display: flex;
  align-items: center;
  justify-content: space-between;

  gap: 20px;

  margin-bottom: 18px;

  padding: 22px 24px;

  background:
    linear-gradient(
      135deg,
      rgba(14, 165, 233, 0.10),
      rgba(16, 185, 129, 0.06)
    );

  border: 1px solid rgba(14, 165, 233, 0.16);

  border-radius: 20px;

  box-shadow:
    0 8px 24px rgba(15, 23, 42, 0.05);
}

.dashboard-status-actions {
  display: flex;

  align-items: center;

  gap: 10px;

  flex-shrink: 0;
}

.dashboard-status-actions .view-history {
  margin: 0;

  white-space: nowrap;
}

@media (max-width: 700px) {

  .dashboard-status {
    flex-direction: column;

    align-items: flex-start;
  }

  .dashboard-status-actions {
    width: 100%;

    justify-content: space-between;
  }

}

.dashboard-status-main {
  display: flex;
  align-items: center;
  gap: 14px;
}

.status-icon {
  width: 48px;
  height: 48px;

  flex-shrink: 0;

  display: flex;
  align-items: center;
  justify-content: center;

  border-radius: 14px;

  background: rgba(14, 165, 233, 0.12);

  color: var(--primary-blue);
}

.status-icon svg {
  width: 24px;
  height: 24px;
}

.dashboard-eyebrow {
  font-size: 0.65rem;
  font-weight: 800;

  letter-spacing: 1px;

  color: var(--primary-blue);

  margin-bottom: 3px;
}

.dashboard-title {
  font-size: 1.35rem;
  font-weight: 800;

  line-height: 1.2;

  color: var(--text-main);
}

.dashboard-subtitle {
  margin-top: 4px;

  font-size: 0.78rem;
  font-weight: 500;

  color: var(--text-muted);
}

.live-status {
  display: inline-flex;
  align-items: center;
  gap: 7px;

  padding: 7px 12px;

  border-radius: var(--radius-pill);

  background: var(--success-bg);

  border: 1px solid rgba(16, 185, 129, 0.2);

  color: var(--success-green);

  font-size: 0.72rem;
  font-weight: 800;

  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.live-dot {
  width: 8px;
  height: 8px;

  border-radius: 50%;

  background: var(--success-green);

  box-shadow:
    0 0 0 4px rgba(16, 185, 129, 0.12);

  animation: live-pulse 2s infinite;
}

@keyframes live-pulse {
  0%, 100% {
    opacity: 1;
  }

  50% {
    opacity: 0.45;
  }
}

@media (max-width: 640px) {

  .dashboard-status {
    align-items: flex-start;
    padding: 18px;
  }

  .dashboard-title {
    font-size: 1.15rem;
  }

  .dashboard-subtitle {
    font-size: 0.72rem;
  }

  .live-status {
    padding: 6px 9px;
  }
}

   /* ==========================================================================
   4. Real-Time Metrics
   ========================================================================== */

.metrics-row {
  display: grid;

  grid-template-columns:
    repeat(3, minmax(0, 1fr));

  gap: 14px;
}

.metric-card {
  position: relative;

  background: var(--bg-card);

  border-radius: 18px;

  padding: 18px;

  min-height: 132px;

  border: 1px solid var(--border-color);

  box-shadow:
    0 4px 14px rgba(15, 23, 42, 0.05);

  overflow: hidden;

  animation: rise-in 0.55s both;

  transition:
    transform var(--transition-fast),
    box-shadow var(--transition-fast),
    border-color var(--transition-fast);
}

.metric-card::after {
  content: '';

  position: absolute;

  right: -24px;
  bottom: -24px;

  width: 90px;
  height: 90px;

  border-radius: 50%;

  background: rgba(14, 165, 233, 0.05);

  pointer-events: none;
}

.metric-card:hover {
  transform: translateY(-4px);

  border-color:
    rgba(14, 165, 233, 0.35);

  box-shadow:
    0 12px 28px rgba(15, 23, 42, 0.09);
}

/* Clickable environmental metric cards */
.metric-card-link {
display: block;
color: inherit;
text-decoration: none;
cursor: pointer;
}

.metric-card-link:focus-visible {
outline: 3px solid rgba(14, 165, 233, 0.55);
outline-offset: 4px;
}



.metric-card-link:hover::before,
.metric-card-link:focus-visible::before {
opacity: 1;
transform: translateY(0);
}

.metric-card-link .metric-val,
.metric-card-link .metric-label,
.metric-card-link .metric-tag {
pointer-events: none;
}


.metric-label {
  position: relative;
  z-index: 1;

  display: flex;
  align-items: center;

  gap: 6px;

  font-size: 0.68rem;

  font-weight: 800;

  color: var(--text-muted);

  text-transform: uppercase;

  letter-spacing: 0.4px;
}

.metric-val {
  position: relative;
  z-index: 1;

  font-size: 1.7rem;

  font-weight: 800;

  margin: 8px 0 9px;

  line-height: 1.1;

  letter-spacing: -0.5px;

  color: var(--text-main);
}

.metric-tag {
  position: relative;
  z-index: 1;

  font-size: 0.65rem;

  font-weight: 800;

  padding: 4px 9px;

  border-radius: var(--radius-pill);

  display: inline-block;
}

.tag-good {
  background: var(--success-bg);
  color: var(--success-green);
}

.tag-danger {
  background: var(--danger-bg);
  color: var(--danger-red);
}

.tag-warn {
  background: var(--warning-bg);
  color: var(--warning-amber);
}

/* Flood Risk Highlight */

.metric-card:last-child {
  background:
    linear-gradient(
      135deg,
      #FFFFFF 0%,
      #FFF8E7 100%
    );

  border-color:
    rgba(245, 158, 11, 0.28);
}

.metric-card:last-child::after {
  width: 130px;
  height: 130px;

  background:
    rgba(245, 158, 11, 0.08);
}

.metric-card:last-child .metric-label {
  color: #B45309;
}

.metric-card:last-child .metric-val {
  color: #B45309;

  font-size: 1.8rem;
}

@media (max-width: 900px) {

  .metrics-row {
    grid-template-columns:
      repeat(2, minmax(0, 1fr));
  }

}

@media (max-width: 520px) {

  .metrics-row {
    grid-template-columns: 1fr;
  }

  .metric-card {
  min-height: 118px;

  padding: 17px;
}

}

    /* ==========================================================================
       5. Cards & Feed Items
       ========================================================================== */
    .card {
  background: var(--bg-card);

  border-radius: 18px;

  padding: 18px;

  border: 1px solid var(--border-color);

  box-shadow:
    0 4px 14px rgba(15, 23, 42, 0.05);

  margin-bottom: 14px;

  position: relative;

  animation: rise-in 0.6s 0.18s both;

  transition:
    transform var(--transition-fast),
    box-shadow var(--transition-fast),
    border-color var(--transition-fast);
}

.card:hover {
  transform: translateY(-3px);

  box-shadow:
    0 12px 28px rgba(15, 23, 42, 0.09);

  border-color:
    rgba(14, 165, 233, 0.25);
}

.card.critical {
  border-left: 5px solid var(--danger-red);

  background:
    linear-gradient(
      90deg,
      rgba(239, 68, 68, 0.035),
      #FFFFFF 25%
    );
}

.card.warning {
  border-left: 5px solid var(--warning-amber);

  background:
    linear-gradient(
      90deg,
      rgba(245, 158, 11, 0.04),
      #FFFFFF 25%
    );
}

    .card {
  width: 100%;

  min-height: 0 !important;

  height: auto !important;

  padding: 18px !important;

  margin-bottom: 12px;
}
    .card .card-body {
  min-height: 0 !important;
}

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
  background: var(--bg-subtle);

  border: 1px solid var(--border-color);

  padding: 8px 14px;

  border-radius: var(--radius-pill);

  font-size: 0.72rem;

  font-weight: 800;

  cursor: pointer;

  display: inline-flex;

  align-items: center;

  gap: 5px;

  transition: var(--transition-fast);

  color: var(--text-main);
}

.btn-confirm:hover,
.btn-confirm.active {
  background: var(--success-bg);

  border-color: var(--success-green);

  color: var(--success-green);

  transform: translateY(-2px);

  box-shadow:
    0 5px 12px rgba(16, 185, 129, 0.12);
}

    .card.critical,
.card.warning {
  position: relative;

  overflow: hidden;
}

.card.critical::before,
.card.warning::before {
  content: '';

  position: absolute;

  left: 0;
  top: 0;
  bottom: 0;

  width: 4px;
}

.card.critical::before {
  background: var(--danger-red);
}

.card.warning::before {
  background: var(--warning-amber);
}

.card-head {
  display: flex;

  align-items: flex-start;

  justify-content: space-between;

  gap: 16px;
}

.card-title {
  font-size: 0.95rem;

  font-weight: 800;

  line-height: 1.3;
}

.card-location {
  margin-top: 5px;

  font-size: 0.72rem;

  color: var(--text-muted);
}

.card-description {
  margin-top: 10px;

  font-size: 0.82rem;

  line-height: 1.5;

  color: var(--text-main);
}

.sustainability-card {
  min-height: 0 !important;

  height: auto !important;
}

.sustainability-section-head {
  margin-top: 30px;
  margin-bottom: 12px;
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

  bottom: 76px;

  left: 50%;

  transform: translateX(-50%);

  width: calc(100% - 40px);

  max-width: 460px;

  min-height: 56px;

  background:
    linear-gradient(
      135deg,
      var(--primary-blue),
      #0284C7
    );

  color: var(--text-inverse);

  border: none;

  padding: 15px 20px;

  border-radius: 16px;

  font-size: 0.88rem;

  font-weight: 800;

  cursor: pointer;

  box-shadow:
    0 10px 24px rgba(14, 165, 233, 0.28);

  display: flex;

  justify-content: center;

  align-items: center;

  gap: 9px;

  z-index: 90;

  transition:
    transform var(--transition-fast),
    box-shadow var(--transition-fast),
    filter var(--transition-fast);
}

.fab-button:hover {
  background:
    linear-gradient(
      135deg,
      var(--primary-hover),
      #0369A1
    );

  box-shadow:
    0 14px 30px rgba(14, 165, 233, 0.34);

  transform:
    translateX(-50%)
    translateY(-4px);
}

.fab-button:active {
  transform:
    translateX(-50%)
    translateY(0);
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

    .hazard-section-head {
  margin-top: 34px;
  margin-bottom: 14px;
}

.section-heading-large {
  margin-top: 3px;

  font-size: 1.05rem;
  font-weight: 800;

  color: var(--text-main);
}

.hazard-count {
  padding: 6px 10px;

  border-radius: var(--radius-pill);

  background: var(--danger-bg);

  color: var(--danger-red);

  border: 1px solid rgba(239, 68, 68, 0.16);

  font-size: 0.7rem;

  font-weight: 800;
}

.sustainability-section-head {
  margin-top: 36px;
}

.sustainability-section-head + .card {
  margin-top: 0;
}

.progress-bar {
  width: 100%;

  height: 9px;

  background: var(--bg-subtle);

  border-radius: var(--radius-pill);

  overflow: hidden;

  margin: 12px 0 7px;
}

.progress-fill {
  height: 100%;

  background:
    linear-gradient(
      90deg,
      var(--success-green),
      #34D399
    );

  border-radius: var(--radius-pill);

  transition: width 0.4s ease;

  animation: progress-in 1.2s 0.35s both;
}

    /* ==========================================================================
   7. Hazard Report Modal
   ========================================================================== */

.modal-overlay {
  position: fixed;
  inset: 0;
  width: 100%;
  height: 100%;

  /* Stronger background separation */
  background: rgba(15, 23, 42, 0.62);
  backdrop-filter: blur(7px);
  -webkit-backdrop-filter: blur(7px);

  z-index: 200;

  display: flex;
  justify-content: center;
  align-items: center;

  padding: 24px;

  opacity: 0;
  pointer-events: none;

  transition:
    opacity 0.25s ease;
}

.modal-overlay.active {
  opacity: 1;
  pointer-events: auto;
}

/* Main modal */
.modal-sheet {
  background: var(--bg-card);

  width: min(720px, 100%);

  max-height: calc(100vh - 48px);
  overflow-y: auto;

  border-radius: 22px;

  padding: 32px;

  border: 1px solid rgba(226, 232, 240, 0.9);

  box-shadow:
    0 25px 60px rgba(15, 23, 42, 0.28),
    0 8px 24px rgba(15, 23, 42, 0.12);

  transform: translateY(24px) scale(0.97);

  transition:
    transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
}

.modal-overlay.active .modal-sheet {
  transform: translateY(0) scale(1);
}

/* Header */
.modal-head {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;

  margin-bottom: 28px;

  padding-bottom: 20px;

  border-bottom: 1px solid var(--border-color);
}

.modal-title-wrap {
  display: flex;
  align-items: center;
  gap: 14px;
}

.modal-icon {
  width: 48px;
  height: 48px;

  flex-shrink: 0;

  display: flex;
  align-items: center;
  justify-content: center;

  border-radius: 14px;

  background: var(--warning-bg);
  color: var(--warning-amber);
}

.modal-icon svg {
  width: 25px;
  height: 25px;
}

.modal-title {
  font-size: 1.35rem;
  font-weight: 800;

  line-height: 1.2;

  color: var(--text-main);
}

.modal-subtitle {
  margin-top: 5px;

  font-size: 0.8rem;
  font-weight: 500;

  color: var(--text-muted);
}

.close-btn {
  width: 38px;
  height: 38px;

  display: flex;
  align-items: center;
  justify-content: center;

  flex-shrink: 0;

  background: var(--bg-subtle);

  border: 1px solid var(--border-color);

  border-radius: 50%;

  font-size: 1rem;

  color: var(--text-muted);

  cursor: pointer;

  transition:
    background-color var(--transition-fast),
    color var(--transition-fast),
    transform var(--transition-fast);
}

.close-btn:hover {
  background: var(--danger-bg);
  color: var(--danger-red);

  transform: rotate(90deg);
}

/* Form */
.form-group {
  margin-bottom: 22px;
}

.form-label {
  display: block;

  margin-bottom: 8px;

  font-size: 0.72rem;
  font-weight: 800;

  text-transform: uppercase;
  letter-spacing: 0.5px;

  color: var(--text-main);
}

.form-input,
.form-select,
.form-textarea {
  width: 100%;

  padding: 14px 15px;

  border-radius: 12px;

  border: 1px solid var(--border-color);

  background: #F8FAFC;

  font-family: inherit;

  font-size: 0.9rem;

  color: var(--text-main);

  transition:
    border-color var(--transition-fast),
    box-shadow var(--transition-fast),
    background-color var(--transition-fast);
}

.form-input:hover,
.form-select:hover,
.form-textarea:hover {
  border-color: #CBD5E1;
}

.form-input:focus,
.form-select:focus,
.form-textarea:focus {
  outline: none;

  background: #FFFFFF;

  border-color: var(--primary-blue);

  box-shadow:
    0 0 0 4px rgba(14, 165, 233, 0.12);
}

.form-textarea {
  resize: vertical;

  min-height: 130px;

  line-height: 1.5;
}

/* Submit button inside modal */
.modal-submit {
  width: 100%;

  min-height: 52px;

  margin-top: 6px;

  display: flex;
  align-items: center;
  justify-content: center;

  gap: 9px;

  border: none;

  border-radius: 13px;

  background: linear-gradient(
    135deg,
    var(--primary-blue),
    #0284C7
  );

  color: white;

  font-family: inherit;

  font-size: 0.9rem;
  font-weight: 800;

  cursor: pointer;

  box-shadow:
    0 8px 18px rgba(14, 165, 233, 0.25);

  transition:
    transform var(--transition-fast),
    box-shadow var(--transition-fast),
    filter var(--transition-fast);
}

.modal-submit:hover {
  transform: translateY(-2px);

  box-shadow:
    0 12px 24px rgba(14, 165, 233, 0.3);

  filter: brightness(1.03);
}

.modal-submit:active {
  transform: translateY(0);
}

/* Small helper text */
.modal-helper {
  margin-top: 12px;

  text-align: center;

  font-size: 0.72rem;
  font-weight: 500;

  color: var(--text-muted);
}

/* Mobile */
@media (max-width: 640px) {

  .modal-overlay {
    padding: 12px;

    align-items: flex-end;
  }

  .modal-sheet {
    width: 100%;

    max-height: calc(100vh - 24px);

    padding: 22px;

    border-radius: 20px;

    transform: translateY(40px);
  }

  .modal-title {
    font-size: 1.15rem;
  }

  .modal-icon {
    width: 42px;
    height: 42px;
  }

  .modal-head {
    margin-bottom: 22px;
    padding-bottom: 16px;
  }

  .form-group {
    margin-bottom: 18px;
  }

  .form-textarea {
    min-height: 110px;
  }
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


/* EMERGENCY FIX: Restore the dashboard's normal layout */

html,
body {
  width: 100%;
  min-height: 100%;
  margin: 0;
}

body {
  display: block !important;
}

.app-container {
  display: block !important;
  width: 100% !important;
  max-width: 1440px;
  margin: 0 auto;
  min-width: 0;
}

.app-container > header {
  display: flex !important;
  width: 100%;
  flex-wrap: wrap;
}

.app-container > main {
  display: block !important;

  width: 100% !important;

  max-width: 1160px;

  margin: 0 auto;

  min-width: 0;

  padding: 24px 24px 150px;
}

.metrics-row {
  display: grid !important;

  grid-template-columns:
    repeat(3, minmax(0, 1fr)) !important;

  width: 100%;

  gap: 14px;

  margin-top: 18px;
}

.metrics-row > .metric-card {
  width: auto;
  min-width: 0;
  height: auto;
}

.app-container > main > .card {
  width: 100%;
  min-width: 0;
  height: auto;
}

.bottom-nav {
  display: flex !important;
  width: 100%;
}

@media (max-width: 900px) {
  .metrics-row {
    grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
  }
}

@media (max-width: 520px) {
  .app-container > main {
    padding: 18px 16px 140px;
  }

  .metrics-row {
    grid-template-columns: 1fr !important;
  }
}

    .metric-card-link {
position: relative;
display: block;
color: inherit;
text-decoration: none;
cursor: pointer;
transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.metric-card-link:hover {
transform: translateY(-3px);
box-shadow: 0 8px 22px rgba(15, 23, 42, 0.09);
}

.metric-card-link:focus-visible {
outline: 3px solid #159fe3;
outline-offset: 3px;
}

.metric-card-link {
position: relative;
display: block;
}

.metric-card-link::after {
content: "View history →";
position: absolute;
right: 16px;
bottom: 12px;
top: auto !important;
left: auto !important;
font-size: 11px;
font-weight: 600;
color: #159fe3;
opacity: 0;
pointer-events: none;
transition: opacity 0.2s ease;
}

.metric-card-link:hover::after,
.metric-card-link:focus-visible::after {
opacity: 1;
}

/* Clickable environmental metric cards */
.metric-card-link {
position: relative;
display: block;
color: inherit;
text-decoration: none;
cursor: pointer;
transition: box-shadow 0.2s ease, border-color 0.2s ease;
}


.metric-card-link:hover {
box-shadow: 0 8px 22px rgba(15, 23, 42, 0.09);
}

.metric-card-link:focus-visible {
outline: 3px solid #159fe3;
outline-offset: 3px;
}

.metric-card-link::before {
    content: "View history →";
    position: absolute;
    right: 16px;
    bottom: 12px;
    top: auto;
    left: auto;
    z-index: 5;
    font-size: 11px;
    font-weight: 600;
    color: #159fe3;
    opacity: 0;
    pointer-events: none;
}

.metric-card-link:hover::before,
.metric-card-link:focus-visible::before {
    opacity: 1;
}


/* =========================================================
   CLIMATESHIELD METRIC CARDS — CLEAN REPLACEMENT
   One history label per card, visible on hover only.
   ========================================================= */

.metrics-row {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 14px;
    width: 100%;
    margin-top: 18px;
    align-items: stretch;
}

.metric-card-link {
    position: relative;
    display: block;
    min-width: 0;
    min-height: 132px;
    height: auto;
    padding: 18px;
    overflow: hidden;

    color: inherit;
    text-decoration: none;
    cursor: pointer;

    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 18px;

    box-shadow: 0 4px 14px rgba(15, 23, 42, 0.05);

    transition:
        transform 0.2s ease,
        box-shadow 0.2s ease,
        border-color 0.2s ease;
}

/* Decorative circle */
.metric-card-link::after {
    content: "";
    position: absolute;
    right: -24px;
    bottom: -24px;
    width: 90px;
    height: 90px;
    border-radius: 50%;
    background: rgba(14, 165, 233, 0.05);
    pointer-events: none;
}

/* Exactly ONE history label */
.metric-card-link::before {
    content: "View history →";
    position: absolute;
    right: 16px;
    bottom: 12px;
    top: auto;
    left: auto;
    z-index: 2;

    font-size: 11px;
    font-weight: 700;
    color: #159fe3;
    white-space: nowrap;

    opacity: 0;
    pointer-events: none;
    transition: opacity 0.2s ease;
}

.metric-card-link:hover {
    transform: translateY(-3px);
    border-color: rgba(14, 165, 233, 0.4);
    box-shadow: 0 8px 22px rgba(15, 23, 42, 0.09);
}

.metric-card-link:hover::before,
.metric-card-link:focus-visible::before {
    opacity: 1;
}

.metric-card-link:focus-visible {
    outline: 3px solid #159fe3;
    outline-offset: 3px;
}

.metric-card-link .metric-label,
.metric-card-link .metric-val,
.metric-card-link .metric-tag {
    position: relative;
    z-index: 1;
    pointer-events: none;
}

/* Keep content clear of the history label */
.metric-card-link .metric-tag {
    margin-bottom: 12px;
}

/* Flood risk styling applies only to the flood card */
.metric-card-link.flood-card {
    background: linear-gradient(135deg, #ffffff, #fff8e7);
    border-color: rgba(245, 158, 11, 0.28);
}

.metric-card-link.flood-card::after {
    width: 130px;
    height: 130px;
    background: rgba(245, 158, 11, 0.08);
}

.metric-card-link.flood-card .metric-label,
.metric-card-link.flood-card .metric-val {
    color: #b45309;
}

@media (max-width: 900px) {
    .metrics-row {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 520px) {
    .metrics-row {
        grid-template-columns: minmax(0, 1fr);
    }

    .metric-card-link {
        min-height: 118px;
        padding: 17px;
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
    <!-- Dashboard Status Header -->
<div class="dashboard-status">

  <div class="dashboard-status-main">

    <div class="status-icon">
      <svg
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
      >
        <path d="M12 3v18"/>
        <path d="M3 12h18"/>
        <circle cx="12" cy="12" r="9"/>
      </svg>
    </div>

    <div>
      <div class="dashboard-eyebrow">
        ENVIRONMENTAL MONITORING
      </div>

      <h1 class="dashboard-title">
        Live Station Metrics
      </h1>

      <p class="dashboard-subtitle">
        Current environmental conditions and community risk status.
      </p>
    </div>

  </div>

  <div class="dashboard-status-actions">

    <a
      href="{{ route('environmental-history', ['range' => '24h']) }}"
      class="view-history"
    >
      View History →
    </a>

    <div class="live-status">
      <span class="live-dot"></span>
      Live
    </div>

  </div>

</div>

      <div class="metrics-row">

    <!-- Air Quality -->

<a href="{{ route('environmental-history', ['range' => '24h']) }}#aqi-history"
class="metric-card metric-card-link">

<div class="metric-label">🌫️ Air Quality Index</div>

<div class="metric-val">
    {{ $aqi !== null ? round($aqi) : 'N/A' }}
</div>

@if ($aqi === null)
    <span class="metric-tag tag-warn">Unavailable</span>
@elseif ($aqi <= 20)
    <span class="metric-tag tag-good">Good</span>
@elseif ($aqi <= 40)
    <span class="metric-tag tag-good">Fair</span>
@elseif ($aqi <= 60)
    <span class="metric-tag tag-warn">Moderate</span>
@elseif ($aqi <= 80)
    <span class="metric-tag tag-danger">Poor</span>
@elseif ($aqi <= 100)
    <span class="metric-tag tag-danger">Very Poor</span>
@else
    <span class="metric-tag tag-danger">Extremely Poor</span>
@endif


</a>

<!-- Temperature -->

<a href="{{ route('environmental-history', ['range' => '24h']) }}#temperature-history"
class="metric-card metric-card-link">


<div class="metric-label">🌡️ Temperature</div>

<div class="metric-val">
    {{ $temperature !== null ? $temperature . '°C' : 'N/A' }}
</div>

@if ($temperature === null)
    <span class="metric-tag tag-warn">Unavailable</span>
@elseif ($temperature >= 35)
    <span class="metric-tag tag-danger">Extreme Heat</span>
@elseif ($temperature >= 33)
    <span class="metric-tag tag-warn">Heat Spot</span>
@else
    <span class="metric-tag tag-good">Normal</span>
@endif


</a>

<!-- Humidity -->

<a href="{{ route('environmental-history', ['range' => '24h']) }}#humidity-history"
class="metric-card metric-card-link">

<div class="metric-label">💧 Humidity</div>

<div class="metric-val">
    {{ $humidity !== null ? $humidity . '%' : 'N/A' }}
</div>

@if ($humidity === null)
    <span class="metric-tag tag-warn">Unavailable</span>
@elseif ($humidity >= 80)
    <span class="metric-tag tag-warn">High</span>
@elseif ($humidity >= 40)
    <span class="metric-tag tag-good">Normal</span>
@else
    <span class="metric-tag tag-warn">Low</span>
@endif


</a>

<!-- Rainfall -->

<a href="{{ route('environmental-history', ['range' => '24h']) }}#rainfall-history"
class="metric-card metric-card-link">


<div class="metric-label">🌧️ Rainfall</div>

<div class="metric-val">
    {{ $rainfall !== null ? $rainfall . ' mm' : 'N/A' }}
</div>

@if ($rainfall === null)
    <span class="metric-tag tag-warn">Unavailable</span>
@elseif ($rainfall >= 20)
    <span class="metric-tag tag-danger">Heavy</span>
@elseif ($rainfall > 0)
    <span class="metric-tag tag-warn">Rain Detected</span>
@else
    <span class="metric-tag tag-good">No Rain</span>
@endif

</a>

<!-- Wind Speed -->

<a href="{{ route('environmental-history', ['range' => '24h']) }}#wind-history"
class="metric-card metric-card-link">


<div class="metric-label">💨 Wind Speed</div>

<div class="metric-val">
    {{ $windSpeed !== null ? $windSpeed . ' km/h' : 'N/A' }}
</div>

@if ($windSpeed === null)
    <span class="metric-tag tag-warn">Unavailable</span>
@elseif ($windSpeed >= 60)
    <span class="metric-tag tag-danger">Very Strong</span>
@elseif ($windSpeed >= 40)
    <span class="metric-tag tag-warn">Strong</span>
@else
    <span class="metric-tag tag-good">Normal</span>
@endif

</a>

<!-- Flood Risk -->

<a href="{{ route('environmental-history', ['range' => '24h']) }}#rainfall-history"
class="metric-card metric-card-link">


<div class="metric-label">🌊 Flood Risk</div>

<div class="metric-val">{{ $floodRisk }}</div>

@if ($floodRisk === 'CRITICAL')
    <span class="metric-tag tag-danger">Level 4</span>
@elseif ($floodRisk === 'HIGH')
    <span class="metric-tag tag-danger">Level 3</span>
@elseif ($floodRisk === 'MODERATE')
    <span class="metric-tag tag-warn">Level 2</span>
@else
    <span class="metric-tag tag-good">Level 1</span>
@endif


</a>


</div>
      <!-- Hazard Feed -->
      <div class="section-head hazard-section-head">

  <div>
    <div class="section-title">
      Community Safety
    </div>

    <div class="section-heading-large">
      Active Hazard Reports
    </div>
  </div>

  <div class="hazard-count">
    {{ $hazards->count() }} Active
  </div>

</div>

      @forelse ($hazards as $hazard)

      @php
        $cardClass = $hazard->severity === 'critical' ? 'critical' : 'warning';
        $icon = $hazard->severity === 'critical' ? '⚠️' : '⚡';
      @endphp

    <div class="card {{ $cardClass }}">
        <div class="card-title-row">
            <span class="card-title {{ $cardClass }}">
                {{ $icon }} {{ $hazard->title }}
            </span>

            <span class="time-stamp">
                {{ $hazard->created_at->diffForHumans() }}
            </span>
        </div>

        <div class="location-text">
            📍 {{ $hazard->location }}
        </div>

        <p class="card-desc">
            {{ $hazard->description }}
        </p>

        <button class="btn-confirm" onclick="toggleVote(this, 0)">
            ▲ Confirm Hazard ( <span class="num">0</span> )
        </button>
    </div>

      @empty

    <div class="card">
        <div class="card-title-row">
            <span class="card-title">No Active Hazards</span>
        </div>

        <p class="card-desc">
            There are currently no active environmental hazard reports.
        </p>
    </div>

      @endforelse
      <!-- Sustainability Goals -->
<div class="section-title">Sustainability Goals</div>

@forelse ($projects->take(3) as $project)

    @php
        $progress = $project->target_value > 0
            ? min(100, round(
                ($project->current_value / $project->target_value) * 100
            ))
            : 0;

        $status = strtolower(trim($project->status));

        if ($progress >= 100 || $status === 'completed') {
            $statusLabel = 'Completed';
            $statusColor = 'var(--success-green)';
        } elseif ($status === 'active' || $status === 'ongoing') {
            $statusLabel = 'Ongoing';
            $statusColor = 'var(--success-green)';
        } else {
            $statusLabel = 'Upcoming';
            $statusColor = 'var(--text-muted)';
        }
    @endphp

    <div class="card">

        <div class="card-title-row">

            <span class="card-title">
                🌱 {{ $project->title }}
            </span>

            <span style="
                color: {{ $statusColor }};
                font-weight: 800;
                font-size: 0.78rem;
            ">
                {{ $statusLabel }}
            </span>

        </div>

        <div class="progress-bar">

            <div
                class="progress-fill"
                style="width: {{ $progress }}%;"
            ></div>

        </div>

        <div class="progress-meta">

            <span>
                {{ number_format($project->current_value, 0) }}
                /
                {{ number_format($project->target_value, 0) }}
                {{ $project->unit }}
            </span>

            <span>
                {{ $progress }}% Completed
            </span>

        </div>

    </div>

@empty

    <div class="card">

        <div class="card-title-row">
            <span class="card-title">
                🌱 No Sustainability Projects
            </span>
        </div>

        <p class="card-desc">
            No environmental projects have been added yet.
        </p>

    </div>

@endforelse

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
      <a
  href="{{ route('projects') }}"
  class="nav-item"
>
  <svg viewBox="0 0 24 24">
    <path d="M3 3h7v7H3z"/>
    <path d="M14 3h7v7h-7z"/>
    <path d="M3 14h7v7H3z"/>
    <path d="M14 14h7v7h-7z"/>
  </svg>

  Projects
</a>
      <a href="{{ route('guides') }}" class="nav-item">
        <svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
        Guides
      </a>
    </nav>

  </div>

  <!-- Hazard Report Modal -->
<div class="modal-overlay" id="reportModal">

  <div class="modal-sheet">

    <!-- Modal Header -->
    <div class="modal-head">

      <div class="modal-title-wrap">

        <div class="modal-icon">
          <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/>
            <line x1="12" y1="9" x2="12" y2="13"/>
            <line x1="12" y1="17" x2="12.01" y2="17"/>
          </svg>
        </div>

        <div>
          <div class="modal-title">
            Report Environmental Hazard
          </div>

          <div class="modal-subtitle">
            Help your community stay informed and prepared.
          </div>
        </div>

      </div>

      <button
        type="button"
        class="close-btn"
        onclick="closeReportModal()"
        aria-label="Close hazard report"
      >
        ✕
      </button>

    </div>


    <!-- Report Form -->
    <form
      id="hazardForm"
      method="POST"
      action="{{ route('hazards.report') }}"
    >

      @csrf


      <!-- Hazard Type -->
      <div class="form-group">

        <label
          class="form-label"
          for="formType"
        >
          Hazard Type
        </label>

        <select
          class="form-select"
          id="formType"
          name="type"
          required
        >

          <option value="">
            Select hazard type
          </option>

          <option value="Flash Flood / High Water">
            ⚠️ Flash Flood / High Water
          </option>

          <option value="Fallen Tree / Branch Block">
            ⚡ Fallen Tree / Branch Block
          </option>

          <option value="Urban Heat Spot">
            🔥 Urban Heat Spot
          </option>

          <option value="Damaged Power Lines">
            ⚡ Damaged Power Lines
          </option>

        </select>

      </div>


      <!-- Location -->
      <div class="form-group">

        <label
          class="form-label"
          for="formLocation"
        >
          Location / Landmark
        </label>

        <input
          type="text"
          class="form-input"
          id="formLocation"
          name="location"
          placeholder="e.g. 7th St & Park Avenue"
          required
        >

      </div>


      <!-- Description -->
      <div class="form-group">

        <label
          class="form-label"
          for="formDesc"
        >
          Details & Notes
        </label>

        <textarea
          class="form-textarea"
          id="formDesc"
          name="description"
          placeholder="Describe the current risk situation..."
          required
        ></textarea>

      </div>


      <!-- Submit -->
      <button
        type="submit"
        class="modal-submit"
      >

        <svg
          width="19"
          height="19"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2.5"
          stroke-linecap="round"
          stroke-linejoin="round"
        >
          <path d="M22 2L11 13"/>
          <polygon points="22 2 15 22 11 13 2 9 22 2"/>
        </svg>

        Submit Community Report

      </button>


      <div class="modal-helper">
        Reports help identify environmental risks in your community.
      </div>

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