<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Instructor - My Courses</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />

<style>
/* --------------- THEME (Matched) --------------- */
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

/* ANIMATIONS */
.fade { opacity: 0; transform: translateY(20px); animation: fadeIn .6s forwards; }
.delay-1 { animation-delay: .1s; }
.delay-2 { animation-delay: .2s; }

@keyframes fadeIn { to { opacity: 1; transform: translateY(0); } }

/* --------------- LAYOUT --------------- */
.layout { display: flex; }

/* SIDEBAR */
.sidebar {
  width: 260px; background: #111317; height: 100vh; position: fixed;
  left: 0; top: 0; padding: 22px; box-shadow: var(--shadow);
  transition: .25s; transform: translateX(0); z-index: 9999;
}
.sidebar.hide { transform: translateX(-100%); }
.sidebar .logo { display: flex; gap: 10px; align-items: center; margin-bottom: 30px;}
.sidebar .logo img { width: 42px; }
.sidebar nav { display: flex; flex-direction: column; gap: 10px; }
.sidebar nav a { text-decoration: none; padding: 10px 14px; border-radius: 10px; font-weight: 600; color: var(--muted); transition: .3s; }
.sidebar nav a:hover, .sidebar nav a.active { background: #1e1f25; color: #fff; }

/* OVERLAY */
.overlay { position: fixed; inset: 0; background: rgba(0,0,0,0.55); display: none; z-index: 5000; }
.overlay.show { display: block; }

/* MAIN */
.main { margin-left: 260px; width: 100%; transition: .3s; min-height: 100vh; display: flex; flex-direction: column; }

/* TOPBAR */
.topbar {
  display: flex; align-items: center; justify-content: space-between;
  padding: 14px 24px; background: #111317; position: sticky;
  top: 0; border-bottom: 1px solid #1e1f25; z-index: 50;
}
.hamburger { display: none; background: #1e1f25; padding: 8px 12px; border-radius: 8px; font-size: 26px; cursor: pointer; }

/* SEARCH */
.search { display: flex; align-items: center; gap: 8px; padding: 8px 14px; background: #1c1e24; border-radius: 10px; }
.search input { background: none; border: none; outline: none; color: var(--text); width: 250px; }

/* PROFILE MENU */
.profile-icon { position: relative; cursor: pointer; }
.profile-dropdown { position: absolute; top: 52px; right: 0; width: 160px; background: #1a1c22; border-radius: 10px; display: none; padding: 8px 0; box-shadow: var(--shadow); }
.profile-dropdown.show { display: block; }
.profile-dropdown a { display: block; padding: 10px 15px; text-decoration: none; color: #d6d6d6; }
.profile-dropdown a:hover { background: #2a2d35; }

/* --------------- MY COURSES PAGE STYLES --------------- */

.page-content { padding: 30px; }

/* HEADER SECTION */
.page-header {
  display: flex; justify-content: space-between; align-items: center;
  margin-bottom: 30px; flex-wrap: wrap; gap: 20px;
}
.page-header h1 { font-size: 28px; }
.btn-create {
  background: var(--accent); color: white; border: none;
  padding: 12px 24px; border-radius: 10px; font-weight: 600;
  cursor: pointer; transition: .3s; display: flex; align-items: center; gap: 8px;
}
.btn-create:hover { background: #0b5ed7; }

/* FILTERS */
.filters-bar {
  display: flex; gap: 15px; margin-bottom: 25px; flex-wrap: wrap;
}
.filter-btn {
  background: #1c1e24; color: var(--muted); border: 1px solid transparent;
  padding: 8px 16px; border-radius: 8px; cursor: pointer; font-weight: 500; transition: .3s;
}
.filter-btn.active, .filter-btn:hover { background: #252830; color: #fff; border-color: #333; }

/* COURSE GRID */
.course-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
  gap: 25px;
}

/* COURSE CARD */
.c-card {
  background: var(--card); border-radius: var(--radius);
  overflow: hidden; border: 1px solid #222;
  transition: transform .3s; display: flex; flex-direction: column;
}
.c-card:hover { transform: translateY(-5px); border-color: #333; }

.c-thumb { height: 180px; width: 100%; position: relative; }
.c-thumb img { width: 100%; height: 100%; object-fit: cover; }

.status-badge {
  position: absolute; top: 12px; left: 12px;
  padding: 4px 10px; border-radius: 6px;
  font-size: 11px; font-weight: 700; text-transform: uppercase;
}
.status-published { background: rgba(25, 135, 84, 0.9); color: white; }
.status-draft { background: rgba(255, 193, 7, 0.9); color: black; }

.c-body { padding: 20px; flex: 1; display: flex; flex-direction: column; }
.c-title { font-size: 18px; font-weight: 600; margin-bottom: 10px; line-height: 1.4; }
.c-cat { font-size: 12px; color: var(--accent); font-weight: 600; margin-bottom: 5px; text-transform: uppercase; }

.c-stats {
  display: flex; justify-content: space-between;
  margin-top: auto; padding-top: 15px; border-top: 1px solid #222;
  color: var(--muted); font-size: 13px;
}

.c-price { font-size: 18px; font-weight: 700; color: #fff; margin-bottom: 15px; }

/* ACTIONS */
.c-actions {
  display: flex; gap: 10px; margin-top: 15px;
}
.btn-action {
  flex: 1; padding: 10px; border-radius: 8px; border: none;
  cursor: pointer; font-weight: 600; font-size: 13px; transition: .2s;
}
.btn-edit { background: #1e1f25; color: #fff; }
.btn-edit:hover { background: #2a2d35; }
.btn-delete { background: rgba(220, 53, 69, 0.15); color: #ff6b6b; }
.btn-delete:hover { background: rgba(220, 53, 69, 0.3); }

/* RESPONSIVE */
@media(max-width:900px){
  .hamburger { display: block; }
  .main { margin-left: 0; }
  .sidebar.hide { transform: translateX(-100%); }
  .page-header { flex-direction: column; align-items: flex-start; }
  .btn-create { width: 100%; justify-content: center; }
  .course-grid { grid-template-columns: 1fr; }
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

    <div class="search">🔍
      <input placeholder="Search in your courses..." id="searchInput" onkeyup="filterRender()" />
    </div>

    <div class="profile-icon" id="profileBtn">
      <img src="https://i.pravatar.cc/60" style="width:42px;height:42px;border-radius:10px;" />
      <div class="profile-dropdown" id="dropdown">
        <a href="#">Edit Profile</a>
        <a href="#">Logout</a>
      </div>
    </div>
  </div>

  <div class="page-content fade">
    
    <div class="page-header">
      <div>
        <h1>My Course Manager</h1>
        <p style="color:var(--muted); margin-top:5px;">Manage, edit, and create new content for your students.</p>
      </div>
   <a style="text-decoration:none;" href="{{ url('create_course') }}">
  <button class="btn-create">
    <span>+</span>
    Create New Course
  </button>
</a>

    </div>

    <div class="filters-bar">
      <button class="filter-btn active" onclick="setFilter('all', this)">All Courses</button>
      <button class="filter-btn" onclick="setFilter('published', this)">Published</button>
      <button class="filter-btn" onclick="setFilter('draft', this)">Drafts</button>
    </div>

    <div class="course-grid" id="courseGrid">
      </div>

  </div>

</div>
</div>

<script>
/* -----------------------------------
   DATA & LOGIC
------------------------------------*/

// Sample Data for Instructor
let myCourses = [
  {
    id: 1,
    title: "Complete Fullstack Web Development Mastery",
    category: "Development",
    price: "$89.99",
    students: 1240,
    rating: 4.8,
    status: "published",
    img: "https://picsum.photos/300/180?1"
  },
  {
    id: 2,
    title: "Advanced React Patterns & Performance",
    category: "Frontend",
    price: "$59.99",
    students: 850,
    rating: 4.9,
    status: "published",
    img: "https://picsum.photos/300/180?2"
  },
  {
    id: 3,
    title: "UI/UX Design Bootcamp: Figma to Code",
    category: "Design",
    price: "$49.99",
    students: 0,
    rating: 0,
    status: "draft",
    img: "https://picsum.photos/300/180?3"
  },
  {
    id: 4,
    title: "Node.js API Development for Beginners",
    category: "Backend",
    price: "$39.99",
    students: 320,
    rating: 4.5,
    status: "published",
    img: "https://picsum.photos/300/180?4"
  },
  {
    id: 5,
    title: "Python for Data Science - 2024 Edition",
    category: "Data Science",
    price: "$99.99",
    students: 0,
    rating: 0,
    status: "draft",
    img: "https://picsum.photos/300/180?5"
  },
  {
    id: 6,
    title: "AWS Cloud Practitioner Essentials",
    category: "Cloud",
    price: "$74.99",
    students: 2100,
    rating: 4.7,
    status: "published",
    img: "https://picsum.photos/300/180?6"
  }
];

let currentFilter = 'all';

// Render Function
function renderCourses(data) {
  const grid = document.getElementById('courseGrid');
  grid.innerHTML = "";

  if(data.length === 0) {
    grid.innerHTML = `<p style="color:var(--muted); grid-column:1/-1; text-align:center; padding:40px;">No courses found.</p>`;
    return;
  }

  data.forEach(course => {
    // Determine badge style
    let badgeClass = course.status === 'published' ? 'status-published' : 'status-draft';
    let badgeText = course.status === 'published' ? 'Published' : 'Draft';

    let html = `
      <div class="c-card fade">
        <div class="c-thumb">
          <img src="${course.img}" alt="Course Image">
          <span class="status-badge ${badgeClass}">${badgeText}</span>
        </div>
        
        <div class="c-body">
          <div class="c-cat">${course.category}</div>
          <div class="c-title">${course.title}</div>
          <div class="c-price">${course.price}</div>
          
          <div class="c-stats">
            <span>👨‍🎓 ${course.students} Students</span>
            <span>⭐ ${course.rating > 0 ? course.rating : 'N/A'}</span>
          </div>

          <div class="c-actions">
            <button class="btn-action btn-edit" onclick="editCourse(${course.id})">✏ Edit</button>
            <button class="btn-action btn-delete" onclick="deleteCourse(${course.id})">🗑 Delete</button>
          </div>
        </div>
      </div>
    `;
    grid.innerHTML += html;
  });
}

// Filter Logic (Status + Search)
function filterRender() {
  let query = document.getElementById("searchInput").value.toLowerCase();
  
  let filtered = myCourses.filter(course => {
    // Filter by Tab
    let statusMatch = (currentFilter === 'all') || (course.status === currentFilter);
    // Filter by Search
    let searchMatch = course.title.toLowerCase().includes(query);
    
    return statusMatch && searchMatch;
  });

  renderCourses(filtered);
}

// Tab Click Handler
function setFilter(filterType, btnElement) {
  currentFilter = filterType;
  
  // Update UI buttons
  document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
  btnElement.classList.add('active');

  filterRender();
}

// Mock Actions
function deleteCourse(id) {
  if(confirm("Are you sure you want to delete this course?")) {
    myCourses = myCourses.filter(c => c.id !== id);
    filterRender();
  }
}

function editCourse(id) {
  window.location.href = "{{ url('edit_course') }}/" + id;
}


// Initial Load
renderCourses(myCourses);


/* -----------------------------------
   SIDEBAR & LAYOUT JS
------------------------------------*/ 
const sidebar = document.getElementById("sidebar");
const overlay = document.getElementById("overlay");
const hamburger = document.getElementById("hamburger");
const profileBtn = document.getElementById("profileBtn");
const dropdown = document.getElementById("dropdown");

// Sidebar Toggle
hamburger.onclick = () => {
  sidebar.classList.remove("hide");
  overlay.classList.add("show");
};

overlay.onclick = () => {
  sidebar.classList.add("hide");
  overlay.classList.remove("show");
};

// Profile Dropdown
profileBtn.onclick = (e) => {
  e.stopPropagation();
  dropdown.classList.toggle("show");
};
document.body.onclick = () => dropdown.classList.remove("show");

// Auto Sidebar Fix
function fixSidebar() {
  if (window.innerWidth > 900) {
    sidebar.classList.remove("hide");
    overlay.classList.remove("show");
  } else {
    sidebar.classList.add("hide");
  }
}
window.onresize = fixSidebar;
fixSidebar(); // Run on load

</script>

</body>
</html>