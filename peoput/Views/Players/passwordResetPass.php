<?php
  // session_start();
require_once(dirname(__FILE__).'/../../Controllers/Controller.php');
  $model = new Controller();
  $result = $model->getUserByEmail();
  // $result = $acquaintanceEdit->checkLogin();
  // if (!$result) {
  //   echo "不正なリクエストです！";
?>
  <!-- <a href="top.php">peoputトップへ</a> -->
<?php
  //   exit;
  // }
  // $acquaintanceEdit->acquaintanceEdit();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>peoput_パスワードリセットパスワード変更</title>
    <link rel="stylesheet" type="text/css" href="/0428/peoput/public/css/base.css">
    <link rel="stylesheet" type="text/css" href="/0428/peoput/public/css/style.css">
  </head>
  <?php include "header.php"; ?>
  <body>
    <div style="
    margin-top: 50px;">
      <p class="pText" style="
      font-size: 1.5rem;
      text-decoration: underline;">パスワードの変更</p>
      <?php if($result === false) :?>
        <P class="pText">そのメールアドレスのアカウントは存在しません。<br>
        メールアドレスを確認の上、再度入力してください。</P>
        <div style="
        width: 400px;
        margin: 100px auto">
          <div class="sendContainer">
            <input class="send" type="button" onclick="history.back()" value="back">
            <a class="top" href="top.php">top</a>
          </div>
        </div>
      <?php else :?>
        <p class="pText">新しいパスワードを入力してください。</p>
        <form action="passwordResetComp.php" method="post" id="form">
          <input type="email" name="mail" value="<?=$_POST['mail'] ?>" hidden>
          <input type="password" placeholder="password" name="pass" style="background: #beffa9;">
          <input type="password" placeholder="password check" name="passCheck" style="background: #beffa9;">
          <div class="sendContainer">
            <input class="send" type="submit" value="send" onclick="func()">
            <a class="top" href="top.php">top</a>
          </div>
        </form>
      <?php endif ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="/0428/peoput/public/js/passwordResetPass.js"></script>
  </body>
  <?php include "footer.php"; ?>
</html>