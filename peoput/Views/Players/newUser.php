<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>peoput_新規登録</title>
    <link rel="stylesheet" type="text/css" href="/0428/peoput/public/css/base.css">
    <link rel="stylesheet" type="text/css" href="/0428/peoput/public/css/style.css">
  </head>
  <?php include "header.php"; ?>
  <body>
    <form action="newUserComplete.php" method="post" id="form">
      <input type="text" placeholder="Account Name" name="accountName" style="background: #a9ffdb;">
      <input type="email" placeholder="Mail Address" name="mail" style="background: #ffa9a9;">
      <input type="password" placeholder="Password" name="pass" style="background: #beffa9;">
      <div class="sendContainer">
        <input class="send" type="submit" value="send">
        <a class="top" href="top.php">top</a>
      </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="/0428/peoput/public/js/newUser.js"></script>
  </body>
  <?php include "footer.php"; ?>
</html>