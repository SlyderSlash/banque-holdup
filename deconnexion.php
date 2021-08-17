<?php
session_start();
$_SESSION['token'] = null;
session_destroy();
header("Location: index.php");
?>