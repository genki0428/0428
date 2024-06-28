<?php
session_start();
unset($_SESSION['Smsg']);
require_once(dirname(__FILE__).'/../../Controllers/Controller.php');
$acquaintanceSearch = new Controller();
$result2 = $acquaintanceSearch->checkLogin();
if (!$result2) {
  echo "不正なリクエストです！";
?><a href="top.php">peoputトップへ</a><?php
  exit;
}
$result = $acquaintanceSearch->acquaintanceSearch();
$loginMsg = $_SESSION;

// $acquaintanceSearch->test();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>peoput_検索結果</title>
    <link rel="stylesheet" type="text/css" href="/0428/peoput/public/css/base.css">
    <link rel="stylesheet" type="text/css" href="/0428/peoput/public/css/style.css">
  </head>
  <?php include "header2.php"; ?>
  <body>
    <?php if (isset($loginMsg['Smsg'])) : ?>
      <div class="backCntainer">
        <p class="pText"><?php echo $loginMsg['Smsg']; ?></p>
        <a class="top" href="search.php" style="
        display: block;
        margin: 50px auto;">re search</a>
      </div>
    <?php else: ?>
      <div class="container1" style="
      text-align: center;
      margin: 60px 20px;">
        <div>
          <a class="menu" style="
          background: #75ccff;
          margin: 20px auto;">search</a>
          <table>
            <tr>
              <th>community</th>
              <th>name</th>
              <th>age</th>
              <th>sex</th>
              <th>feature</th>
              <th>remarks</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
            <?php foreach($result as $searchRedult):?>
            <tr>
              <td hidden><?=$searchRedult['id'] ?></td>
              <td><?=$searchRedult['community'] ?></td>
              <td><?=$searchRedult['name'] ?></td>
              <td><?=$searchRedult['age'] ?></td>
              <td><?=$searchRedult['sex'] ?></td>
              <td><?=$searchRedult['feature'] ?></td>
              <td><?=$searchRedult['remarks'] ?></td>
              <td>
                <a href ="acquaintanceDetail.php?id=<?=$searchRedult['id'] ?>">
                  <span class="tooltip">
                    <img class="buttonimg" src="/0428/peoput/public/img/詳細.png">
                    <span class="description">項目の詳細</span>
                  </span>
                </a>
              </td>
              <td>
                <a href ="acquaintanceEdit.php?id=<?=$searchRedult['id'] ?>">
                  <span class="tooltip">
                    <img class="buttonimg" src="/0428/peoput/public/img/編集.png">
                    <span class="description">項目の編集</span>
                  </span>
                </a>
              </td>
              <td>
                <a onclick="func(<?=$searchRedult['id'] ?>)">
                  <span class="tooltip">
                    <img class="buttonimg" src="/0428/peoput/public/img/削除.png">
                    <span class="description">項目の削除</span>
                  </span>
                </a>
              </td>
            </tr>
            <?php endforeach; ?>
          </table>
        </div>
        <div class="backCntainer" style="
        margin: 0 auto;">
          <a class="top" href="search.php" style="
          display: inline-block;
          margin-top: 60px;">re search</a>
        </div>
      </div>
    <?php endif; ?>
    <script src="/0428/peoput/public/js/searchResult.js"></script>
  </body>
  <?php include "footer.php"; ?>
</html>