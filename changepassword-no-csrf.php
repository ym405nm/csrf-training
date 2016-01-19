<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>パスワード変更</title>
</head>
<body>
<?php
session_start();
$isSuccess = false;
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
    // トークン検証
    if (array_key_exists('token', $_POST) && ($_SESSION["token"] == $_POST["token"])) {
        $isValidToken = true;
        $isSuccess = true;
    } else {
        $isValidToken = false;
    }
    if ($isLogin && $isValidToken) {
        $_SESSION["pwd"] = $_POST["new_password"];
    }
} else {
    $isValidPost = false;
}
// トークン発行
$token = md5(microtime(true));
$_SESSION["token"] = $token;
?>
<?php if ($isSuccess) : ?>
    <h1>パスワードが変更されました</h1>
    <p>新しいパスワード : <?php echo htmlspecialchars($_SESSION["pwd"], ENT_QUOTES, "UTF-8"); ?></p>
<?php else: ?>
<?php if ($isPost && !$isValidToken): ?>
    <h1>操作が正しくありません</h1>
<?php endif; ?>
    <h1>パスワード変更</h1>
    <form action="" method="post">
        <input type="password" name="new_password">
        <input type="hidden" name="token" value="<?php echo $token; ?>">
        <input type="submit" value="送信">
    </form>
<?php endif; ?>
<a href="index.php">戻る</a>
</body>
</html>