<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

$dataDir = __DIR__ . '/data';
$file = $dataDir . '/students.json';

// 如果資料夾不存在就建立
if (!is_dir($dataDir)) {
    mkdir($dataDir, 0777, true);
}

// 如果檔案不存在就建立
if (!file_exists($file)) {
    file_put_contents($file, json_encode([]));
}

$students = json_decode(file_get_contents($file), true);

// 新增學生
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $students[] = [
        'id' => time(),
        'name' => $_POST['name'],
        'class' => $_POST['class']
    ];
    file_put_contents($file, json_encode($students, JSON_PRETTY_PRINT));
    header('Location: students.php');
    exit;
}
?>


<h2>學生管理</h2>

<form method="post">
    姓名：<input name="name" required>
    班級：<input name="class" required>
    <button type="submit">新增學生</button>
</form>

<hr>

<table border="1" cellpadding="6">
<tr>
    <th>姓名</th>
    <th>班級</th>
    <th>操作</th>
</tr>

<?php foreach ($students as $s): ?>
<tr>
    <td><?= htmlspecialchars($s['name']) ?></td>
    <td><?= htmlspecialchars($s['class']) ?></td>
    <td>
        <a href="student_delete.php?id=<?= $s['id'] ?>">刪除</a>
    </td>
</tr>
<?php endforeach; ?>
</table>

<br>
<a href="dashboard.php">← 回後台</a>
