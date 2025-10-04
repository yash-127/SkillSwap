<?php

   
    if(isset($_COOKIE["admin"])){
         $conn=mysqli_connect("localhost","root","","skillswap");
    $isUserLoggedIn = isset($_COOKIE['admin']);
    $userEmail = $isUserLoggedIn ? htmlspecialchars($_COOKIE['admin']) : '';

    $rs =Mysqli_query($conn,"select * from admin where email ='$userEmail'" );
    If($r=mysqli_fetch_array($rs)){
    $userName =$r["name"];
}
?>
<div id="post-page" class="page "><br>
                <div class="container form-container">
                   <form method="post" action="record_insert.php" class="post-form">
                        <h2>Create a New Listing</h2><br>
                        <div class="form-group toggle-group">
                            <label>Listing Type:</label>
                            <input type="radio" id="type-request" name="listing-type" value="request" checked>
                            <label for="type-request" class="toggle-btn">I Need Help (Request)</label>
                            <input type="radio" id="type-offer" name="listing-type" value="offer">
                            <label for="type-offer" class="toggle-btn">I Can Help (Offer)</label>
                        </div>
                        <div class="form-group"><label for="post-title">Title</label><input type="text" name="title" id="post-title" placeholder="e.g., 'Experienced Dog Walker Available'" required></div>
                        <div class="form-group"><label for="post-description">Description</label><textarea name="description" id="post-description" rows="4" placeholder="Provide more details..." required></textarea></div>
                        <div class="form-group"><label for="post-category">Category</label><select id="post-category" name="category" required><option value="" disabled selected>Select a category...</option><option value="home">Home & Garden</option><option value="tech">Tech & IT</option><option value="art">Art & Creation</option><option value="music">Music & insturments</option><option value="music">Others</option></select></div>
                        <button type="submit" class="btn btn-primary full-width">Post Your Listing</button>
                    </form>
                </div>
</div>


<?php
    }
    ?>