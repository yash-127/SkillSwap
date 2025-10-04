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
        <div  class="nav-auth <?php if ($isUserLoggedIn) echo 'hidden'; ?>" id="nav-auth-logged-out">
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

     <main>
        <div id="main-content">
            <section id="home-page" class="page">
                <!-- Hero Section -->
                <section class="hero">
                    <div class="hero-content">
                        <h1>Connect, Learn, & Accomplish.</h1>
                        <p>Your community's talent is just a click away. Offer your skills or find the help you need, right in your neighborhood.</p>
                        <div class="hero-search">
                            <input type="text" id="searchInput" placeholder="Search for 'guitar', 'moving', 'tutoring'...">
                            <button id="searchBtn">Search</button>

                        </div>
                    </div>
                </section>

                 <!-- Browse Listings Section -->
                <section id="browse" class="listings-section">
                    <div class="container">
                       <h2>Explore Local Opportunities</h2>
                        <div class="listings-grid">
                               <!-- Card 1: Offer -->
                                <?php
								$conn =mysqli_connect("localhost","root","","skillswap");
								if(isset($_COOKIE["admin"])){
									$loginUser=$_COOKIE["admin"];
									$query = "select * from details where user<>'$loginUser' order by sn ";
								}
								else{
									$query = "select * from details order by rand()";
								}
								$rs = mysqli_query($conn,$query);
								while($r=mysqli_fetch_array($rs)){
									$useremail = $r["user"];
									$rs1 =mysqli_query($conn,"select * from admin where email ='$useremail'");
									if($r1=mysqli_fetch_array($rs1)){
										$name =$r1["name"];
									}
							?>
                            <div class="card" data-task-id="1" data-title="<?=$r["topic"]?>" data-user="<?=$name?>" data-desc="<?=$r["description"]?>">
                                <div class="card-header <?=$r["req_offer"]?>"><?=$r["req_offer"]?></div>
                                <div class="card-body">
                                    <h3><?=$r["topic"]?></h3>
                                    <p class="card-user"><?=$name?></p>
                                    <p><?=$r["description"]?></p>
                                </div>
										<div class="card-footer">
										<?php if ($isUserLoggedIn): ?>
                            <p onclick="connectpage('<?= $r['code'] ?>')" class="btn btn-primary connect-btn">Connect</p>
                        <?php else: ?>
                            <p class="btn btn-primary connect-btn requires-auth">Connect</p>
                        <?php endif; ?>

                                </div>
                            </div>
							<?php
								}
								?>
                          
                        </div>
                    </div>
                </section>
            </section>

           
        </div>
        
    </main>


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
<!-- Signup Form -->
                <form  method="post" action="register.php" class="auth-form" id="signup-form" style="display: none;">
                    <h2>Join SkillSwap ✨</h2><br>
                    <div class="form-group"><label for="signup-name">Full Name</label><input type="text" name="name" id="signup-name" required></div>
                    <div class="form-group"><label for="signup-email">Email</label><input type="email" name="email" id="signup-email" required></div>
                    <div class="form-group"><label for="signup-password">Password</label><input type="password" name="password" id="signup-password" required></div>
					<div class="form-group"><label for="signup-phone">Phone No.</label><input type="text" name="phone" id="signup-phone" required></div>
					<div class="form-group"><label for="signup-address">Address</label><input type="text" name="address" id="signup-address" required></div>
                    <button type="submit" class="btn btn-primary full-width">Create Account</button>
                    <p class="auth-toggle-link">Already have an account? <a href="#" id="show-login">Log in</a></p>
                </form>
            </div>
        </div>
    </div>


    <script src="script.js"></script>
</body>
</html>