<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>パスワード変更</title>
</head>
<body>
<?php
session_start();
// ログインチェック
if (array_key_exists('id', $_SESSION) && !empty($_SESSION["id"])) {
    $isLogin = true;
    $id = $_SESSION['id'];
    $pwd = $_SESSION["pwd"];
} else {
    $isLogin = false;
}
// POST
$isPost = ($_SERVER["REQUEST_METHOD"] === "POST") ? true : false;
// POSTパラメータチェック
if (array_key_exists('new_password', $_POST) && !empty($_POST["new_password"])) {
    $isValidPost = true;
    if ($isLogin) {
        $_SESSION["pwd"] = $_POST["new_password"];
    }
} else {
    $isValidPost = false;
} ?>
<?php if ($isLogin && $isPost && $isValidPost) : ?>
    <h1>パスワードが変更されました</h1>
    <p>新しいパスワード : <?php echo htmlspecialchars($_SESSION["pwd"], ENT_QUOTES, "UTF-8"); ?></p>
<?php endif; ?>
<?php if ($isLogin && (!$isPost || !$isValidPost)): // ログインしている場合はフォームを出力する?>
    <h1>パスワード変更</h1>
    <form action="" method="post">
        <input type="password" name="new_password">
        <input type="submit" value="送信">
    </form>
<?php endif; ?>
<a href="index.php">戻る</a>
</body>
</html>