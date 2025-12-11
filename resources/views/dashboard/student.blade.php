<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LMS Student Dashboard</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>

:root{
  --bg:#0c0f13;
  --card:#15171c;
  --text:#e7ecf2;
  --muted:#8e98a0;
  --accent:#0d6efd;
  --shadow:0 8px 25px rgba(0,0,0,0.35);
  --radius:14px;
}

*{
  margin:0; padding:0;
  box-sizing:border-box;
  font-family:"Inter",sans-serif;
}

html,body{
  width:100%;
  overflow-x:hidden;
  background:var(--bg);
  color:var(--text);
}

/* Animations */
.fade{ opacity:0; transform:translateY(20px); animation:fadeIn .6s forwards; }
.fade-delay-1{ animation-delay:.2s; }
.fade-delay-2{ animation-delay:.4s; }
.fade-delay-3{ animation-delay:.6s; }

@keyframes fadeIn{
  to{ opacity:1; transform:translateY(0); }
}

/* LAYOUT */
.layout{ display:flex; }

/* SIDEBAR */
.sidebar{
  width:260px;
  background:#111317;
  height:100vh;
  position:fixed;
  left:0;
  top:0;
  padding:22px;
  box-shadow:var(--shadow);
  z-index:9999;
  transition:transform .25s ease;
  transform:translateX(0);
}

.sidebar.hide{
  transform:translateX(-100%);
}

.sidebar .logo{
  display:flex;
  align-items:center;
  gap:10px;
}

.sidebar .logo img{
  width:42px;
}

.sidebar nav{
  margin-top:30px;
  display:flex;
  flex-direction:column;
  gap:10px;
}

.sidebar nav a{
  color:var(--muted);
  padding:10px 14px;
  border-radius:10px;
  text-decoration:none;
  font-weight:600;
}

.sidebar nav a:hover,
.sidebar nav a.active{
  background:#1e1f25;
  color:#fff;
}

/* OVERLAY */
.overlay{
  position:fixed;
  inset:0;
  background:rgba(0,0,0,0.55);
  display:none;
  z-index:5000;
}
.overlay.show{ display:block; }

/* MAIN */
.main{
  margin-left:260px;
  width:100%;
  transition:.3s;
}

/* TOPBAR */
.topbar{
  display:flex;
  justify-content:space-between;
  align-items:center;
  padding:14px 24px;
  background:#111317;
  position:sticky;
  top:0;
  z-index:50;
  border-bottom:1px solid #1e1f25;
}

.hamburger{
  display:none;
  font-size:26px;
  cursor:pointer;
  background:#1e1f25;
  padding:8px 12px;
  border-radius:8px;
  user-select:none;
}

/* SEARCH */
.search{
  background:#1c1e24;
  padding:8px 14px;
  border-radius:10px;
  display:flex; gap:8px;
  align-items:center;
}
.search input{
  background:transparent;
  border:none;
  outline:none;
  width:250px;
  color:var(--text);
}

/* PROFILE MENU */
.profile-icon{
  position:relative;
  cursor:pointer;
}

.profile-dropdown{
  position:absolute;
  right:0;
  top:52px;
  background:#1a1c22;
  width:160px;
  border-radius:10px;
  padding:8px 0;
  display:none;
  box-shadow:var(--shadow);
  z-index:2000;
}
.profile-dropdown.show{ display:block; }

.profile-dropdown a{
  color:#d6d6d6;
  padding:10px 15px;
  display:block;
  text-decoration:none;
}
.profile-dropdown a:hover{
  background:#2a2d35;
}

/* PROFILE HEADER WITH VIDEO */
.profile-header{
  width:100%;
  height:220px;
  position:relative;
  overflow:hidden;
  border-bottom:3px solid #0c0f13;
}

.profile-header video{
  width:100%;
  height:100%;
  object-fit:cover;
  position:absolute;
  top:0;
  left:0;
  z-index:0;
}

/* Gradient overlay for better visibility */
.profile-header::after{
  content:"";
  position:absolute;
  inset:0;
  background:linear-gradient(180deg, rgba(0,0,0,0.1), rgba(0,0,0,0.65));
  z-index:1;
}

/* PROFILE BOX */
.profile-box{
  max-width:1000px;
  margin:-60px auto 0;
  display:flex;
  gap:20px;
  padding:0 20px;
  position:relative;
  z-index:10;
}
.profile-pic{
  width:130px;
  height:130px;
  border-radius:50%;
  object-fit:cover;
  border:5px solid #0c0f13;
}
.profile-info{
  background:#111317;
  padding:20px;
  border-radius:var(--radius);
  width:100%;
  box-shadow:var(--shadow);
}

/* STATS */
.stats{
  max-width:1000px;
  margin:30px auto;
  display:grid;
  grid-template-columns:repeat(3,1fr);
  gap:16px;
  padding:0 20px;
}
.stat-card{
  background:var(--card);
  padding:20px;
  border-radius:var(--radius);
  box-shadow:var(--shadow);
}

/* COURSES */
.courses{
  max-width:1000px;
  margin:20px auto;
  background:var(--card);
  padding:20px;
  border-radius:var(--radius);
  box-shadow:var(--shadow);
}

.course-item{
  display:flex;
  gap:14px;
  margin:14px 0;
  padding-bottom:14px;
  border-bottom:1px solid #222;
}
.course-item img{
  width:120px;
  height:80px;
  border-radius:10px;
  object-fit:cover;
}

.actions{
  margin-top:10px;
  display:flex;
  gap:10px;
}

.actions button{
  padding:7px 12px;
  background:#1e1f25;
  border:none;
  color:#fff;
  border-radius:8px;
  cursor:pointer;
  font-size:14px;
}
.actions button:hover{
  background:#2a2d35;
}

/* PAGINATION */
.pagination{
  display:flex;
  gap:10px;
  justify-content:center;
  margin-top:20px;
}
.pagination button{
  padding:8px 14px;
  background:#1e1f25;
  border:none;
  color:#fff;
  border-radius:8px;
  cursor:pointer;
}
.pagination button.active{
  background:var(--accent);
}
.pagination button:hover{
  background:#2a2d35;
}

/* PROGRESS */
.progress{
  height:10px;
  background:#222;
  border-radius:10px;
  overflow:hidden;
}
.progress div{
  height:100%;
  background:var(--accent);
}

/* RESPONSIVE */
@media(max-width:900px){
  .hamburger{ display:block; }
  .main{ margin-left:0; }

  .sidebar.hide{ transform:translateX(-100%); }

  .profile-box{
    flex-direction:column;
    text-align:center;
  }

  .stats{
    grid-template-columns:1fr;
  }

  .course-item{
    flex-direction:column;
  }

  .search input{
    width:140px;
  }
}

</style>
</head>
<body>

<div class="overlay" id="overlay"></div>

<div class="layout">

  <!-- SIDEBAR -->
  <aside class="sidebar hide" id="sidebar">

    <div class="logo">
      <img src="https://kshitizkumar.com/assets/img/klogo.png">
      <h2>LMS Panel</h2>
    </div>

<!-- menu area -->
 @include('dashboard.student.layouts.menu')
  </aside> 

  <!-- MAIN AREA -->
  <div class="main">

    <!-- TOP NAV -->
    <div class="topbar fade">
      <div class="hamburger" id="hamburger">☰</div>

      <div class="search">🔍 
        <input id="courseSearch" placeholder="Search courses..." onkeyup="filterCourses()" />
      </div>

      <div class="profile-icon" id="profileBtn">
        <img src="https://i.pravatar.cc/60" style="width:42px;height:42px;border-radius:10px;">
        
        <div class="profile-dropdown" id="dropdown">
          <a href="#">👤 Update Profile</a>
          <a href="#">🚪 Logout</a>
        </div>
      </div>
    </div>

    <!-- PROFILE HEADER WITH VIDEO -->
    <div class="profile-header fade fade-delay-1">
      <video autoplay muted loop playsinline>
        <source src="{{ asset('assets/clips/slide_logo.mp4') }}" type="video/mp4">
      </video>
    </div>

    <!-- PROFILE BOX -->
    <div class="profile-box fade fade-delay-2">
      <img src="https://i.pravatar.cc/150?img=36" class="profile-pic">
      <div class="profile-info">
        <h2>Kshitiz Kumar</h2>
        <p style="color:var(--muted);margin-top:5px;">Full Stack Learner | Bangalore</p>
        <p style="margin-top:10px;"><b>Email:</b> kshitiz@example.com</p>
        <p><b>Bio:</b> Coding, designing aur tech ka deewana! 🚀</p>
      </div>
    </div>

    <!-- STATS -->
    <div class="stats fade fade-delay-3">
      <div class="stat-card">
        <h3>Total Courses</h3><h2>9</h2>
      </div>
      <div class="stat-card">
        <h3>Completed Lessons</h3><h2>52</h2>
      </div>
      <div class="stat-card">
        <h3>Certificates</h3><h2>8</h2>
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
/* -----------------------------------
   COURSE DATA (Dynamic + Pagination)
------------------------------------*/
const courses = [
  {title:"GraphQL API Mastery", img:"https://picsum.photos/300/180?1", total:40, done:34},
  {title:"Figma UI/UX Design", img:"https://picsum.photos/300/180?2", total:50, done:20},
  {title:"Next.js Fullstack Pro", img:"https://picsum.photos/300/180?3", total:60, done:40},
  {title:"React Native Bootcamp", img:"https://picsum.photos/300/180?4", total:45, done:22},
  {title:"Python Automation", img:"https://picsum.photos/300/180?5", total:55, done:55},
  {title:"MongoDB + Node.js", img:"https://picsum.photos/300/180?6", total:42, done:18},
  {title:"AWS Cloud Mastery", img:"https://picsum.photos/300/180?7", total:70, done:33},
  {title:"Docker & Kubernetes", img:"https://picsum.photos/300/180?8", total:35, done:10},
  {title:"UI Animations Pro", img:"https://picsum.photos/300/180?9", total:48, done:28}
];

let filtered = [...courses];
let currentPage = 1;
const perPage = 3;

/* -----------------------------------
   RENDER COURSES
------------------------------------*/
function renderCourses(){
  let list = document.getElementById("courseList");
  list.innerHTML = "";

  let start = (currentPage - 1) * perPage;
  let end = start + perPage;

  let pageItems = filtered.slice(start, end);

  pageItems.forEach((c, i)=>{
    let percent = Math.round((c.done / c.total) * 100);

    list.innerHTML += `
      <div class="course-item">
        <img src="${c.img}">
        <div style="flex:1">
          <h3>${c.title}</h3>
          <p style="color:var(--muted);">${percent}% complete</p>

          <p style="margin-top:5px;">📘 Total Lectures: ${c.total}</p>
          <p>✔ Completed: ${c.done}</p>

          <div class="progress"><div style="width:${percent}%"></div></div>

          <div class="actions">
            <button>▶ Resume</button>
            <button>📄 Certificate</button>
          </div>
        </div>
      </div>
    `;
  });

  renderPagination();
}

/* -----------------------------------
   PAGINATION
------------------------------------*/
function renderPagination(){
  let totalPages = Math.ceil(filtered.length / perPage);
  let pag = document.getElementById("pagination");
  pag.innerHTML = "";

  if(currentPage > 1){
    pag.innerHTML += `<button onclick="prevPage()">⬅ Prev</button>`;
  }

  for(let i=1;i<=totalPages;i++){
    pag.innerHTML += `<button class="${i==currentPage?'active':''}" onclick="goToPage(${i})">${i}</button>`;
  }

  if(currentPage < totalPages){
    pag.innerHTML += `<button onclick="nextPage()">Next ➡</button>`;
  }
}

function prevPage(){ currentPage--; renderCourses(); }
function nextPage(){ currentPage++; renderCourses(); }
function goToPage(n){ currentPage=n; renderCourses(); }

/* -----------------------------------
   SEARCH FILTER
------------------------------------*/
function filterCourses(){
  let q = document.getElementById("courseSearch").value.toLowerCase();

  filtered = courses.filter(c =>
     c.title.toLowerCase().includes(q)
  );

  currentPage = 1;
  renderCourses();
}

renderCourses();


/* -----------------------------------
   SIDEBAR
------------------------------------*/
const sidebar = document.getElementById("sidebar");
const overlay = document.getElementById("overlay");
const hamburger = document.getElementById("hamburger");
const profileBtn = document.getElementById("profileBtn");
const dropdown = document.getElementById("dropdown");

/* Sidebar toggle */
hamburger.onclick = () => {
  sidebar.classList.remove("hide");
  overlay.classList.add("show");
};

overlay.onclick = () => {
  sidebar.classList.add("hide");
  overlay.classList.remove("show");
  dropdown.classList.remove("show");
};

/* Auto fix */
function fixSidebar(){
  if(window.innerWidth > 900){
    sidebar.classList.remove("hide");
    overlay.classList.remove("show");
  } else {
    sidebar.classList.add("hide");
  }
}
fixSidebar();
window.onresize = fixSidebar;

/* Profile dropdown */
profileBtn.onclick = (e) => {
  e.stopPropagation();
  dropdown.classList.toggle("show");
};
document.body.onclick = () => dropdown.classList.remove("show");

</script>

</body>
</html>
