<?php
session_start();
require_once(ROOT_PATH .'/Controllers/Controller.php');
$userDel = new Controller();
$userDel->userDel();
header("Location: myPageAdmin.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>peoput_知人削除</title>
    <link rel="stylesheet" type="text/css" href="/css/base.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>
  <body>
  </body>
</html>