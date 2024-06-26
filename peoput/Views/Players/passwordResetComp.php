<?php
  // session_start();
  require_once(ROOT_PATH .'/Controllers/Controller.php');
  $model = new Controller();
  // $result = $acquaintanceEdit->checkLogin();
  // if (!$result) {
  //   echo "不正なリクエストです！";
?>
  <!-- <a href="top.php">peoputトップへ</a> -->
<?php
  //   exit;
  // }
  // $acquaintanceEdit->acquaintanceEdit();
  
$err = [];
//バリデーション
$pass = filter_input(INPUT_POST, 'pass');
$mbpass = mb_strlen($pass);
if (!preg_match("/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z\-]{8,24}$/",$pass) or ($mbpass === 0)) {
  $err[] = 'パスワードは半角英数字(A~Z,a~z,0~9)最低１つずつ含めた8文字以上24文字以内(記号はハイフンのみ)を使用してください。';
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>peoput_パスワードリセット完了</title>
    <link rel="stylesheet" type="text/css" href="/css/base.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>
  <?php include "../Views/Players/header.php"; ?>
  <body>
    <div class="prccontainer" style="
    margin-top: 50px;">
      <p class="pText" style="
      font-size: 1.5rem;
      text-decoration: underline;">パスワードの変更</p>
      <?php if ($_POST['pass'] === $_POST['passCheck']) : ?>
        <?php if (count($err) > 0) : ?>
          <?php foreach($err as $e) : ?>
            <p class="pText"><?php echo $e ?></p>
            <div class="sendContainer">
              <input class="send" type="button" onclick="history.back()" value="back" style="width: 20%;">
            </div>
          <?php endforeach ?>
        <?php else : ?>
          <?php $model->passReset() ?>
          <p class="pText">COMPLETE !</p>
          <div class="sendContainer">
            <a class="top" id="top" href="login.php" style="
            width: 20%;
            background: white;
            color: black;">login</a>
          </div>
        <?php endif ?>
      <?php else : ?>
        <P class="pText">確認用パスワードと一致しません。<br>
        再度入力してください。</P>
        <div class="sendContainer">
          <input class="send" id="top" type="button" onclick="history.back()" value="back" style="width: 20%;">
        </div>
      <?php endif ?>
    </div>
  </body>
  <?php include "../Views/Players/footer.php"; ?>
</html>