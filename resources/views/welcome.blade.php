<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LMS — Learn Everything Easily</title>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;900&display=swap" rel="stylesheet">

  <style>

    html, body {
  width:100%;
  overflow-x:hidden !important;
}

section, div, img {
  max-width:100% !important;
}

.tabs-scroll {
  overflow-x:auto;
  width:100%;
}

.hero-right {
  max-width:100%;
}

    * { margin:0; padding:0; box-sizing:border-box; }
    body {
      font-family:'Inter', sans-serif;
      background:#0a0a0a;
      color:#ddd;
      overflow-x:hidden;
    }
    a { text-decoration:none; color:inherit; }

    :root {
      --theme: #ed1d24;
      --lightred: #ff3b42;
    }

    /* Header */
    header {
      padding:18px 20px;
      display:flex;
      justify-content:space-between;
      align-items:center;
      background:#0d0d0d;
      border-bottom:1px solid rgba(255,255,255,0.05);
      position:sticky; top:0; z-index:50;
    }
    header nav {
      display:flex;
      gap:24px;
    }
    header nav a {
      font-weight:500;
      color:#ccc;
    }
    header nav a:hover { color:var(--theme); }

    /* MOBILE MENU BUTTON */
    .menu-btn {
      display:none;
      flex-direction:column;
      gap:5px;
      cursor:pointer;
    }
    .menu-btn div {
      width:26px;
      height:3px;
      background:#fff;
      border-radius:2px;
    }

    /* Mobile navbar */
    .mobile-nav {
      position:fixed;
      top:0;
      right:-100%;
      width:70%;
      height:100vh;
      background:#111;
      padding:80px 30px;
      display:flex;
      flex-direction:column;
      gap:20px;
      transition:0.4s;
      z-index:99;
    }
    .mobile-nav a {
      color:#fff;
      font-size:1.2rem;
      padding-bottom:10px;
      border-bottom:1px solid rgba(255,255,255,0.1);
    }

    /* Overlay added for outside click close */
    .overlay {
      position:fixed;
      top:0;
      left:0;
      width:100%;
      height:100%;
      background:rgba(0,0,0,0.5);
      display:none;
      z-index:90;
    }

    /* HERO */
    .hero {
      min-height:90vh;
      display:flex;
      align-items:center;
      justify-content:space-between;
      padding:110px 6%;
      position:relative;
      background:#0a0a0a;
    }

    .hero-left {
      max-width:50%;
      animation: slideLeft 1.2s ease-out forwards;
      opacity:0;
    }

    .hero-logo {
      width:140px;
      margin-bottom:25px;
      animation: fadeIn 1s ease-out forwards;
      opacity:0;
    }

    .hero h1 {
      color:#fff;
      font-size:3rem;
      font-weight:900;
      margin-bottom:16px;
    }

    .hero p {
      font-size:1.1rem;
      margin-bottom:30px;
      line-height:1.6;
      color:#ccc;
    }

    .btn {
      padding:12px 32px;
      background:var(--theme);
      color:#fff;
      border-radius:10px;
      font-weight:700;
      font-size:1rem;
      display:inline-block;
      box-shadow:0 0 18px rgba(237,29,36,0.4);
      transition:0.3s;
    }
    .btn:hover { background:var(--lightred); transform:translateY(-3px); }

    .hero-right {
      width:50%;
      opacity:0;
      animation: slideRight 1.2s ease-out forwards;
      animation-delay:0.2s;
      border-radius:12px;
    }

    /* Animations */
    @keyframes slideLeft { from {opacity:0; transform:translateX(-60px);} to {opacity:1; transform:translateX(0);} }
    @keyframes slideRight { from {opacity:0; transform:translateX(60px);} to {opacity:1;} }
    @keyframes fadeIn { from {opacity:0;} to {opacity:1;} }

    /* Sections */
    section { padding:80px 6%; }

    .section-title {
      text-align:center;
      font-size:2.2rem;
      font-weight:900;
      color:var(--theme);
      margin-bottom:40px;
    }

    /* FEATURES */
    .features-grid {
      display:grid;
      grid-template-columns:repeat(auto-fit, minmax(260px,1fr));
      gap:22px;
    }
    .feature {
      background:#111;
      padding:26px;
      border:1px solid rgba(255,255,255,0.05);
      border-radius:10px;
      text-align:center;
      transition:0.3s;
    }
    .feature:hover { transform:translateY(-6px); }
    .feature h3 { color:var(--theme); margin-bottom:10px; }

    /* COURSES */
    .courses-grid {
      display:grid;
      grid-template-columns:repeat(auto-fit, minmax(260px,1fr));
      gap:24px;
    }
    .course-card {
      background:#111;
      border-radius:12px;
      overflow:hidden;
      transition:0.3s;
      border:1px solid rgba(255,255,255,0.05);
    }
    .course-card img { width:100%; height:180px; object-fit:cover; }
    .course-card:hover { transform:scale(1.03); }
    .c-body { padding:16px; }
    .price { color:var(--theme); font-weight:700; margin-top:8px; }

    /* Pricing */
    .pricing-box {
      background:#111;
      padding:35px;
      max-width:360px;
      margin:auto;
      border-radius:12px;
      text-align:center;
      border:1px solid rgba(255,255,255,0.05);
    }

    footer {
      padding:32px;
      background:#0d0d0d;
      color:#999;
      text-align:center;
      border-top:1px solid rgba(255,255,255,0.05);
    }

    /* RESPONSIVE FIX */
    @media(max-width:900px){
      header nav { display:none; }
      .menu-btn { display:flex; }

      .hero {
        flex-direction:column;
        text-align:center;
        padding:70px 20px;
      }

      .hero-left { max-width:100%; }
      .hero h1 { font-size:2.2rem; }

      .hero-right {
        width:100%;
        margin-top:40px;
      }
    }
  </style>

</head>
<body>

<header>
  <img src="https://kshitizkumar.com/assets/img/klogo.png" style="height:40px;">

  <nav>
    <a href="#features">Features</a>
    <a href="#courses">Courses</a>
    <a href="#pricing">Pricing</a>
    <a href="{{ url('login')}}">Login</a>
    <a href="{{ url('student_dashboard')}}">Student Dashboard</a>
    <a href="{{ url('instructor_dashboard')}}">Instructor Dashboard</a>
  </nav>

  <div class="menu-btn" onclick="toggleMenu()">
    <div></div><div></div><div></div>
  </div>
</header>

<!-- OVERLAY for closing on outside click -->
<div class="overlay" id="overlay" onclick="toggleMenu()"></div>

<!-- MOBILE NAV -->
<div class="mobile-nav" id="mobileNav">
  <a href="#features" onclick="toggleMenu()">Features</a>
  <a href="#courses" onclick="toggleMenu()">Courses</a>
  <a href="#pricing" onclick="toggleMenu()">Pricing</a>
  <a href="#login" onclick="toggleMenu()">Login</a>
</div>

<!-- HERO -->
<section class="hero">
  <div class="hero-left">
    <img src="https://kshitizkumar.com/assets/img/klogo.png" class="hero-logo">
    <h1>Ek Hi Platform Par Sab Kuch Seekho</h1>
    <p>Coding, graphics, makeup, cooking, editing, business aur bahut kuch — sab kuch ek hi Platform par easily seekho.</p>
    <a class="btn" href="#pricing">Start Learning</a>
  </div>

  <img src="https://gana.kshitizkumar.com/lms/img/lmsbg.png" class="hero-right">
</section>

<!-- FEATURES -->
<section id="features">
  <h2 class="section-title">Kyu Choose Karein Hamara Platform?</h2>

  <div class="features-grid">
    <div class="feature">
      <h3>All-in-One Courses</h3>
      <p>Ek hi subscription me coding, graphics, makeup, cooking & aur bhi bohot kuch seekho.</p>
    </div>
    <div class="feature">
      <h3>HD Video Classes</h3>
      <p>Har device par crystal-clear video experience ka maza lo.</p>
    </div>
    <div class="feature">
      <h3>Learn Anytime</h3>
      <p>24/7 learning — kabhi bhi aur kahin bhi seekho.</p>
    </div>
    <div class="feature">
      <h3>Fast Support</h3>
      <p>Ham aapke doubts ka instant jawab dete hain.</p>
    </div>
  </div>
</section>




<!-- COURSES -->
<section id="courses">
  <h2 class="section-title">Top Courses</h2>
  <div class="courses-grid">
    <div class="course-card">
      <img src="https://picsum.photos/seed/web/500/300">
      <div class="c-body"><h4>Web Development</h4><p>Learn HTML, CSS, JS, React & more.</p><div class="price">$49</div></div>
    </div>

    <div class="course-card">
      <img src="https://picsum.photos/seed/design/500/300">
      <div class="c-body"><h4>Graphic Designing</h4><p>Photoshop, Illustrator, UI/UX & more.</p><div class="price">$39</div></div>
    </div>

    <div class="course-card">
      <img src="https://picsum.photos/seed/makeup/500/300">
      <div class="c-body"><h4>Makeup Masterclass</h4><p>Beauty, skincare & professional makeup.</p><div class="price">$29</div></div>
    </div>
  </div>
</section>

<!-- section  -->
<!-- POPULAR COURSES WITH WORKING TABS -->
<section id="popular-courses" style="padding:80px 6%; background:#0a0a0a; color:#fff; overflow:hidden;">

  <h2 class="section-title" style="color:#ed1d24; text-align:center; margin-bottom:50px;">
    Most Popular Courses
  </h2>

  <!-- TABS (NOW CENTERED ON DESKTOP + SCROLL ON MOBILE) -->
  <div class="tabs-scroll">
    <div class="tabs-wrapper">
      <button class="tab-btn active-tab" data-tab="web">Web Design</button>
      <button class="tab-btn" data-tab="dev">Development</button>
      <button class="tab-btn" data-tab="graphic">Graphic Design</button>
      <button class="tab-btn" data-tab="marketing">Marketing</button>
      <button class="tab-btn" data-tab="finance">Finance</button>
    </div>
  </div>

  <style>
    /* Outer scroll container */
    .tabs-scroll {
      overflow-x: auto;
      white-space: nowrap;
      padding-bottom: 10px;
      display: flex;
      justify-content: center;   /* DESKTOP CENTER FIX */
    }

    /* hide scrollbar */
    .tabs-scroll::-webkit-scrollbar { display: none; }

    /* inner wrapper */
    .tabs-wrapper {
      display: inline-flex;
      gap: 10px;
      background: #111;
      padding: 8px;
      border-radius: 50px;
      border: 1px solid rgba(255,255,255,0.06);
    }

    /* Tab Buttons */
    .tab-btn {
      padding: 10px 24px;
      background: #111;
      border-radius: 40px;
      color: #ccc;
      border: none;
      cursor: pointer;
      flex-shrink: 0;
      font-weight: 600;
      font-size: 14px;
      transition: 0.3s;
    }
    .tab-btn:hover { background:#151515; color:#fff; }
    .active-tab { background:#ed1d24 !important; color:#fff !important; }

    /* Mobile Fix - Scrollable */
    @media(max-width:600px){
      .tabs-scroll {
        justify-content: flex-start !important; /* Important mobile fix */
        padding-left: 8px;
      }
    }
  </style>

  <!-- TAB CONTENT WRAPPER -->
  <div id="tabContentWrapper" style="max-width:1300px; margin:auto; min-height:300px;">

    <!-- WEB -->
    <div class="tab-content active-tab-content" id="tab-web">
      <div class="popular-grid">

        <div class="popular-card">
          <img src="https://picsum.photos/seed/web1/500/300">
          <div class="pc-body">
            <span class="pc-tag">All Level</span>
            <h3>Modern Web Design Bootcamp</h3>
            <p>Learn advanced layouts, animations & responsive UI.</p>
            <div class="pc-rating">⭐⭐⭐⭐⭐ <span>4.8</span></div>
            <div class="pc-meta"><span>⏱ 10h</span><span>📚 22 lectures</span></div>
          </div>
        </div>

          <div class="popular-card">
          <img src="https://picsum.photos/seed/web1/500/300">
          <div class="pc-body">
            <span class="pc-tag">All Level</span>
            <h3>Modern Web Design Bootcamp</h3>
            <p>Learn advanced layouts, animations & responsive UI.</p>
            <div class="pc-rating">⭐⭐⭐⭐⭐ <span>4.8</span></div>
            <div class="pc-meta"><span>⏱ 10h</span><span>📚 22 lectures</span></div>
          </div>
        </div>


          <div class="popular-card">
          <img src="https://picsum.photos/seed/web1/500/300">
          <div class="pc-body">
            <span class="pc-tag">All Level</span>
            <h3>Modern Web Design Bootcamp</h3>
            <p>Learn advanced layouts, animations & responsive UI.</p>
            <div class="pc-rating">⭐⭐⭐⭐⭐ <span>4.8</span></div>
            <div class="pc-meta"><span>⏱ 10h</span><span>📚 22 lectures</span></div>
          </div>
        </div>


          <div class="popular-card">
          <img src="https://picsum.photos/seed/web1/500/300">
          <div class="pc-body">
            <span class="pc-tag">All Level</span>
            <h3>Modern Web Design Bootcamp</h3>
            <p>Learn advanced layouts, animations & responsive UI.</p>
            <div class="pc-rating">⭐⭐⭐⭐⭐ <span>4.8</span></div>
            <div class="pc-meta"><span>⏱ 10h</span><span>📚 22 lectures</span></div>
          </div>
        </div>

      </div>
    </div>

    <!-- DEV -->
    <div class="tab-content" id="tab-dev">
      <div class="popular-grid">

        <div class="popular-card">
          <img src="https://picsum.photos/seed/dev1/500/300">
          <div class="pc-body">
            <span class="pc-tag beginner">Beginner</span>
            <h3>Complete JavaScript Course</h3>
            <p>Master JS from basics to expert.</p>
            <div class="pc-rating">⭐⭐⭐⭐⭐ <span>4.7</span></div>
            <div class="pc-meta"><span>⏱ 12h</span><span>📚 30 lectures</span></div>
          </div>
        </div>

      </div>
    </div>

    <!-- GRAPHIC -->
    <div class="tab-content" id="tab-graphic">
      <div class="popular-grid">

        <div class="popular-card">
          <img src="https://picsum.photos/seed/graphic/500/300">
          <div class="pc-body">
            <span class="pc-tag beginner">Beginner</span>
            <h3>Photoshop Masterclass</h3>
            <p>Thumbnails, posters, retouching & more.</p>
            <div class="pc-rating">⭐⭐⭐⭐⭐ <span>4.5</span></div>
            <div class="pc-meta"><span>⏱ 8h</span><span>📚 18 lectures</span></div>
          </div>
        </div>

      </div>
    </div>

    <!-- MARKETING -->
    <div class="tab-content" id="tab-marketing">
      <div class="popular-grid">

        <div class="popular-card">
          <img src="https://picsum.photos/seed/market1/500/300">
          <div class="pc-body">
            <span class="pc-tag">All Level</span>
            <h3>Digital Marketing Crash Course</h3>
            <p>Ads, branding, SEO and more.</p>
            <div class="pc-rating">⭐⭐⭐⭐ <span>4.3</span></div>
            <div class="pc-meta"><span>⏱ 9h</span><span>📚 21 lectures</span></div>
          </div>
        </div>

      </div>
    </div>

    <!-- FINANCE -->
    <div class="tab-content" id="tab-finance">
      <div class="popular-grid">

        <div class="popular-card">
          <img src="https://picsum.photos/seed/finance1/500/300">
          <div class="pc-body">
            <span class="pc-tag">All Level</span>
            <h3>Personal Finance 101</h3>
            <p>Investing, budgeting & savings.</p>
            <div class="pc-rating">⭐⭐⭐⭐⭐ <span>4.9</span></div>
            <div class="pc-meta"><span>⏱ 4h</span><span>📚 10 lectures</span></div>
          </div>
        </div>

      </div>
    </div>

  </div>
</section>

<style>
  /* Tab content */
  .tab-content { display:none; animation:fade .4s; }
  .active-tab-content { display:block; }
  @keyframes fade { from {opacity:0;} to {opacity:1;} }

  /* Grid */
  .popular-grid {
    display:grid;
    grid-template-columns:repeat(auto-fill, minmax(230px,1fr));
    gap:20px;
  }

  .popular-card {
    background:#111;
    border-radius:12px;
    overflow:hidden;
    border:1px solid rgba(255,255,255,0.06);
    transition:0.3s;
  }

  .popular-card:hover { transform:scale(1.03); }

  .popular-card img {
    width:100%;
    height:170px;
    object-fit:cover;
  }

  .pc-body { padding:16px; }

  .pc-tag {
    padding:4px 10px;
    background:#222;
    color:#ed1d24;
    border-radius:6px;
    font-size:0.75rem;
    font-weight:700;
  }
  .pc-tag.beginner { color:#00ff88; }

  .pc-rating { color:#ffd966; margin:10px 0; }
  .pc-rating span { color:#ccc; margin-left:5px; }

  .pc-meta {
    display:flex;
    justify-content:space-between;
    color:#aaa;
    font-size:0.85rem;
  }
</style>

<script>
  const tabs = document.querySelectorAll(".tab-btn");
  const contents = document.querySelectorAll(".tab-content");

  tabs.forEach(btn => {
    btn.addEventListener("click", () => {
      tabs.forEach(t => t.classList.remove("active-tab"));
      contents.forEach(c => c.classList.remove("active-tab-content"));
      
      btn.classList.add("active-tab");
      document.getElementById("tab-" + btn.dataset.tab).classList.add("active-tab-content");
    });
  });
</script>


<!-- TAB SWITCHING SCRIPT -->
<script>
  const tabs = document.querySelectorAll(".tab-btn");
  const contents = document.querySelectorAll(".tab-content");

  tabs.forEach(btn => {
    btn.addEventListener("click", () => {

      // Remove active from all
      tabs.forEach(t => t.classList.remove("active-tab"));
      contents.forEach(c => c.classList.remove("active-tab-content"));

      // Add active to clicked
      btn.classList.add("active-tab");
      document.querySelector("#tab-" + btn.dataset.tab).classList.add("active-tab-content");
    });
  });
</script>






<!-- trending  -->

<section style="padding:80px 6%; background:#0f0f0f;">
    
    <h2 style="
        text-align:center;
        font-size:42px;
        font-weight:800;
        color:#b19e9e;
        margin-bottom:8px;
    ">
        Our Trending Courses
    </h2>

    <p style="
        text-align:center;
        color:#777;
        margin-bottom:50px;
    ">
        Check out most 🔥 courses in the market
    </p>

    <!-- GRID -->
    <div class="trend-grid">

        <!-- CARD 1 -->
        <div class="trend-card">
            <div class="trend-img">
                <span class="trend-badge-free">Free</span>
                <img src="https://picsum.photos/seed/t1/900/500">
            </div>

            <div class="trend-body">

                <div class="trend-tags">
                    <span class="tag blue">Design</span>
                    <span class="tag dark">Beginner</span>
                </div>

                <h3 class="trend-title">
                    The complete Digital Marketing Course - 8 Course in 1
                </h3>

                <div class="trend-info">
                    ⭐ 4.5 <span>(6500)</span>
                </div>

                <div class="trend-meta-row">
                    <span>⏱ 6h 56m</span>
                    <span>📚 82 lectures</span>
                </div>

                <div class="trend-author">
                    <img src="https://i.pravatar.cc/50?img=12">
                    <span>Larry Lawson</span>
                    <strong style="color:#00c853; margin-left:auto;">Free</strong>
                </div>

            </div>
        </div>

        <!-- CARD 2 -->
        <div class="trend-card">
            <div class="trend-img">
                <img src="https://picsum.photos/seed/t2/900/500">
            </div>

            <div class="trend-body">

                <div class="trend-tags">
                    <span class="tag blue">Development</span>
                    <span class="tag dark">All level</span>
                </div>

                <h3 class="trend-title">
                    Angular – The Complete Guide (2021 Edition)
                </h3>

                <div class="trend-info">
                    ⭐ 4.0 <span>(3500)</span>
                </div>

                <div class="trend-meta-row">
                    <span>⏱ 12h 45m</span>
                    <span>📚 65 lectures</span>
                </div>

                <div class="trend-author">
                    <img src="https://i.pravatar.cc/50?img=21">
                    <span>Billy Vasquez</span>
                    <strong style="color:#0091ea; margin-left:auto;">$255</strong>
                </div>

            </div>
        </div>

        <!-- CARD 3 -->
        <div class="trend-card">
            <div class="trend-img">
                <img src="https://picsum.photos/seed/t3/900/500">
            </div>

            <div class="trend-body">

                <div class="trend-tags">
                    <span class="tag blue">Design</span>
                    <span class="tag dark">Beginner</span>
                </div>

                <h3 class="trend-title">
                    Time Management Mastery: Do More, Stress Less
                </h3>

                <div class="trend-info">
                    ⭐ 4.5 <span>(2000)</span>
                </div>

                <div class="trend-meta-row">
                    <span>⏱ 24h 56m</span>
                    <span>📚 55 lectures</span>
                </div>

                <div class="trend-author">
                    <img src="https://i.pravatar.cc/50?img=31">
                    <span>Lori Stevens</span>
                    <strong style="color:#00c853; margin-left:auto;">$500</strong>
                </div>

            </div>
        </div>

    </div>
</section>


<style>

    .trend-grid {
        display:grid;
        grid-template-columns:repeat(auto-fit, minmax(300px, 1fr));
        gap:35px;
        max-width:1300px;
        margin:auto;
    }

    .trend-card {
        border-radius:12px;
        background:#000000;
        border:1px solid #eee;
        overflow:hidden;
        transition:0.3s;
    }

    .trend-card:hover { 
        transform:translateY(-6px);
        box-shadow:0 12px 30px rgba(0,0,0,0.08);
    }

    /* IMAGE */
    .trend-img {
        position:relative;
        width:100%;
        height:200px;
        overflow:hidden;
    }
    .trend-img img {
        width:100%;
        height:100%;
        object-fit:cover;
    }

    /* Free badge */
    .trend-badge-free {
        position:absolute;
        top:10px;
        left:10px;
        background:#000a;
        color:#fff;
        padding:6px 12px;
        font-size:12px;
        border-radius:4px;
    }

    .trend-body {
        padding:20px;
    }

    .trend-tags {
        display:flex;
        gap:8px;
        margin-bottom:10px;
    }

    .tag {
        padding:4px 10px;
        font-size:12px;
        border-radius:4px;
        color:#fff;
        font-weight:600;
    }

    .blue { background:#2196f3; }
    .dark { background:#333; }

    .trend-title {
        font-size:18px;
        font-weight:700;
        color:#c4bbbb;
        line-height:1.3;
        margin-bottom:12px;
    }

    .trend-info {
        font-size:15px;
        font-weight:600;
        color:#ff9800;
        margin-bottom:10px;
    }
    .trend-info span { color:#777; font-weight:400; }

    .trend-meta-row {
        display:flex;
        gap:15px;
        font-size:14px;
        color:#777;
        margin-bottom:20px;
    }

    /* Author row */
    .trend-author {
        display:flex;
        align-items:center;
        gap:10px;
        margin-top:5px;
    }
    .trend-author img {
        width:35px;
        height:35px;
        object-fit:cover;
        border-radius:50%;
    }
    .trend-author span {
        font-size:14px;
        font-weight:600;
        color:#a39999;
    }

</style>








<!-- FAQ SECTION -->
<section id="faq">
  <h2 class="section-title">Frequently Asked Questions</h2>

  <div class="faq-box">

    <div class="faq-item">
      <button class="faq-question">LMS subscription me kya-kya milega?</button>
      <div class="faq-answer">
        <p>Aapko coding, graphics, cooking, makeup, business – sabhi courses ka unlimited access milega.</p>
      </div>
    </div>

    <div class="faq-item">
      <button class="faq-question">Kya saare courses lifetime milte hain?</button>
      <div class="faq-answer">
        <p>Subscription active rahne tak aap unlimited videos dekh sakte hain.</p>
      </div>
    </div>

    <div class="faq-item">
      <button class="faq-question">Kya mobile par classes dekh sakta hoon?</button>
      <div class="faq-answer">
        <p>Haan, aap mobile, tablet, laptop – kisi bhi device par classes dekh sakte hain.</p>
      </div>
    </div>

    <div class="faq-item">
      <button class="faq-question">Refund policy kya hai?</button>
      <div class="faq-answer">
        <p>Agar aapko pasand nahi aata, to 7-days refund policy available hai.</p>
      </div>
    </div>

  </div>
</section>
<style>
    /* FAQ */
#faq {
  padding: 80px 6%;
}

.faq-box {
  max-width: 800px;
  margin: auto;
  display: flex;
  flex-direction: column;
  gap: 18px;
}

.faq-item {
  background: #111;
  border: 1px solid rgba(255,255,255,0.05);
  border-radius: 10px;
  overflow: hidden;
}

.faq-question {
  width: 100%;
  text-align: left;
  padding: 18px;
  background: transparent;
  border: none;
  color: #fff;
  font-size: 1.1rem;
  cursor: pointer;
  font-weight: 600;
  position: relative;
}

.faq-question::after {
  content: "+";
  position: absolute;
  right: 18px;
  font-size: 1.3rem;
}

.faq-item.active .faq-question::after {
  content: "-";
}

.faq-answer {
  max-height: 0;
  overflow: hidden;
  transition: .35s ease;
  background: #0d0d0d;
  padding: 0 18px;
}

.faq-item.active .faq-answer {
  max-height: 200px;
  padding: 18px;
}

</style>
<script>
  // Mobile Nav Auto Close on Outside Click
  document.addEventListener("click", function (e) {
    const nav = document.getElementById("mobileNav");
    const btn = document.querySelector(".menu-btn");

    if (nav.style.right === "0px" && !nav.contains(e.target) && !btn.contains(e.target)) {
      nav.style.right = "-100%";
    }
  });

  // FAQ Toggle
  document.querySelectorAll(".faq-question").forEach(btn => {
    btn.addEventListener("click", () => {
      const item = btn.parentElement;
      item.classList.toggle("active");
    });
  });
</script>









<section id="pricing" style="padding:80px 6%; background:#0a0a0a; color:#fff;">
  <h2 class="section-title" style="color:#00aaff; text-align:center; margin-bottom:50px;">Plans & Pricing</h2>

  <div class="pricing-grid" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px,1fr)); gap:24px; max-width:1200px; margin:auto;">
    
    <!-- Starter Plan -->
    <div class="pricing-box" style="background:#111; padding:30px; border-radius:12px; border:1px solid rgba(255,255,255,0.05); text-align:center;">
      <h3 style="font-size:1.5rem; margin-bottom:10px;">Starter</h3>
      <p style="color:#aaa; margin-bottom:20px;">For small teams getting started</p>
      <div style="font-size:2rem; font-weight:700; margin-bottom:15px;">$29<span style="font-size:1rem; font-weight:400;"> /user/month</span></div>
      <p style="color:#888; margin-bottom:20px;">Billed monthly</p>
      <ul style="list-style:none; padding:0; text-align:left; margin-bottom:25px;">
        <li style="margin-bottom:10px;">✔ Up to 10 team members</li>
        <li style="margin-bottom:10px;">✔ 5 GB storage per user</li>
        <li style="margin-bottom:10px;">✔ Basic reporting and analytics</li>
        <li style="margin-bottom:10px;">✔ Email support</li>
        <li style="margin-bottom:10px;">✔ Mobile app access</li>
      </ul>
      <a href="#" style="display:inline-block; padding:12px 25px; background:#00aaff; border-radius:8px; color:#fff; font-weight:600; transition:0.3s;">Start Free Trial</a>
      <p style="margin-top:10px; color:#666; font-size:0.85rem;">14-day free trial, no credit card required</p>
    </div>

    <!-- Professional Plan -->
    <div class="pricing-box" style="background:#111; padding:30px; border-radius:12px; border:2px solid #00aaff; text-align:center; position:relative;">
      <span style="position:absolute; top:-10px; left:50%; transform:translateX(-50%); background:#00aaff; color:#fff; padding:5px 12px; border-radius:5px; font-size:0.8rem; font-weight:600;">MOST POPULAR</span>
      <h3 style="font-size:1.5rem; margin-bottom:10px;">Professional</h3>
      <p style="color:#aaa; margin-bottom:20px;">For growing businesses</p>
      <div style="font-size:2rem; font-weight:700; margin-bottom:15px;">$59<span style="font-size:1rem; font-weight:400;"> /user/month</span></div>
      <p style="color:#888; margin-bottom:20px;">Billed monthly</p>
      <ul style="list-style:none; padding:0; text-align:left; margin-bottom:25px;">
        <li style="margin-bottom:10px;">✔ Unlimited team members</li>
        <li style="margin-bottom:10px;">✔ 50 GB storage per user</li>
        <li style="margin-bottom:10px;">✔ Advanced analytics and reporting</li>
        <li style="margin-bottom:10px;">✔ Priority email and chat support</li>
        <li style="margin-bottom:10px;">✔ Custom integrations</li>
        <li style="margin-bottom:10px;">✔ API access</li>
      </ul>
      <a href="#" style="display:inline-block; padding:12px 25px; background:#00aaff; border-radius:8px; color:#fff; font-weight:600; transition:0.3s;">Start Free Trial</a>
      <p style="margin-top:10px; color:#666; font-size:0.85rem;">14-day free trial, no credit card required</p>
    </div>

    <!-- Enterprise Plan -->
    <div class="pricing-box" style="background:#111; padding:30px; border-radius:12px; border:1px solid rgba(255,255,255,0.05); text-align:center;">
      <h3 style="font-size:1.5rem; margin-bottom:10px;">Enterprise</h3>
      <p style="color:#aaa; margin-bottom:20px;">For large organizations</p>
      <div style="font-size:1.8rem; font-weight:700; margin-bottom:15px;">Custom Pricing</div>
      <p style="color:#888; margin-bottom:20px;">Tailored to your needs</p>
      <ul style="list-style:none; padding:0; text-align:left; margin-bottom:25px;">
        <li style="margin-bottom:10px;">✔ Everything in Professional</li>
        <li style="margin-bottom:10px;">✔ Unlimited storage</li>
        <li style="margin-bottom:10px;">✔ Dedicated account manager</li>
        <li style="margin-bottom:10px;">✔ 24/7 phone support</li>
        <li style="margin-bottom:10px;">✔ Advanced security and compliance</li>
        <li style="margin-bottom:10px;">✔ Custom SLA and contracts</li>
      </ul>
      <a href="#" style="display:inline-block; padding:12px 25px; background:none; border:1px solid #00aaff; border-radius:8px; color:#00aaff; font-weight:600; transition:0.3s;">Contact Sales</a>
      <p style="margin-top:10px; color:#666; font-size:0.85rem;">Schedule a consultation with our team</p>
    </div>

  </div>
</section>


<!-- newsletter section -->

<!-- NEWSLETTER SECTION -->
<section style="
  background:#615531;
  padding:70px 20px;
  border-radius:15px;
  max-width:1100px;
  margin:80px auto;
  position:relative;
  overflow:hidden;
  box-shadow:0 8px 25px rgba(0,0,0,0.12);
">

  <!-- Background circles -->
  <div style="
    position:absolute; bottom:-40px; left:-40px;
    width:200px; height:11vh; border-radius:50%;
    background:#827961; opacity:0.75;
  "></div>

  <div style="
    position:absolute; bottom:-50px; right:-40px;
    width:260px; height:13vh; border-radius:50%;
    background:#9d9273; opacity:0.75;
  "></div>

  <div style="
    position:absolute; top:35px; left:48%;
    width:45px; height:45px; border-radius:50%;
    background:#776e56; opacity:0.7; transform:translateX(-50%);
  "></div>

  <!-- Floating Icons -->
  <img src="https://img.icons8.com/color/48/000000/atom-editor.png"
       style="position:absolute; top:40px; left:40px; transform:rotate(-15deg);" />

  <img src="https://img.icons8.com/color/48/000000/youtube-play.png"
       style="position:absolute; top:40px; right:40px; transform:rotate(10deg);" />

  <img src="https://img.icons8.com/color/48/000000/google-logo.png"
       style="position:absolute; bottom:40px; left:50%; transform:translateX(-50%) rotate(15deg);" />

  <!-- Heading -->
  <h2 style="
    text-align:center;
    font-size:2rem;
    font-weight:800;
    color:#fff;
    margin-bottom:30px;
  ">
    Subscribe to our Newsletter for<br>
    Newest Course Updates
  </h2>

  <!-- Email Form -->
  <div style="display:flex; justify-content:center; width:100%;">
    <form style="
        display:flex;
        flex-wrap:wrap;
        background:#fff;
        padding:5px;
        border-radius:50px;
        width:90%;
        max-width:500px;
    ">
      <input 
        type="email"
        placeholder="Enter your email"
        style="
          flex:1;
          padding:14px 20px;
          border:none;
          outline:none;
          border-radius:50px;
          font-size:1rem;
          min-width:200px;
        "
      >

      <button style="
        background:#17354d;
        color:#fff;
        padding:12px 28px;
        border:none;
        border-radius:40px;
        font-size:1rem;
        font-weight:600;
        cursor:pointer;
        flex-shrink:0;
      ">
        Subscribe!
      </button>
    </form>
  </div>

</section>

<!-- MOBILE FIX -->
<style>
@media (max-width: 600px) {
  section form {
    flex-direction: column !important;
    border-radius:25px !important;
    padding:10px !important;
  }
  section form button {
    width:100% !important;
    margin-top:10px;
    border-radius:30px !important;
  }
}
</style>



<!-- CERTIFICATE & BEST COURSES SECTION -->
<section style="padding: 60px 6%; background: #000000;">

  <div style="
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    max-width: 1200px;
    margin: auto;
  ">

    <!-- LEFT CARD -->
    <div style="
      background: #1d1e1f;
      padding: 40px;
      border-radius: 14px;
      display: flex;
      align-items: center;
      gap: 30px;
    " class="cert-card">

      <div class="cert-text">
        <h2 style="font-size: 28px; color:#a19a9a; margin-bottom:12px;">Earn a Certificate</h2>
        <p style="font-size: 16px; color:#888; margin-bottom:22px;">
          Get the right professional certificate<br> program for you.
        </p>

        <a href="#" style="
          background:#0d6efd;
          color:white;
          padding:12px 22px;
          font-size:16px;
          border-radius:6px;
          display:inline-block;
          text-decoration:none;
          font-weight:600;
        ">View Programs</a>
      </div>

      <img src="img/cert/cert1.png" class="cert-img">
    </div>


    <!-- RIGHT CARD -->
    <div style="
      background: #513e3e;
      padding: 40px;
      border-radius: 14px;
      display: flex;
      align-items: center;
      gap: 30px;
    " class="cert-card">

      <div class="cert-text">
        <h2 style="font-size: 28px; color:#e1dada; margin-bottom:12px;">Best Rated Courses</h2>
        <p style="font-size: 16px; color:#ddd; margin-bottom:22px;">
          Enroll now in the most popular and best<br> rated courses.
        </p>

        <a href="#" style="
          background:#f1b500;
          color:#000;
          padding:12px 22px;
          font-size:16px;
          border-radius:6px;
          display:inline-block;
          text-decoration:none;
          font-weight:600;
        ">View Courses</a>
      </div>

      <img src="img/cert/cert2.png" class="cert-img">
    </div>

  </div>
</section>

<style>
/* 🔥 DESKTOP FIX */
.cert-img {
  width: 240px;       /* Perfect size */
  max-width: 100%;
  height: auto;
  object-fit: contain;
}

/* 📱 MOBILE FIX */
@media (max-width: 768px) {
  .cert-card {
    flex-direction: column !important;
    text-align: center;
  }

  .cert-img {
    width: 100% !important;
    max-width: 260px;
    margin-top: 15px;
  }
}
</style>









<!-- DARK FOOTER -->
<footer style="background:#0d0d0d; padding:80px 6%; color:#ccc; border-top:1px solid rgba(255,255,255,0.05);">

  <div style="max-width:1300px; margin:auto; display:grid; grid-template-columns:repeat(auto-fit, minmax(230px,1fr)); gap:40px;">

    <!-- LOGO + ABOUT -->
    <div>
      <div style="display:flex; align-items:center; gap:10px; margin-bottom:15px;">
        <img src="https://kshitizkumar.com/assets/img/klogo.png" style="height:45px;">
        <h2 style="font-size:1.5rem; font-weight:900; color:#fff;">LMS</h2>
      </div>
      <p style="line-height:1.6; color:#aaa;">
        LMS education platform — built for modern learners with all-in-one courses & easy learning experience.
      </p>

      <!-- SOCIAL ICONS -->
      <div style="display:flex; gap:12px; margin-top:20px;">
        <a href="#" style="background:#1a1a1a; padding:10px; border-radius:8px;"><img src="https://img.icons8.com/ios-filled/20/ffffff/facebook.png"></a>
        <a href="#" style="background:#1a1a1a; padding:10px; border-radius:8px;"><img src="https://img.icons8.com/ios-filled/20/ffffff/instagram-new.png"></a>
        <a href="#" style="background:#1a1a1a; padding:10px; border-radius:8px;"><img src="https://img.icons8.com/ios-filled/20/ffffff/twitter.png"></a>
        <a href="#" style="background:#1a1a1a; padding:10px; border-radius:8px;"><img src="https://img.icons8.com/ios-filled/20/ffffff/linkedin.png"></a>
      </div>
    </div>

    <!-- COMPANY -->
    <div>
      <h3 style="color:#fff; margin-bottom:20px;">Company</h3>
      <ul style="list-style:none; padding:0; line-height:2;">
        <li><a href="#" style="color:#aaa;">About us</a></li>
        <li><a href="#" style="color:#aaa;">Contact us</a></li>
        <li><a href="#" style="color:#aaa;">News & Blogs</a></li>
        <li><a href="#" style="color:#aaa;">Library</a></li>
        <li><a href="#" style="color:#aaa;">Career</a></li>
      </ul>
    </div>

    <!-- COMMUNITY -->
    <div>
      <h3 style="color:#fff; margin-bottom:20px;">Community</h3>
      <ul style="list-style:none; padding:0; line-height:2;">
        <li><a href="#" style="color:#aaa;">Documentation</a></li>
        <li><a href="#" style="color:#aaa;">FAQ</a></li>
        <li><a href="#" style="color:#aaa;">Forum</a></li>
        <li><a href="#" style="color:#aaa;">Sitemap</a></li>
      </ul>
    </div>

    <!-- TEACHING -->
    <div>
      <h3 style="color:#fff; margin-bottom:20px;">Teaching</h3>
      <ul style="list-style:none; padding:0; line-height:2;">
        <li><a href="#" style="color:#aaa;">Become a teacher</a></li>
        <li><a href="#" style="color:#aaa;">How to guide</a></li>
        <li><a href="#" style="color:#aaa;">Terms & Conditions</a></li>
      </ul>
    </div>

    <!-- CONTACT -->
    <div>
      <h3 style="color:#fff; margin-bottom:20px;">Contact</h3>
      <p style="color:#aaa;">Toll Free: <span style="color:#fff;">+91 900 60 42011</span></p>
      <p style="font-size:0.85rem; color:#666;">(24/7)</p>

      <p style="margin-top:10px; color:#aaa;">
        Email: <span style="color:#fff;">kshitiz.ranchi@gmail.com</span>
      </p>

      <!-- APP BADGES -->
      <div style="display:flex; gap:10px; margin-top:15px;">
        <img src="svg/google-play.svg" style="height:45px; background:#000; padding:5px; border-radius:8px;">
        <img src="svg/app-store.svg" style="height:45px; background:#000; padding:5px; border-radius:8px;">
      </div>
    </div>

  </div>

  <hr style="border:0; border-top:1px solid rgba(255,255,255,0.05); margin:40px 0;">

  <!-- BOTTOM FOOTER ROW -->
  <div style="max-width:1300px; margin:auto; display:flex; flex-wrap:wrap; justify-content:space-between; color:#666; font-size:0.9rem;">
    
    <p>© 2025 LMS Platform — All Rights Reserved.</p>

    <div style="display:flex; gap:20px;">
      <a href="#" style="color:#aaa;">Terms of Use</a>
      <a href="#" style="color:#aaa;">Privacy Policy</a>
    </div>

  </div>

</footer>

<script>
  function toggleMenu() {
    let nav = document.getElementById("mobileNav");
    let overlay = document.getElementById("overlay");

    if (nav.style.right === "0px") {
      nav.style.right = "-100%";
      overlay.style.display = "none";
    } else {
      nav.style.right = "0px";
      overlay.style.display = "block";
    }
  }
</script>










<!-- scroll to top -->
<!-- Scroll To Top Button -->
<button id="scrollTopBtn" 
  style="
    position: fixed;
    bottom: 25px;
    right: 25px;
    width: 48px;
    height: 48px;
    background: #17354d;
    color: white;
    border: none;
    outline: none;
    cursor: pointer;
    border-radius: 50%;
    font-size: 20px;
    display: none;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 12px rgba(0,0,0,0.25);
    z-index: 9999;
  ">
  ↑
</button>
<script>
  const mybutton = document.getElementById("scrollTopBtn");

  window.onscroll = function() {
    if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
      mybutton.style.display = "flex";
    } else {
      mybutton.style.display = "none";
    }
  };

  mybutton.onclick = function() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  };
</script>

</body>
</html>
