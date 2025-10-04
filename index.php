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
                <a href="/login" class="login-btn nav-link requires-auth">Login</a>
                <a href="/login" class="signup-btn nav-link requires-auth" data-target-signup="true">Sign Up</a>
            </div>
            <div class="nav-auth hidden" id="nav-auth-logged-in">
                 <span class="welcome-user">Welcome, User!</span>
                <a href="#" id="logout-btn" class="logout-btn">Logout</a>
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

</body>
</html>