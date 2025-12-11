<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Resume Learning - LMS</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>
/* --- THEME VARIABLES --- */
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

/* LAYOUT */
.layout{ display:flex; }
.sidebar{ width:260px; background:#111317; height:100vh; position:fixed; left:0; top:0; padding:22px; box-shadow:var(--shadow); z-index:9999; transition:transform .25s ease; }
.sidebar.hide{ transform:translateX(-100%); }
.sidebar .logo{ display:flex; align-items:center; gap:10px; margin-bottom:30px; }
.sidebar .logo img{ width:42px; }
.sidebar nav{ display:flex; flex-direction:column; gap:10px; }
.sidebar nav a{ color:var(--muted); padding:10px 14px; border-radius:10px; text-decoration:none; font-weight:600; transition:0.3s; }
.sidebar nav a:hover, .sidebar nav a.active{ background:#1e1f25; color:#fff; }
.main{ margin-left:260px; width:calc(100% - 260px); transition:.3s; min-height:100vh; display:flex; flex-direction:column; }
.topbar{ display:flex; justify-content:space-between; align-items:center; padding:14px 24px; background:rgba(17, 19, 23, 0.95); position:sticky; top:0; z-index:50; border-bottom:1px solid #1e1f25; backdrop-filter:blur(10px); }
.search{ background:#1c1e24; padding:8px 14px; border-radius:10px; display:flex; gap:8px; align-items:center; }
.search input{ background:transparent; border:none; outline:none; width:250px; color:var(--text); }

/* --- RESUME LEARNING SPECIFIC STYLES --- */
.content-padding{ padding:30px; max-width:1200px; margin:0 auto; width:100%; }

.section-title{ font-size:20px; font-weight:700; margin-bottom:20px; display:flex; align-items:center; gap:10px; }

/* HERO CARD (Most Recent) */
.resume-hero{
  background:var(--card); border-radius:var(--radius); overflow:hidden;
  display:flex; border:1px solid #1e1f25; box-shadow:var(--shadow);
  margin-bottom:40px; min-height:280px; position:relative;
}

.hero-thumb{
  width:55%; position:relative; overflow:hidden; cursor:pointer;
}
.hero-thumb img{ width:100%; height:100%; object-fit:cover; transition:transform 0.5s; }
.resume-hero:hover .hero-thumb img{ transform:scale(1.03); }

/* Overlay on Hero Image */
.hero-overlay{
  position:absolute; inset:0; background:rgba(0,0,0,0.3);
  display:flex; justify-content:center; align-items:center;
}
.play-pulse{
  width:70px; height:70px; background:rgba(13, 110, 253, 0.9);
  border-radius:50%; display:flex; justify-content:center; align-items:center;
  color:#fff; font-size:28px; padding-left:4px; box-shadow:0 0 0 0 rgba(13, 110, 253, 0.7);
  animation: pulse 2s infinite;
}
@keyframes pulse {
  0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(13, 110, 253, 0.7); }
  70% { transform: scale(1); box-shadow: 0 0 0 20px rgba(13, 110, 253, 0); }
  100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(13, 110, 253, 0); }
}

.hero-info{
  width:45%; padding:30px; display:flex; flex-direction:column; justify-content:center;
  border-left:1px solid #222;
}

.last-watched-tag{
  background:#1e2129; color:var(--accent); font-size:12px; font-weight:700;
  padding:5px 10px; border-radius:6px; width:fit-content; margin-bottom:15px;
  text-transform:uppercase; letter-spacing:0.5px;
}

.hero-course-title{ font-size:14px; color:var(--muted); font-weight:600; margin-bottom:5px; }
.hero-lesson-title{ font-size:24px; font-weight:800; line-height:1.3; margin-bottom:20px; }

/* Progress */
.prog-container{ margin-bottom:25px; }
.prog-text{ display:flex; justify-content:space-between; font-size:13px; color:#ccc; margin-bottom:8px; }
.prog-track{ width:100%; height:8px; background:#222; border-radius:10px; overflow:hidden; }
.prog-fill{ height:100%; background:var(--accent); border-radius:10px; }

.btn-hero{
  padding:14px; background:var(--text); color:#000; text-align:center; text-decoration:none;
  font-weight:700; border-radius:8px; transition:0.2s; display:flex; align-items:center; justify-content:center; gap:8px;
}
.btn-hero:hover{ background:#fff; transform:translateY(-2px); }

/* GRID FOR OTHERS */
.history-grid{
  display:grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap:20px;
}

.h-card{
  background:var(--card); padding:15px; border-radius:12px; border:1px solid #1e1f25;
  display:flex; gap:15px; align-items:center; transition:0.2s; cursor:pointer; text-decoration:none; color:inherit;
}
.h-card:hover{ background:#1a1d24; border-color:#333; }

.h-img{ width:100px; height:70px; border-radius:8px; object-fit:cover; }
.h-info{ flex:1; }
.h-title{ font-size:15px; font-weight:600; margin-bottom:4px; display:-webkit-box; -webkit-line-clamp:1; -webkit-box-orient:vertical; overflow:hidden;}
.h-lec{ font-size:13px; color:var(--muted); margin-bottom:8px; display:-webkit-box; -webkit-line-clamp:1; -webkit-box-orient:vertical; overflow:hidden;}
.h-time{ font-size:11px; color:#666; font-style:italic; }

/* RESPONSIVE */
@media(max-width:900px){
  .sidebar{ transform:translateX(-100%); }
  .sidebar.show{ transform:translateX(0); }
  .main{ margin-left:0; width:100%; }
  .overlay{ position:fixed; inset:0; background:rgba(0,0,0,0.6); z-index:5000; display:none; }
  .overlay.show{ display:block; }
  .hamburger{ display:block; cursor:pointer; font-size:24px; padding:5px 10px; background:#222; border-radius:6px; }
  
  .resume-hero{ flex-direction:column; }
  .hero-thumb, .hero-info{ width:100%; }
  .hero-thumb{ height:200px; }
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
      <div class="search">🔍 <input type="text" placeholder="Search history..."></div>
      <div class="profile-icon">
        <img src="https://i.pravatar.cc/150?img=36" style="width:40px;height:40px;border-radius:10px;">
      </div>
    </div>

    <div class="content-padding fade">
      
      <div class="section-title">🚀 Jump Back In</div>
      
      <div class="resume-hero">
        <a href="course_player" class="hero-thumb">
          <img src="https://picsum.photos/id/96/800/500" alt="Next JS">
          <div class="hero-overlay">
            <div class="play-pulse">▶</div>
          </div>
        </a>
        
        <div class="hero-info">
          <div class="last-watched-tag">Last Watched</div>
          <div class="hero-course-title">Next.js 14 Full Stack Mastery</div>
          <h2 class="hero-lesson-title">12. Server Actions & Mutations</h2>
          
          <div class="prog-container">
            <div class="prog-text">
              <span>Lecture 12 of 90</span>
              <span>75% Complete</span>
            </div>
            <div class="prog-track">
              <div class="prog-fill" style="width:75%"></div>
            </div>
          </div>

          <a href="course_player" class="btn-hero">▶ Resume Lecture</a>
        </div>
      </div>

      <div class="section-title">🕒 Recently Viewed</div>
      <div class="history-grid" id="historyGrid">
        </div>

    </div>
  </div>
</div>

<script>
/* -----------------------------------
   RECENT HISTORY DATA
------------------------------------*/
const historyData = [
  {
    course: "Mastering Figma: UI/UX Design",
    lesson: "4. Auto Layout Basics",
    img: "https://picsum.photos/id/3/200/150",
    time: "Watched 2 hours ago",
    percent: 30
  },
  {
    course: "Python for Data Science",
    lesson: "8. Pandas Dataframes",
    img: "https://picsum.photos/id/20/200/150",
    time: "Watched yesterday",
    percent: 15
  },
  {
    course: "AWS Certified Solutions Arch.",
    lesson: "22. S3 Bucket Policies",
    img: "https://picsum.photos/id/60/200/150",
    time: "Watched 2 days ago",
    percent: 60
  },
  {
    course: "Modern Docker & Kubernetes",
    lesson: "10. Docker Compose",
    img: "https://picsum.photos/id/119/200/150",
    time: "Watched 4 days ago",
    percent: 90
  }
];

function renderHistory(){
  const grid = document.getElementById('historyGrid');
  grid.innerHTML = "";

  historyData.forEach(item => {
    grid.innerHTML += `
      <a href="course_player" class="h-card">
        <img src="${item.img}" class="h-img">
        <div class="h-info">
          <div class="h-title">${item.course}</div>
          <div class="h-lec">📺 ${item.lesson}</div>
          <div style="height:4px; background:#222; border-radius:4px; margin:6px 0;">
            <div style="width:${item.percent}%; height:100%; background:var(--muted); border-radius:4px;"></div>
          </div>
          <div class="h-time">${item.time}</div>
        </div>
      </a>
    `;
  });
}

renderHistory();


/* -----------------------------------
   SIDEBAR TOGGLE
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