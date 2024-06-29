<?php
session_start();
require_once(dirname(__FILE__).'/../../Controllers/Controller.php');
// $acquaintanceEdit = new Controller();
// $result = $acquaintanceEdit->checkLogin();
// if (!$result) {
//   echo "不正なリクエストです！";
// ?><a href="top.php">peoputトップへ</a><?php
//   exit;
// }
$acquaintanceEdit->acquaintanceEdit();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>知人編集送信</title>
    <link rel="stylesheet" type="text/css" href="/0428/peoput/public/css/base.css">
    <link rel="stylesheet" type="text/css" href="/0428/peoput/public/css/style.css">
  </head>
  <body>
    <script>history.go(-2);</script>
  </body>
</html>