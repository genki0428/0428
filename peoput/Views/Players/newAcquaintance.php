<?php
session_start();
require_once(ROOT_PATH .'/Controllers/Controller.php');
$checkLogin = new Controller();
$result = $checkLogin->checkLogin();
if (!$result) {
  echo "不正なリクエストです！";
?><a href="top.php">peoputトップへ</a><?php
  exit;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>知人登録</title>
    <link rel="stylesheet" type="text/css" href="/css/base.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>
  <?php include "../Views/Players/header2.php"; ?>
  <body>
    <div class="container1" style="
    text-align: center;
    margin: 60px 20px;">
      <a class="menu" style="
      background: #d075ff;
      margin: 20px auto;">regist</a>
      <form action="acquaintanceComp.php" method="post" id="form" style="margin: 0 auto !important;">
        <input type="text" name="community" placeholder="community" style="background: #d075ff;">
        <input type="text" name="name" placeholder="name" style="background: #d075ff;">
        <?php
          echo "<div class='registForm'>\n";
          echo "<label for='age' style='margin-right: 30px;'>age</label>\n";
          echo "<select name='age' class='registSelect'>\n";
          echo "<option></option>\n";
          for($i=-50;$i<51;$i++){
          echo "<option value='$i'>$i</option>\n";
          }
          echo "</select>\n";
          echo "</div>";
        ?>
        <div class='registForm'>
          <label for="sex" style="margin-right: 30px;">sex</label>
          <select name="sex" class="registSelect">
            <option value="-">選択しない</option>
            <option value="M">男性</option>
            <option value="F">女性</option>
            <option value="X">第三の性</option>
          </select>
        </div>
        <input type="text" name="feature" placeholder="feature" style="background: #d075ff;">
        <input type="text" name="remarks" placeholder="remarks" style="background: #d075ff;">
        <textarea class="registTextarea" name="others" rows="5" cols="33" placeholder="others"></textarea>
        <div class="sendContainer">
          <input class="send" type="submit" value="regist">
          <a class="top" href="myPage.php">my page</a>
        </div>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="/js/newAcquaintance.js"></script>
  </body>
  <?php include "../Views/Players/footer.php"; ?>
</html>