<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Course Player - Next.js Full Course</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
/* --- SAME THEME VARIABLES --- */
:root{
  --bg:#0c0f13;
  --header:#111317;
  --card:#15171c;
  --border:#22252b;
  --text:#e7ecf2;
  --muted:#8e98a0;
  --accent:#0d6efd;
  --accent-hover:#0b5ed7;
  --radius:10px;
}

*{ margin:0; padding:0; box-sizing:border-box; font-family:"Inter",sans-serif; }

body{ background:var(--bg); color:var(--text); height:100vh; display:flex; flex-direction:column; overflow:hidden; }

/* 1. HEADER (Simple for Player) */
.player-nav{
  height:60px; background:var(--header); border-bottom:1px solid var(--border);
  display:flex; align-items:center; justify-content:space-between; padding:0 20px;
}
.back-btn{
  color:var(--text); text-decoration:none; font-weight:600; display:flex; align-items:center; gap:8px;
  font-size:14px; padding:8px 12px; border-radius:6px; transition:0.3s;
}
.back-btn:hover{ background:var(--card); }
.course-title{ font-size:16px; font-weight:600; color:var(--text); }
.progress-container{ display:flex; align-items:center; gap:10px; }
.circular-progress{
  width:30px; height:30px; border-radius:50%; background:conic-gradient(var(--accent) 75%, #333 0);
  display:flex; align-items:center; justify-content:center;
}
.circular-progress::before{ content:""; width:24px; height:24px; background:var(--header); border-radius:50%; }

/* 2. MAIN LAYOUT (Grid) */
.player-container{
  display:grid; grid-template-columns: 1fr 380px; height:calc(100vh - 60px);
}

/* LEFT SIDE: VIDEO & TABS */
.video-section{ overflow-y:auto; display:flex; flex-direction:column; }

/* Video Wrapper (16:9 Aspect Ratio) */
.video-wrapper{
  width:100%; background:#000; position:relative; aspect-ratio:16/9;
}
.video-wrapper video{ width:100%; height:100%; object-fit:contain; }

/* Content Below Video */
.video-info{ padding:24px; }
.lesson-title{ font-size:24px; font-weight:700; margin-bottom:10px; }

/* Tabs */
.tabs{ display:flex; gap:20px; border-bottom:1px solid var(--border); margin-bottom:20px; }
.tab-btn{
  background:transparent; border:none; color:var(--muted); font-size:15px; font-weight:500;
  padding-bottom:12px; cursor:pointer; border-bottom:2px solid transparent; transition:0.3s;
}
.tab-btn.active{ color:var(--accent); border-color:var(--accent); }
.tab-btn:hover{ color:#fff; }

.tab-content{ display:none; color:var(--muted); line-height:1.6; font-size:14px; }
.tab-content.active{ display:block; }


/* RIGHT SIDE: PLAYLIST (Curriculum) */
.playlist-section{
  background:var(--card); border-left:1px solid var(--border);
  display:flex; flex-direction:column; overflow:hidden;
}
.playlist-header{ padding:15px 20px; border-bottom:1px solid var(--border); font-weight:600; }

.playlist-scroll{ overflow-y:auto; flex:1; }

/* Sections */
.section-title{
  background:#1a1d24; padding:12px 20px; font-size:13px; font-weight:700; color:var(--text);
  border-bottom:1px solid var(--border); cursor:pointer; display:flex; justify-content:space-between;
}

/* Lecture Item */
.lecture-item{
  display:flex; gap:12px; padding:14px 20px; cursor:pointer;
  border-bottom:1px solid rgba(255,255,255,0.03); transition:0.2s;
}
.lecture-item:hover{ background:#1e2129; }
.lecture-item.active{ background:#1c2436; border-left:4px solid var(--accent); }

.checkbox{
  min-width:18px; height:18px; border:2px solid #444; border-radius:4px; margin-top:3px;
}
.checkbox.checked{ background:var(--accent); border-color:var(--accent); }

.lec-info h4{ font-size:14px; font-weight:500; color:#ddd; margin-bottom:4px; line-height:1.4; }
.lec-info span{ font-size:12px; color:var(--muted); display:flex; gap:6px; align-items:center; }


/* RESPONSIVE */
@media(max-width: 900px){
  .player-container{ grid-template-columns:1fr; overflow-y:auto; display:block; height:auto; }
  .video-section{ height:auto; overflow:visible; }
  .playlist-section{ height:auto; max-height:500px; }
  body{ overflow:auto; height:auto; }
}
</style>
</head>
<body>

  <nav class="player-nav">
    <a href="my-courses.html" class="back-btn">⬅ Back to Dashboard</a>
    <div class="course-title">Next.js 14 Full Stack Mastery</div>
    <div class="progress-container">
      <div style="font-size:12px; color:var(--muted);">75% Complete</div>
      <div class="circular-progress"></div>
    </div>
  </nav>

  <div class="player-container">

    <div class="video-section">
      <div class="video-wrapper">
        <video controls autoplay poster="https://picsum.photos/800/450">
          <source src="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      </div>

      <div class="video-info">
        <h1 class="lesson-title">12. Server Actions & Mutations</h1>
        
        <div class="tabs">
          <button class="tab-btn active" onclick="switchTab('overview')">Overview</button>
          <button class="tab-btn" onclick="switchTab('notes')">Notes</button>
          <button class="tab-btn" onclick="switchTab('resources')">Resources</button>
        </div>

        <div id="overview" class="tab-content active">
          <p>In this lecture, we will dive deep into Next.js Server Actions. You will learn how to handle form submissions directly from the server without creating separate API endpoints. This simplifies the data mutation process significantly.</p>
          <br>
          <p><strong>Key Topics:</strong></p>
          <ul style="margin-left:20px; margin-top:5px;">
            <li>Form Actions</li>
            <li>useFormStatus Hook</li>
            <li>Revalidating Data</li>
          </ul>
        </div>

        <div id="notes" class="tab-content">
          <p>📝 You have no notes for this lecture yet. Click here to add one.</p>
        </div>

        <div id="resources" class="tab-content">
          <p>🔗 <a href="#" style="color:var(--accent);">Source Code (GitHub)</a></p>
          <p>🔗 <a href="#" style="color:var(--accent);">Next.js Documentation</a></p>
        </div>
      </div>
    </div>

    <div class="playlist-section">
      <div class="playlist-header">Course Content</div>
      
      <div class="playlist-scroll">
        
        <div class="section-title">Section 1: Introduction <span>3/3</span></div>
        
        <div class="lecture-item">
          <div class="checkbox checked"></div>
          <div class="lec-info">
            <h4>1. Welcome to the Course</h4>
            <span>🎥 2 mins</span>
          </div>
        </div>
        <div class="lecture-item">
          <div class="checkbox checked"></div>
          <div class="lec-info">
            <h4>2. Installing Next.js 14</h4>
            <span>🎥 5 mins</span>
          </div>
        </div>
        <div class="lecture-item">
          <div class="checkbox checked"></div>
          <div class="lec-info">
            <h4>3. Folder Structure</h4>
            <span>🎥 8 mins</span>
          </div>
        </div>

        <div class="section-title">Section 2: Server Components <span>1/4</span></div>

        <div class="lecture-item active">
          <div class="checkbox"></div> <div class="lec-info">
            <h4 style="color:#fff;">12. Server Actions & Mutations</h4>
            <span>▶ Playing • 15 mins</span>
          </div>
        </div>
        <div class="lecture-item">
          <div class="checkbox"></div>
          <div class="lec-info">
            <h4>13. Client vs Server Components</h4>
            <span>🎥 10 mins</span>
          </div>
        </div>
        <div class="lecture-item">
          <div class="checkbox"></div>
          <div class="lec-info">
            <h4>14. Optimizing Images</h4>
            <span>🎥 12 mins</span>
          </div>
        </div>
        <div class="lecture-item">
          <div class="checkbox"></div>
          <div class="lec-info">
            <h4>15. Streaming & Suspense</h4>
            <span>🎥 18 mins</span>
          </div>
        </div>
        <div class="lecture-item">
          <div class="checkbox"></div>
          <div class="lec-info">
            <h4>16. Dynamic Routing</h4>
            <span>🎥 20 mins</span>
          </div>
        </div>

      </div>
    </div>

  </div>

<script>
  // Tab Switching Logic
  function switchTab(tabId){
    // Hide all contents
    document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));
    // Deactivate all buttons
    document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));

    // Show selected
    document.getElementById(tabId).classList.add('active');
    // Highlight button (this assumes the button triggered the event)
    event.target.classList.add('active');
  }

  // Interaction for Lecture Items (Demo only)
  const items = document.querySelectorAll('.lecture-item');
  items.forEach(item => {
    item.addEventListener('click', function() {
      // Remove active class from all
      items.forEach(i => i.classList.remove('active'));
      // Add to clicked
      this.classList.add('active');
      
      // Update Title (Simulated)
      const title = this.querySelector('h4').innerText;
      document.querySelector('.lesson-title').innerText = title;
    });
  });
</script>

</body>
</html>