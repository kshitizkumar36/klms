<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Wishlist - LMS</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>
/* --- SAME THEME VARIABLES --- */
:root{
  --bg:#0c0f13;
  --card:#15171c;
  --text:#e7ecf2;
  --muted:#8e98a0;
  --accent:#0d6efd;
  --accent-hover:#0b5ed7;
  --danger:#dc3545;
  --warning:#ffc107;
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

/* SIDEBAR */
.sidebar{
  width:260px; background:#111317; height:100vh; position:fixed; left:0; top:0;
  padding:22px; box-shadow:var(--shadow); z-index:9999; transition:transform .25s ease;
}
.sidebar.hide{ transform:translateX(-100%); }
.sidebar .logo{ display:flex; align-items:center; gap:10px; margin-bottom:30px; }
.sidebar .logo img{ width:42px; }
.sidebar nav{ display:flex; flex-direction:column; gap:10px; }
.sidebar nav a{ color:var(--muted); padding:10px 14px; border-radius:10px; text-decoration:none; font-weight:600; transition:0.3s; }
.sidebar nav a:hover, .sidebar nav a.active{ background:#1e1f25; color:#fff; }

/* MAIN CONTENT */
.main{ margin-left:260px; width:calc(100% - 260px); transition:.3s; min-height:100vh; display:flex; flex-direction:column; }

/* TOPBAR */
.topbar{
  display:flex; justify-content:space-between; align-items:center;
  padding:14px 24px; background:rgba(17, 19, 23, 0.95);
  position:sticky; top:0; z-index:50; border-bottom:1px solid #1e1f25; backdrop-filter:blur(10px);
}
.search{ background:#1c1e24; padding:8px 14px; border-radius:10px; display:flex; gap:8px; align-items:center; }
.search input{ background:transparent; border:none; outline:none; width:250px; color:var(--text); }

/* --- WISHLIST SPECIFIC STYLES --- */
.content-padding{ padding:30px; max-width:1400px; margin:0 auto; width:100%; }

.page-header{ margin-bottom:30px; }
.page-header h1{ font-size:28px; font-weight:700; }
.page-header p{ color:var(--muted); margin-top:5px; }

/* Grid */
.wishlist-grid{
  display:grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap:24px;
}

/* Wishlist Card */
.w-card{
  background:var(--card); border-radius:var(--radius); overflow:hidden;
  box-shadow:var(--shadow); border:1px solid #1e1f25;
  display:flex; flex-direction:column; transition:0.3s;
}
.w-card:hover{ transform:translateY(-5px); border-color:var(--muted); }

.w-thumb{ height:170px; position:relative; overflow:hidden; }
.w-thumb img{ width:100%; height:100%; object-fit:cover; transition:0.5s; }
.w-card:hover .w-thumb img{ transform:scale(1.05); }

/* Badge */
.badge{
  position:absolute; top:10px; left:10px; background:var(--accent);
  color:#fff; padding:4px 10px; border-radius:6px; font-size:11px; font-weight:700;
  box-shadow:0 2px 10px rgba(0,0,0,0.3);
}

.w-body{ padding:20px; flex:1; display:flex; flex-direction:column; }

.w-cat{ font-size:11px; color:var(--accent); text-transform:uppercase; font-weight:700; margin-bottom:6px; }
.w-title{ font-size:17px; font-weight:700; line-height:1.4; margin-bottom:10px; }
.w-instructor{ font-size:13px; color:var(--muted); display:flex; align-items:center; gap:6px; margin-bottom:12px; }
.w-instructor img{ width:20px; height:20px; border-radius:50%; }

/* Ratings */
.rating{ color:var(--warning); font-size:13px; font-weight:600; margin-bottom:15px; display:flex; align-items:center; gap:4px; }
.rating span{ color:var(--muted); font-weight:400; font-size:12px; margin-left:4px; }

/* Price Row */
.price-row{ display:flex; align-items:baseline; gap:10px; margin-top:auto; padding-top:15px; border-top:1px solid #222; }
.current-price{ font-size:20px; font-weight:800; color:#fff; }
.old-price{ text-decoration:line-through; color:var(--muted); font-size:14px; }

/* Buttons */
.w-actions{ display:flex; gap:10px; margin-top:15px; }
.btn-cart{
  flex:1; background:var(--text); color:#000; border:none; padding:10px;
  border-radius:8px; font-weight:700; cursor:pointer; transition:0.2s;
}
.btn-cart:hover{ background:#fff; }

.btn-remove{
  width:42px; background:#1e1f25; color:#ff4d4d; border:1px solid #333;
  border-radius:8px; cursor:pointer; font-size:18px; display:flex; 
  align-items:center; justify-content:center; transition:0.2s;
}
.btn-remove:hover{ background:#2a1111; border-color:#5a1e1e; }

/* Empty State */
.empty-state{
  grid-column:1/-1; text-align:center; padding:60px 20px; 
  background:var(--card); border-radius:var(--radius); border:1px dashed #333;
}

/* RESPONSIVE */
@media(max-width:900px){
  .sidebar{ transform:translateX(-100%); }
  .sidebar.show{ transform:translateX(0); }
  .main{ margin-left:0; width:100%; }
  .overlay{ position:fixed; inset:0; background:rgba(0,0,0,0.6); z-index:5000; display:none; }
  .overlay.show{ display:block; }
  .hamburger{ display:block; cursor:pointer; font-size:24px; padding:5px 10px; background:#222; border-radius:6px; }
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
      <div class="search">🔍 <input type="text" placeholder="Search wishlist..."></div>
      <div class="profile-icon">
        <img src="https://i.pravatar.cc/150?img=36" style="width:40px;height:40px;border-radius:10px;">
      </div>
    </div>

    <div class="content-padding fade">
      
      <div class="page-header">
        <h1>My Wishlist</h1>
        <p>Saved courses you want to purchase later.</p>
      </div>

      <div class="wishlist-grid" id="wishlistContainer">
        </div>

    </div>
  </div>
</div>

<script>
/* -----------------------------------
   DUMMY DATA
------------------------------------*/
let wishlistData = [
  {
    id: 101,
    title: "Complete Python Bootcamp: Go from zero to hero",
    cat: "Programming",
    instructor: "Jose Portilla",
    avatar: "https://i.pravatar.cc/150?img=12",
    img: "https://picsum.photos/id/2/600/400",
    rating: 4.8,
    reviews: "12k",
    price: 12.99,
    oldPrice: 84.99,
    bestseller: true
  },
  {
    id: 102,
    title: "The Ultimate Guide to Game Development with Unity",
    cat: "Game Dev",
    instructor: "Jonathan Weinberger",
    avatar: "https://i.pravatar.cc/150?img=59",
    img: "https://picsum.photos/id/180/600/400",
    rating: 4.6,
    reviews: "3.2k",
    price: 15.99,
    oldPrice: 49.99,
    bestseller: false
  },
  {
    id: 103,
    title: "Adobe After Effects 2024: Beginners Tutorial",
    cat: "Design",
    instructor: "Daniel Scott",
    avatar: "https://i.pravatar.cc/150?img=3",
    img: "https://picsum.photos/id/90/600/400",
    rating: 4.9,
    reviews: "8k",
    price: 19.99,
    oldPrice: 19.99, // No discount example
    bestseller: true
  },
  {
    id: 104,
    title: "Machine Learning A-Z™: AI, Python & R",
    cat: "Data Science",
    instructor: "Kirill Eremenko",
    avatar: "https://i.pravatar.cc/150?img=60",
    img: "https://picsum.photos/id/20/600/400",
    rating: 4.7,
    reviews: "25k",
    price: 9.99,
    oldPrice: 94.99,
    bestseller: true
  }
];

/* -----------------------------------
   RENDER FUNCTION
------------------------------------*/
function renderWishlist() {
  const container = document.getElementById('wishlistContainer');
  container.innerHTML = "";

  // CHECK EMPTY STATE
  if (wishlistData.length === 0) {
    container.innerHTML = `
      <div class="empty-state">
        <h2 style="font-size:40px; margin-bottom:10px;">💔</h2>
        <h3>Your wishlist is empty</h3>
        <p style="color:var(--muted); margin-bottom:20px;">Explore courses and add them here to watch later.</p>
        <button onclick="window.location.href='dashboard.html'" 
          style="padding:10px 20px; background:var(--accent); color:#fff; border:none; border-radius:8px; cursor:pointer;">
          Browse Courses
        </button>
      </div>
    `;
    return;
  }

  // LOOP DATA
  wishlistData.forEach(item => {
    
    // Calculate Badge
    let badgeHTML = item.bestseller 
      ? `<div class="badge">Bestseller</div>` 
      : (item.price < item.oldPrice ? `<div class="badge" style="background:#dc3545">-80% OFF</div>` : '');

    // Price Logic
    let priceHTML = item.price < item.oldPrice 
      ? `<div class="current-price">$${item.price}</div> <div class="old-price">$${item.oldPrice}</div>`
      : `<div class="current-price">$${item.price}</div>`;

    let html = `
      <div class="w-card fade">
        <div class="w-thumb">
          <img src="${item.img}" alt="Course">
          ${badgeHTML}
        </div>
        
        <div class="w-body">
          <div class="w-cat">${item.cat}</div>
          <div class="w-title">${item.title}</div>
          
          <div class="w-instructor">
            <img src="${item.avatar}"> ${item.instructor}
          </div>

          <div class="rating">
            ⭐ ${item.rating} <span>(${item.reviews})</span>
          </div>

          <div class="price-row">
            ${priceHTML}
          </div>

          <div class="w-actions">
            <button class="btn-cart">Add to Cart</button>
            <button class="btn-remove" onclick="removeFromWishlist(${item.id})" title="Remove">🗑</button>
          </div>
        </div>
      </div>
    `;

    container.innerHTML += html;
  });
}

/* -----------------------------------
   REMOVE FUNCTION
------------------------------------*/
function removeFromWishlist(id) {
  if(confirm("Remove this course from your wishlist?")){
    wishlistData = wishlistData.filter(item => item.id !== id);
    renderWishlist();
  }
}

// Initial Render
renderWishlist();


/* -----------------------------------
   SIDEBAR TOGGLE (Mobile)
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