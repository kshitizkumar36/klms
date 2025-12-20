<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Instructor - Add Questions</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />

<style>
/* --- THEME VARIABLES --- */
:root {
  --bg: #0c0f13;
  --card: #15171c;
  --text: #e7ecf2;
  --muted: #8e98a0;
  --accent: #0d6efd;
  --danger: #dc3545;
  --success: #198754;
  --border: #2a2d35;
  --shadow: 0 8px 25px rgba(0,0,0,0.35);
  --radius: 14px;
}

* { margin: 0; padding: 0; box-sizing: border-box; font-family: "Inter", sans-serif; }
html, body { width: 100%; overflow-x: hidden; background: var(--bg); color: var(--text); padding-bottom: 90px; /* Space for sticky footer */ }

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
.search { background: #1c1e24; padding: 8px 14px; border-radius: 10px; display: flex; align-items: center; }
.search input { background: none; border: none; outline: none; color: var(--text); width: 250px; }

/* PROFILE */
.profile-icon { display: flex; align-items: center; position: relative; cursor: pointer; }
.profile-img { width: 42px; height: 42px; border-radius: 10px; object-fit: cover; border: 1px solid #333; }
.profile-dropdown {
  position: absolute; top: 55px; right: 0; width: 160px;
  background: #1a1c22; border-radius: 10px; display: none;
  padding: 8px 0; box-shadow: var(--shadow); z-index: 2000; border: 1px solid #2a2d35;
}
.profile-dropdown.show { display: block; }
.profile-dropdown a { display: block; padding: 10px 15px; text-decoration: none; color: #d6d6d6; font-size: 14px; }
.profile-dropdown a:hover { background: #2a2d35; color: #fff; }

/* --- QUIZ BUILDER STYLES --- */
.page-content { padding: 30px; max-width: 1000px; margin: 0 auto; }

.header-flex { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 30px; }
.quiz-meta { color: var(--accent); font-size: 14px; font-weight: 600; margin-bottom: 5px; }

/* Question Card */
.q-card {
  background: var(--card); border: 1px solid var(--border);
  border-radius: var(--radius); padding: 25px; margin-bottom: 20px;
  position: relative; animation: slideIn .4s forwards;
}
@keyframes slideIn { from { opacity:0; transform:translateY(10px); } to { opacity:1; transform:translateY(0); } }

.q-header { display: flex; justify-content: space-between; margin-bottom: 20px; border-bottom: 1px solid var(--border); padding-bottom: 15px; }
.q-number { font-weight: 700; color: var(--accent); }
.q-actions { display: flex; gap: 10px; }

.form-label { display: block; margin-bottom: 8px; font-size: 13px; font-weight: 600; color: var(--muted); }
.form-input {
  width: 100%; padding: 10px 14px; background: #0c0f13; border: 1px solid var(--border);
  color: #fff; border-radius: 8px; outline: none; transition: .2s; font-size: 14px;
}
.form-input:focus { border-color: var(--accent); }

/* Options Grid */
.options-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-top: 20px; }
.option-item { display: flex; align-items: center; gap: 10px; }

.radio-custom {
  appearance: none; width: 20px; height: 20px; border: 2px solid var(--muted);
  border-radius: 50%; cursor: pointer; display: grid; place-content: center;
}
.radio-custom::before { content: ""; width: 10px; height: 10px; border-radius: 50%; background: var(--accent); transform: scale(0); transition: .2s; }
.radio-custom:checked { border-color: var(--accent); }
.radio-custom:checked::before { transform: scale(1); }

/* Buttons */
.btn { padding: 10px 20px; border-radius: 8px; font-weight: 600; cursor: pointer; border: none; font-size: 14px; white-space: nowrap; }
.btn-primary { background: var(--accent); color: #fff; }
.btn-outline { background: transparent; border: 1px solid var(--border); color: var(--muted); }
.btn-outline:hover { border-color: var(--accent); color: #fff; }
.btn-danger-text { background: transparent; color: var(--danger); border: none; font-size: 13px; cursor: pointer; }

.add-q-btn {
  width: 100%; padding: 15px; border: 2px dashed var(--border);
  background: transparent; color: var(--muted); border-radius: var(--radius);
  font-weight: 600; cursor: pointer; transition: .2s; margin-bottom: 40px;
}
.add-q-btn:hover { border-color: var(--accent); color: var(--accent); background: rgba(13, 110, 253, 0.05); }

/* --- STICKY FOOTER FIXED FOR MOBILE --- */
.footer-bar {
  position: fixed; bottom: 0; left: 0; width: 100%;
  background: #111317; padding: 15px 30px; border-top: 1px solid var(--border);
  display: flex; justify-content: flex-end; gap: 15px; z-index: 999;
  padding-left: 290px; /* Desktop Sidebar offset */
  transition: padding-left .3s;
  box-shadow: 0 -5px 20px rgba(0,0,0,0.5); /* Added shadow for better separation */
}

/* --- MEDIA QUERIES --- */
@media(max-width: 900px) {
  .hamburger { display: block; }
  .main { margin-left: 0; }
  .sidebar { transform: translateX(-100%); }
  .sidebar.active { transform: translateX(0); }
  .search { display: flex; padding: 6px 10px; }
  .search input { width: 120px; font-size: 13px; }
  .options-grid { grid-template-columns: 1fr; }

  /* FIXED FOOTER STYLES FOR MOBILE */
  .footer-bar { 
    padding: 12px 15px; /* Reduce padding */
    padding-left: 15px; /* Reset offset */
    justify-content: space-between; 
    gap: 10px;
  }

  .footer-bar .btn {
    padding: 8px 12px; /* Smaller button padding */
    font-size: 12px;   /* Smaller font text */
    flex: 1;           /* Buttons take equal width if needed or scale down */
  }

  .footer-bar > div {
    display: flex; gap: 8px; /* Gap between right-side buttons */
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
        <input placeholder="Search..." id="searchInput">
      </div>
    </div>
    <div class="profile-icon" id="profileBtn">
      <img src="https://i.pravatar.cc/60" class="profile-img" />
      <div class="profile-dropdown" id="dropdown">
        <a href="#">Edit Profile</a>
        <a href="#">Logout</a>
      </div>
    </div>
  </div>

  <div class="page-content fade">
    
    <div class="header-flex">
      <div>
        <div class="quiz-meta">Editing Quiz: Mastering React Hooks</div>
        <h1>Builder & Questions</h1>
        <p style="color:var(--muted)">Add questions, set correct answers and marks.</p>
      </div>
      <div style="text-align:right">
        <span style="color:var(--muted); font-size:13px;">Total Marks</span>
        <h2 style="color:var(--success)" id="totalMarksDisplay">0</h2>
      </div>
    </div>

    <div id="questionsContainer"></div>

    <button type="button" class="add-q-btn" onclick="addNewQuestion()">
      + Add New Question
    </button>

    <div class="footer-bar">
      <a href="{{ url('create_quiz') }}" class="btn btn-outline" style="text-decoration:none;">Back</a>
      
      <div style="display:flex; gap:10px;">
         <button class="btn btn-outline">Save Draft</button>
         <button class="btn btn-primary">Publish</button>
      </div>
    </div>

  </div>
</div>
</div>

<script>
// --- UI STATE LOGIC ---
const hamburger = document.getElementById('hamburger');
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');
const profileBtn = document.getElementById("profileBtn");

function toggleSidebar() { sidebar.classList.toggle('active'); overlay.classList.toggle('active'); }
function closeSidebar() { sidebar.classList.remove('active'); overlay.classList.remove('active'); }

hamburger.addEventListener('click', toggleSidebar);
overlay.addEventListener('click', closeSidebar);
profileBtn.onclick = (e) => { e.stopPropagation(); document.getElementById("dropdown").classList.toggle("show"); };
document.body.onclick = () => document.getElementById("dropdown").classList.remove("show");

// Resize Reset
window.addEventListener('resize', () => {
    if(window.innerWidth > 900) { closeSidebar(); }
});

// --- QUESTION BUILDER LOGIC (DEMO) ---

let questionCount = 0;

function addNewQuestion() {
  questionCount++;
  const container = document.getElementById('questionsContainer');
  
  const html = `
    <div class="q-card" id="q_card_${questionCount}">
      <div class="q-header">
        <span class="q-number">Question ${questionCount}</span>
        <div class="q-actions">
           <input type="number" class="form-input" style="width:80px; text-align:center;" placeholder="Marks" value="5" onchange="updateTotal()">
           <button type="button" class="btn-danger-text" onclick="removeQuestion(${questionCount})">Remove</button>
        </div>
      </div>

      <div class="form-group" style="margin-bottom:20px;">
        <label class="form-label">Question Text</label>
        <input type="text" class="form-input" placeholder="e.g. What is the use of useEffect in React?">
      </div>

      <div class="options-grid">
        ${renderOption(questionCount, 1, 'A')}
        ${renderOption(questionCount, 2, 'B')}
        ${renderOption(questionCount, 3, 'C')}
        ${renderOption(questionCount, 4, 'D')}
      </div>
    </div>
  `;

  const tempDiv = document.createElement('div');
  tempDiv.innerHTML = html;
  container.appendChild(tempDiv.firstElementChild);
  updateTotal();
  
  tempDiv.scrollIntoView({ behavior: 'smooth', block: 'end' });
}

function renderOption(qId, optId, label) {
  return `
    <div class="option-item">
      <input type="radio" name="q${qId}_correct" class="radio-custom" title="Mark as correct answer">
      <div style="width:100%">
        <label class="form-label" style="font-size:11px; margin-bottom:2px;">Option ${label}</label>
        <input type="text" class="form-input" placeholder="Answer text...">
      </div>
    </div>
  `;
}

function removeQuestion(id) {
  const card = document.getElementById(`q_card_${id}`);
  card.style.opacity = '0';
  setTimeout(() => { card.remove(); updateTotal(); }, 300);
}

function updateTotal() {
  let total = 0;
  const cards = document.querySelectorAll('.q-card');
  cards.forEach(card => {
    const input = card.querySelector('input[type="number"]');
    total += parseInt(input.value || 0);
  });
  document.getElementById('totalMarksDisplay').innerText = total;
}

window.onload = () => addNewQuestion();

</script>

</body>
</html>