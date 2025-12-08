<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Create Account - LMS Portal</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />

<style>
/* --- THEME (Same as before) --- */
:root {
  --bg: #0c0f13;
  --card: #15171c;
  --text: #e7ecf2;
  --muted: #8e98a0;
  --accent: #0d6efd;
  --input-bg: #1c1e24;
  --border: #2a2d35;
}

* { margin:0; padding:0; box-sizing:border-box; font-family:"Inter",sans-serif; }
body { background:var(--bg); color:var(--text); min-height:100vh; display:flex; align-items:center; justify-content:center; padding:20px; }

/* CONTAINER */
.auth-box {
  width: 100%; max-width: 550px;
  background: var(--card);
  padding: 40px;
  border-radius: 16px;
  box-shadow: 0 10px 40px rgba(0,0,0,0.5);
}

/* TOGGLE SWITCH (Student vs Instructor) */
.role-switch {
  display: flex;
  background: var(--input-bg);
  padding: 5px;
  border-radius: 10px;
  margin-bottom: 30px;
  border: 1px solid var(--border);
}

.role-btn {
  flex: 1;
  padding: 12px;
  text-align: center;
  cursor: pointer;
  border-radius: 8px;
  font-weight: 600;
  transition: .3s;
  color: var(--muted);
}

.role-btn.active {
  background: var(--accent);
  color: #fff;
  box-shadow: 0 4px 15px rgba(13,110,253,0.4);
}

/* FORM STYLES */
.form-group { margin-bottom: 20px; }
.label { display:block; margin-bottom:8px; color:#ccc; font-size:0.9rem; }
.input {
  width:100%; padding:14px; background:var(--input-bg);
  border:1px solid var(--border); border-radius:10px;
  color:white; outline:none; transition:.3s;
}
.input:focus { border-color:var(--accent); }

/* HIDDEN SECTION FOR INSTRUCTOR */
.instructor-fields {
  display: none; /* Initially Hidden */
  padding: 20px;
  background: rgba(255,255,255,0.03);
  border-radius: 10px;
  margin-bottom: 20px;
  border: 1px dashed var(--border);
}

.btn {
  width:100%; padding:14px; background:var(--accent); border:none;
  border-radius:10px; color:white; font-weight:700; cursor:pointer; font-size:1rem;
}
.btn:hover { background: #0b5ed7; }

</style>
</head>
<body>

<div class="auth-box">
  <div style="text-align:center; margin-bottom:30px;">
    <h2 id="header-title">Join as a Student</h2>
    <p style="color:var(--muted);">Fill your details to get started.</p>
  </div>

  <form action="/register" method="POST">
    <input type="hidden" name="role" id="roleInput" value="student">

    <div class="role-switch">
      <div class="role-btn active" onclick="setRole('student', this)">👨‍🎓 Student</div>
      <div class="role-btn" onclick="setRole('instructor', this)">🧑‍🏫 Instructor</div>
    </div>

    <div class="form-group">
      <label class="label">Full Name</label>
      <input type="text" name="name" class="input" placeholder="Enter your name" required>
    </div>

    <div class="form-group">
      <label class="label">Email Address</label>
      <input type="email" name="email" class="input" placeholder="example@mail.com" required>
    </div>

    <div id="instructorFields" class="instructor-fields">
      <p style="margin-bottom:15px; color:var(--accent); font-size:0.9rem;">⭐ Instructor Details</p>
      
      <div class="form-group">
        <label class="label">Expertise (e.g. Web Dev)</label>
        <input type="text" name="expertise" class="input" placeholder="What do you teach?">
      </div>
      
      <div class="form-group">
        <label class="label">LinkedIn / Portfolio URL</label>
        <input type="url" name="portfolio" class="input" placeholder="https://...">
      </div>
    </div>

    <div class="form-group">
      <label class="label">Password</label>
      <input type="password" name="password" class="input" placeholder="••••••••" required>
    </div>

    <button type="submit" class="btn">Create Account</button>
  </form>

  <p style="text-align:center; margin-top:20px; color:var(--muted); font-size:0.9rem;">
    Already have an account? <a href="#" style="color:var(--accent);">Log In</a>
  </p>
</div>

<script>
  function setRole(role, btn) {
    // 1. Update Hidden Input Value (Backend ke liye)
    document.getElementById('roleInput').value = role;

    // 2. Button Styling Update
    document.querySelectorAll('.role-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    // 3. Show/Hide Instructor Fields
    const fields = document.getElementById('instructorFields');
    const title = document.getElementById('header-title');

    if (role === 'instructor') {
      fields.style.display = 'block';
      title.innerText = "Join as an Instructor";
      // Instructor fields ko 'required' kar sakte hain agar zaroori ho
      fields.querySelectorAll('input').forEach(i => i.required = true);
    } else {
      fields.style.display = 'none';
      title.innerText = "Join as a Student";
      // Student mode me instructor fields required nahi hone chahiye
      fields.querySelectorAll('input').forEach(i => i.required = false);
    }
  }
</script>

</body>
</html>