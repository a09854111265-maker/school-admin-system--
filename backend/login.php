<?php
session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // 固定帳號（示範用）
    if ($user === 'admin' && $pass === '1234') {
        $_SESSION['login'] = true;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = '帳號或密碼錯誤';
    }
}
?>

<h2>校務行政系統登入</h2>

<form method="post">
    帳號：<input type="text" name="username"><br><br>
    密碼：<input type="password" name="password"><br><br>
    <button type="submit">登入</button>
</form>

<p style="color:red"><?= $error ?></p>
