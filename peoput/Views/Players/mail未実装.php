<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>peoput_メール送信</title>
    <link rel="stylesheet" type="text/css" href="/css/base.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>
  <body>
		<?php
			mb_language("Japanese");
			mb_internal_encoding("UTF-8");

			$to = $_POST['to'];
			$title = $_POST['title'];
			$content = $_POST['content'];

			if(mb_send_mail($to, $title, $content)){
				echo "メールを送信しました";
			} else {
				echo "メールの送信に失敗しました";
			}
		?>
  </body>
</html>