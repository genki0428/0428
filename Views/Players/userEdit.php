<?php
session_start();
require_once(ROOT_PATH .'/Controllers/Controller.php');
$userData = new Controller();
$result2 = $userData->checkLogin();
if (!$result2) {
  echo "不正なリクエストです！";
?><a href="top.php">peoputトップへ</a><?php
  exit;
}
$result = $userData->userData();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>ユーザー編集</title>
    <link rel="stylesheet" type="text/css" href="/css/base.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>
  <?php include "../Views/Players/header2.php"; ?>
  <body>
    <div class="container1" style="
    text-align: center;
    margin: 60px 20px;">
    <p class="pText" style="
    font-size: 1.3rem;">ユーザー一覧</p>
    <form action="userEditSend.php" method="post">
      <table>
        <tr style="background-color: unset;">
          <th>ID</th>
          <td><input type="text" name="id" value="<?=$result['id'] ?>" style="border: revert; margin: unset;"></td>
        </tr>
        <tr>
          <th>名前</th>
          <td><input type="text" name="name" value="<?=$result['name'] ?>" style="border: revert; margin: unset;"></td>
        </tr>
        <tr style="background-color: unset;">
          <th>メールアドレス</th>
          <td><input type="text" name="email" value="<?=$result['email'] ?>" style="border: revert; margin: unset;"></td>
        </tr>
      </table>
        <div class="sendContainer">
          <input class="send" type="submit" value="変更" style="margin: unset;">
          <a class="top" href="myPageAdmin.php" style="
          display: inline-block;">my page</a>
        </div>
    </form>
    </div>
  </body>
  <?php include "../Views/Players/footer.php"; ?>
</html>