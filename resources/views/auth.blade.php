<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        ClimateShield - {{ $mode === 'register' ? 'Create Account' : 'Log In' }}
    </title>

    @if (file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>
        /* =========================================
           CLIMATESHIELD AUTHENTICATION
           Light Blue Dashboard-Matching Theme
        ========================================= */

        :root {
            --primary: #1687d9;
            --primary-dark: #0874bd;
            --primary-light: #e5f3ff;

            --background: #f0f7ff;
            --background-soft: #f7fbff;
            --panel-blue: #e3f2ff;

            --text-primary: #17324d;
            --text-secondary: #60758c;

            --border: #d7e7f5;
            --white: #ffffff;

            --success: #0f9f79;
            --danger: #c43f3f;

            --shadow:
                0 24px 65px rgba(37, 99, 150, 0.09),
                0 4px 14px rgba(37, 99, 150, 0.035);
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            min-height: 100vh;
            margin: 0;

            color: var(--text-primary);

            background: var(--background);

            font-family:
                'Plus Jakarta Sans',
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                sans-serif;

            -webkit-font-smoothing: antialiased;
        }

        button,
        input {
            font: inherit;
        }

        button,
        a,
        input {
            -webkit-tap-highlight-color: transparent;
        }

        /* =========================================
           MAIN LAYOUT
        ========================================= */

        .auth-shell {
            min-height: 100vh;

            display: grid;

            grid-template-columns:
                minmax(0, 1.08fr)
                minmax(420px, 0.92fr);

            overflow: hidden;
        }

        /* =========================================
           LEFT BRANDING PANEL
        ========================================= */

        .auth-intro {
            position: relative;
            isolation: isolate;
            overflow: hidden;

            display: flex;
            flex-direction: column;
            justify-content: space-between;

            padding: clamp(36px, 5.5vw, 78px);

            background:
                radial-gradient(
                    circle at 88% 18%,
                    rgba(76, 169, 235, 0.19),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 8% 90%,
                    rgba(75, 190, 187, 0.12),
                    transparent 34%
                ),
                linear-gradient(
                    145deg,
                    #e4f3ff 0%,
                    #eaf7ff 52%,
                    #edf9fc 100%
                );

            border-right: 1px solid #d9ebf8;
        }

        /* Decorative background rings */

        .auth-intro::before,
        .auth-intro::after {
            content: "";

            position: absolute;
            z-index: -1;

            border: 1px solid rgba(22, 135, 217, 0.12);

            border-radius: 50%;

            pointer-events: none;
        }

        .auth-intro::before {
            width: 400px;
            height: 400px;

            right: -190px;
            bottom: 3%;

            box-shadow:
                0 0 0 32px rgba(22, 135, 217, 0.025),
                0 0 0 64px rgba(22, 135, 217, 0.022),
                0 0 0 96px rgba(22, 135, 217, 0.018);
        }

        .auth-intro::after {
            width: 210px;
            height: 210px;

            right: 13%;
            top: -125px;

            box-shadow:
                0 0 0 25px rgba(22, 135, 217, 0.025),
                0 0 0 50px rgba(22, 135, 217, 0.018);
        }

        /* =========================================
           CLIMATESHIELD BRAND
        ========================================= */

        .brand {
            position: relative;
            z-index: 1;

            display: inline-flex;
            align-items: center;
            gap: 11px;

            width: fit-content;

            color: var(--text-primary);

            font-size: 1.35rem;
            font-weight: 800;

            letter-spacing: -0.06em;
        }

        .brand-icon {
            width: 35px;
            height: 37px;

            flex-shrink: 0;

            color: var(--primary);
        }

        .brand-name {
            color: var(--text-primary);
        }

        .brand-name span {
            color: var(--primary);
        }

        /* =========================================
           INTRODUCTION
        ========================================= */

        .intro-copy {
            position: relative;
            z-index: 1;

            max-width: 590px;

            margin: 54px 0;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 9px;

            padding: 9px 13px;

            color: #176da8;

            background: rgba(255, 255, 255, 0.65);

            border: 1px solid rgba(22, 135, 217, 0.16);

            border-radius: 100px;

            font-size: 0.68rem;
            font-weight: 800;

            letter-spacing: 0.11em;
            text-transform: uppercase;
        }

        .eyebrow-dot {
            width: 7px;
            height: 7px;

            background: #21a4d9;

            border-radius: 50%;

            box-shadow: 0 0 0 4px rgba(33, 164, 217, 0.12);
        }

        .intro-copy h1 {
            max-width: 570px;

            margin: 26px 0 20px;

            color: #16324f;

            font-size: clamp(2.7rem, 4.3vw, 4.5rem);

            font-weight: 800;

            line-height: 1.09;

            letter-spacing: -0.065em;
        }

        .intro-copy h1 .highlight {
            color: var(--primary);
        }

        .intro-copy p {
            max-width: 465px;

            margin: 0;

            color: #5b748d;

            font-size: 0.97rem;

            line-height: 1.9;
        }

        /* =========================================
           BRANDING FEATURES
        ========================================= */

        .feature-list {
            display: flex;
            flex-wrap: wrap;

            gap: 10px;

            margin-top: 29px;
        }

        .feature-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            padding: 10px 12px;

            color: #42627d;

            background: rgba(255, 255, 255, 0.63);

            border: 1px solid rgba(184, 215, 237, 0.8);

            border-radius: 10px;

            font-size: 0.75rem;
            font-weight: 700;
        }

        .feature-check {
            display: inline-grid;
            place-items: center;

            width: 17px;
            height: 17px;

            color: #0874bd;

            background: #d8efff;

            border-radius: 50%;

            font-size: 0.65rem;
            font-weight: 800;
        }

        /* =========================================
           FOOTER
        ========================================= */

        .intro-footer {
            position: relative;
            z-index: 1;

            display: flex;
            align-items: center;
            gap: 11px;

            width: fit-content;
            max-width: 100%;

            padding: 13px 16px;

            color: #526f89;

            background: rgba(255, 255, 255, 0.55);

            border: 1px solid rgba(190, 218, 239, 0.8);

            border-radius: 12px;

            font-size: 0.75rem;
            font-weight: 600;
        }

        .footer-shield {
            width: 19px;
            height: 19px;

            flex-shrink: 0;

            color: var(--primary);
        }

        /* =========================================
           RIGHT AUTHENTICATION PANEL
        ========================================= */

        .auth-panel {
            position: relative;

            display: grid;
            place-items: center;

            padding: clamp(25px, 4vw, 62px);

            background:
                radial-gradient(
                    circle at 100% 0%,
                    rgba(83, 174, 235, 0.10),
                    transparent 32%
                ),
                linear-gradient(
                    145deg,
                    #f7fbff 0%,
                    #eff7ff 100%
                );
        }

        /* =========================================
           AUTHENTICATION CARD
        ========================================= */

        .auth-card {
            width: min(100%, 455px);

            padding: clamp(29px, 3.5vw, 45px);

            background: var(--white);

            border: 1px solid rgba(214, 230, 244, 0.95);

            border-radius: 24px;

            box-shadow: var(--shadow);

            animation: card-enter 450ms ease both;
        }

        @keyframes card-enter {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* =========================================
           CARD HEADER
        ========================================= */

        .card-icon {
            display: grid;
            place-items: center;

            width: 51px;
            height: 51px;

            margin-bottom: 25px;

            color: var(--primary);

            background: linear-gradient(
                145deg,
                #e6f4ff,
                #d9edff
            );

            border: 1px solid #d5eaff;

            border-radius: 15px;
        }

        .card-icon svg {
            width: 26px;
            height: 26px;
        }

        .auth-card h2 {
            margin: 0 0 10px;

            color: var(--text-primary);

            font-size: clamp(1.8rem, 2.5vw, 2.1rem);

            font-weight: 800;

            letter-spacing: -0.06em;
        }

        .subcopy {
            margin: 0 0 31px;

            color: var(--text-secondary);

            font-size: 0.87rem;

            line-height: 1.8;
        }

        /* =========================================
           FORM FIELDS
        ========================================= */

        .field {
            margin-bottom: 21px;
        }

        .field > label {
            display: block;

            margin-bottom: 9px;

            color: #344b63;

            font-size: 0.72rem;

            font-weight: 800;

            letter-spacing: 0.055em;

            text-transform: uppercase;
        }

        .field input:not([type="checkbox"]) {
            display: block;

            width: 100%;

            min-height: 52px;

            padding: 13px 15px;

            color: var(--text-primary);

            background: #f8fbff;

            border: 1px solid #d9e6f1;

            border-radius: 12px;

            font-size: 0.86rem;

            transition:
                background 180ms ease,
                border-color 180ms ease,
                box-shadow 180ms ease;
        }

        .field input::placeholder {
            color: #9aabba;
        }

        .field input:not([type="checkbox"]):hover {
            background: #ffffff;

            border-color: #b9d5e9;
        }

        .field input:not([type="checkbox"]):focus {
            outline: none;

            background: #ffffff;

            border-color: var(--primary);

            box-shadow:
                0 0 0 4px rgba(22, 135, 217, 0.12);
        }

        .field input[aria-invalid="true"] {
            border-color: #dc6b65;

            background: #fffafa;
        }

        .field input[aria-invalid="true"]:focus {
            box-shadow:
                0 0 0 4px rgba(220, 107, 101, 0.12);
        }

        /* =========================================
           PASSWORD VISIBILITY
        ========================================= */

        .password-wrap {
            position: relative;
        }

        .password-wrap input {
            padding-right: 75px !important;
        }

        .password-toggle {
            position: absolute;

            top: 50%;
            right: 10px;

            transform: translateY(-50%);

            padding: 7px 9px;

            color: #59738a;

            background: transparent;

            border: none;

            border-radius: 7px;

            font-size: 0.74rem;

            font-weight: 800;

            cursor: pointer;

            transition:
                color 160ms ease,
                background 160ms ease;
        }

        .password-toggle:hover {
            color: var(--primary-dark);

            background: #eaf5ff;
        }

        .password-toggle:focus-visible {
            outline: 2px solid var(--primary);

            outline-offset: 2px;
        }

        /* =========================================
           REMEMBER ME
        ========================================= */

        .remember {
            display: flex;
            align-items: center;
            gap: 9px;

            margin: 2px 0 25px;

            color: #61758a;

            font-size: 0.81rem;

            font-weight: 600;

            cursor: pointer;
        }

        .remember input[type="checkbox"] {
            width: 17px;
            height: 17px;

            margin: 0;

            accent-color: var(--primary);

            cursor: pointer;
        }

        /* =========================================
           PRIMARY BUTTON
        ========================================= */

        .submit {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;

            width: 100%;

            min-height: 53px;

            padding: 14px 18px;

            color: #ffffff;

            background: linear-gradient(
                110deg,
                #1687d9,
                #0874bd
            );

            border: none;

            border-radius: 12px;

            box-shadow:
                0 7px 18px rgba(22, 135, 217, 0.19);

            font-size: 0.89rem;

            font-weight: 800;

            letter-spacing: 0.01em;

            cursor: pointer;

            transition:
                background 180ms ease,
                box-shadow 180ms ease,
                transform 180ms ease;
        }

        .submit:hover {
            background: linear-gradient(
                110deg,
                #0874bd,
                #075985
            );

            box-shadow:
                0 10px 24px rgba(22, 135, 217, 0.25);

            transform: translateY(-1px);
        }

        .submit:active {
            transform: translateY(0);
        }

        .submit:focus-visible {
            outline: 3px solid rgba(22, 135, 217, 0.35);

            outline-offset: 3px;
        }

        .submit:disabled {
            cursor: wait;

            opacity: 0.7;

            transform: none;
        }

        .submit-arrow {
            width: 17px;
            height: 17px;

            transition: transform 180ms ease;
        }

        .submit:hover .submit-arrow {
            transform: translateX(3px);
        }

        /* =========================================
           VALIDATION MESSAGES
        ========================================= */

        .error {
            display: block;

            margin-top: 7px;

            color: var(--danger);

            font-size: 0.77rem;

            line-height: 1.5;
        }

        .form-error {
            margin-bottom: 18px;

            padding: 13px 15px;

            color: #a72f2f;

            background: #fff2f1;

            border: 1px solid #ffd8d5;

            border-radius: 11px;

            font-size: 0.82rem;

            line-height: 1.6;
        }

        /* =========================================
           LOGIN / REGISTRATION SWITCH
        ========================================= */

        .switch {
            margin: 25px 0 0;

            color: #74859a;

            text-align: center;

            font-size: 0.82rem;

            line-height: 1.8;
        }

        .switch a {
            color: var(--primary-dark);

            font-weight: 800;

            text-decoration: none;

            text-underline-offset: 4px;
        }

        .switch a:hover {
            color: #075985;

            text-decoration: underline;
        }

        .switch a:focus-visible {
            outline: 2px solid var(--primary);

            outline-offset: 3px;

            border-radius: 2px;
        }

        /* =========================================
           SCREEN READER ACCESSIBILITY
        ========================================= */

        .sr-only {
            position: absolute;

            width: 1px;
            height: 1px;

            padding: 0;
            margin: -1px;

            overflow: hidden;

            clip: rect(0, 0, 0, 0);

            white-space: nowrap;

            border: 0;
        }

        /* =========================================
           TABLET RESPONSIVENESS
        ========================================= */

        @media (max-width: 900px) {
            .auth-shell {
                grid-template-columns: 1fr;

                overflow: visible;
            }

            .auth-intro {
                min-height: 350px;

                padding: 32px 30px;
            }

            .intro-copy {
                margin: 45px 0 25px;
            }

            .intro-copy h1 {
                max-width: 650px;

                font-size: clamp(2.6rem, 7vw, 4rem);
            }

            .intro-copy p {
                max-width: 560px;
            }

            .intro-footer {
                display: none;
            }

            .auth-panel {
                padding: 40px 24px 55px;
            }

            .auth-card {
                width: min(100%, 480px);
            }
        }

        /* =========================================
           MOBILE RESPONSIVENESS
        ========================================= */

        @media (max-width: 480px) {
            .auth-intro {
                min-height: 290px;

                padding: 25px 22px;
            }

            .brand {
                gap: 9px;

                font-size: 1.2rem;
            }

            .brand-icon {
                width: 30px;
                height: 32px;
            }

            .intro-copy {
                margin: 35px 0 12px;
            }

            .eyebrow {
                padding: 8px 10px;

                font-size: 0.60rem;

                letter-spacing: 0.09em;
            }

            .intro-copy h1 {
                margin: 18px 0 13px;

                font-size: clamp(2.25rem, 10vw, 3rem);
            }

            .intro-copy p {
                font-size: 0.85rem;

                line-height: 1.75;
            }

            .feature-list {
                gap: 7px;

                margin-top: 19px;
            }

            .feature-pill {
                padding: 8px 9px;

                font-size: 0.67rem;
            }

            .auth-panel {
                padding: 25px 14px 35px;
            }

            .auth-card {
                padding: 27px 21px;

                border-radius: 20px;
            }

            .card-icon {
                width: 46px;
                height: 46px;

                margin-bottom: 21px;

                border-radius: 13px;
            }

            .auth-card h2 {
                font-size: 1.8rem;
            }

            .subcopy {
                margin-bottom: 27px;

                font-size: 0.84rem;
            }

            .field {
                margin-bottom: 19px;
            }

            .field input:not([type="checkbox"]) {
                min-height: 50px;
            }

            .submit {
                min-height: 51px;
            }
        }

        /* =========================================
           REDUCED MOTION ACCESSIBILITY
        ========================================= */

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;

                animation-duration: 0.01ms !important;

                animation-iteration-count: 1 !important;

                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>

<body>

<main class="auth-shell">

    <!-- =====================================
         LEFT PANEL: BRANDING
    ====================================== -->

    <section class="auth-intro">

        <!-- CLIMATESHIELD LOGO -->

        <div class="brand">

            <svg
                class="brand-icon"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
                stroke-linecap="round"
                stroke-linejoin="round"
                aria-hidden="true"
            >
                <path d="M12 22s8-4 8-11V5l-8-3-8 3v6c0 7 8 11 8 11z"/>
            </svg>

            <div class="brand-name">
                Climate<span>Shield</span>
            </div>

        </div>

        <!-- INTRODUCTION -->

        <div class="intro-copy">

            <div class="eyebrow">
                <span class="eyebrow-dot"></span>
                Community Readiness Network
            </div>

            <h1>
                Stay ready for
                <span class="highlight">what comes next.</span>
            </h1>

            <p>
                Track local hazards, share verified reports, and help your
                district prepare for changing conditions. Better information
                builds stronger, safer communities.
            </p>

            <!-- FEATURE PILLS -->

            <div class="feature-list">

                <div class="feature-pill">
                    <span class="feature-check">✓</span>
                    Local hazard awareness
                </div>

                <div class="feature-pill">
                    <span class="feature-check">✓</span>
                    Community preparedness
                </div>

            </div>

        </div>

        <!-- FOOTER -->

        <div class="intro-footer">

            <svg
                class="footer-shield"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
                stroke-linecap="round"
                stroke-linejoin="round"
                aria-hidden="true"
            >
                <path d="M12 22s8-4 8-11V5l-8-3-8 3v6c0 7 8 11 8 11z"/>
                <path d="m9 12 2 2 4-4"/>
            </svg>

            Prepared communities are stronger communities.

        </div>

    </section>


    <!-- =====================================
         RIGHT PANEL: AUTHENTICATION
    ====================================== -->

    <section class="auth-panel">

        <div class="auth-card">

            @if ($mode === 'register')

                <!-- =====================================
                     REGISTRATION FORM
                ====================================== -->

                <div class="card-icon">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <line x1="19" y1="8" x2="19" y2="14"/>
                        <line x1="22" y1="11" x2="16" y2="11"/>
                    </svg>

                </div>

                <h2>Create your account</h2>

                <p class="subcopy">
                    Join ClimateShield and help build a more prepared community.
                </p>

                <form
                    method="POST"
                    action="{{ route('register.store') }}"
                    data-auth-form
                >

                    @csrf

                    <!-- NAME -->

                    <div class="field">

                        <label for="name">
                            Full name
                        </label>

                        <input
                            id="name"
                            name="name"
                            type="text"
                            placeholder="Enter your full name"
                            value="{{ old('name') }}"
                            autocomplete="name"
                            required
                            autofocus
                            @error('name') aria-invalid="true" @enderror
                        >

                        @error('name')
                            <span class="error">{{ $message }}</span>
                        @enderror

                    </div>

                    <!-- EMAIL -->

                    <div class="field">

                        <label for="email">
                            Email address
                        </label>

                        <input
                            id="email"
                            name="email"
                            type="email"
                            placeholder="you@example.com"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            required
                            @error('email') aria-invalid="true" @enderror
                        >

                        @error('email')
                            <span class="error">{{ $message }}</span>
                        @enderror

                    </div>

                    <!-- PASSWORD -->

                    <div class="field">

                        <label for="password">
                            Password
                        </label>

                        <div class="password-wrap">

                            <input
                                id="password"
                                name="password"
                                type="password"
                                placeholder="Create a password"
                                autocomplete="new-password"
                                minlength="8"
                                required
                                aria-describedby="password-help"
                                @error('password') aria-invalid="true" @enderror
                            >

                            <button
                                class="password-toggle"
                                type="button"
                                data-password-toggle
                                aria-controls="password"
                                aria-label="Show password"
                            >
                                Show
                            </button>

                        </div>

                        <span id="password-help" class="sr-only">
                            Enter a password of at least 8 characters.
                        </span>

                        @error('password')
                            <span class="error">{{ $message }}</span>
                        @enderror

                    </div>

                    <!-- CONFIRM PASSWORD -->

                    <div class="field">

                        <label for="password_confirmation">
                            Confirm password
                        </label>

                        <div class="password-wrap">

                            <input
                                id="password_confirmation"
                                name="password_confirmation"
                                type="password"
                                placeholder="Re-enter your password"
                                autocomplete="new-password"
                                minlength="8"
                                required
                            >

                            <button
                                class="password-toggle"
                                type="button"
                                data-password-toggle
                                aria-controls="password_confirmation"
                                aria-label="Show confirm password"
                            >
                                Show
                            </button>

                        </div>

                    </div>

                    <!-- REGISTER BUTTON -->

                    <button class="submit" type="submit">

                        Create account

                        <svg
                            class="submit-arrow"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            aria-hidden="true"
                        >
                            <path d="M5 12h14"/>
                            <path d="m12 5 7 7-7 7"/>
                        </svg>

                    </button>

                </form>

                <p class="switch">
                    Already have an account?
                    <a href="{{ route('login') }}">Log in</a>
                </p>

            @else

                <!-- =====================================
                     LOGIN FORM
                ====================================== -->



                <h2>Welcome back</h2>

                <p class="subcopy">
                    Sign in to access your district readiness dashboard.
                </p>

                <form
                    method="POST"
                    action="{{ route('login.store') }}"
                    data-auth-form
                >

                    @csrf

                    <!-- EMAIL -->

                    <div class="field">

                        <label for="email">
                            Email address
                        </label>

                        <input
                            id="email"
                            name="email"
                            type="email"
                            placeholder="you@example.com"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            required
                            autofocus
                            @error('email') aria-invalid="true" @enderror
                        >

                        @error('email')
                            <span class="error">{{ $message }}</span>
                        @enderror

                    </div>

                    <!-- PASSWORD -->

                    <div class="field">

                        <label for="password">
                            Password
                        </label>

                        <div class="password-wrap">

                            <input
                                id="password"
                                name="password"
                                type="password"
                                placeholder="Enter your password"
                                autocomplete="current-password"
                                required
                                @error('password') aria-invalid="true" @enderror
                            >

                            <button
                                class="password-toggle"
                                type="button"
                                data-password-toggle
                                aria-controls="password"
                                aria-label="Show password"
                            >
                                Show
                            </button>

                        </div>

                        @error('password')
                            <span class="error">{{ $message }}</span>
                        @enderror

                    </div>

                    <!-- REMEMBER ME -->

                    <label class="remember">

                        <input
                            name="remember"
                            type="checkbox"
                            value="1"
                            @checked(old('remember'))
                        >

                        <span>Remember me</span>

                    </label>

                    <!-- LOGIN ERROR -->

                    @if ($errors->has('email') && old('email'))

                        <div class="form-error" role="alert">
                            {{ $errors->first('email') }}
                        </div>

                    @endif

                    <!-- LOGIN BUTTON -->

                    <button class="submit" type="submit">

                        Sign in

                        <svg
                            class="submit-arrow"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            aria-hidden="true"
                        >
                            <path d="M5 12h14"/>
                            <path d="m12 5 7 7-7 7"/>
                        </svg>

                    </button>

                </form>

                <p class="switch">
                    Don't have an account?
                    <a href="{{ route('register') }}">Create an account</a>
                </p>

            @endif

        </div>

    </section>

</main>


<!-- =========================================
     JAVASCRIPT INTERACTIONS
========================================= -->

<script>
    /*
     * SHOW / HIDE PASSWORD
     */

    document.querySelectorAll('[data-password-toggle]').forEach((toggle) => {

        toggle.addEventListener('click', () => {

            const input = document.getElementById(
                toggle.getAttribute('aria-controls')
            );

            if (!input) {
                return;
            }

            const showPassword = input.type === 'password';

            input.type = showPassword ? 'text' : 'password';

            toggle.textContent = showPassword ? 'Hide' : 'Show';

            const label = input.name === 'password_confirmation'
                ? 'confirm password'
                : 'password';

            toggle.setAttribute(
                'aria-label',
                `${showPassword ? 'Hide' : 'Show'} ${label}`
            );

        });

    });


    /*
     * REGISTRATION PASSWORD MATCHING
     */

    document.querySelectorAll('[data-auth-form]').forEach((form) => {

        const password = form.querySelector('[name="password"]');

        const confirmation = form.querySelector(
            '[name="password_confirmation"]'
        );

        if (password && confirmation) {

            const validatePasswords = () => {

                if (
                    confirmation.value &&
                    password.value !== confirmation.value
                ) {

                    confirmation.setCustomValidity(
                        'Passwords do not match.'
                    );

                } else {

                    confirmation.setCustomValidity('');

                }

            };

            password.addEventListener('input', validatePasswords);

            confirmation.addEventListener('input', validatePasswords);

        }


        /*
         * SUBMIT FEEDBACK
         */

        form.addEventListener('submit', (event) => {

            if (password && confirmation) {

                if (password.value !== confirmation.value) {

                    event.preventDefault();

                    confirmation.setCustomValidity(
                        'Passwords do not match.'
                    );

                    confirmation.reportValidity();

                    confirmation.focus();

                    return;

                }

                confirmation.setCustomValidity('');

            }

            const submitButton = form.querySelector(
                'button[type="submit"]'
            );

            if (submitButton) {

                submitButton.disabled = true;

                submitButton.textContent =
                    form.action.includes('register')
                        ? 'Creating account...'
                        : 'Signing in...';

            }

        });

    });

</script>

</body>
</html>