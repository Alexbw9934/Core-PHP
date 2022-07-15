<?php
ob_start();
session_start();
session_destroy();
header("Location: https://pistolapps.com/sports/index.php");
exit;
?>