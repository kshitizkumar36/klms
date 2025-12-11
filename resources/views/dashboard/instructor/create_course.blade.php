<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Create New Course - Instructor</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />

<style>
/* --------------- THEME --------------- */
:root {
  --bg: #0c0f13;
  --card: #15171c;
  --text: #e7ecf2;
  --muted: #8e98a0;
  --accent: #0d6efd;
  --border: #222;
  --shadow: 0 8px 25px rgba(0,0,0,0.35);
  --radius: 14px;
}

* { margin: 0; padding: 0; box-sizing: border-box; font-family: "Inter", sans-serif; }
html, body { width: 100%; min-height: 100vh; background: var(--bg); color: var(--text); overflow-x: hidden; }

/* ANIMATIONS */
.fade { opacity: 0; transform: translateY(20px); animation: fadeIn .6s forwards; }
@keyframes fadeIn { to { opacity: 1; transform: translateY(0); } }

/* LAYOUT */
.layout { display: flex; }

/* SIDEBAR */
.sidebar {
  width: 260px; background: #111317; height: 100vh; position: fixed;
  left: 0; top: 0; padding: 22px; box-shadow: var(--shadow);
  transition: .25s; z-index: 9999;
}
.sidebar.hide { transform: translateX(-100%); }
.sidebar .logo { display: flex; gap: 10px; align-items: center; margin-bottom: 30px; }
.sidebar .logo img { width: 42px; }
.sidebar nav { display: flex; flex-direction: column; gap: 10px; }
.sidebar nav a { text-decoration: none; padding: 10px 14px; border-radius: 10px; font-weight: 600; color: var(--muted); transition: .3s; }
.sidebar nav a:hover, .sidebar nav a.active { background: #1e1f25; color: #fff; }

/* MAIN */
.main { margin-left: 260px; width: 100%; transition: .3s; min-height: 100vh; display: flex; flex-direction: column; }
.overlay { position: fixed; inset: 0; background: rgba(0,0,0,0.55); display: none; z-index: 5000; }
.overlay.show { display: block; }

/* TOPBAR */
.topbar {
  display: flex; align-items: center; justify-content: space-between;
  padding: 14px 24px; background: #111317; position: sticky;
  top: 0; border-bottom: 1px solid var(--border); z-index: 50;
}
.hamburger { display: none; background: #1e1f25; padding: 8px 12px; border-radius: 8px; font-size: 26px; cursor: pointer; }
.profile-icon { cursor: pointer; }

/* --------------- CREATE COURSE STYLES --------------- */
.page-content { padding: 30px; max-width: 1200px; margin: 0 auto; width: 100%; }

.page-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
.back-btn { color: var(--muted); text-decoration: none; font-size: 14px; display: flex; align-items: center; gap: 5px; margin-bottom: 5px; }
.back-btn:hover { color: var(--accent); }

/* TABS */
.tabs { display: flex; gap: 20px; border-bottom: 1px solid var(--border); margin-bottom: 30px; }
.tab-btn {
  background: none; border: none; color: var(--muted); font-size: 15px; font-weight: 600;
  padding: 10px 0; cursor: pointer; position: relative; transition: .3s;
}
.tab-btn.active { color: var(--accent); }
.tab-btn.active::after {
  content: ""; position: absolute; bottom: -1px; left: 0; width: 100%; height: 2px; background: var(--accent);
}

/* FORM SECTIONS */
.section { display: none; }
.section.active { display: block; animation: fadeIn 0.4s forwards; }

.form-card { background: var(--card); padding: 30px; border-radius: var(--radius); border: 1px solid var(--border); }

.row { display: flex; gap: 20px; margin-bottom: 20px; }
.col { flex: 1; }

label { display: block; margin-bottom: 8px; color: var(--muted); font-size: 13px; font-weight: 600; }
input, select, textarea {
  width: 100%; background: #0c0f13; border: 1px solid var(--border);
  color: #fff; padding: 12px; border-radius: 8px; outline: none; transition: .3s;
}
input:focus, select:focus, textarea:focus { border-color: var(--accent); }

/* UPLOAD BOX */
.upload-box {
  border: 2px dashed var(--border); border-radius: 12px; padding: 40px;
  text-align: center; cursor: pointer; transition: .3s; background: rgba(255,255,255,0.02);
}
.upload-box:hover { border-color: var(--accent); background: rgba(13, 110, 253, 0.05); }
.upload-icon { font-size: 40px; margin-bottom: 10px; display: block; }

/* CURRICULUM BUILDER */
.curriculum-item {
  background: #1e1f25; border: 1px solid var(--border); border-radius: 8px;
  margin-bottom: 15px; overflow: hidden;
}
.curr-header {
  padding: 15px; background: #252830; display: flex; justify-content: space-between; align-items: center; cursor: pointer;
}
.curr-body { padding: 15px; border-top: 1px solid var(--border); }
.lesson-row {
  display: flex; gap: 10px; align-items: center; margin-bottom: 10px;
  padding: 10px; background: var(--bg); border-radius: 6px; border: 1px solid var(--border);
}

.btn-add {
  background: transparent; border: 1px dashed var(--muted); color: var(--muted);
  width: 100%; padding: 10px; border-radius: 8px; cursor: pointer; margin-top: 10px;
}
.btn-add:hover { border-color: var(--accent); color: var(--accent); }

/* BOTTOM ACTIONS */
.action-bar {
  display: flex; justify-content: flex-end; gap: 15px; margin-top: 30px;
}
.btn-secondary { background: #252830; color: #fff; padding: 12px 24px; border-radius: 8px; border: none; cursor: pointer; font-weight: 600; }
.btn-primary { background: var(--accent); color: #fff; padding: 12px 24px; border-radius: 8px; border: none; cursor: pointer; font-weight: 600; }
.btn-primary:hover { background: #0b5ed7; }

/* RESPONSIVE */
@media(max-width:900px){
  .hamburger { display: block; }
  .main { margin-left: 0; }
  .sidebar.hide { transform: translateX(-100%); }
  .row { flex-direction: column; gap: 0; }
  .col { margin-bottom: 20px; }
}
</style>
</head>

<body>

<div class="overlay" id="overlay"></div>

<div class="layout">

<aside class="sidebar" id="sidebar">
  <div class="logo">
    <img src="https://kshitizkumar.com/assets/img/klogo.png" />
    <h2>Instructor</h2>
  </div>
<!-- menu -->

@include('dashboard.instructor.layouts.menu')
</aside>

<div class="main">

  <div class="topbar">
    <div class="hamburger" id="hamburger">☰</div>
    <div style="font-weight:600;">Course Creator</div>
    <div class="profile-icon">
      <img src="https://i.pravatar.cc/150?img=36" style="width:40px;height:40px;border-radius:10px;" />
    </div>
  </div>

  <div class="page-content fade">
    
    <div class="page-header">
      <div>
        <a href="my-courses.html" class="back-btn">← Back to Courses</a>
        <h1>Create New Course</h1>
      </div>
      <div style="display:flex; gap:10px;">
        <button class="btn-secondary">Save Draft</button>
      </div>
    </div>

    <div class="tabs">
      <button class="tab-btn active" onclick="switchTab('basic', this)">1. Basic Info</button>
      <button class="tab-btn" onclick="switchTab('curriculum', this)">2. Curriculum</button>
      <button class="tab-btn" onclick="switchTab('media', this)">3. Media</button>
      <button class="tab-btn" onclick="switchTab('price', this)">4. Pricing</button>
    </div>

    <div id="basic" class="section active">
      <div class="form-card">
        <div class="row">
          <div class="col">
            <label>Course Title</label>
            <input type="text" placeholder="e.g. Master React JS in 30 Days" />
          </div>
        </div>
        
        <div class="row">
          <div class="col">
            <label>Short Description</label>
            <textarea rows="2" placeholder="Brief summary of your course..."></textarea>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <label>Category</label>
            <select>
              <option>Web Development</option>
              <option>Graphic Design</option>
              <option>Data Science</option>
              <option>Marketing</option>
            </select>
          </div>
          <div class="col">
            <label>Level</label>
            <select>
              <option>Beginner</option>
              <option>Intermediate</option>
              <option>Advanced</option>
              <option>All Levels</option>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <label>Description</label>
            <textarea rows="6" placeholder="Detailed course description..."></textarea>
          </div>
        </div>
      </div>
      <div class="action-bar">
        <button class="btn-primary" onclick="nextTab('curriculum')">Next: Curriculum →</button>
      </div>
    </div>

    <div id="curriculum" class="section">
      <div class="form-card">
        <label style="margin-bottom:15px; font-size:16px;">Course Content</label>
        
        <div class="curriculum-item">
          <div class="curr-header">
            <span style="font-weight:600;">Section 1: Introduction</span>
            <span style="font-size:12px; color:var(--muted);">3 Lectures</span>
          </div>
          <div class="curr-body">
            <div class="lesson-row">
              <span>📄</span> <input type="text" value="Welcome to the course" style="border:none; background:transparent; padding:0;" />
            </div>
            <div class="lesson-row">
              <span>🎥</span> <input type="text" value="Setting up environment" style="border:none; background:transparent; padding:0;" />
            </div>
            <button class="btn-add">+ Add Lecture</button>
          </div>
        </div>

        <button class="btn-add" style="border:2px dashed var(--accent); color:var(--accent);">+ Add New Section</button>

      </div>
      <div class="action-bar">
        <button class="btn-secondary" onclick="nextTab('basic')">← Back</button>
        <button class="btn-primary" onclick="nextTab('media')">Next: Media →</button>
      </div>
    </div>

    <div id="media" class="section">
      <div class="form-card">
        <div class="row">
          <div class="col">
            <label>Course Thumbnail (Image)</label>
            <div class="upload-box">
              <span class="upload-icon">🖼</span>
              <p>Drag & drop your image here, or <b>click to browse</b></p>
              <p style="font-size:12px; color:var(--muted); margin-top:5px;">1200x800 pixels preferred (JPG, PNG)</p>
            </div>
          </div>
          <div class="col">
            <label>Promotional Video (Optional)</label>
            <div class="upload-box">
              <span class="upload-icon">🎥</span>
              <p>Upload a short teaser video</p>
              <p style="font-size:12px; color:var(--muted); margin-top:5px;">MP4 format only</p>
            </div>
          </div>
        </div>
      </div>
      <div class="action-bar">
        <button class="btn-secondary" onclick="nextTab('curriculum')">← Back</button>
        <button class="btn-primary" onclick="nextTab('price')">Next: Pricing →</button>
      </div>
    </div>

    <div id="price" class="section">
      <div class="form-card">
        <div class="row">
          <div class="col">
            <label>Course Price ($)</label>
            <input type="number" placeholder="49.99" />
          </div>
          <div class="col">
            <label>Discounted Price ($)</label>
            <input type="number" placeholder="29.99" />
          </div>
        </div>
        <div class="row">
           <div class="col">
             <label style="display:flex; align-items:center; gap:10px;">
               <input type="checkbox" style="width:auto;" /> 
               This is a free course
             </label>
           </div>
        </div>
      </div>
      <div class="action-bar">
        <button class="btn-secondary" onclick="nextTab('media')">← Back</button>
        <button class="btn-primary" style="background:#198754;">✔ Submit for Review</button>
      </div>
    </div>

  </div>
</div>
</div>

<script>
/* TAB SWITCHING LOGIC */
function switchTab(tabId, btnElement) {
  // Hide all sections
  document.querySelectorAll('.section').forEach(el => el.classList.remove('active'));
  // Show target section
  document.getElementById(tabId).classList.add('active');

  // Update button classes
  document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
  if(btnElement) {
    btnElement.classList.add('active');
  } else {
    // Find button by index if programmatic
    const index = ['basic', 'curriculum', 'media', 'price'].indexOf(tabId);
    document.querySelectorAll('.tab-btn')[index].classList.add('active');
  }
}

function nextTab(tabId) {
  switchTab(tabId);
}

/* SIDEBAR RESPONSIVE */
const sidebar = document.getElementById("sidebar");
const overlay = document.getElementById("overlay");
const hamburger = document.getElementById("hamburger");

hamburger.onclick = () => {
  sidebar.classList.remove("hide");
  overlay.classList.add("show");
};
overlay.onclick = () => {
  sidebar.classList.add("hide");
  overlay.classList.remove("show");
};

function fixSidebar() {
  if (window.innerWidth > 900) {
    sidebar.classList.remove("hide");
    overlay.classList.remove("show");
  } else {
    sidebar.classList.add("hide");
  }
}
window.onresize = fixSidebar;
fixSidebar();

</script>

</body>
</html>