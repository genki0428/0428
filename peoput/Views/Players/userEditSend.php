<?php
session_start();
require_once(dirname(__FILE__).'/../../Controllers/Controller.php');
$userEdit = new Controller();
$userEdit->userEdit();
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