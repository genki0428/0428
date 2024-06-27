<?php
session_start();
require_once(ROOT_PATH .'/0428/peoput/public/Controllers/Controller.php');
// require_once(ROOT_PATH .'/peoput/public/Controllers/Controller.php');
// require_once(ROOT_PATH .'/public/Controllers/Controller.php');
// require_once(ROOT_PATH .'/Controllers/Controller.php');
// require_once(ROOT_PATH .'../Controllers/Controller.php');
// require_once(ROOT_PATH .'../../Controllers/Controller.php');
$login = new Controller();
$result = $login->checkLogin();
if ($result) {
  header('Location: myPage.php');
  exit;
}
$loginMsg = $_SESSION;
$_SESSION = array();
session_destroy();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>ログイン</title>
    <link rel="stylesheet" type="text/css" href="/0428/peoput/public/css/base.css">
    <link rel="stylesheet" type="text/css" href="/0428/peoput/public/css/style.css">
  </head>
  <?php include "header.php"; ?>
  <body>
    <form action="myPage.php" method="post" id="form">
      <?php if (isset($loginMsg['Lmsg'])) : ?>
        <p class="pText" ><?php echo $loginMsg['Lmsg']; ?></p>
      <?php endif; ?>
      <input type="mail" placeholder="Mail Address" name="mail" style="background: #ffa9a9;">
      <input type="password" placeholder="Password" name="pass" style="background: #beffa9;">
      <div class="sendContainer">
        <input class="send" type="submit" value="login">
        <a class="top" href="top.php">top</a>
      </div>
      <div class="SPContainer">
        <div>
          <a style="
          font-size: 0.75rem;">登録がまだ　　　　　</a>
          <a class="SP" href="newUser.php">！ ！</a>
        </div>
        <div>
          <a style="
          font-size: 0.75rem;">パスワードを忘れた　</a>
          <a class="SP" href="passwordResetMail.php">？ ？</a>
        </div>
      </div>
    </form>
  </body>
  <?php include "footer.php"; ?>
</html>