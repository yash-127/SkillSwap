<?php

    // Check if the user is logged in by looking for the 'admin' cookie
   
    if(isset($_COOKIE["admin"])){
         $conn=mysqli_connect("localhost","root","","skillswap");
    $isUserLoggedIn = isset($_COOKIE['admin']);
    // Get the user's email from the cookie if they are logged in
    $userEmail = $isUserLoggedIn ? htmlspecialchars($_COOKIE['admin']) : '';

    $rs =Mysqli_query($conn,"select * from admin where email ='$userEmail'" );
    If($r=mysqli_fetch_array($rs)){
    $userName =$r["name"];
}
?>

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

                 <!-- Browse Listings Section -->
                <section id="browse" class="listings-section">
                    <div class="container">
                       <h2>Explore Local Opportunities</h2>
                        <div class="listings-grid">
                               <!-- Card 1: Offer -->
							<?php
								$conn =mysqli_connect("localhost","root","","skillswap");
								$rs = mysqli_query($conn," select * from details order by rand() ");
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


                

<?php
    }
    ?>