<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Instructor - My Quizzes</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />

<style>
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

/* SIDEBAR */
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
.sidebar nav a.active, .sidebar nav a:hover {
  background: #1e1f25; color: #fff;
}

/* OVERLAY */
.overlay { 
  position: fixed; inset: 0; background: rgba(0,0,0,0.6); 
  opacity: 0; visibility: hidden; transition: .3s; z-index: 5000; 
}
.overlay.active { opacity: 1; visibility: visible; }

.main { margin-left: 260px; width: 100%; min-height: 100vh; transition: margin-left .3s; }

/* TOPBAR */
.topbar {
  display: flex; justify-content: space-between; align-items: center;
  padding: 14px 24px; background: #111317;
  border-bottom: 1px solid #1e1f25;
  position: sticky; top: 0; z-index: 1000;
  height: 70px;
}

/* Wrapper to keep Hamburger and Search together on left */
.top-left { display: flex; align-items: center; gap: 15px; }

.hamburger { display: none; font-size: 26px; cursor: pointer; color: var(--text); }

/* SEARCH */
.search { background: #1c1e24; padding: 8px 14px; border-radius: 10px; display: flex; align-items: center; }
.search input {
  background: none; border: none; outline: none;
  color: var(--text); width: 250px;
  transition: width 0.3s;
}

/* PROFILE SECTION CSS */
.profile-icon { 
  display: flex; align-items: center; position: relative; cursor: pointer; 
}

.profile-img {
  width: 42px; height: 42px; border-radius: 10px; object-fit: cover;
  border: 1px solid #333;
}

.profile-dropdown {
  position: absolute; top: 55px; right: 0; width: 160px;
  background: #1a1c22; border-radius: 10px; display: none;
  padding: 8px 0; box-shadow: var(--shadow); z-index: 2000;
  border: 1px solid #2a2d35;
}
.profile-dropdown.show { display: block; }

.profile-dropdown a { 
  display: block; padding: 10px 15px; text-decoration: none; 
  color: #d6d6d6; font-size: 14px; 
}
.profile-dropdown a:hover { background: #2a2d35; color: #fff; }

/* PAGE */
.page-content { padding: 30px; }
.page-header {
  display: flex; justify-content: space-between; align-items: center;
  margin-bottom: 30px; gap: 20px;
}
.btn-create {
  background: var(--accent); color: #fff; border: none;
  padding: 12px 24px; border-radius: 10px;
  font-weight: 600; cursor: pointer;
}

/* FILTERS */
.filters-bar { display: flex; gap: 15px; margin-bottom: 25px; flex-wrap: wrap; }
.filter-btn {
  background: #1c1e24; padding: 8px 16px;
  border-radius: 8px; cursor: pointer;
  border: none;
  color: var(--muted);
}
.filter-btn.active { background: #252830; color: #fff; }

/* GRID */
.course-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
  gap: 25px;
}

/* CARD */
.c-card {
  background: var(--card);
  border-radius: var(--radius);
  border: 1px solid #222;
  overflow: hidden;
}
.c-thumb { height: 180px; position: relative; }
.c-thumb img { width: 100%; height: 100%; object-fit: cover; }

.status-badge {
  position: absolute; top: 12px; left: 12px;
  padding: 4px 10px; border-radius: 6px;
  font-size: 11px; font-weight: 700;
}
.status-active { background: rgba(25,135,84,.9); }
.status-inactive { background: rgba(255,193,7,.9); color:#000; }

.c-body { padding: 20px; }
.c-title { font-size: 18px; font-weight: 600; margin-bottom: 10px; }
.c-meta { font-size: 13px; color: var(--muted); margin-bottom: 8px; }
.c-stats {
  display: flex; justify-content: space-between;
  margin-top: 15px; padding-top: 15px;
  border-top: 1px solid #222;
  font-size: 13px;
}

/* ACTIONS */
.c-actions { display: flex; gap: 10px; margin-top: 15px; }
.btn-action {
  flex: 1; padding: 10px;
  border-radius: 8px; border: none;
  cursor: pointer; font-weight: 600;
}
.btn-edit { background: #1e1f25; color: #fff; }
.btn-delete { background: rgba(220,53,69,.2); color: #ff6b6b; }

/* MEDIA QUERIES FOR MOBILE */
@media(max-width: 900px) {
  .hamburger { display: block; }
  .main { margin-left: 0; }
  
  /* Sidebar logic */
  .sidebar { transform: translateX(-100%); }
  .sidebar.active { transform: translateX(0); }
  
  .page-header { flex-direction: column; align-items: flex-start; }
  
  .topbar { padding: 10px 15px; }
  .top-left { gap: 10px; }

  /* Modified: Search Bar Visible on Mobile */
  .search { 
    display: flex; /* Keep visible */
    padding: 6px 10px; 
  }
  
  /* Make input smaller on mobile to fit hamburger and profile */
  .search input { 
    width: 120px; 
    font-size: 13px; 
  }
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
      <input placeholder="Search..." onkeyup="filterRender()" id="searchInput">
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
    <h1>Quiz Manager</h1>
    <p style="color:var(--muted)">Create, manage and evaluate quizzes</p>
  </div>
  <a href="{{ url('create_quiz') }}">
    <button class="btn-create">+ Create New Quiz</button>
  </a>
</div>

<div class="filters-bar">
  <button class="filter-btn active" onclick="setFilter('all',this)">All Quizzes</button>
  <button class="filter-btn" onclick="setFilter('active',this)">Active</button>
  <button class="filter-btn" onclick="setFilter('inactive',this)">Inactive</button>
</div>

<div class="course-grid" id="courseGrid"></div>

</div>
</div>
</div>

<script>
// --- SIDEBAR TOGGLE LOGIC ---
const hamburger = document.getElementById('hamburger');
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');

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

window.addEventListener('resize', () => {
    if(window.innerWidth > 900) { closeSidebar(); }
});

// --- PROFILE DROPDOWN LOGIC ---
const profileBtn = document.getElementById("profileBtn");
const dropdown = document.getElementById("dropdown");

profileBtn.onclick = (e) => {
  e.stopPropagation();
  dropdown.classList.toggle("show");
};

document.body.addEventListener('click', () => {
  dropdown.classList.remove("show");
});
// ----------------------------


let quizzes = [
  {id:1,title:"HTML Basics Quiz",questions:20,marks:50,attempts:120,status:"active",img:"https://picsum.photos/300/180?11"},
  {id:2,title:"JavaScript Advanced Quiz",questions:30,marks:100,attempts:85,status:"active",img:"https://picsum.photos/300/180?12"},
  {id:3,title:"UI/UX Fundamentals Quiz",questions:15,marks:40,attempts:0,status:"inactive",img:"https://picsum.photos/300/180?13"}
];

let currentFilter = 'all';

function renderCourses(data){
  const grid = document.getElementById('courseGrid');
  grid.innerHTML = "";
  data.forEach(q=>{
    grid.innerHTML += `
    <div class="c-card fade">
      <div class="c-thumb">
        <img src="${q.img}">
        <span class="status-badge ${q.status==='active'?'status-active':'status-inactive'}">
          ${q.status.toUpperCase()}
        </span>
      </div>
      <div class="c-body">
        <div class="c-title">${q.title}</div>
        <div class="c-meta">Questions: ${q.questions}</div>
        <div class="c-meta">Total Marks: ${q.marks}</div>
        <div class="c-stats">
          <span>📝 Attempts: ${q.attempts}</span>
          <span>⏱ Timed Quiz</span>
        </div>
        <div class="c-actions">
          <button class="btn-action btn-edit">✏ Edit</button>
          <button class="btn-action btn-delete">🗑 Delete</button>
        </div>
      </div>
    </div>`;
  });
}

function filterRender(){
  const searchInput = document.getElementById('searchInput');
  let q = searchInput.value.toLowerCase();
  
  renderCourses(quizzes.filter(x=>{
    return (currentFilter==='all'||x.status===currentFilter)
      && x.title.toLowerCase().includes(q);
  }));
}

function setFilter(f,b){
  currentFilter=f;
  document.querySelectorAll('.filter-btn').forEach(x=>x.classList.remove('active'));
  b.classList.add('active');
  filterRender();
}

renderCourses(quizzes);
</script>

</body>
</html>