<?php
session_start();
require_once(dirname(__FILE__).'/../../Controllers/Controller.php');
$userDel = new Controller();
$userDel->userDel();
header("Location: myPageAdmin.php");
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