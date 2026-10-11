
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Project - ClimateShield Admin</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #0ea5e9;
            --primary-dark: #0284c7;
            --text: #111827;
            --muted: #64748b;
            --background: #f2f8fa;
            --border: #dce6ef;
            --danger: #ef4444;
            --surface: #ffffff;
            --soft: #f1f5f9;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Inter', Arial, sans-serif;
            color: var(--text);
            background:
                radial-gradient(ellipse at top left, #dff2fc 0%, transparent 48%),
                radial-gradient(ellipse at top right, #ddf5ed 0%, transparent 42%),
                linear-gradient(135deg, #f7fafc, #eef6f7);
        }

        /* ADMIN HEADER */

        .topbar {
            width: 100%;
            min-height: 78px;
            padding: 16px 30px;
            background: rgba(255, 255, 255, 0.96);
            border-bottom: 1px solid #e5edf3;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 25px;
            font-weight: 800;
            letter-spacing: -1px;
            color: #111827;
            text-decoration: none;
        }

        .brand-icon {
            width: 31px;
            height: 31px;
            color: var(--primary);
            flex-shrink: 0;
        }

        .brand-highlight {
            color: var(--primary);
        }

        .admin-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .admin-name {
            padding: 11px 17px;
            border: 1px solid #e0e8f0;
            border-radius: 999px;
            background: #f1f5f9;
            font-size: 13px;
            font-weight: 700;
        }

        .logout-btn {
            padding: 11px 18px;
            border: 1px solid #fecaca;
            border-radius: 999px;
            background: #fff5f5;
            color: #ef4444;
            font-family: inherit;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            transition: 0.2s ease;
        }

        .logout-btn:hover {
            background: #fee2e2;
        }

        /* PAGE LAYOUT */

        .page-container {
            width: min(100% - 48px, 1120px);
            margin: 42px auto 60px;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            margin-bottom: 25px;
        }

        .heading-content {
            display: flex;
            align-items: flex-start;
            gap: 15px;
        }

        .back-btn {
            width: 43px;
            height: 43px;
            flex-shrink: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: white;
            color: #334155;
            text-decoration: none;
            transition: 0.2s ease;
        }

        .back-btn:hover {
            color: var(--primary-dark);
            border-color: var(--primary);
            transform: translateX(-2px);
        }

        .back-btn svg {
            width: 20px;
            height: 20px;
        }

        h1 {
            margin: 0 0 8px;
            font-size: clamp(25px, 3vw, 34px);
            font-weight: 800;
            letter-spacing: -1.2px;
            line-height: 1.2;
        }

        .page-description {
            margin: 0;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.7;
        }

        .page-tag {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 13px;
            border: 1px solid #bae6fd;
            border-radius: 999px;
            background: #f0f9ff;
            color: #0369a1;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.4px;
            white-space: nowrap;
        }

        .page-tag svg {
            width: 15px;
            height: 15px;
        }

        /* FORM CARD */

        .form-card {
            overflow: hidden;
            background: var(--surface);
            border: 1px solid #e0eaf1;
            border-radius: 24px;
            box-shadow: 0 5px 16px rgba(15, 45, 65, 0.045),
                        0 1px 3px rgba(15, 45, 65, 0.04);
        }

        .card-header {
            padding: 26px 30px;
            border-bottom: 1px solid #edf2f7;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .card-icon {
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            background: #e8f6fe;
            color: var(--primary-dark);
        }

        .card-icon svg {
            width: 25px;
            height: 25px;
        }

        .card-header h2 {
            margin: 0 0 5px;
            font-size: 19px;
            font-weight: 800;
            letter-spacing: -0.4px;
        }

        .card-header p {
            margin: 0;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.6;
        }

        .form-body {
            padding: 30px;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0 0 22px;
            font-size: 14px;
            font-weight: 800;
            color: #1e293b;
        }

        .section-number {
            width: 27px;
            height: 27px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 9px;
            background: #e8f6fe;
            color: var(--primary-dark);
            font-size: 12px;
            font-weight: 800;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 23px 22px;
        }

        .form-group {
            min-width: 0;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            margin-bottom: 9px;
            color: #334155;
            font-size: 13px;
            font-weight: 700;
        }

        .required {
            color: var(--danger);
        }

        .field-hint {
            margin: 7px 0 0;
            color: #94a3b8;
            font-size: 11px;
            line-height: 1.6;
        }

        input,
        textarea,
        select {
            display: block;
            width: 100%;
            min-height: 47px;
            padding: 12px 14px;
            border: 1px solid #d8e1ea;
            border-radius: 11px;
            outline: none;
            background: #ffffff;
            color: #1e293b;
            font-family: inherit;
            font-size: 13px;
            transition: border-color 0.2s ease,
                        box-shadow 0.2s ease,
                        background 0.2s ease;
        }

        input::placeholder,
        textarea::placeholder {
            color: #a0adbb;
        }

        input:hover,
        textarea:hover,
        select:hover {
            border-color: #a8c8dc;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(14, 165, 233, 0.11);
            background: #ffffff;
        }

        textarea {
            min-height: 130px;
            resize: vertical;
            line-height: 1.7;
        }

        select {
            cursor: pointer;
        }

        input[type="date"] {
            color-scheme: light;
        }

        input[type="number"] {
            appearance: textfield;
            -moz-appearance: textfield;
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            opacity: 1;
        }

        /* VALIDATION */

        .error-summary {
            margin: 0 30px 0;
            padding: 16px 18px;
            border: 1px solid #fecaca;
            border-radius: 13px;
            background: #fff5f5;
            color: #b91c1c;
            font-size: 13px;
            line-height: 1.7;
        }

        .error-summary strong {
            display: block;
            margin-bottom: 5px;
        }

        .error-summary ul {
            margin: 0;
            padding-left: 20px;
        }

        .field-error {
            display: block;
            margin-top: 7px;
            color: #dc2626;
            font-size: 12px;
            line-height: 1.5;
        }

        .has-error {
            border-color: #f87171;
        }

        .has-error:focus {
            border-color: #ef4444;
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.09);
        }

        /* FORM ACTIONS */

        .form-footer {
            padding: 22px 30px;
            border-top: 1px solid #edf2f7;
            background: #fbfdff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .footer-note {
            margin: 0;
            color: #94a3b8;
            font-size: 12px;
            line-height: 1.6;
        }

        .footer-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn {
            min-height: 45px;
            padding: 12px 21px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: 1px solid transparent;
            border-radius: 999px;
            font-family: inherit;
            font-size: 13px;
            font-weight: 800;
            text-decoration: none;
            cursor: pointer;
            transition: transform 0.2s ease,
                        box-shadow 0.2s ease,
                        background 0.2s ease;
        }

        .btn-primary {
            background: var(--primary);
            color: #ffffff;
            box-shadow: 0 5px 12px rgba(14, 165, 233, 0.15);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            box-shadow: 0 7px 16px rgba(14, 165, 233, 0.22);
            transform: translateY(-1px);
        }

        .btn-secondary {
            border-color: #fecaca;
            background: #fff5f5;
            color: #ef4444;
        }

        .btn-secondary:hover {
            background: #fee2e2;
            transform: translateY(-1px);
        }

        .btn svg {
            width: 16px;
            height: 16px;
        }

        .bottom-note {
            margin-top: 20px;
            color: #94a3b8;
            font-size: 11px;
            text-align: center;
        }

        /* RESPONSIVE */

        @media (max-width: 700px) {
            .topbar {
                min-height: 68px;
                padding: 14px 18px;
            }

            .brand {
                font-size: 19px;
                letter-spacing: -0.7px;
            }

            .brand-icon {
                width: 25px;
                height: 25px;
            }

            .admin-actions {
                gap: 7px;
            }

            .admin-name {
                display: none;
            }

            .logout-btn {
                padding: 9px 13px;
                font-size: 12px;
            }

            .page-container {
                width: calc(100% - 28px);
                margin: 27px auto 35px;
            }

            .page-heading {
                gap: 12px;
            }

            .heading-content {
                gap: 10px;
            }

            h1 {
                font-size: 25px;
            }

            .page-description {
                font-size: 12px;
            }

            .page-tag {
                display: none;
            }

            .form-card {
                border-radius: 18px;
            }

            .card-header {
                padding: 21px 19px;
                gap: 12px;
            }

            .card-icon {
                width: 42px;
                height: 42px;
            }

            .card-header h2 {
                font-size: 17px;
            }

            .card-header p {
                font-size: 12px;
            }

            .form-body {
                padding: 23px 19px;
            }

            .form-grid {
                grid-template-columns: minmax(0, 1fr);
                gap: 19px;
            }

            .form-group.full-width {
                grid-column: auto;
            }

            .error-summary {
                margin: 18px 19px 0;
            }

            .form-footer {
                padding: 19px;
                align-items: stretch;
                flex-direction: column;
                gap: 15px;
            }

            .footer-actions {
                width: 100%;
            }

            .footer-actions .btn {
                flex: 1;
            }

            .footer-note {
                font-size: 11px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;
                transition: none !important;
            }
        }
    </style>
</head>

<body>

    {{-- ADMIN HEADER --}}
    <header class="topbar">
        <a href="{{ route('projects.index') }}" class="brand" aria-label="ClimateShield Admin home">
            <svg class="brand-icon" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2.2"
                 stroke-linecap="round" stroke-linejoin="round"
                 aria-hidden="true">
                <path d="M12 22s8-4 8-11V5l-8-3-8 3v6c0 7 8 11 8 11z"/>
            </svg>

            <span>Climate <span class="brand-highlight">Shield</span> Admin</span>
        </a>

        <div class="admin-actions">
            <span class="admin-name">
                {{ auth()->user()->name ?? 'Administrator' }}
            </span>

            <a href="{{ route('logout') }}"
               class="logout-btn"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Log out
            </a>

            <form id="logout-form" action="{{ route('logout') }}"
                  method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </header>

    {{-- MAIN PAGE --}}
    <main class="page-container">

        <div class="page-heading">
            <div class="heading-content">
                <a href="{{ route('projects.index') }}"
                   class="back-btn"
                   aria-label="Back to projects"
                   title="Back to projects">
                    <svg viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round"
                         aria-hidden="true">
                        <path d="m15 18-6-6 6-6"/>
                        <path d="M9 12h12"/>
                    </svg>
                </a>

                <div>
                    <h1>Add Sustainability Project</h1>
                    <p class="page-description">
                        Create and configure a new ClimateShield community project.
                    </p>
                </div>
            </div>

            <span class="page-tag">
                <svg viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round"
                     aria-hidden="true">
                    <path d="M12 22s8-4 8-11V5l-8-3-8 3v6c0 7 8 11 8 11z"/>
                    <path d="m9 12 2 2 4-4"/>
                </svg>
                PROJECT MANAGEMENT
            </span>
        </div>

        <section class="form-card">

            <div class="card-header">
                <div class="card-icon">
                    <svg viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round"
                         aria-hidden="true">
                        <path d="M12 3v18"/>
                        <path d="M3 12h18"/>
                        <path d="M5 5h14v14H5z"/>
                    </svg>
                </div>

                <div>
                    <h2>Project Information</h2>
                    <p>Fill in the details below to register your sustainability initiative.</p>
                </div>
            </div>

            {{-- VALIDATION SUMMARY --}}
            @if ($errors->any())
                <div class="error-summary" role="alert">
                    <strong>Please fix the following errors:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('projects.store') }}" method="POST">
                @csrf

                <div class="form-body">

                    <h3 class="section-title">
                        <span class="section-number">01</span>
                        Basic Project Details
                    </h3>

                    <div class="form-grid">

                        {{-- PROJECT TITLE --}}
                        <div class="form-group full-width">
                            <label for="title">
                                Project Title <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                id="title"
                                name="title"
                                value="{{ old('title') }}"
                                class="@error('title') has-error @enderror"
                                placeholder="Enter your project title"
                                maxlength="255"
                                required
                            >

                            @error('title')
                                <span class="field-error">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- DESCRIPTION --}}
                        <div class="form-group full-width">
                            <label for="description">
                                Description <span class="required">*</span>
                            </label>

                            <textarea
                                id="description"
                                name="description"
                                class="@error('description') has-error @enderror"
                                placeholder="Describe the project's goals, activities, and expected impact..."
                                required
                            >{{ old('description') }}</textarea>

                            <p class="field-hint">
                                Explain the project's purpose and the positive environmental or community impact it aims to achieve.
                            </p>

                            @error('description')
                                <span class="field-error">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- CATEGORY --}}
                        <div class="form-group">
                            <label for="category">
                                Category <span class="required">*</span>
                            </label>

                            <select
                                id="category"
                                name="category"
                                class="@error('category') has-error @enderror"
                                required
                            >
                                <option value="">Select category</option>

                                <option value="Environment"
                                    {{ old('category') == 'Environment' ? 'selected' : '' }}>
                                    Environment
                                </option>

                                <option value="Energy"
                                    {{ old('category') == 'Energy' ? 'selected' : '' }}>
                                    Energy
                                </option>

                                <option value="Water"
                                    {{ old('category') == 'Water' ? 'selected' : '' }}>
                                    Water
                                </option>

                                <option value="Community"
                                    {{ old('category') == 'Community' ? 'selected' : '' }}>
                                    Community
                                </option>
                            </select>

                            @error('category')
                                <span class="field-error">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- STATUS --}}
                        <div class="form-group">
                            <label for="status">
                                Status <span class="required">*</span>
                            </label>

                            <select
                                id="status"
                                name="status"
                                class="@error('status') has-error @enderror"
                                required
                            >
                                <option value="">Select status</option>

                                <option value="Active"
                                    {{ old('status') == 'Active' ? 'selected' : '' }}>
                                    Active
                                </option>

                                <option value="Funding"
                                    {{ old('status') == 'Funding' ? 'selected' : '' }}>
                                    Funding
                                </option>

                                <option value="Completed"
                                    {{ old('status') == 'Completed' ? 'selected' : '' }}>
                                    Completed
                                </option>
                            </select>

                            @error('status')
                                <span class="field-error">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <h3 class="section-title" style="margin-top: 34px;">
                        <span class="section-number">02</span>
                        Timeline
                    </h3>

                    <div class="form-grid">

                        {{-- START DATE --}}
                        <div class="form-group">
                            <label for="start_date">Start Date</label>

                            <input
                                type="date"
                                id="start_date"
                                name="start_date"
                                value="{{ old('start_date') }}"
                                class="@error('start_date') has-error @enderror"
                            >

                            @error('start_date')
                                <span class="field-error">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- END DATE --}}
                        <div class="form-group">
                            <label for="end_date">End Date</label>

                            <input
                                type="date"
                                id="end_date"
                                name="end_date"
                                value="{{ old('end_date') }}"
                                class="@error('end_date') has-error @enderror"
                            >

                            @error('end_date')
                                <span class="field-error">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <h3 class="section-title" style="margin-top: 34px;">
                        <span class="section-number">03</span>
                        Project Targets and Progress
                    </h3>

                    <div class="form-grid">

                        {{-- CURRENT VALUE --}}
                        <div class="form-group">
                            <label for="current_value">
                                Current Value <span class="required">*</span>
                            </label>

                            <input
                                type="number"
                                id="current_value"
                                name="current_value"
                                value="{{ old('current_value', 0) }}"
                                class="@error('current_value') has-error @enderror"
                                placeholder="0"
                                min="0"
                                required
                            >

                            <p class="field-hint">
                                The project's current progress or amount raised.
                            </p>

                            @error('current_value')
                                <span class="field-error">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- TARGET VALUE --}}
                        <div class="form-group">
                            <label for="target_value">
                                Target Value <span class="required">*</span>
                            </label>

                            <input
                                type="number"
                                id="target_value"
                                name="target_value"
                                value="{{ old('target_value') }}"
                                class="@error('target_value') has-error @enderror"
                                placeholder="Enter target amount"
                                min="1"
                                required
                            >

                            <p class="field-hint">
                                The total amount or milestone the project aims to reach.
                            </p>

                            @error('target_value')
                                <span class="field-error">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- UNIT --}}
                        <div class="form-group full-width">
                            <label for="unit">
                                Progress Unit <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                id="unit"
                                name="unit"
                                value="{{ old('unit') }}"
                                class="@error('unit') has-error @enderror"
                                placeholder="e.g. PHP Raised, Trees Planted, Kilograms Collected"
                                maxlength="100"
                                required
                            >

                            <p class="field-hint">
                                Specify how progress is measured, such as PHP Raised or Trees Planted.
                            </p>

                            @error('unit')
                                <span class="field-error">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                </div>

                {{-- ACTION BUTTONS --}}
                <div class="form-footer">
                    <p class="footer-note">
                        <span class="required">*</span> Required fields must be completed.
                        <br>
                        Review your project details before saving.
                    </p>

                    <div class="footer-actions">
                        <a href="{{ route('projects.index') }}" class="btn btn-secondary">
                            Cancel
                        </a>

                        <button type="submit" class="btn btn-primary">
                            <svg viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2.2"
                                 stroke-linecap="round" stroke-linejoin="round"
                                 aria-hidden="true">
                                <path d="M12 5v14"/>
                                <path d="M5 12h14"/>
                            </svg>
                            Save Project
                        </button>
                    </div>
                </div>

            </form>
        </section>

        <p class="bottom-note">
            ClimateShield Admin &bull; Building a more sustainable future
        </p>

    </main>

</body>
</html>
