<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ClimateShield - {{ $mode === 'register' ? 'Create account' : 'Log in' }}</title>
  @if (file_exists(public_path('build/manifest.json')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  @endif
  <style>
    :root {
      --ink: #102a43;
      --muted: #627d98;
      --line: #d9e2ec;
      --paper: #f6f9fc;
      --teal: #0f766e;
      --teal-dark: #115e59;
      --coral: #e76f51;
    }

    * { box-sizing: border-box; }
    body {
      min-height: 100vh;
      margin: 0;
      color: var(--ink);
      font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
      background: linear-gradient(135deg, #e7f5f2 0%, #f9f4ec 52%, #f5e9e0 100%);
    }

    .auth-shell {
      min-height: 100vh;
      display: grid;
      grid-template-columns: minmax(0, 1.1fr) minmax(360px, 0.9fr);
      align-items: stretch;
    }

    .auth-intro {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      padding: clamp(32px, 7vw, 92px);
      background: linear-gradient(145deg, #0f766e 0%, #174e4a 100%);
      color: white;
    }

    .brand { font-size: 1.2rem; font-weight: 800; letter-spacing: .02em; }
    .brand span { color: #f4a261; }
    .intro-copy { max-width: 560px; }
    .eyebrow { color: #f4a261; font-size: .75rem; font-weight: 800; letter-spacing: .16em; text-transform: uppercase; }
    h1 { max-width: 620px; margin: 16px 0; font-size: clamp(2.6rem, 6vw, 5.6rem); line-height: .98; letter-spacing: -.04em; }
    .intro-copy p { max-width: 500px; margin: 0; color: #d8f3ef; font-size: 1.05rem; line-height: 1.7; }
    .intro-footer { color: #b6d8d3; font-size: .82rem; }

    .auth-panel { display: grid; place-items: center; padding: 32px; background: rgba(255, 255, 255, .78); }
    .auth-card { width: min(100%, 430px); padding: clamp(24px, 5vw, 44px); background: rgba(255,255,255,.92); border: 1px solid rgba(217,226,236,.85); box-shadow: 0 24px 60px rgba(16,42,67,.12); }
    .auth-card h2 { margin: 0 0 8px; font-size: 1.8rem; letter-spacing: -.03em; }
    .auth-card .subcopy { margin: 0 0 28px; color: var(--muted); font-size: .92rem; line-height: 1.5; }
    .field { margin-bottom: 16px; }
    label { display: block; margin-bottom: 6px; font-size: .78rem; font-weight: 800; letter-spacing: .04em; text-transform: uppercase; }
    input { width: 100%; padding: 12px 13px; border: 1px solid var(--line); background: var(--paper); color: var(--ink); font: inherit; }
    input:focus { outline: 3px solid rgba(15,118,110,.18); border-color: var(--teal); }
    .error { display: block; margin-top: 6px; color: #b42318; font-size: .78rem; }
    .form-error { margin-bottom: 18px; padding: 10px 12px; background: #fff1f0; color: #b42318; font-size: .85rem; }
    .remember { display: flex; gap: 8px; align-items: center; margin: 4px 0 20px; color: var(--muted); font-size: .85rem; }
    .remember input { width: auto; }
    .submit { width: 100%; padding: 13px 16px; border: 0; background: var(--teal); color: white; font: inherit; font-weight: 800; cursor: pointer; }
    .submit:hover { background: var(--teal-dark); }
    .submit:disabled { cursor: wait; opacity: .7; }
    .switch { margin: 22px 0 0; color: var(--muted); text-align: center; font-size: .86rem; }
    .switch a { color: var(--teal-dark); font-weight: 800; }

    @media (max-width: 800px) {
      .auth-shell { grid-template-columns: 1fr; }
      .auth-intro { min-height: 300px; padding: 30px 24px; }
      .intro-copy { margin-top: 48px; }
      h1 { font-size: clamp(2.4rem, 12vw, 4rem); }
      .intro-footer { display: none; }
      .auth-panel { padding: 24px 16px 40px; }
    }
  </style>
</head>
<body>
  <main class="auth-shell">
    <section class="auth-intro">
      <div class="brand">Climate<span>Shield</span></div>
      <div class="intro-copy">
        <div class="eyebrow">Community readiness network</div>
        <h1>Stay ready for what comes next.</h1>
        <p>Track local hazards, share verified reports, and help your district prepare for changing conditions.</p>
      </div>
      <div class="intro-footer">A calmer response starts with better information.</div>
    </section>

    <section class="auth-panel">
      <div class="auth-card">
        @if ($mode === 'register')
          <h2>Create your account</h2>
          <p class="subcopy">Join ClimateShield and start building local resilience.</p>
          <form method="POST" action="{{ route('register.store') }}" data-auth-form>
            @csrf
            <div class="field">
              <label for="name">Name</label>
              <input id="name" name="name" type="text" value="{{ old('name') }}" autocomplete="name" required autofocus>
              @error('name')<span class="error">{{ $message }}</span>@enderror
            </div>
            <div class="field">
              <label for="email">Email</label>
              <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" required>
              @error('email')<span class="error">{{ $message }}</span>@enderror
            </div>
            <div class="field">
              <label for="password">Password</label>
              <input id="password" name="password" type="password" autocomplete="new-password" minlength="8" required>
              @error('password')<span class="error">{{ $message }}</span>@enderror
            </div>
            <div class="field">
              <label for="password_confirmation">Confirm password</label>
              <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" minlength="8" required>
            </div>
            <button class="submit" type="submit">Create account</button>
          </form>
          <p class="switch">Already registered? <a href="{{ route('login') }}">Log in</a></p>
        @else
          <h2>Welcome back</h2>
          <p class="subcopy">Log in to see your district readiness dashboard.</p>
          <form method="POST" action="{{ route('login.store') }}" data-auth-form>
            @csrf
            <div class="field">
              <label for="email">Email</label>
              <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" required autofocus>
              @error('email')<span class="error">{{ $message }}</span>@enderror
            </div>
            <div class="field">
              <label for="password">Password</label>
              <input id="password" name="password" type="password" autocomplete="current-password" required>
              @error('password')<span class="error">{{ $message }}</span>@enderror
            </div>
            <label class="remember"><input name="remember" type="checkbox" value="1"> Remember me</label>
            @if ($errors->has('email') && old('email'))
              <div class="form-error">{{ $errors->first('email') }}</div>
            @endif
            <button class="submit" type="submit">Log in</button>
          </form>
          <p class="switch">Need an account? <a href="{{ route('register') }}">Register</a></p>
        @endif
      </div>
    </section>
  </main>
  <script>
    document.querySelectorAll('[data-auth-form]').forEach((form) => {
      form.addEventListener('submit', (event) => {
        const password = form.querySelector('[name="password"]');
        const confirmation = form.querySelector('[name="password_confirmation"]');

        if (confirmation && password.value !== confirmation.value) {
          event.preventDefault();
          confirmation.setCustomValidity('Passwords must match.');
          confirmation.reportValidity();
          return;
        }

        if (confirmation) {
          confirmation.setCustomValidity('');
        }

        const submitButton = form.querySelector('button[type="submit"]');

        if (submitButton) {
          submitButton.disabled = true;
          submitButton.textContent = 'Please wait...';
        }
      });
    });
  </script>
</body>
</html>
