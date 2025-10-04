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
                    <div class="message received">
                        <p>Hi there! I saw your post. I'd be happy to help out.</p>
                        <span class="message-time">10:41 AM</span>
                    </div>
                    <div class="message sent">
                        <p>That's great! Thanks for reaching out. When would you be free?</p>
                        <span class="message-time">10:42 AM</span>
                    </div>
                </div>
                <div class="message-input-area">
                    <input type="text" placeholder="Type your message...">
                    <button class="btn btn-primary">Send</button>
                </div>
            </div>
        </div>
    </div>
</div>
