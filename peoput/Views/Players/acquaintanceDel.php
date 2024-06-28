<?php
session_start();
require_once(dirname(__FILE__).'/../../Controllers/Controller.php');
$acquaintanceDel = new Controller();
$result2 = $acquaintanceDel->checkLogin();
if (!$result2) {
  echo "不正なリクエストです！";
?><a href="top.php">peoputトップへ</a><?php
  exit;
}
$acquaintanceDel->acquaintanceDel();
header("Location: acquaintanceAll.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>peoput_知人削除</title>
    <link rel="stylesheet" type="text/css" href="/0428/peoput/public/css/base.css">
    <link rel="stylesheet" type="text/css" href="/0428/peoput/public/css/style.css">
  </head>
  <body>
  </body>
</html>