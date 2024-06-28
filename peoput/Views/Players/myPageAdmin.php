<?php
session_start();
require_once(dirname(__FILE__).'/../../Controllers/Controller.php');
$login = new Controller();
$result2 = $login->checkLogin();
if (!$result2) {
  echo "不正なリクエストです！";
?><a href="top.php">peoputトップへ</a><?php
  exit;
}
$result = $login->userList();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>adminマイページ</title>
    <link rel="stylesheet" type="text/css" href="/0428/peoput/public/css/base.css">
    <link rel="stylesheet" type="text/css" href="/0428/peoput/public/css/style.css">
  </head>
  <?php include "header2.php"; ?>
  <body>
    <p class="welcome">Welcome!　Esq.<?php echo $_SESSION['login_user']['name']; ?></p>
    <div class="menuContainer">
      <a class="menu" style="
      background: #d075ff;" href="acquaintanceAll.php">all</a>
      <a class="menu" style="
      background: #75ccff;" href="search.php">search</a>
      <a class="menu" style="
      background: #75ff79;" href="newAcquaintance.php">regist</a>
    </div>    
    <div class="container1" style="
    text-align: center;
    margin: 60px 20px;">
      <div>
        <p class="pText" style="
        font-size: 1.3rem;">ユーザー一覧</p>
        <table>
          <tr>
            <th>ID</th>
            <th>名前</th>
            <th>メールアドレス</th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
          <?php foreach($result as $userList):?>
          <tr>
            <td><?=$userList['id'] ?></td>
            <td><?=$userList['name'] ?></td>
            <td><?=$userList['email'] ?></td>
            <td>
              <a href ="userEdit.php?id=<?=$userList['id'] ?>">
                <span class="tooltip">
                  <img class="buttonimg" src="/0428/peoput/public/img/編集.png">
                  <span class="description">項目の編集</span>
                </span>
              </a>
            </td>
            <td>
              <a onclick="func(<?=$userList['id'] ?>)">
                <span class="tooltip">
                  <img class="buttonimg" src="/0428/peoput/public/img/削除.png"
                  ><span class="description">項目の削除</span>
                </span>
              </a>
            </td>
          <?php endforeach; ?>
        </table>
      </div>
      <form style="text-align: center;" action="logout.php" method="post">
        <input style="margin: unset;" class="top" type="submit" name="logout" value="logout">
      </form>
    </div>
    <script src="/0428/peoput/public/js/myPageAdmin.js"></script>
  </body>
  <?php include "footer.php"; ?>
</html>