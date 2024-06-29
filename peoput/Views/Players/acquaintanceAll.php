<?php
session_start();
unset($_SESSION['noFullList_msg']);
require_once(dirname(__FILE__).'/../../Controllers/Controller.php');
$fullList = new Controller();
$result2 = $fullList->checkLogin();
if (!$result2) {
  echo "不正なリクエストです！";
?><a href="top.php">peoputトップへ</a><?php
  exit;
}
$result = $fullList->fullList();

$err = $_SESSION;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>知人一覧</title>
    <link rel="stylesheet" type="text/css" href="/0428/peoput/public/css/base.css">
    <link rel="stylesheet" type="text/css" href="/0428/peoput/public/css/style.css">
  </head>
  <?php include "header2.php"; ?>
  <body>
    <div class="container1" style="
    text-align: center;
    margin: 60px 20px;">
      <div>
        <?php if (isset($err['noFullList_msg'])) : ?>
          <p class="pText"><?php echo $err['noFullList_msg']; ?></p>
        <?php else : ?>
          <a class="menu" style="
          background: #d075ff;
          margin: 20px auto;">all</a>

        <table class="table1">
          <tr>
            <th>community</th>
            <th>name</th>
            <th>feature</th>
            <th>remarks</th>
            <th style="width: 50px;"></th>
            <th style="width: 50px;"></th>
            <th style="width: 50px;"></th>
          </tr>
          <?php foreach($result['acquaintanceFullList'] as $acquaintanceList):?>
          <tr>
            <td hidden><?=$acquaintanceList['id'] ?></td>
            <td><?=$acquaintanceList['community'] ?></td>
            <td><?=$acquaintanceList['name'] ?></td>
            <td><?=$acquaintanceList['feature'] ?></td>
            <td><?=$acquaintanceList['remarks'] ?></td>
            <td>
              <a href ="acquaintanceDetail.php?id=<?=$acquaintanceList['id'] ?>">
                <span class="tooltip">
                  <img class="buttonimg" src="/0428/peoput/public/img/詳細.png">
                  <span class="description">項目の詳細</span>
                </span>
              </a>
            </td>
            <td>
              <a href ="acquaintanceEdit.php?id=<?=$acquaintanceList['id'] ?>">
                <span class="tooltip">
                  <img class="buttonimg" src="/0428/peoput/public/img/編集.png">
                  <span class="description">項目の編集</span>
                </span>
              </a>
            </td>
            <td>
              <a onclick="func(<?=$acquaintanceList['id'] ?>)">
                <span class="tooltip">
                  <img class="buttonimg" src="/0428/peoput/public/img/削除.png"
                  ><span class="description">項目の削除</span>
                </span>
              </a>
            </td>
          </tr>
          <?php endforeach; ?>
        </table>

        <table class="table2">
          <?php foreach($result['acquaintanceFullList'] as $acquaintanceList):?>
          <tr>
            <td hidden><?=$acquaintanceList['id'] ?></td>
          </tr>
          <tr>
            <th>community</th>
            <td><?=$acquaintanceList['community'] ?></td>
          </tr>
          <tr>
            <th>name</th>
            <td><?=$acquaintanceList['name'] ?></td>
          </tr>
          <tr>
            <th>feature</th>
            <td><?=$acquaintanceList['feature'] ?></td>
          </tr>
          <tr>
            <th>remarks</th>
            <td><?=$acquaintanceList['remarks'] ?></td>
          </tr>
          <tr>
            <th style="width: 50px;"></th>
            <td style="padding-bottom: 30px;">
              <a href ="acquaintanceDetail.php?id=<?=$acquaintanceList['id'] ?>">
                <span class="tooltip">
                  <img class="buttonimg" src="/0428/peoput/public/img/詳細.png">
                  <span class="description">項目の詳細</span>
                </span>
              </a>
              <a href ="acquaintanceEdit.php?id=<?=$acquaintanceList['id'] ?>">
                <span class="tooltip">
                  <img class="buttonimg" src="/0428/peoput/public/img/編集.png">
                  <span class="description">項目の編集</span>
                </span>
              </a>
              <a onclick="func(<?=$acquaintanceList['id'] ?>)">
                <span class="tooltip">
                  <img class="buttonimg" src="/0428/peoput/public/img/削除.png"
                  ><span class="description">項目の削除</span>
                </span>
              </a>
            </td>
          </tr>
          <?php endforeach; ?>
        </table>

        <?php endif; ?>
      </div>
      <div class="paging">
        <?php
          for($i=0;$i<=$result['pages'];$i++) {
            if(isset($_GET['page']) && $_GET['page'] == $i) {
              echo $i+1;
            } else {
              echo "<a href='?page=".$i."'>".($i+1)."</a>";
            }
          }
        ?>
      </div>
      <div class="backCntainer" style="
      margin: 0 auto;">
        <a class="top" href="myPage.php" style="
        display: inline-block;">my page</a>
      </div>
    </div>
    <script src="/0428/peoput/public/js/acquaintanceAll.js"></script>
  </body>
  <?php include "footer.php"; ?>
</html>