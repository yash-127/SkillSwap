# SkillSwap

**SkillSwap – Connect, Learn, & Accomplish.**  
A community-driven skill exchange platform built with **PHP**, **MySQL**, and **jQuery**.

---

## 🚀 Features

- 🧑‍💻 **User Authentication** – Login & Register using cookies  
- 🔍 **Browse Listings** – View random offers and requests from users  
- ⚡ **AJAX Navigation** – Pages load dynamically without full refresh  
- 💬 **Connect System** – View task details via `connect.php` using AJAX  
- 🧠 **User Profile Page** – Displays user details and their posted listings  
- 🔎 **Search Functionality** – AJAX-based search to filter tasks  
- 🎨 **Responsive UI** – Clean card layout with color-coded task types  
- 🧱 **Skeleton Loading** – Smooth transitions when navigating between sections  

---

## 📁 Project Structure

SkillSwap/
├── connect.php
├── homepage.php
├── index.php
├── login.php
├── logout.php
├── post.php
├── profile.php
├── record_insert.php
├── register.php
├── search.php
├── script.js
├── style.css
├── skillswap.sql
└── user-icon.jpg


### 🧩 Key Files

| File | Description |
|------|--------------|
| `index.php` | Main entry page for SkillSwap |
| `connect.php` | Loads task details dynamically using AJAX |
| `homepage.php` | Homepage section content |
| `profile.php` | Displays user info and their listings |
| `search.php` | AJAX search endpoint |
| `post.php` | Page for users to post offers or requests |
| `style.css` | Main styling file |
| `script.js` | Frontend logic for AJAX routing and skeletons |
| `skillswap.sql` | MySQL database schema |

---

## ⚙️ Setup & Installation

### 1️⃣ Clone this Repository
git clone https://github.com/yash-127/SkillSwap.git
cd SkillSwap

2️⃣ Create the Database
Open phpMyAdmin or your SQL CLI
Create a database named skillswap
Import the SQL dump file:
mysql -u root -p skillswap < skillswap.sql

3️⃣ Configure Database Connection
Check inside each PHP file (e.g., connect.php, profile.php, etc.) that your database credentials match:
$conn = mysqli_connect("localhost","root","","skillswap");

4️⃣ Run the Project
Place this folder inside your local web server directory:
XAMPP: C:\xampp\htdocs\SkillSwap
WAMP:  C:\wamp64\www\SkillSwap
Then open your browser and go to:
http://localhost/SkillSwap/index.php



💡 How It Works
🔸 1. Browse & Connect
Homepage shows all available offers and requests (randomized).
Each card displays:
The type (Offer in orange, Request in blue)
The topic, description, and user name.
When logged in, clicking Connect runs:
connectpage(taskCode)
This sends an AJAX request to connect.php with the task code and dynamically loads the full details.

🔸 2. Search
Typing into the search bar triggers an AJAX call to search.php?q=keyword
The results are shown instantly without page reload
Each card remains color-coded like the main listings

🔸 3. Profile Page
Accessible only when logged in
Shows your name, email, and all your posted tasks
Each task card includes a View button, which reuses the same connectpage() function as the Connect button



🧠 Technologies Used
Technology	Purpose
PHP	Backend scripting & DB interaction
MySQL	Database for user and task data
jQuery / AJAX	Dynamic page loading without refresh
HTML / CSS	UI layout & styling
Bootstrap Responsive layout base
FontAwesome / Custom icons	For UI icons and visuals


🔗 How This Project Helps
  🎓 College Collaboration: Students can offer tutoring, collaborate on projects, or exchange knowledge.
  🏘️ Community Engagement: Connect with local members to provide services or learn new hobbies.
  🤝 Peer-to-Peer Learning: Encourages skill sharing between individuals.
  🌱 Personal Growth: Helps users learn new skills and improve existing ones.
  🌐 Networking: Creates a community where everyone can give and receive value.



👥 Team SkillSwap
- Yash Joshi — Full-Stack Developer / Project Lead  
- Soham Pareek — Backend Support
- Jyoti Soni — Database & Connection Management



🏁 Future Enhancements

  💬 In-app messaging & chat system
  ⭐ User ratings & feedback
  📍 Geo-based skill discovery
  🎖️ Profile badges for verified users



💬 Made with ❤️ for Hackathons

Empowering communities through shared skills and collaboration.
✅ Profile badges for verified users


👨‍💻 Yash Joshi
GitHub: @yash-127

🌟 Star this repo if you like it!
👉 https://github.com/yash-127/SkillSwap

📜 License
This project is open-source and available under the MIT License.

⚡ SkillSwap is all about connecting people through learning and collaboration. Share what you know — learn what you don’t!
