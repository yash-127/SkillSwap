<?php
$conn = mysqli_connect("localhost","root","","skillswap");
if (!$conn) die("DB Connection failed: ".mysqli_connect_error());

$query = isset($_GET['q']) ? mysqli_real_escape_string($conn, $_GET['q']) : '';

$sql = "SELECT d.*, a.name FROM details d 
        JOIN admin a ON d.user = a.email 
        WHERE d.topic LIKE '%$query%' OR d.description LIKE '%$query%' 
        ORDER BY rand()";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    while($r = mysqli_fetch_array($result)){
        $taskCode = htmlspecialchars($r['code']);
        $taskTopic = htmlspecialchars($r['topic']);
        $taskDesc = htmlspecialchars($r['description']);
        $taskType = htmlspecialchars($r['req_offer']); // Offer or Request
        $taskUser = htmlspecialchars($r['name']);
?>
<div class="card" data-task-id="<?= $taskCode ?>" data-title="<?= $taskTopic ?>" data-user="<?= $taskUser ?>" data-desc="<?= $taskDesc ?>" data-type="<?= $taskType ?>">
    <!-- Add the same class for color styling -->
    <div class="card-header <?= $taskType ?>"><?= $taskType ?></div>

    <div class="card-body">
        <h3><?= $taskTopic ?></h3>
        <p class="card-user"><?= $taskUser ?></p>
        <p><?= $taskDesc ?></p>
    </div>
    <div class="card-footer">
        <?php if (isset($_COOKIE['admin'])): ?>
            <p onclick="connectpage('<?= $taskCode ?>')" class="btn btn-primary connect-btn">Connect</p>
        <?php else: ?>
            <p class="btn btn-primary connect-btn requires-auth">Connect</p>
        <?php endif; ?>
    </div>
</div>
<?php
    }
} else {
    echo "<p>No results found for '<strong>".htmlspecialchars($query)."</strong>'</p>";
}
?>
