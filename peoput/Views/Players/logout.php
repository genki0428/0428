<?php
session_start();
require_once(dirname(__FILE__).'/../../Controllers/Controller.php');
$logout = new Controller();

// postにlogoutが入って”いなかった”ら！
if (!$Flogout = filter_input(INPUT_POST, 'logout')) {
  echo "不正なリクエストです！";
  ?><a href="top.php">peoputトップへ</a><?php
  exit;
}

//ログインしているか判定し、セッションが切れていたらログインしてくださいとメッセージを出す。
$result = $logout->checkLogin();
if (!$result) {
  echo 'セッションが切れました、ログインしなおしてください。';
?><a href="login.php">ログイン画面へ</a><?php
  exit;
}

//ログアウト
$logout->searchTblDel();
$logout->logout();
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>オブジェクト指向 - ログアウト</title>
    <link rel="stylesheet" type="text/css" href="/0428/peoput/public/css/base.css">
    <link rel="stylesheet" type="text/css" href="/0428/peoput/public/css/style.css">
  </head>
  <?php include "header.php"; ?>
  <body>
    <div class="backCntainer">
      <p class="pText">ログアウトしました。</p>
      <a class="top" href="login.php" style="
      display: block;
      margin: 50px auto;
      background-color: white;
      color: black;">login</a>
    </div>
  </body>
  <?php include "footer.php"; ?>
<html>