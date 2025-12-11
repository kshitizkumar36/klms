<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Settings - LMS</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>
/* --- THEME VARIABLES --- */
:root{
  --bg:#0c0f13;
  --card:#15171c;
  --text:#e7ecf2;
  --muted:#8e98a0;
  --border:#22252b;
  --accent:#0d6efd;
  --accent-hover:#0b5ed7;
  --danger:#dc3545;
  --radius:10px;
}

*{ margin:0; padding:0; box-sizing:border-box; font-family:"Inter",sans-serif; }

body{ background:var(--bg); color:var(--text); min-height:100vh; overflow-x:hidden; }

/* LAYOUT */
.layout{ display:flex; }

/* SIDEBAR */
.sidebar{
  width:260px; background:#111317; height:100vh; position:fixed; left:0; top:0;
  padding:22px; box-shadow:0 8px 25px rgba(0,0,0,0.35); z-index:9999; transition:transform .25s ease;
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
  position:sticky; top:0; z-index:50; border-bottom:1px solid var(--border); backdrop-filter:blur(10px);
}
.profile-icon img{ width:40px; height:40px; border-radius:10px; cursor:pointer; }
.hamburger{ display:none; cursor:pointer; font-size:24px; padding:5px 10px; background:#222; border-radius:6px; }

/* --- SETTINGS SPECIFIC STYLES --- */
.settings-container{
  max-width:1100px; margin:30px auto; width:95%;
  display:grid; grid-template-columns: 240px 1fr; gap:30px;
}

/* LEFT: SETTINGS NAV */
.settings-nav{
  background:var(--card); padding:15px; border-radius:var(--radius); border:1px solid var(--border);
  height:fit-content; position:sticky; top:100px;
}
.nav-item{
  display:block; width:100%; padding:12px 15px; color:var(--muted);
  text-align:left; background:none; border:none; border-radius:8px;
  font-weight:600; cursor:pointer; transition:0.2s; margin-bottom:5px;
}
.nav-item:hover{ background:#1e2129; color:#fff; }
.nav-item.active{ background:rgba(13, 110, 253, 0.15); color:var(--accent); }


/* RIGHT: CONTENT SECTIONS */
.settings-content{
  background:var(--card); padding:30px; border-radius:var(--radius); border:1px solid var(--border);
}
.section{ display:none; animation:fadeIn .4s forwards; }
.section.active{ display:block; }

@keyframes fadeIn{ from{opacity:0; transform:translateY(10px);} to{opacity:1; transform:translateY(0);} }

h2{ margin-bottom:5px; font-size:24px; }
.desc{ color:var(--muted); font-size:14px; margin-bottom:25px; border-bottom:1px solid var(--border); padding-bottom:15px; }

/* FORM ELEMENTS */
.form-group{ margin-bottom:20px; }
.form-group label{ display:block; color:var(--muted); font-size:13px; font-weight:600; margin-bottom:8px; }
.form-control{
  width:100%; background:#0c0f13; border:1px solid var(--border); color:#fff;
  padding:12px; border-radius:8px; font-size:14px; outline:none; transition:0.3s;
}
.form-control:focus{ border-color:var(--accent); }

.row{ display:flex; gap:20px; }
.col{ flex:1; }

/* AVATAR UPLOAD */
.avatar-upload{ display:flex; align-items:center; gap:20px; margin-bottom:30px; }
.current-avatar{ width:80px; height:80px; border-radius:50%; object-fit:cover; border:2px solid var(--border); }
.upload-btn{
  padding:8px 16px; background:#2a2d35; color:#fff; border:1px solid #333;
  border-radius:6px; cursor:pointer; font-size:13px; font-weight:600;
}
.upload-btn:hover{ background:#333; }

/* BUTTONS */
.btn-save{
  padding:12px 24px; background:var(--accent); color:#fff; border:none;
  border-radius:8px; font-weight:600; cursor:pointer; margin-top:10px;
}
.btn-save:hover{ background:var(--accent-hover); }

.btn-danger{
  padding:10px 16px; background:rgba(220, 53, 69, 0.1); color:var(--danger); border:1px solid var(--danger);
  border-radius:8px; font-weight:600; cursor:pointer;
}
.btn-danger:hover{ background:var(--danger); color:#fff; }

/* TOGGLE SWITCH */
.toggle-row{ display:flex; justify-content:space-between; align-items:center; padding:15px 0; border-bottom:1px solid #1e1f25; }
.toggle-info h4{ font-size:15px; margin-bottom:4px; }
.toggle-info p{ font-size:13px; color:var(--muted); }

.switch { position: relative; display: inline-block; width: 46px; height: 24px; }
.switch input { opacity: 0; width: 0; height: 0; }
.slider {
  position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0;
  background-color: #333; -webkit-transition: .4s; transition: .4s; border-radius: 34px;
}
.slider:before {
  position: absolute; content: ""; height: 18px; width: 18px; left: 3px; bottom: 3px;
  background-color: white; -webkit-transition: .4s; transition: .4s; border-radius: 50%;
}
input:checked + .slider { background-color: var(--accent); }
input:checked + .slider:before { transform: translateX(22px); }

/* BILLING TABLE */
.billing-table{ width:100%; border-collapse:collapse; margin-top:20px; }
.billing-table th{ text-align:left; color:var(--muted); font-size:12px; padding:10px; border-bottom:1px solid var(--border); }
.billing-table td{ padding:15px 10px; font-size:14px; border-bottom:1px solid #1e1f25; }
.status-paid{ color:#2ecc71; background:rgba(46, 204, 113, 0.1); padding:4px 8px; border-radius:4px; font-size:11px; font-weight:700; }

/* RESPONSIVE */
@media(max-width:900px){
  .sidebar{ transform:translateX(-100%); }
  .sidebar.show{ transform:translateX(0); }
  .main{ margin-left:0; width:100%; }
  .overlay{ position:fixed; inset:0; background:rgba(0,0,0,0.6); z-index:5000; display:none; }
  .overlay.show{ display:block; }
  .hamburger{ display:block; }
  
  .settings-container{ grid-template-columns:1fr; }
  .settings-nav{ display:flex; overflow-x:auto; padding:10px; gap:10px; position:static; margin-bottom:20px; }
  .nav-item{ white-space:nowrap; margin-bottom:0; width:auto; }
  .row{ flex-direction:column; gap:0; }
}
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
      <div style="font-weight:600;">Account Settings</div>
      <div class="profile-icon">
        <img src="https://i.pravatar.cc/150?img=36">
      </div>
    </div>

    <div class="settings-container fade">
      
      <div class="settings-nav">
        <button class="nav-item active" onclick="showTab('profile', this)">👤 Edit Profile</button>
        <button class="nav-item" onclick="showTab('security', this)">🔒 Password & Security</button>
        <button class="nav-item" onclick="showTab('notifications', this)">🔔 Notifications</button>
        <button class="nav-item" onclick="showTab('billing', this)">💳 Billing & History</button>
      </div>

      <div class="settings-content">
        
        <div id="profile" class="section active">
          <h2>Edit Profile</h2>
          <p class="desc">Update your personal information and public profile.</p>

          <div class="avatar-upload">
            <img src="https://i.pravatar.cc/150?img=36" class="current-avatar">
            <div>
              <button class="upload-btn">Upload New Photo</button>
              <p style="font-size:12px; color:var(--muted); margin-top:5px;">JPG or PNG. Max size of 2MB</p>
            </div>
          </div>

          <div class="row">
            <div class="col form-group">
              <label>First Name</label>
              <input type="text" class="form-control" value="Kshitiz">
            </div>
            <div class="col form-group">
              <label>Last Name</label>
              <input type="text" class="form-control" value="Kumar">
            </div>
          </div>

          <div class="form-group">
            <label>Headline</label>
            <input type="text" class="form-control" value="Full Stack Learner | Bangalore">
          </div>

          <div class="form-group">
            <label>Bio</label>
            <textarea class="form-control" rows="4">Coding, designing aur tech ka deewana! 🚀</textarea>
          </div>

          <button class="btn-save">Save Changes</button>
        </div>

        <div id="security" class="section">
          <h2>Password & Security</h2>
          <p class="desc">Manage your password and account security settings.</p>

          <div class="form-group">
            <label>Current Password</label>
            <input type="password" class="form-control" placeholder="••••••••">
          </div>

          <div class="row">
            <div class="col form-group">
              <label>New Password</label>
              <input type="password" class="form-control">
            </div>
            <div class="col form-group">
              <label>Confirm Password</label>
              <input type="password" class="form-control">
            </div>
          </div>

          <button class="btn-save">Update Password</button>

          <div style="margin-top:40px; border-top:1px solid #222; padding-top:20px;">
            <h3 style="color:var(--danger); font-size:16px; margin-bottom:10px;">Danger Zone</h3>
            <p style="font-size:13px; color:var(--muted); margin-bottom:15px;">Once you delete your account, there is no going back. Please be certain.</p>
            <button class="btn-danger">Delete Account</button>
          </div>
        </div>

        <div id="notifications" class="section">
          <h2>Notifications</h2>
          <p class="desc">Choose what we get in touch with you about.</p>

          <div class="toggle-row">
            <div class="toggle-info">
              <h4>Email Notifications</h4>
              <p>Get emails about course updates and announcements.</p>
            </div>
            <label class="switch">
              <input type="checkbox" checked>
              <span class="slider"></span>
            </label>
          </div>

          <div class="toggle-row">
            <div class="toggle-info">
              <h4>Promotional Emails</h4>
              <p>Receive offers and discounts on new courses.</p>
            </div>
            <label class="switch">
              <input type="checkbox">
              <span class="slider"></span>
            </label>
          </div>

          <div class="toggle-row">
            <div class="toggle-info">
              <h4>Discussion Replies</h4>
              <p>Notify me when an instructor answers my question.</p>
            </div>
            <label class="switch">
              <input type="checkbox" checked>
              <span class="slider"></span>
            </label>
          </div>
        </div>

        <div id="billing" class="section">
          <h2>Billing History</h2>
          <p class="desc">View your past transactions and invoices.</p>

          <div style="background:#1e2129; padding:15px; border-radius:8px; display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
            <div style="display:flex; gap:10px; align-items:center;">
              <span style="font-size:24px;">💳</span>
              <div>
                <div style="font-weight:600; font-size:14px;">Visa ending in 4242</div>
                <div style="font-size:12px; color:var(--muted);">Expiry 12/2026</div>
              </div>
            </div>
            <button style="background:transparent; color:var(--accent); border:none; cursor:pointer; font-weight:600;">Edit</button>
          </div>

          <table class="billing-table">
            <thead>
              <tr>
                <th>Date</th>
                <th>Course</th>
                <th>Amount</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Oct 24, 2024</td>
                <td>Next.js Full Course</td>
                <td>$12.99</td>
                <td><span class="status-paid">Paid</span></td>
                <td><a href="#" style="color:var(--muted);">📄</a></td>
              </tr>
              <tr>
                <td>Sep 10, 2024</td>
                <td>Figma UI/UX</td>
                <td>$15.00</td>
                <td><span class="status-paid">Paid</span></td>
                <td><a href="#" style="color:var(--muted);">📄</a></td>
              </tr>
              <tr>
                <td>Aug 05, 2024</td>
                <td>Python Bootcamp</td>
                <td>$9.99</td>
                <td><span class="status-paid">Paid</span></td>
                <td><a href="#" style="color:var(--muted);">📄</a></td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>

    </div>
  </div>
</div>

<script>
/* -----------------------------------
   TAB SWITCHING LOGIC
------------------------------------*/
function showTab(tabId, btn) {
  // 1. Hide all sections
  document.querySelectorAll('.section').forEach(el => el.classList.remove('active'));
  
  // 2. Remove active class from all buttons
  document.querySelectorAll('.nav-item').forEach(b => b.classList.remove('active'));

  // 3. Show target section
  document.getElementById(tabId).classList.add('active');

  // 4. Highlight clicked button
  btn.classList.add('active');
}

/* -----------------------------------
   MOBILE SIDEBAR (Common)
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