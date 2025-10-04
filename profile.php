<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$user = isset($_COOKIE["admin"]) ? $_COOKIE["admin"] : null;

if (!$user) {
    echo "<script>alert('Please log in to view your profile'); window.location='index.php';</script>";
    exit;
}
$conn = mysqli_connect("localhost","root","","skillswap");
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$userEmail = htmlspecialchars($user);
$rs = mysqli_query($conn, "SELECT * FROM admin WHERE email='$userEmail'");
$r = mysqli_fetch_array($rs);

$userName = $r ? $r['name'] : "Unknown";
$userEmail = $r ? $r['email'] : "Unknown";

//hackathon ke liye br br 


?>

        <section class="profile-section container"><br><br><br><br><br> 
            <h2>Your Profile</h2>
            <div class="profile-info">
                <p><strong>Name:</strong> <?= htmlspecialchars($userName) ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($userEmail) ?></p>
            </div>
        </section><br><br><br>

        <section class="profile-section container">
            <h2>Your Listings</h2><br>
            <div class="listings-grid">
                <?php
                $taskQuery = mysqli_query($conn, "SELECT * FROM details WHERE user='$userEmail' ORDER BY sn DESC");
                if(mysqli_num_rows($taskQuery) > 0){
                    while($task = mysqli_fetch_array($taskQuery)){
                        $taskTopic = htmlspecialchars($task['topic']);
                        $taskDesc = htmlspecialchars($task['description']);
                        $taskType = htmlspecialchars($task['req_offer']);
                        $taskCode = htmlspecialchars($task['code']);
                ?>
                <div class="card" data-task-id="<?= $taskCode ?>" data-title="<?= $taskTopic ?>" data-user="<?= $userName ?>" data-desc="<?= $taskDesc ?>" data-type="<?= $taskType ?>">
                    <div class="card-header"><?= $taskType ?></div>
                    <div class="card-body">
                        <h3><?= $taskTopic ?></h3>
                        <p class="card-user"><?= $userName ?></p>
                        <p><?= $taskDesc ?></p>
                    </div>
                    <div class="card-footer">
                        <p class="btn btn-primary connect-btn" onclick="connectpage('<?= $taskCode ?>')">View</p>

                    </div>
                </div>
                <?php
                    }
                } else {
                    echo "<p>You haven't posted any tasks yet.</p>";
                }
                ?>
            </div>
        </section>
   
