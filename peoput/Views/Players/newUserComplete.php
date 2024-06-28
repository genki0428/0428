<?php
session_start();
require_once(dirname(__FILE__).'/../../Controllers/Controller.php');
$switch = new Controller();
// $result3 = $switch->checkLogin();
// if (!$result3) {
//   echo "不正なリクエストです！";
// ?>
<!-- <a href="top.php">peoputトップへ</a> -->
<?php
//   exit;
// }
$result = $switch->getUserByName();
$result2 = $switch->getUserByEmail();

$err = [];
//バリデーション
$accountName = filter_input(INPUT_POST, 'accountName');
$mbaccountName = mb_strlen($accountName);
if (!preg_match("/^[^0-9]{1,}+$/i",$accountName) or ($mbaccountName > 20)) {
  $err[] = '20文字以下で氏名を入力してください。';
}

$mail = filter_input(INPUT_POST, 'mail');
$mbmail = mb_strlen($mail);
if (!preg_match("/^[a-z0-9._+^~-]+@[a-z0-9.-]+$/i",$mail) or ($mbmail === 0)) {
  $err[] = 'メールアドレスを正しく入力してください。';
}

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
    <title>peoput_新規登録完了</title>
    <link rel="stylesheet" type="text/css" href="/0428/peoput/public/css/base.css">
    <link rel="stylesheet" type="text/css" href="/0428/peoput/public/css/style.css">
  </head>
  <?php include "header.php"; ?>
  <body>
    <?php if ($result === false) : ?>
      <?php if ($result2 === false) : ?>
        <form action="login.php">
          <?php if (count($err) > 0) : ?>
            <?php foreach($err as $e) : ?>
              <p><?php echo $e ?></p>
              <input class="back" type="button" onclick="history.back()" value="back">
            <?php endforeach ?>
          <?php else : 
            $switch->newUser(); ?>
          <p class="pText">COMPLETE !</p>
          <input class="login" type="submit" value="login">
          <?php endif ?>
        </form>
      <?php else : ?>
        <div class="backCntainer">
          <p class="pText"><?php echo "既にそのメールアドレスは登録されています。" ?></p>
          <input class="back" type="button" onclick="history.back()" value="back">
        </div>
      <?php endif ?>
    <?php else : ?>
      <div class="backCntainer">
        <p class="pText"><?php echo "既にそのアカウント名は使用されています。" ?></p>
        <input class="back" type="button" onclick="history.back()" value="back">
      </div>
    <?php endif ?>
  </body>
  <?php include "footer.php"; ?>
</html>