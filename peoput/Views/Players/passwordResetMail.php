<?php
  // session_start();
  // require_once(ROOT_PATH .'/Controllers/Controller.php');
  // $acquaintanceEdit = new Controller();
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
    <title>peoput_パスワードリセットアドレス入力</title>
    <link rel="stylesheet" type="text/css" href="/css/base.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>
  <?php include "../Views/Players/header.php"; ?>
  <body>
    <div style="
    margin-top: 50px;">
      <p class="pText" style="
      font-size: 1.5rem;
      text-decoration: underline;">パスワードの変更</p>
      <p class="pText">登録されているメールアドレスを入力してください。</p>
      <form action="passwordResetPass.php" method="post" id="form">
        <input type="email" placeholder="Mail Address" name="mail" style="background: #ffa9a9;">
        <div class="sendContainer">
          <input class="send" type="submit" value="send" onclick="func()">
          <a class="top" href="top.php">top</a>
        </div>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="/js/passwordResetMail.js"></script>
  </body>
  <?php include "../Views/Players/footer.php"; ?>
</html>