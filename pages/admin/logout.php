<?php
// File: pages/admin/logout.php
// Fungsi: Logout admin

session_start();
session_destroy();
header("Location: login.php");
exit;
?>