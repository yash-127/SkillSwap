<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$user = isset($_COOKIE["admin"]) ? $_COOKIE["admin"] : null;

if (!$user) {
    echo "<script>openAuthModal();</script>";
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "skillswap");
if (!$conn) {
    echo "<div class='container'><p>Database connection failed: ".mysqli_connect_error()."</p></div>";
    exit;
}

// Get logged-in user's name
$userEmail = htmlspecialchars($user);
$rs = mysqli_query($conn, "SELECT * FROM admin WHERE email='$userEmail'");
$r = mysqli_fetch_array($rs);
$userName = $r ? $r["name"] : "Unknown";

// ✅ Get task code from AJAX
$taskCode = isset($_POST['id']) ? mysqli_real_escape_string($conn, $_POST['id']) : '';
if (!$taskCode) {
    echo "<div class='container'><p>No task selected.</p></div>";
    exit;
}

// Fetch task details
$taskQuery = mysqli_query($conn, "SELECT * FROM details WHERE code='$taskCode'");
$task = mysqli_fetch_assoc($taskQuery);
if (!$task) {
    echo "<div class='container'><p>Task not found.</p></div>";
    exit;
}

// Poster info
$rs1 = mysqli_query($conn, "SELECT * FROM admin WHERE email='".$task['user']."'");
$r1 = mysqli_fetch_array($rs1);
$taskPostedBy = $r1 ? htmlspecialchars($r1['name']) : "Unknown";

// Task info
$taskTopic = htmlspecialchars($task['topic']);
$taskDesc = nl2br(htmlspecialchars($task['description']));
$taskStatus = htmlspecialchars($task['req_offer']);
$phone = htmlspecialchars($r1['phone']);
$taskEmail= htmlspecialchars($r1['email']);
$address = htmlspecialchars($r1['address']);
?>

<div id="connect-page" class="page">
    <div class="container">
        <div class="connect-container">
            <div class="connect-details">
                <a onclick="homepage()" class="back-link nav-link">&larr; Back to Listings</a>
                <h2 id="connect-task-title"><?= $taskTopic ?></h2>
                <p class="task-meta">Posted by <strong id="connect-task-user"><?= $taskPostedBy ?></strong></p>
                <p id="connect-task-desc"><?= $taskDesc ?></p>
                <div class="task-status">Type: <?= $taskStatus ?></div>
            </div>
            <div class="connect-messaging">
                <div class="messages-window">
                    <div class="card">
                                <div class="card-header <?=$taskStatus?>"> Connection information </div>
                                <div class="card-body">
                                    <h3><?=$taskStatus?></h3>
                                    <p class="card-user"> by <?=$taskPostedBy?></p><br>
									<label><b>Phone Number :</b></label> <?=$phone?><br>
                                    <label><b>Email Address :</b></label> <?=$taskEmail?><br>
									<label><b>Present Address :</b> <?=$address?><br><br>
									<?php
										if($taskStatus == "request"){
											$sentense = " With Help of the above mentioned information , if anyone truly want to help me out , then Kindly Contact Me ! ";
										}
										else{
											$sentense = " If Anyone is willing and have great Sparkling Energy to learn Something New Like My topic . Then , Reach out to me with the help of above mentioned Information !";
										}
									?>
									<p><i><?=$sentense?></i></p>
                             </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
