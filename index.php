<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>CSRF-Training</title>
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
    <h1>ログインしています</h1>
    <p>id:<?php echo htmlspecialchars($id, ENT_QUOTES, "utf-8") ?></p>
    <p><a href="changepassword.php">パスワード変更(CSRF有り版)</a></p>
    <p><a href="changepassword-no-csrf.php">パスワード変更(CSRF無し版)</a></p>
    <p><a href="chkpassword.php">現在のパスワードを表示する</a></p>
<?php else: ?>
    <h1>ログインしていません</h1>
<?php endif; ?>
<h2>登録/変更</h2>
<form action="login.php" method="post">
    <p>ID : <input type="text" name="id"></p>
    <p>パスワード : <input type="password" value=""></p>
    <input type="submit" value="送信">
</form>
</body>
</html>