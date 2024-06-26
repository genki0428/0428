<?php
session_start();
require_once(ROOT_PATH .'/Controllers/Controller.php');
$createTb = new Controller();
$result2 = $createTb->checkLogin();
if (!$result2) {
  echo "不正なリクエストです！";
?><a href="top.php">peoputトップへ</a><?php
  exit;
}
$createTb->addNewAcquaintance();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>知人登録完了</title>
    <link rel="stylesheet" type="text/css" href="/css/base.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>
  <?php include "../Views/Players/header.php"; ?>
  <body>
    <div class="container1" style="
    text-align: center;
    margin: 60px 20px;">
      <a class="menu" style="
      background: #d075ff;
      margin: 20px auto;">regist</a>
      <p class="pText">COMPLETE !</p>
      <div class="sendContainer" style="
      width: 400px;
      margin: 50px auto;">
        <a class="top" href="newAcquaintance.php" style="
        background: #d075ff;
        border: none;">re regist</a>
        <a class="top" href="myPage.php">my page</a>
      </div>
    </div>
  </body>
  <?php include "../Views/Players/footer.php"; ?>
</html>