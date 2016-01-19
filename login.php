<!doctype html>
<html>
<head>
    <title>ログイン</title>
    <meta charset="utf-8">
</head>
<body>
<?php
session_start();
$id = @$_POST["id"];
$pwd = @$_POST["password"];
if (!$id) {
    $id = "matsumoto";
}
if (!$pwd) {
    $pwd = "password";
}
$_SESSION["id"] = $id;
$_SESSION["pwd"] = $pwd;
?>
ログインしました(id:<?php echo
htmlspecialchars($id, ENT_NOQUOTES, "UTF-8"); ?>)<br>
<a href="index.php">戻る</a>
</body>
</html>