<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>peoput_メールフォーム</title>
    <link rel="stylesheet" type="text/css" href="/css/base.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>
  <body>
		<form action="mail.php" method="post">
      <p>受信者</p><input type="text" name="to">
      <p>タイトル</p><input type="text" name="title">
      <p>本文</p><textarea name="content" cols="50" rows="5"></textarea>
      <p><input type="submit" name="send" value="送信"></p>
		</form>
  </body>
</html>