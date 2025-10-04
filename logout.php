<?php
setcookie("admin", "", time() - 3600, "index.php");

header("Location: index.php?logout=1");
exit();
?>