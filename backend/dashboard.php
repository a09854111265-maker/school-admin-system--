<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}
?>

<h1>後台首頁</h1>
<p>歡迎登入校務行政系統</p>

<a href="logout.php">登出</a>
