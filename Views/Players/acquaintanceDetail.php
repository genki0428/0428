<?php
session_start();
require_once(ROOT_PATH .'/Controllers/Controller.php');
$detail = new Controller();
$result2 = $detail->checkLogin();
if (!$result2) {
  echo "不正なリクエストです！";
?><a href="top.php">peoputトップへ</a><?php
  exit;
}
$result = $detail->detail();

// $err = $_SESSION;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>知人詳細</title>
    <link rel="stylesheet" type="text/css" href="/css/base.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>
  <?php include "../Views/Players/header2.php"; ?>
  <body>
    <div class="container1" style="
    text-align: center;
    margin: 60px 20px;">
      <div>
        <img class="buttonimg" src="/img/詳細.png" style="
        height: 60px;
        margin-bottom: 15px;">
        <table>
          <tr>
            <th>community</th>
            <th>name</th>
            <th>age</th>
            <th>sex</th>
            <th>feature</th>
            <th>remarks</th>
            <th>others</th>
            <th></th>
            <th></th>
          </tr>
          <tr>
            <td hidden><?=$result['id'] ?></td>
            <td><?=$result['community'] ?></td>
            <td><?=$result['name'] ?></td>
            <td><?=$result['age'] ?></td>
            <td><?=$result['sex'] ?></td>
            <td><?=$result['feature'] ?></td>
            <td><?=$result['remarks'] ?></td>
            <td><?=$result['others'] ?></td>
            <td>
              <a href ="acquaintanceEdit.php?id=<?=$result['id'] ?>">
                <span class="tooltip">
                  <img class="buttonimg" src="/img/編集.png">
                  <span class="description">項目の編集</span>
                </span>
              </a>
            </td>
            <td>
              <a onclick="func(<?=$result['id'] ?>)">
                <span class="tooltip">
                  <img class="buttonimg" src="/img/削除.png">
                  <span class="description">項目の削除</span>
                </span>
              </a>
            </td>
          </tr>
        </table>
      </div>
      <div class="backCntainer" style="
      margin: 0 auto;">
        <a class="top" href="acquaintanceAll.php" style="
        display: inline-block;
        margin-top: 60px;
        background: #d075ff;
        border: none">all</a>
        


<form action="pdf.php" method="post">
<input type="text" name="community" value="<?=$result['community'] ?>" hidden>
<input type="text" name="name" value="<?=$result['name'] ?>" hidden>
<input type="text" name="age" value="<?=$result['age'] ?>" hidden>
<input type="text" name="sex" value="<?=$result['sex'] ?>" hidden>
<input type="text" name="feature" value="<?=$result['feature'] ?>" hidden>
<input type="text" name="remarks" value="<?=$result['remarks'] ?>" hidden>
<input type="text" name="others" value="<?=$result['others'] ?>" hidden>
<input type="submit" value="pdf">
</form>

      </div>
    </div>
    <script src="/js/acquaintanceDtail.js"></script>
  </body>
  <?php include "../Views/Players/footer.php"; ?>
</html>