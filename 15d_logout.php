<?php
session_start();
session_destroy();

header("Location: 15d_logout.php");

exit();
?>