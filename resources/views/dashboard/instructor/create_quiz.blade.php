<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Instructor - Create Quiz</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />

<style>
/* --- SAME THEME VARIABLES --- */
:root {
  --bg: #0c0f13;
  --card: #15171c;
  --text: #e7ecf2;
  --muted: #8e98a0;
  --accent: #0d6efd;
  --danger: #dc3545;
  --success: #198754;
  --warning: #ffc107;
  --shadow: 0 8px 25px rgba(0,0,0,0.35);
  --radius: 14px;
}

* { margin: 0; padding: 0; box-sizing: border-box; font-family: "Inter", sans-serif; }
html, body { width: 100%; overflow-x: hidden; background: var(--bg); color: var(--text); }

.fade { opacity: 0; transform: translateY(20px); animation: fadeIn .6s forwards; }
@keyframes fadeIn { to { opacity: 1; transform: translateY(0); } }

.layout { display: flex; }

/* --- SIDEBAR --- */
.sidebar {
  width: 260px; background: #111317; height: 100vh; position: fixed;
  left: 0; top: 0; padding: 22px; box-shadow: var(--shadow);
  transition: transform .3s ease; z-index: 9999;
}
.sidebar .logo { display: flex; gap: 10px; align-items: center; margin-bottom: 30px;}
.sidebar .logo img { width: 42px; }
.sidebar nav a {
  display: block; padding: 10px 14px; border-radius: 10px;
  font-weight: 600; color: var(--muted); text-decoration: none;
}
.sidebar nav a.active, .sidebar nav a:hover { background: #1e1f25; color: #fff; }

/* --- OVERLAY --- */
.overlay { 
  position: fixed; inset: 0; background: rgba(0,0,0,0.6); 
  opacity: 0; visibility: hidden; transition: .3s; z-index: 5000; 
}
.overlay.active { opacity: 1; visibility: visible; }

.main { margin-left: 260px; width: 100%; min-height: 100vh; transition: margin-left .3s; }

/* --- TOPBAR --- */
.topbar {
  display: flex; justify-content: space-between; align-items: center;
  padding: 14px 24px; background: #111317;
  border-bottom: 1px solid #1e1f25;
  position: sticky; top: 0; z-index: 1000; height: 70px;
}
.top-left { display: flex; align-items: center; gap: 15px; }
.hamburger { display: none; font-size: 26px; cursor: pointer; color: var(--text); }

/* SEARCH */
.search { background: #1c1e24; padding: 8px 14px; border-radius: 10px; display: flex; align-items: center; }
.search input {
  background: none; border: none; outline: none;
  color: var(--text); width: 250px; transition: width 0.3s;
}

/* PROFILE */
.profile-icon { display: flex; align-items: center; position: relative; cursor: pointer; }
.profile-img {
  width: 42px; height: 42px; border-radius: 10px; object-fit: cover; border: 1px solid #333;
}
.profile-dropdown {
  position: absolute; top: 55px; right: 0; width: 160px;
  background: #1a1c22; border-radius: 10px; display: none;
  padding: 8px 0; box-shadow: var(--shadow); z-index: 2000; border: 1px solid #2a2d35;
}
.profile-dropdown.show { display: block; }
.profile-dropdown a { 
  display: block; padding: 10px 15px; text-decoration: none; color: #d6d6d6; font-size: 14px; 
}
.profile-dropdown a:hover { background: #2a2d35; color: #fff; }

/* --- PAGE CONTENT --- */
.page-content { padding: 30px; }
.page-header {
  display: flex; justify-content: space-between; align-items: center;
  margin-bottom: 30px; gap: 20px;
}
/* Back Button Style */
.btn-back {
    color: var(--muted); text-decoration: none; font-weight: 600; display: flex; align-items: center; gap: 8px;
}
.btn-back:hover { color: #fff; }

/* --- CREATE QUIZ FORM STYLES --- */
.form-card {
    background: var(--card); border-radius: var(--radius);
    padding: 30px; border: 1px solid #222; max-width: 900px; margin: 0 auto;
}

.form-grid {
    display: grid; grid-template-columns: 1fr 1fr; gap: 20px;
}
.form-group { margin-bottom: 20px; }
.full-width { grid-column: span 2; }

.form-label {
    display: block; margin-bottom: 8px; font-size: 14px; font-weight: 600; color: #ccc;
}
.form-input, .form-select, .form-textarea {
    width: 100%; padding: 12px 16px;
    background: #0c0f13; border: 1px solid #2a2d35;
    color: #fff; border-radius: 8px; outline: none; font-size: 14px;
    transition: .2s;
}
.form-input:focus, .form-select:focus, .form-textarea:focus {
    border-color: var(--accent);
}
.form-textarea { resize: vertical; min-height: 100px; }

/* Upload Area */
.upload-area {
    border: 2px dashed #2a2d35; border-radius: 10px;
    padding: 30px; text-align: center; cursor: pointer;
    background: #0c0f13; transition: .2s;
}
.upload-area:hover { border-color: var(--accent); background: #111317; }
.upload-icon { font-size: 32px; color: var(--muted); margin-bottom: 10px; display: block; }

/* Footer Actions */
.form-actions {
    margin-top: 30px; display: flex; justify-content: flex-end; gap: 15px;
    border-top: 1px solid #222; padding-top: 20px;
}
.btn {
    padding: 12px 24px; border-radius: 8px; font-weight: 600; cursor: pointer; border: none; font-size: 14px;
}
.btn-secondary { background: #1e1f25; color: var(--text); }
.btn-primary { background: var(--accent); color: #fff; }
.btn:hover { opacity: 0.9; }


/* --- MEDIA QUERIES --- */
@media(max-width: 900px) {
  .hamburger { display: block; }
  .main { margin-left: 0; }
  .sidebar { transform: translateX(-100%); }
  .sidebar.active { transform: translateX(0); }
  
  .topbar { padding: 10px 15px; }
  .top-left { gap: 10px; }
  .search { display: flex; padding: 6px 10px; }
  .search input { width: 120px; font-size: 13px; }

  /* Form Responsive */
  .form-grid { grid-template-columns: 1fr; }
  .full-width { grid-column: span 1; }
  .page-header { flex-direction: column; align-items: flex-start; gap: 10px; }
}
</style>
</head>

<body>

<div class="overlay" id="overlay"></div>

<div class="layout">

<aside class="sidebar" id="sidebar">
  <div class="logo">
    <img src="https://kshitizkumar.com/assets/img/klogo.png">
    <h2>Instructor</h2>
  </div>
  @include('dashboard.instructor.layouts.menu')
</aside>

<div class="main">

<div class="topbar">
  <div class="top-left">
    <div class="hamburger" id="hamburger">☰</div>
    <div class="search">
      <span style="color:var(--muted); margin-right:5px;">🔍</span>
      <input placeholder="Search..." id="searchInput">
    </div>
  </div>

  <div class="profile-icon" id="profileBtn">
    <img src="https://i.pravatar.cc/60" class="profile-img" />
    <div class="profile-dropdown" id="dropdown">
      <a href="#">Edit Profile</a>
      <a href="#">Settings</a>
      <div style="height:1px; background:#333; margin:5px 0;"></div>
      <a href="#" style="color:#ff6b6b;">Logout</a>
    </div>
  </div>
</div>

<div class="page-content fade">

  <div class="page-header">
    <div>
      <a href="{{ url('quizzes') }}" class="btn-back">← Back to Quizzes</a>
      <h1 style="margin-top:10px;">Create New Quiz</h1>
    </div>
  </div>

  <form action="{{ url('save_quiz') }}" method="POST" class="form-card">
    <div class="form-grid">
        
        <div class="form-group full-width">
            <label class="form-label">Quiz Title</label>
            <input type="text" class="form-input" placeholder="e.g. Mastering React Hooks 2024">
        </div>

        <div class="form-group full-width">
            <label class="form-label">Description</label>
            <textarea class="form-textarea" placeholder="Enter a brief summary of what this quiz covers..."></textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Difficulty Level</label>
            <select class="form-select">
                <option>Beginner</option>
                <option>Intermediate</option>
                <option>Advanced</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Category</label>
            <select class="form-select">
                <option>Web Development</option>
                <option>Data Science</option>
                <option>Design</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Time Limit (Minutes)</label>
            <input type="number" class="form-input" placeholder="60">
        </div>

        <div class="form-group">
            <label class="form-label">Passing Percentage (%)</label>
            <input type="number" class="form-input" placeholder="40">
        </div>

        <div class="form-group full-width">
            <label class="form-label">Quiz Thumbnail</label>
            <div class="upload-area" onclick="document.getElementById('fileUp').click()">
                <span class="upload-icon">☁️</span>
                <p style="color:#fff; font-weight:500;">Click to Upload Image</p>
                <p style="color:var(--muted); font-size:12px;">SVG, PNG, JPG (Max 2MB)</p>
                <input type="file" id="fileUp" style="display:none">
            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="button" class="btn btn-secondary">Save Draft</button>
        <!-- <button type="submit" class="btn btn-primary">Next: Add Questions →</button> -->
           <a href="{{ url('create_quiz_2')}}" class="btn btn-primary">Next: Add Questions →</a>
    </div>
  </form>

</div>
</div>
</div>

<script>
// --- UI TOGGLE LOGIC (Keep exact same) ---
const hamburger = document.getElementById('hamburger');
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');
const profileBtn = document.getElementById("profileBtn");
const dropdown = document.getElementById("dropdown");

// Sidebar
function toggleSidebar() {
  sidebar.classList.toggle('active');
  overlay.classList.toggle('active');
}
function closeSidebar() {
  sidebar.classList.remove('active');
  overlay.classList.remove('active');
}

hamburger.addEventListener('click', toggleSidebar);
overlay.addEventListener('click', closeSidebar);

// Profile
profileBtn.onclick = (e) => {
  e.stopPropagation();
  dropdown.classList.toggle("show");
};
document.body.addEventListener('click', () => {
  dropdown.classList.remove("show");
});

// Resize Reset
window.addEventListener('resize', () => {
    if(window.innerWidth > 900) { closeSidebar(); }
});
</script>

</body>
</html>