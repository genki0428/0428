<?php
session_start();
require_once(ROOT_PATH .'/Controllers/Controller.php');
$login = new Controller();
if(!isset($_SESSION['login_user'])) {
  $login->login();
}
if($_SESSION["login_user"]['role'] === 1) {
  header("Location: myPageAdmin.php");
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>マイページ</title>
    <link rel="stylesheet" type="text/css" href="/css/base.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>
  <?php include "../Views/Players/header2.php"; ?>
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
    <form style="text-align: center;" action="logout.php" method="post">
      <input style="margin: unset;" class="top" type="submit" name="logout" value="logout">
    </form>
  </body>
  <?php include "../Views/Players/footer.php"; ?>
</html>