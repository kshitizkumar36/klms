<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Instructor Dashboard</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />

<style>
/* --------------- THEME --------------- */
:root {
  --bg: #0c0f13;
  --card: #15171c;
  --text: #e7ecf2;
  --muted: #8e98a0;
  --accent: #0d6efd;
  --shadow: 0 8px 25px rgba(0,0,0,0.35);
  --radius: 14px;
}

* {
  margin: 0; padding: 0;
  box-sizing: border-box;
  font-family: "Inter", sans-serif;
}

html, body {
  width: 100%;
  overflow-x: hidden;
  background: var(--bg);
  color: var(--text);
}

/* FADE ANIMATION */
.fade { opacity: 0; transform: translateY(20px); animation: fadeIn .6s forwards; }
.fade-delay-1 { animation-delay: .2s; }
.fade-delay-2 { animation-delay: .4s; }
.fade-delay-3 { animation-delay: .6s; }

@keyframes fadeIn {
  to { opacity: 1; transform: translateY(0); }
}

/* --------------- LAYOUT --------------- */
.layout { display: flex; }

/* SIDEBAR */
.sidebar {
  width: 260px;
  background: #111317;
  height: 100vh;
  position: fixed;
  left: 0; top: 0;
  padding: 22px;
  box-shadow: var(--shadow);
  transition: .25s;
  transform: translateX(0);
  z-index: 9999;
}

.sidebar.hide { transform: translateX(-100%); }

.sidebar .logo {
  display: flex;
  gap: 10px;
  align-items: center;
}

.sidebar .logo img { width: 42px; }

.sidebar nav {
  margin-top: 30px;
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.sidebar nav a {
  text-decoration: none;
  padding: 10px 14px;
  border-radius: 10px;
  font-weight: 600;
  color: var(--muted);
}

.sidebar nav a:hover,
.sidebar nav a.active {
  background: #1e1f25;
  color: #fff;
}

/* OVERLAY */
.overlay {
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,0.55);
  display: none;
  z-index: 5000;
}
.overlay.show { display: block; }

/* MAIN */
.main {
  margin-left: 260px;
  width: 100%;
  transition: .3s;
}

/* TOPBAR */
.topbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 14px 24px;
  background: #111317;
  position: sticky;
  top: 0;
  border-bottom: 1px solid #1e1f25;
  z-index: 50;
}

.hamburger {
  display: none;
  background: #1e1f25;
  padding: 8px 12px;
  border-radius: 8px;
  font-size: 26px;
  cursor: pointer;
}

/* SEARCH */
.search {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 8px 14px;
  background: #1c1e24;
  border-radius: 10px;
}

.search input {
  background: none;
  border: none;
  outline: none;
  color: var(--text);
  width: 250px;
}

/* PROFILE MENU */
.profile-icon { position: relative; cursor: pointer; }

.profile-dropdown {
  position: absolute;
  top: 52px;
  right: 0;
  width: 160px;
  background: #1a1c22;
  border-radius: 10px;
  display: none;
  padding: 8px 0;
  box-shadow: var(--shadow);
}

.profile-dropdown.show { display: block; }

.profile-dropdown a {
  display: block;
  padding: 10px 15px;
  text-decoration: none;
  color: #d6d6d6;
}

.profile-dropdown a:hover {
  background: #2a2d35;
}

/* HEADER VIDEO */
.profile-header {
  height: 220px;
  width: 100%;
  position: relative;
  overflow: hidden;
}

.profile-header video {
  width: 100%; height: 100%;
  object-fit: cover;
  position: absolute;
}

.profile-header::after {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(180deg, transparent, rgba(0,0,0,0.7));
}

/* PROFILE INFO */
.profile-box {
  max-width: 1000px;
  margin: -60px auto 0;
  display: flex;
  gap: 20px;
  padding: 0 20px;
}

.profile-pic {
  width: 130px; height: 130px;
  object-fit: cover;
  border-radius: 50%;
  border: 5px solid #0c0f13;
}

.profile-info {
  background: #111317;
  padding: 20px;
  border-radius: var(--radius);
  width: 100%;
  box-shadow: var(--shadow);
}

/* ID CARD */
.id-card {
  margin-top: 12px;
  padding: 14px;
  background: #1a1c22;
  border-radius: 12px;
}

/* STATS */
.stats {
  max-width: 1000px;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 16px;
  margin: 30px auto;
  padding: 0 20px;
}

.stat-card {
  padding: 20px;
  background: var(--card);
  border-radius: var(--radius);
  box-shadow: var(--shadow);
}

/* COURSES */
.courses {
  max-width: 1000px;
  margin: 20px auto;
  padding: 20px;
  background: var(--card);
  border-radius: var(--radius);
  box-shadow: var(--shadow);
}

.course-item {
  display: flex;
  gap: 14px;
  padding-bottom: 14px;
  border-bottom: 1px solid #222;
  margin: 14px 0;
}

.course-item img {
  width: 120px;
  height: 80px;
  border-radius: 10px;
  object-fit: cover;
}

.progress { height: 10px; border-radius: 8px; background: #222; overflow: hidden; }
.progress div { height: 100%; background: var(--accent); }

/* PAGINATION */
.pagination {
  text-align: center;
  margin-top: 20px;
}

.pagination button {
  padding: 8px 14px;
  border-radius: 8px;
  background: #1e1f25;
  border: none;
  color: #fff;
  margin: 0 5px;
  cursor: pointer;
}
.pagination button.active { background: var(--accent); }

/* RESPONSIVE */
@media(max-width:900px){
  .hamburger { display: block; }
  .main { margin-left: 0; }
  .sidebar.hide { transform: translateX(-100%); }
  .profile-box { flex-direction: column; text-align: center; }
  .stats { grid-template-columns: 1fr; }
}
</style>
</head>

<body>

<div class="overlay" id="overlay"></div>

<div class="layout">

<!-- SIDEBAR -->
<aside class="sidebar " id="sidebar">
  <div class="logo">
    <img src="https://kshitizkumar.com/assets/img/klogo.png" />
    <h2>Instructor</h2>
  </div>

  <nav>
    <a href="#" class="active">🏠 Dashboard</a>
    <a href="#">📚 My Courses</a>
    <a href="#">📝 Quiz</a>
    <a href="#">💰 Earnings</a>
    <a href="#">👨‍🎓 Students</a>
    <a href="#">🛒 Orders</a>
    <a href="#">⭐ Reviews</a>
    <a href="#">✏ Edit Profile</a>
    <a href="#">💳 Payouts</a>
    <a href="#">⚙ Settings</a>
    <a href="#" style="color:#ff6b6b;">🗑 Delete Profile</a>
    <a href="#">🚪 Sign Out</a>
  </nav>
</aside>

<!-- MAIN -->
<div class="main">

  <!-- TOP BAR -->
  <div class="topbar fade">
    <div class="hamburger" id="hamburger">☰</div>

    <div class="search">🔍
      <input placeholder="Search courses..." id="courseSearch" onkeyup="filterCourses()" />
    </div>

    <div class="profile-icon" id="profileBtn">
      <img src="https://i.pravatar.cc/60" style="width:42px;height:42px;border-radius:10px;" />
      <div class="profile-dropdown" id="dropdown">
        <a href="#">Edit Profile</a>
        <a href="#">Logout</a>
      </div>
    </div>
  </div>

  <!-- HEADER VIDEO -->
  <div class="profile-header fade fade-delay-1">
    <video autoplay muted loop>
      <source src="{{ asset('assets/clips/slide_logo.mp4') }}" type="video/mp4" />
    </video>
  </div>

  <!-- PROFILE BOX -->
  <div class="profile-box fade fade-delay-2">
    <img src="https://i.pravatar.cc/150?img=36" class="profile-pic" />

    <div class="profile-info">
      <h2>Instructor: Kshitiz Kumar</h2>
      <p style="color:var(--muted);margin-top:5px;">Full Stack Instructor | Bangalore</p>

      <p><b>Email:</b> instructor@example.com</p>

      <div class="id-card">
        <h3>ID Card</h3>
        <p><b>ID:</b> INST-93482</p>
        <p><b>Joined:</b> Jan 2023</p>
        <p><b>Status:</b> Active Instructor</p>
      </div>
    </div>
  </div>

  <!-- STATS -->
  <div class="stats fade fade-delay-3">
    <div class="stat-card">
      <h3>Total Courses</h3>
      <h2>12</h2>
    </div>
    <div class="stat-card">
      <h3>Total Students</h3>
      <h2>410</h2>
    </div>
    <div class="stat-card">
      <h3>Total Enrolled</h3>
      <h2>1,875</h2>
    </div>
  </div>

  <!-- COURSES -->
  <div class="courses fade fade-delay-3">
    <h2>My Courses</h2>
    <div id="courseList"></div>
    <div class="pagination" id="pagination"></div>
  </div>

</div>
</div>

<script>
/* COURSE DATA */
const courses = [
  {title:"Fullstack Mastery", img:"https://picsum.photos/300/180?1", sold:320},
  {title:"React Pro Course", img:"https://picsum.photos/300/180?2", sold:260},
  {title:"Node.js API Bootcamp", img:"https://picsum.photos/300/180?3", sold:180},
  {title:"MongoDB + Backend", img:"https://picsum.photos/300/180?4", sold:110},
  {title:"Figma UI/UX Design", img:"https://picsum.photos/300/180?5", sold:98},
  {title:"AWS Cloud Mastery", img:"https://picsum.photos/300/180?6", sold:265},
];

let filtered = [...courses];
let currentPage = 1;
const perPage = 3;

function renderCourses() {
  let list = document.getElementById("courseList");
  list.innerHTML = "";

  let start = (currentPage - 1) * perPage;
  let end = start + perPage;

  filtered.slice(start, end).forEach(c => {
    list.innerHTML += `
      <div class="course-item">
        <img src="${c.img}" />
        <div style="flex:1">
          <h3>${c.title}</h3>
          <p style="color:var(--muted);">🔥 ${c.sold} Students Enrolled</p>

          <div class="progress"><div style="width:${Math.min(c.sold / 4, 100)}%"></div></div>
        </div>
      </div>
    `;
  });

  renderPagination();
}

function renderPagination() {
  let pages = Math.ceil(filtered.length / perPage);
  let pag = document.getElementById("pagination");
  pag.innerHTML = "";

  for (let i = 1; i <= pages; i++) {
    pag.innerHTML += `
      <button class="${i===currentPage?'active':''}" onclick="go(${i})">${i}</button>
    `;
  }
}

function go(p){ currentPage = p; renderCourses(); }

function filterCourses() {
  let q = document.getElementById("courseSearch").value.toLowerCase();
  filtered = courses.filter(c => c.title.toLowerCase().includes(q));
  currentPage = 1;
  renderCourses();
}

renderCourses();

/* SIDEBAR */
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

/* PROFILE DROPDOWN */
const profileBtn = document.getElementById("profileBtn");
const dropdown = document.getElementById("dropdown");

profileBtn.onclick = e => {
  e.stopPropagation();
  dropdown.classList.toggle("show");
};

document.body.onclick = () => dropdown.classList.remove("show");


function fixSidebar() {
  if (window.innerWidth > 900) {
    sidebar.classList.remove("hide");   // DESKTOP → SHOW sidebar
    overlay.classList.remove("show");
  } else {
    sidebar.classList.add("hide");      // MOBILE → HIDE sidebar
  }
}

</script>



</body>
</html>
