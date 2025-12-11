<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Courses - LMS</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>
/* --- EXISTING VARIABLES & BASE STYLES --- */
:root{
  --bg:#0c0f13;
  --card:#15171c;
  --text:#e7ecf2;
  --muted:#8e98a0;
  --accent:#0d6efd;
  --accent-hover:#0b5ed7;
  --shadow:0 8px 25px rgba(0,0,0,0.35);
  --radius:14px;
}

*{ margin:0; padding:0; box-sizing:border-box; font-family:"Inter",sans-serif; }

html,body{ width:100%; min-height:100vh; background:var(--bg); color:var(--text); overflow-x:hidden; }

/* Animations */
.fade{ opacity:0; transform:translateY(20px); animation:fadeIn .6s forwards; }
@keyframes fadeIn{ to{ opacity:1; transform:translateY(0); } }

/* LAYOUT & SIDEBAR */
.layout{ display:flex; }

.sidebar{
  width:260px; background:#111317; height:100vh; position:fixed; left:0; top:0;
  padding:22px; box-shadow:var(--shadow); z-index:9999;
  transition:transform .25s ease;
}
.sidebar.hide{ transform:translateX(-100%); }
.sidebar .logo{ display:flex; align-items:center; gap:10px; margin-bottom:30px; }
.sidebar .logo img{ width:42px; }
.sidebar nav{ display:flex; flex-direction:column; gap:10px; }
.sidebar nav a{ color:var(--muted); padding:10px 14px; border-radius:10px; text-decoration:none; font-weight:600; transition:0.3s; }
.sidebar nav a:hover, .sidebar nav a.active{ background:#1e1f25; color:#fff; }

/* MAIN CONTENT AREA */
.main{ margin-left:260px; width:calc(100% - 260px); transition:.3s; min-height:100vh; display:flex; flex-direction:column; }

/* TOPBAR */
.topbar{
  display:flex; justify-content:space-between; align-items:center;
  padding:14px 24px; background:rgba(17, 19, 23, 0.95);
  position:sticky; top:0; z-index:50;
  border-bottom:1px solid #1e1f25; backdrop-filter:blur(10px);
}
.search{ background:#1c1e24; padding:8px 14px; border-radius:10px; display:flex; gap:8px; align-items:center; border:1px solid transparent; transition:0.3s; }
.search:focus-within{ border-color:var(--accent); }
.search input{ background:transparent; border:none; outline:none; width:250px; color:var(--text); }

/* --- MY COURSES STYLES --- */
.content-padding{ padding:30px; max-width:1400px; margin:0 auto; width:100%; }

/* Header & Filters */
.page-header{
  display:flex; justify-content:space-between; align-items:end;
  margin-bottom:30px; flex-wrap:wrap; gap:20px;
}
.page-header h1{ font-size:28px; font-weight:700; }
.page-header p{ color:var(--muted); margin-top:5px; }

.filters{
  display:flex; background:#1c1e24; padding:4px; border-radius:10px;
}
.filter-btn{
  padding:8px 20px; border:none; background:transparent; color:var(--muted);
  font-weight:600; cursor:pointer; border-radius:8px; transition:0.3s;
}
.filter-btn:hover{ color:#fff; }
.filter-btn.active{ background:var(--card); color:#fff; box-shadow:0 2px 10px rgba(0,0,0,0.2); }

/* Course Grid */
.course-grid{
  display:grid;
  grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
  gap:24px;
}

/* Course Card */
.c-card{
  background:var(--card); border-radius:var(--radius); overflow:hidden;
  box-shadow:var(--shadow); transition:transform 0.3s ease, box-shadow 0.3s ease;
  border:1px solid #1e1f25; display:flex; flex-direction:column;
  position:relative;
}
.c-card:hover{ transform:translateY(-5px); border-color:var(--muted); }

/* Thumbnail as Link */
.c-thumb{
  width:100%; height:180px; position:relative; overflow:hidden; display:block;
}
.c-thumb img{ width:100%; height:100%; object-fit:cover; transition:transform 0.5s; }
.c-card:hover .c-thumb img{ transform:scale(1.05); }

/* Play Overlay */
.play-overlay{
  position:absolute; inset:0; background:rgba(0,0,0,0.4);
  display:flex; justify-content:center; align-items:center;
  opacity:0; transition:0.3s;
}
.c-card:hover .play-overlay{ opacity:1; }
.play-btn{
  width:50px; height:50px; background:rgba(255,255,255,0.2);
  backdrop-filter:blur(5px); border-radius:50%; display:flex;
  align-items:center; justify-content:center; font-size:20px; color:#fff;
}

.c-body{ padding:20px; flex:1; display:flex; flex-direction:column; }
.c-cat{ font-size:12px; font-weight:600; color:var(--accent); text-transform:uppercase; letter-spacing:0.5px; margin-bottom:8px; }
.c-title{ font-size:18px; font-weight:700; margin-bottom:10px; line-height:1.4; }
.c-meta{ display:flex; align-items:center; gap:10px; font-size:13px; color:var(--muted); margin-bottom:20px; }
.c-meta img{ width:24px; height:24px; border-radius:50%; object-fit:cover; }

/* Progress */
.c-progress-wrap{ margin-top:auto; }
.c-prog-info{ display:flex; justify-content:space-between; font-size:13px; color:#ccc; margin-bottom:6px; }
.c-bar{ height:6px; background:#2a2d35; border-radius:10px; overflow:hidden; }
.c-fill{ height:100%; background:var(--accent); border-radius:10px; transition:width 1s ease; }

.c-action{ margin-top:15px; }
.btn-resume{
  width:100%; padding:10px; background:var(--accent); border:none;
  color:#fff; border-radius:8px; font-weight:600; cursor:pointer;
  transition:0.2s;
}
.btn-resume:hover{ background:var(--accent-hover); }
.btn-completed{
  width:100%; padding:10px; background:#1e1f25; border:1px solid #333;
  color:var(--muted); border-radius:8px; font-weight:600; cursor:default;
}

/* RESPONSIVE */
@media(max-width:900px){
  .sidebar{ transform:translateX(-100%); }
  .sidebar.show{ transform:translateX(0); }
  .main{ margin-left:0; width:100%; }
  .overlay{ position:fixed; inset:0; background:rgba(0,0,0,0.6); z-index:5000; display:none; }
  .overlay.show{ display:block; }
  .hamburger{ display:block; cursor:pointer; font-size:24px; background:#1e1f25; padding:5px 10px; border-radius:5px;}
  .page-header{ flex-direction:column; align-items:flex-start; }
}
.hamburger{ display:none; }
</style>
</head>
<body>

<div class="overlay" id="overlay"></div>

<div class="layout">

  <aside class="sidebar" id="sidebar">
    <div class="logo">
      <img src="https://kshitizkumar.com/assets/img/klogo.png" alt="Logo">
      <h2>LMS Panel</h2>
    </div>
   @include('dashboard.student.layouts.menu')
  </aside>

  <div class="main">

    <div class="topbar">
      <div class="hamburger" id="hamburger">☰</div>
      <div class="search">🔍 <input type="text" id="searchInput" placeholder="Search my courses..." onkeyup="filterRender()"></div>
      <div class="profile-icon">
        <img src="https://i.pravatar.cc/150?img=36" style="width:40px;height:40px;border-radius:10px;cursor:pointer;">
      </div>
    </div>

    <div class="content-padding fade">
      
      <div class="page-header">
        <div>
          <h1>My Learning</h1>
          <p>You have <span style="color:#fff;" id="countDisplay">0</span> courses in progress.</p>
        </div>
        
        <div class="filters">
          <button class="filter-btn active" onclick="setFilter('all', this)">All</button>
          <button class="filter-btn" onclick="setFilter('active', this)">In Progress</button>
          <button class="filter-btn" onclick="setFilter('completed', this)">Completed</button>
        </div>
      </div>

      <div class="course-grid" id="courseGrid">
        </div>

    </div>
  </div>
</div>

<script>
/* -----------------------------------
   DATA
------------------------------------*/
const myCourses = [
  { id: 1, title: "Mastering Figma: UI/UX Design", cat: "Design", instructor: "Sarah Smith", avatar: "https://i.pravatar.cc/150?img=1", img: "https://picsum.photos/id/3/600/400", total: 50, done: 25, status: "active" },
  { id: 2, title: "Advanced React Patterns", cat: "Development", instructor: "John Doe", avatar: "https://i.pravatar.cc/150?img=11", img: "https://picsum.photos/id/180/600/400", total: 80, done: 80, status: "completed" },
  { id: 3, title: "Python for Data Science", cat: "Data Science", instructor: "Emily R.", avatar: "https://i.pravatar.cc/150?img=5", img: "https://picsum.photos/id/20/600/400", total: 60, done: 12, status: "active" },
  { id: 4, title: "AWS Certified Solutions Arch.", cat: "Cloud", instructor: "Cloud Guru", avatar: "https://i.pravatar.cc/150?img=8", img: "https://picsum.photos/id/60/600/400", total: 100, done: 45, status: "active" },
  { id: 5, title: "Modern Docker & Kubernetes", cat: "DevOps", instructor: "Mike T.", avatar: "https://i.pravatar.cc/150?img=12", img: "https://picsum.photos/id/119/600/400", total: 40, done: 40, status: "completed" },
  { id: 6, title: "Next.js 14 Full Course", cat: "Web Dev", instructor: "Kshitiz K.", avatar: "https://i.pravatar.cc/150?img=33", img: "https://picsum.photos/id/96/600/400", total: 90, done: 5, status: "active" }
];

let currentFilter = 'all';

/* -----------------------------------
   RENDER LOGIC (UPDATED WITH LINKS)
------------------------------------*/
function render(data) {
  const grid = document.getElementById('courseGrid');
  const countDisplay = document.getElementById('countDisplay');
  grid.innerHTML = "";
  
  countDisplay.innerText = data.length;

  if(data.length === 0){
    grid.innerHTML = `<div style="grid-column:1/-1; text-align:center; padding:40px; color:var(--muted);">No courses found.</div>`;
    return;
  }

  data.forEach(course => {
    let percent = Math.round((course.done / course.total) * 100);
    let isComplete = percent === 100;
    
    // UPDATE 1: BUTTON LOGIC
    // Agar course complete nahi hai, to button ko anchor tag (<a>) me wrap kar diya.
    let btnHTML = isComplete 
      ? `<button class="btn-completed">✔ Completed</button>`
      : `<a href="/course_player" style="text-decoration:none; display:block;">
           <button class="btn-resume">▶ Continue Learning</button>
         </a>`;

    // UPDATE 2: THUMBNAIL LOGIC
    // Image container ko <div> ki jagah <a> bana diya taki click ho sake.
    let html = `
      <div class="c-card fade">
        <a href="/course_player" class="c-thumb">
          <img src="${course.img}" alt="Course">
          <div class="play-overlay"><div class="play-btn">▶</div></div>
        </a>
        
        <div class="c-body">
          <div class="c-cat">${course.cat}</div>
          <div class="c-title">${course.title}</div>
          
          <div class="c-meta">
            <img src="${course.avatar}">
            <span>${course.instructor}</span>
          </div>

          <div class="c-progress-wrap">
            <div class="c-prog-info">
              <span>${percent}% Complete</span>
              <span>${course.done}/${course.total} Lessons</span>
            </div>
            <div class="c-bar">
              <div class="c-fill" style="width:${percent}%"></div>
            </div>
            <div class="c-action">
              ${btnHTML}
            </div>
          </div>
        </div>
      </div>
    `;
    grid.innerHTML += html;
  });
}

/* -----------------------------------
   FILTER & SEARCH (SAME AS BEFORE)
------------------------------------*/
function filterRender() {
  const query = document.getElementById('searchInput').value.toLowerCase();
  
  const filtered = myCourses.filter(c => {
    const matchesText = c.title.toLowerCase().includes(query) || c.cat.toLowerCase().includes(query);
    const matchesStatus = currentFilter === 'all' || c.status === currentFilter;
    return matchesText && matchesStatus;
  });

  render(filtered);
}

function setFilter(status, btn) {
  document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  currentFilter = status;
  filterRender();
}

render(myCourses);

/* -----------------------------------
   MOBILE SIDEBAR LOGIC
------------------------------------*/
const sidebar = document.getElementById("sidebar");
const overlay = document.getElementById("overlay");
const hamburger = document.getElementById("hamburger");

hamburger.onclick = () => {
  sidebar.classList.add("show");
  overlay.classList.add("show");
};

overlay.onclick = () => {
  sidebar.classList.remove("show");
  overlay.classList.remove("show");
};

</script>
</body>
</html>