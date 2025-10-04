<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillSwap</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="container">
            <a href="/" class="logo nav-link">SkillSwap ✨</a>
            <div class="nav-links">
                <a href="/" class="nav-link">Browse</a>
                <a href="/post" class="nav-link requires-auth">Post a Task</a>
            </div>
            <div class="nav-auth" id="nav-auth-logged-out">
                <a href="/login" class="login-btn nav-link">Login</a>
                <a href="/login" class="signup-btn nav-link" data-target-signup="true">Sign Up</a>
            </div>
            <div class="nav-auth hidden" id="nav-auth-logged-in">
                 <span class="welcome-user">Welcome, User!</span>
                <a href="#" id="logout-btn" class="logout-btn">Logout</a>
            </div>
        </nav>
    </header>

</body>
</html>