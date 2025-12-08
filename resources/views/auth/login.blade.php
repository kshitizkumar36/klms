<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Login - Instructor Portal</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />

<style>
/* --------------- THEME --------------- */
:root {
  --bg: #0c0f13;
  --card: #15171c;
  --text: #e7ecf2;
  --muted: #8e98a0;
  --accent: #0d6efd;
  --accent-hover: #0b5ed7;
  --error: #ff6b6b;
  --shadow: 0 8px 25px rgba(0,0,0,0.35);
  --radius: 14px;
  --input-bg: #1c1e24;
  --input-border: #2a2d35;
}

* {
  margin: 0; padding: 0;
  box-sizing: border-box;
  font-family: "Inter", sans-serif;
}

html, body {
  width: 100%;
  height: 100%;
  background: var(--bg);
  color: var(--text);
  display: flex;
  justify-content: center;
  align-items: center;
}

/* ANIMATIONS */
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}

.fade { animation: fadeIn .6s forwards; }
.fade-delay-1 { animation-delay: .2s; }
.fade-delay-2 { animation-delay: .4s; }

/* MAIN CONTAINER */
.login-container {
  display: flex;
  max-width: 1000px;
  width: 90%;
  background: var(--card);
  border-radius: var(--radius);
  box-shadow: var(--shadow);
  overflow: hidden;
}

/* LEFT SIDE - FORM */
.login-form {
  flex: 1;
  padding: 50px;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.logo {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 30px;
}

.logo img { width: 48px; }
.logo h2 { font-weight: 700; }

.login-form h1 {
  font-size: 2.2rem;
  margin-bottom: 10px;
}

.login-form p {
  color: var(--muted);
  margin-bottom: 30px;
}

/* FORM ELEMENTS */
.form-group { margin-bottom: 20px; }

.form-label {
  display: block;
  margin-bottom: 8px;
  font-weight: 600;
  color: var(--text);
}

.form-input {
  width: 100%;
  padding: 14px 18px;
  background: var(--input-bg);
  border: 1px solid var(--input-border);
  border-radius: 10px;
  color: var(--text);
  font-size: 1rem;
  outline: none;
  transition: .3s;
}

.form-input:focus {
  border-color: var(--accent);
  box-shadow: 0 0 0 4px rgba(13,110,253,0.1);
}

/* PASSWORD TOGGLE */
.password-group { position: relative; }

.toggle-password {
  position: absolute;
  right: 15px; top: 15px;
  color: var(--muted);
  cursor: pointer;
  font-size: 20px;
}

/* OPTIONS (Remember & Forgot) */
.form-options {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 30px;
}

.remember-me {
  display: flex;
  align-items: center;
  gap: 8px;
  color: var(--muted);
  cursor: pointer;
}

.remember-me input {
  width: 16px; height: 16px;
  accent-color: var(--accent);
}

.forgot-link {
  color: var(--accent);
  text-decoration: none;
  font-weight: 600;
}

.forgot-link:hover { text-decoration: underline; }

/* BUTTON */
.login-btn {
  width: 100%;
  padding: 14px;
  background: var(--accent);
  border: none;
  border-radius: 10px;
  color: #fff;
  font-size: 1.1rem;
  font-weight: 700;
  cursor: pointer;
  transition: .3s;
}

.login-btn:hover { background: var(--accent-hover); }

/* SOCIAL LOGIN */
.social-login {
  text-align: center;
  margin-top: 30px;
}

.social-login p {
  position: relative;
  color: var(--muted);
  margin-bottom: 20px;
}

.social-login p::before,
.social-login p::after {
  content: "";
  position: absolute;
  top: 50%;
  width: 40%; height: 1px;
  background: var(--input-border);
}
.social-login p::before { left: 0; }
.social-login p::after { right: 0; }

.social-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  width: 100%;
  padding: 12px;
  background: var(--input-bg);
  border: 1px solid var(--input-border);
  border-radius: 10px;
  color: var(--text);
  font-weight: 600;
  cursor: pointer;
  transition: .3s;
}

.social-btn:hover { background: #222; }
.social-btn img { width: 22px; }

/* RIGHT SIDE - IMAGE/VIDEO */
.login-visual {
  flex: 1;
  position: relative;
  overflow: hidden;
  background: url('https://source.unsplash.com/random/800x1000/?coding,technology') center/cover no-repeat;
}

/* OVERLAY ON VISUAL */
.login-visual::after {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(45deg, rgba(13,110,253,0.4), rgba(12,15,19,0.8));
}

/* QUOTE */
.quote {
  position: absolute;
  bottom: 50px; left: 50px; right: 50px;
  z-index: 10;
  text-align: left;
}

.quote h2 {
  font-size: 2.4rem;
  font-weight: 800;
  margin-bottom: 20px;
  line-height: 1.2;
}

.quote p {
  font-size: 1.1rem;
  font-weight: 500;
}

/* RESPONSIVE */
@media(max-width: 900px){
  .login-container { flex-direction: column-reverse; width: 95%; max-width: 500px; }
  .login-visual { height: 250px; }
  .quote h2 { font-size: 1.6rem; }
  .quote p { font-size: 1rem; }
  .login-form { padding: 30px; }
}
</style>
</head>

<body>

<div class="login-container fade">

  <div class="login-form">
    <div class="logo fade-delay-1">
      <img src="https://kshitizkumar.com/assets/img/klogo.png" />
      <h2>LMS Portal</h2>
    </div>

    <h1 class="fade-delay-1">Welcome Back!</h1>
    <p class="fade-delay-1">Please sign in to access your instructor dashboard.</p>

    <form class="fade-delay-2">
      <div class="form-group">
        <label class="form-label">Email Address</label>
        <input type="email" class="form-input" placeholder="e.g. instructor@example.com" required />
      </div>

      <div class="form-group">
        <label class="form-label">Password</label>
        <div class="password-group">
          <input type="password" class="form-input" id="password" placeholder="••••••••" required />
          <span class="toggle-password" onclick="togglePassword()">👁️</span>
        </div>
      </div>

      <div class="form-options">
        <label class="remember-me">
          <input type="checkbox" /> Remember me
        </label>
        <a href="#" class="forgot-link">Forgot Password?</a>
      </div>

      <button type="submit" class="login-btn">Sign In</button>
    </form>

    <div class="social-login fade-delay-2">
      <p>Or continue with</p>
      <button class="social-btn">
        <img src="https://www.svgrepo.com/show/303108/google-icon-logo.svg" />
        Sign in with Google
      </button>
    </div>

    <p style="text-align:center; margin-top:30px;">
      Don't have an account? <a href="#" class="forgot-link">Sign Up</a>
    </p>
  </div>

  <div class="login-visual fade-delay-1">
    <div class="quote">
      <h2>"The art of teaching is the art of assisting discovery."</h2>
      <p>— Mark Van Doren</p>
    </div>
  </div>

</div>

<script>
/* PASSWORD TOGGLE FUNCTION */
function togglePassword() {
  const passwordInput = document.getElementById('password');
  const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
  passwordInput.setAttribute('type', type);
}
</script>

</body>
</html>