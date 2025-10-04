<?php
    // Check if the user is logged in by looking for the 'admin' cookie
    $conn=mysqli_connect("localhost","root","","skillswap");
    $isUserLoggedIn = isset($_COOKIE['admin']);
    // Get the user's email from the cookie if they are logged in
    $userEmail = $isUserLoggedIn ? htmlspecialchars($_COOKIE['admin']) : '';

    $rs =Mysqli_query($conn,"select * from admin where email ='$userEmail'" );
    If($r=mysqli_fetch_array($rs)){
    $userName =$r["name"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillSwap</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
     <header>
    <nav class="container">
        <a onclick="homepage()" class="logo nav-link">SkillSwap ✨</a>
        <div class="nav-links">
            <p style="cursor:pointer;" onclick="homepage()" class="nav-link">Browse</p>
            <?php if ($isUserLoggedIn): ?>
                <p style="cursor:pointer;" class="nav-link" onclick="postpage()">Post a Task</p>
            <?php else: ?>
                <p style="cursor:pointer;" class="nav-link requires-auth">Post a Task</p>
            <?php endif; ?>
        </div>

        <!-- Logged-out Links -->
        <div class="nav-auth <?php if ($isUserLoggedIn) echo 'hidden'; ?>" id="nav-auth-logged-out">
            <a style="cursor:pointer;" class="login-btn nav-link requires-auth">Login</a>
            <a style="cursor:pointer;" class="signup-btn nav-link requires-auth" data-target-signup="true">Sign Up</a>
        </div>

        <!-- Logged-in Links -->
        <div class="nav-auth <?php if (!$isUserLoggedIn) echo 'hidden'; ?>" id="nav-auth-logged-in">
            <span class="welcome-user">Welcome, <?php echo htmlspecialchars($userName); ?>!</span>

            <!-- Profile Icon -->
            <p onclick="profile()" class="profile-icon <?php if (!$isUserLoggedIn) echo 'requires-auth'; ?>" title="View Profile">
                <img src="user-icon.jpg" alt="Profile" style="width:32px; height:32px; border-radius:50%; margin-left:8px;">
            </p>

            <a href="logout.php" id="logout-btn" class="logout-btn">Logout</a>
        </div>
    </nav>
</header>

    <div id="main-content">
         <section id="home-page" class="page">
                <!-- Hero Section -->
                <section class="hero">
                    <div class="hero-content">
                        <h1>Connect, Learn, & Accomplish.</h1>
                        <p>Your community's talent is just a click away. Offer your skills or find the help you need, right in your neighborhood.</p>
                        <div class="hero-search">
                            <input type="text" id="searchInput" placeholder="Search for 'guitar', 'moving', 'tutoring'...">
                            <button>Search</button>
                        </div>
                    </div>
                </section>

                 <section id="browse" class="listings-section">
                    <div class="container">
                        <h2>Explore Local Opportunities</h2>
                        <div class="listings-grid">
                             <!-- Card 1: Offer -->
                            <div class="card" data-task-id="1" data-title="Basic Guitar Lessons" data-user="Alex P." data-desc="Learn chords and basic songs. Absolute beginners welcome!">
                                <div class="card-header offer">Offer</div>
                                <div class="card-body">
                                    <h3>Basic Guitar Lessons</h3>
                                    <p class="card-user">by Alex P.</p>
                                    <p>Learn chords and basic songs. Absolute beginners welcome!</p>
                                </div>
                                <div class="card-footer">
                                    <a href="/connect/1" class="btn btn-primary requires-auth connect-btn">Connect</a>
                                </div>
                            </div>
                            <!-- Card 2: Request -->
                            <div class="card" data-task-id="2" data-title="Need Help Moving a Couch" data-user="Maria G." data-desc="Looking for one strong person to help me move a couch this Saturday.">
                                <div class="card-header request">Request</div>
                                <div class="card-body">
                                    <h3>Need Help Moving a Couch</h3>
                                    <p class="card-user">by Maria G.</p>
                                    <p>Looking for one strong person to help me move a couch this Saturday.</p>
                                </div>
                                <div class="card-footer">
                                    <a href="/connect/2" class="btn btn-primary requires-auth connect-btn">Connect</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </section>


    </div>

    <div id="auth-modal" class="modal-overlay hidden">
        <div class="modal-content">
            <button id="close-modal-btn" class="close-btn">&times;</button>
            <div class="auth-form-wrapper" id="auth-wrapper">
               <!-- Login Form -->
                <form method="post" action="login.php" class="auth-form" id="login-form">
                    <h2>Welcome Back! </h2>
                    <div class="form-group"><label for="login-email">Email</label><input type="email" name="email" id="login-email" required></div>
                    <div class="form-group"><label for="login-password">Password</label><input type="password" name="password" id="login-password" required></div>
                    <button type="submit" class="btn btn-primary full-width">Login</button>
                    <p class="auth-toggle-link">No account yet? <a href="#" id="show-signup">Sign up</a></p>
                </form>
                <!-- Signup Form -->
                <form  method="post" action="register.php" class="auth-form" id="signup-form" style="display: none;">
                    <h2>Join SkillSwap ✨</h2><br>
                    <div class="form-group"><label for="signup-name">Full Name</label><input type="text" name="name" id="signup-name" required></div>
                    <div class="form-group"><label for="signup-email">Email</label><input type="email" name="email" id="signup-email" required></div>
                    <div class="form-group"><label for="signup-password">Password</label><input type="password" name="password" id="signup-password" required></div>
                    <button type="submit" class="btn btn-primary full-width">Create Account</button>
                    <p class="auth-toggle-link">Already have an account? <a href="#" id="show-login">Log in</a></p>
                </form>
            </div>
        </div>
    </div>


    <script src="script.js"></script>
</body>
</html>

