<style>
    /* =========================================================
       ENVIRONMENTAL HISTORY — DASHBOARD STYLE
       ========================================================= */

    .environmental-page {
        min-height: 100vh;
        background: #f5f7fa;
        padding: 30px 34px 40px;
        font-family: Inter, ui-sans-serif, system-ui, -apple-system,
            BlinkMacSystemFont, "Segoe UI", sans-serif;
        color: #172033;
    }

    /* =========================================================
       PAGE HEADER
       ========================================================= */

    .environmental-header {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 24px;
        margin-bottom: 30px;
    }

    .environmental-title {
        min-width: 0;
    }

    .environmental-title h1 {
        margin: 0;
        font-size: 1.75rem;
        line-height: 1.15;
        font-weight: 850;
        letter-spacing: -0.04em;
        color: #14243a;
    }

    .environmental-title p {
        margin: 8px 0 0;
        color: #718096;
        font-size: 0.84rem;
        font-weight: 600;
        letter-spacing: 0.01em;
    }

    /* =========================================================
       RANGE FILTER
       ========================================================= */

    .history-filters {
        display: flex;
        align-items: center;
        gap: 4px;
        padding: 5px;
        background: rgba(255, 255, 255, 0.92);
        border: 1px solid #dfe6ee;
        border-radius: 15px;
        box-shadow: 0 5px 18px rgba(30, 50, 80, 0.06);
        flex-shrink: 0;
    }

    .history-filters a {
        padding: 10px 17px;
        border-radius: 10px;
        text-decoration: none;
        font-size: 0.76rem;
        font-weight: 800;
        color: #64748b;
        transition:
            background 0.2s ease,
            color 0.2s ease,
            box-shadow 0.2s ease,
            transform 0.2s ease;
    }

    .history-filters a:hover {
        background: #f1f5f9;
        color: #172033;
    }

    .history-filters a.active {
        background: #159fe3;
        color: #ffffff;
        box-shadow: 0 4px 10px rgba(21, 159, 227, 0.22);
    }

    /* =========================================================
       SECTION TITLES
       ========================================================= */

    .environmental-section-title {
        margin: 0 0 13px;
        color: #60718a;
        font-size: 0.72rem;
        line-height: 1;
        font-weight: 850;
        letter-spacing: 0.07em;
        text-transform: uppercase;
    }

    .history-section-title {
        margin-top: 4px;
        margin-bottom: 14px;
    }

    /* =========================================================
       LIVE METRICS
       ========================================================= */

    .environmental-metrics {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 15px;
        margin-bottom: 30px;
    }

    .environmental-metric {
        position: relative;
        overflow: hidden;
        background: #ffffff;
        border: 1px solid #dfe6ee;
        border-radius: 18px;
        padding: 20px;
        min-height: 120px;
        box-shadow: 0 5px 18px rgba(30, 50, 80, 0.045);
        transition:
            transform 0.2s ease,
            box-shadow 0.2s ease,
            border-color 0.2s ease;
    }

    .environmental-metric:hover {
        transform: translateY(-2px);
        border-color: #d4e2ed;
        box-shadow: 0 9px 24px rgba(30, 50, 80, 0.075);
    }

    /* subtle blue accent */
    .environmental-metric::after {
        content: "";
        position: absolute;
        left: 0;
        top: 18px;
        bottom: 18px;
        width: 3px;
        border-radius: 0 5px 5px 0;
        background: #159fe3;
        opacity: 0.75;
    }

    .metric-top {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #61728a;
        font-size: 0.7rem;
        font-weight: 850;
        text-transform: uppercase;
        letter-spacing: 0.025em;
    }

    .metric-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 25px;
        height: 25px;
        border-radius: 8px;
        background: #f0f7fc;
        font-size: 0.82rem;
    }

    .metric-value {
        margin-top: 8px;
        font-size: 1.65rem;
        line-height: 1.1;
        font-weight: 850;
        letter-spacing: -0.035em;
        color: #12243b;
    }

    .metric-status {
        display: inline-flex;
        align-items: center;
        margin-top: 9px;
        padding: 4px 9px;
        border-radius: 999px;
        background: #e9fbf4;
        color: #0aaf72;
        font-size: 0.66rem;
        font-weight: 850;
        letter-spacing: 0.01em;
    }

    .metric-status.warning {
        background: #fff6df;
        color: #e99a00;
    }

    /* =========================================================
       SUMMARY
       ========================================================= */

    .summary-section {
        margin-bottom: 30px;
    }

    .summary-cards {
        display: grid;
        grid-template-columns: repeat(5, minmax(0, 1fr));
        gap: 14px;
    }

    .summary-card {
        position: relative;
        background: #ffffff;
        border: 1px solid #dfe6ee;
        border-radius: 17px;
        padding: 17px 18px;
        min-height: 112px;
        box-shadow: 0 4px 15px rgba(30, 50, 80, 0.04);
        transition:
            transform 0.2s ease,
            box-shadow 0.2s ease;
    }

    .summary-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(30, 50, 80, 0.065);
    }

    .summary-label {
        display: flex;
        align-items: center;
        gap: 5px;
        color: #687991;
        font-size: 0.68rem;
        font-weight: 850;
        text-transform: uppercase;
        letter-spacing: 0.02em;
    }

    .summary-value {
        margin-top: 8px;
        font-size: 1.4rem;
        line-height: 1.1;
        font-weight: 850;
        letter-spacing: -0.03em;
        color: #14243a;
    }

    .summary-description {
        margin-top: 6px;
        color: #8a96a7;
        font-size: 0.67rem;
        font-weight: 600;
    }

    /* =========================================================
       CHARTS
       ========================================================= */

    .history-charts {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 17px;
    }

    .history-card {
        position: relative;
        background: #ffffff;
        border: 1px solid #dfe6ee;
        border-radius: 19px;
        padding: 20px 20px 18px;
        box-shadow: 0 5px 18px rgba(30, 50, 80, 0.045);
        transition:
            transform 0.2s ease,
            box-shadow 0.2s ease,
            border-color 0.2s ease;
    }

    .history-card:hover {
        transform: translateY(-2px);
        border-color: #d5e1eb;
        box-shadow: 0 9px 25px rgba(30, 50, 80, 0.07);
    }

    .history-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 13px;
    }

    .history-card-title {
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .history-card-title > span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 29px;
        height: 29px;
        border-radius: 9px;
        background: #f0f7fc;
        font-size: 0.9rem;
    }

    .history-card-header h2 {
        margin: 0;
        font-size: 0.88rem;
        font-weight: 850;
        color: #172033;
        letter-spacing: -0.01em;
    }

    .history-card-unit {
        padding: 5px 8px;
        border-radius: 7px;
        background: #f5f7fa;
        color: #718096;
        font-size: 0.66rem;
        font-weight: 850;
    }

    .chart-container {
        position: relative;
        height: 255px;
    }

    /* =========================================================
       LAST UPDATED
       ========================================================= */

    .last-recorded {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 5px;
        margin-top: 16px;
        padding-right: 3px;
        color: #7a8799;
        font-size: 0.7rem;
        font-weight: 700;
    }

    /* =========================================================
       RESPONSIVE
       ========================================================= */

    @media (max-width: 1200px) {
        .summary-cards {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    @media (max-width: 1000px) {
        .environmental-page {
            padding: 24px;
        }

        .environmental-metrics {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 800px) {
        .environmental-page {
            padding: 18px;
        }

        .environmental-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .history-filters {
            width: 100%;
        }

        .history-filters a {
            flex: 1;
            text-align: center;
        }

        .history-charts {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 600px) {
        .summary-cards {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 550px) {
        .environmental-metrics {
            grid-template-columns: 1fr;
        }

        .summary-cards {
            grid-template-columns: 1fr;
        }

        .environmental-title h1 {
            font-size: 1.45rem;
        }
    }
</style>


<div class="environmental-page">

    {{-- PAGE HEADER --}}
    <div class="environmental-header">

        <div class="environmental-title">
            <h1>Environmental Monitoring</h1>
            <p>📍 Cebu City · Historical environmental conditions</p>
        </div>

        <div class="history-filters">

            <a
                href="{{ route('environmental-history', ['range' => '24h']) }}"
                class="{{ $range === '24h' ? 'active' : '' }}"
            >
                24 Hours
            </a>

            <a
                href="{{ route('environmental-history', ['range' => '7d']) }}"
                class="{{ $range === '7d' ? 'active' : '' }}"
            >
                7 Days
            </a>

            <a
                href="{{ route('environmental-history', ['range' => '30d']) }}"
                class="{{ $range === '30d' ? 'active' : '' }}"
            >
                30 Days
            </a>

        </div>

    </div>


    {{-- LIVE METRICS --}}
    <div class="environmental-section-title">
        Live Station Metrics
    </div>

    <div class="environmental-metrics">

        {{-- TEMPERATURE --}}
        <div class="environmental-metric">

            <div class="metric-top">
                <span class="metric-icon">🌡️</span>
                Temperature
            </div>

            <div class="metric-value">
                {{ $latestReading?->temperature ?? '—' }}°C
            </div>

            <span class="metric-status">
                Normal
            </span>

        </div>


        {{-- HUMIDITY --}}
        <div class="environmental-metric">

            <div class="metric-top">
                <span class="metric-icon">💧</span>
                Humidity
            </div>

            <div class="metric-value">
                {{ $latestReading?->humidity ?? '—' }}%
            </div>

            <span class="metric-status">
                Normal
            </span>

        </div>


        {{-- AIR QUALITY --}}
        <div class="environmental-metric">

            <div class="metric-top">
                <span class="metric-icon">🌫️</span>
                Air Quality
            </div>

            <div class="metric-value">
                {{ $latestReading?->aqi ?? '—' }}
            </div>

            <span class="metric-status">
                Fair
            </span>

        </div>


        {{-- RAINFALL --}}
        <div class="environmental-metric">

            <div class="metric-top">
                <span class="metric-icon">🌧️</span>
                Rainfall
            </div>

            <div class="metric-value">
                {{ $latestReading?->rainfall ?? '—' }} mm
            </div>

            <span class="metric-status warning">
                Rain Detected
            </span>

        </div>


        {{-- WIND --}}
        <div class="environmental-metric">

            <div class="metric-top">
                <span class="metric-icon">💨</span>
                Wind Speed
            </div>

            <div class="metric-value">
                {{ $latestReading?->wind_speed ?? '—' }} km/h
            </div>

            <span class="metric-status">
                Normal
            </span>

        </div>


        {{-- PM2.5 --}}
        <div class="environmental-metric">

            <div class="metric-top">
                <span class="metric-icon">🔬</span>
                PM2.5
            </div>

            <div class="metric-value">
                {{ $latestReading?->pm2_5 ?? '—' }}
            </div>

            <span class="metric-status">
                µg/m³
            </span>

        </div>

    </div>

    {{-- 24-HOUR SUMMARY --}}
<div class="summary-section">

    <div class="environmental-section-title">
        24-Hour Summary
    </div>

    <div class="summary-cards">

        {{-- AVERAGE TEMPERATURE --}}
        <div class="summary-card">

            <div class="summary-label">
                🌡️ Average Temperature
            </div>

            <div class="summary-value">
                {{ $averageTemperature !== null
                    ? number_format($averageTemperature, 1) . '°C'
                    : '—' }}
            </div>

            <div class="summary-description">
                Last 24 hours
            </div>

        </div>


        {{-- HIGHEST TEMPERATURE --}}
        <div class="summary-card">

            <div class="summary-label">
                🔥 Highest Temperature
            </div>

            <div class="summary-value">
                {{ $highestTemperature !== null
                    ? number_format($highestTemperature, 1) . '°C'
                    : '—' }}
            </div>

            <div class="summary-description">
                Maximum recorded
            </div>

        </div>


        {{-- LOWEST TEMPERATURE --}}
        <div class="summary-card">

            <div class="summary-label">
                ❄️ Lowest Temperature
            </div>

            <div class="summary-value">
                {{ $lowestTemperature !== null
                    ? number_format($lowestTemperature, 1) . '°C'
                    : '—' }}
            </div>

            <div class="summary-description">
                Minimum recorded
            </div>

        </div>


        {{-- TOTAL RAINFALL --}}
        <div class="summary-card">

            <div class="summary-label">
                🌧️ Total Rainfall
            </div>

            <div class="summary-value">
                {{ number_format($totalRainfall, 1) }} mm
            </div>

            <div class="summary-description">
                Accumulated rainfall
            </div>

        </div>


        {{-- AVERAGE AQI --}}
        <div class="summary-card">

            <div class="summary-label">
                🌫️ Average AQI
            </div>

            <div class="summary-value">
                {{ $averageAqi !== null
                    ? number_format($averageAqi, 0)
                    : '—' }}
            </div>

            <div class="summary-description">
                Average air quality
            </div>

        </div>

    </div>

</div>


    {{-- HISTORY --}}
    <div class="environmental-section-title history-section-title">
        Environmental History
    </div>


    <div class="history-charts">

        {{-- TEMPERATURE --}}
        <div class="history-card" id="temperature-history">

            <div class="history-card-header">

                <div class="history-card-title">
                    <span>🌡️</span>
                    <h2>Temperature History</h2>
                </div>

                <span class="history-card-unit">°C</span>

            </div>

            <div class="chart-container">
                <canvas id="temperatureChart"></canvas>
            </div>

        </div>


        {{-- HUMIDITY --}}
        <div class="history-card" id="humidity-history">

            <div class="history-card-header">

                <div class="history-card-title">
                    <span>💧</span>
                    <h2>Humidity History</h2>
                </div>

                <span class="history-card-unit">%</span>

            </div>

            <div class="chart-container">
                <canvas id="humidityChart"></canvas>
            </div>

        </div>


        {{-- RAINFALL --}}
        <div class="history-card" id="rainfall-history">

            <div class="history-card-header">

                <div class="history-card-title">
                    <span>🌧️</span>
                    <h2>Rainfall History</h2>
                </div>

                <span class="history-card-unit">mm</span>

            </div>

            <div class="chart-container">
                <canvas id="rainfallChart"></canvas>
            </div>

        </div>


        {{-- WIND --}}
        <div class="history-card" id="wind-history">

            <div class="history-card-header">

                <div class="history-card-title">
                    <span>💨</span>
                    <h2>Wind Speed History</h2>
                </div>

                <span class="history-card-unit">km/h</span>

            </div>

            <div class="chart-container">
                <canvas id="windChart"></canvas>
            </div>

        </div>


        {{-- AQI --}}
        <div class="history-card" id="aqi-history">

            <div class="history-card-header">

                <div class="history-card-title">
                    <span>🌫️</span>
                    <h2>Air Quality History</h2>
                </div>

                <span class="history-card-unit">AQI</span>

            </div>

            <div class="chart-container">
                <canvas id="aqiChart"></canvas>
            </div>

        </div>

    </div>


    @if ($latestReading)

        <div class="last-recorded">
            Last recorded:
            {{ $latestReading->recorded_at->format('M d, Y · h:i A') }}
        </div>

    @endif

</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

    const labels = @json($labels);

    const temperatureData = @json($temperature);
    const humidityData = @json($humidity);
    const rainfallData = @json($rainfall);
    const windSpeedData = @json($windSpeed);
    const aqiData = @json($aqi);


    /*
    |--------------------------------------------------------------------------
    | Shared Chart Settings
    |--------------------------------------------------------------------------
    */

    const chartOptions = {
        responsive: true,
        maintainAspectRatio: false,

        plugins: {
            legend: {
                display: false
            }
        },

        scales: {
            x: {
                grid: {
                    display: false
                },

                ticks: {
                    color: '#7a8799',
                    maxTicksLimit: 8,
                    font: {
                        size: 10
                    }
                }
            },

            y: {
                grid: {
                    color: '#edf1f5'
                },

                ticks: {
                    color: '#7a8799',
                    font: {
                        size: 10
                    }
                }
            }
        }
    };


    /*
    |--------------------------------------------------------------------------
    | Temperature
    |--------------------------------------------------------------------------
    */

    new Chart(document.getElementById('temperatureChart'), {

        type: 'line',

        data: {

            labels: labels,

            datasets: [{
                label: 'Temperature',
                data: temperatureData,

                borderColor: '#159fe3',
                backgroundColor: 'rgba(21, 159, 227, 0.08)',

                borderWidth: 2.5,

                pointRadius: 2,
                pointHoverRadius: 5,

                tension: 0.35,

                fill: true
            }]

        },

        options: chartOptions

    });


    /*
    |--------------------------------------------------------------------------
    | Humidity
    |--------------------------------------------------------------------------
    */

    new Chart(document.getElementById('humidityChart'), {

        type: 'line',

        data: {

            labels: labels,

            datasets: [{
                label: 'Humidity',
                data: humidityData,

                borderColor: '#159fe3',
                backgroundColor: 'rgba(21, 159, 227, 0.08)',

                borderWidth: 2.5,

                pointRadius: 2,
                pointHoverRadius: 5,

                tension: 0.35,

                fill: true
            }]

        },

        options: chartOptions

    });


    /*
    |--------------------------------------------------------------------------
    | Rainfall
    |--------------------------------------------------------------------------
    */

    new Chart(document.getElementById('rainfallChart'), {

        type: 'bar',

        data: {

            labels: labels,

            datasets: [{
                label: 'Rainfall',
                data: rainfallData,

                backgroundColor: 'rgba(21, 159, 227, 0.55)',

                borderRadius: 5,

                borderSkipped: false
            }]

        },

        options: chartOptions

    });


    /*
    |--------------------------------------------------------------------------
    | Wind Speed
    |--------------------------------------------------------------------------
    */

    new Chart(document.getElementById('windChart'), {

        type: 'line',

        data: {

            labels: labels,

            datasets: [{
                label: 'Wind Speed',
                data: windSpeedData,

                borderColor: '#159fe3',
                backgroundColor: 'rgba(21, 159, 227, 0.08)',

                borderWidth: 2.5,

                pointRadius: 2,
                pointHoverRadius: 5,

                tension: 0.35,

                fill: true
            }]

        },

        options: chartOptions

    });


    /*
    |--------------------------------------------------------------------------
    | AQI
    |--------------------------------------------------------------------------
    */

    new Chart(document.getElementById('aqiChart'), {

        type: 'line',

        data: {

            labels: labels,

            datasets: [{
                label: 'Air Quality Index',
                data: aqiData,

                borderColor: '#159fe3',
                backgroundColor: 'rgba(21, 159, 227, 0.08)',

                borderWidth: 2.5,

                pointRadius: 2,
                pointHoverRadius: 5,

                tension: 0.35,

                fill: true
            }]

        },

        options: chartOptions

    });

</script>