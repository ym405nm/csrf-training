<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>パスワード確認</title>
</head>
<body>
<?php
session_start();
if (array_key_exists('id', $_SESSION) && !empty($_SESSION["id"])) {
    $isLogin = true;
    $id = $_SESSION['id'];
    $pwd = $_SESSION["pwd"];
} else {
    $isLogin = false;
}
if ($isLogin) : ?>
    <h1>あなたのパスワードは<?php echo htmlspecialchars($pwd, ENT_QUOTES, "utf-8") ?>です</h1>
<?php else: ?>
    <h1>ログインしていません</h1>
<?php endif; ?>
<a href="index.php">戻る</a>
</body>
</html>