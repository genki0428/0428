<?php
session_start();
require_once(dirname(__FILE__).'/../../Controllers/Controller.php');
$communityList = new Controller();
$result3 = $communityList->checkLogin();
if (!$result3) {
  echo "不正なリクエストです！";
?><a href="top.php">peoputトップへ</a><?php
  exit;
}
$result = $communityList->communityList();
$detail = new Controller();
$result2 = $detail->detail();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>知人編集</title>
    <link rel="stylesheet" type="text/css" href="/0428/peoput/public/css/base.css">
    <link rel="stylesheet" type="text/css" href="/0428/peoput/public/css/style.css">
  </head>
  <?php include "header2.php"; ?>
  <body>
    <div class="container1" style="
    text-align: center;
    margin: 60px 20px;">
      <img class="buttonimg" src="/0428/peoput/public/img/編集.png" style="
      height: 60px;
      margin-bottom: 15px;">
      <form action="acquaintanceEditSend.php" method="post" id="form" style="
      margin: 0 auto !important;">
        <input type="text" name="id" value="<?=$result2['id'] ?>" hidden>
        <table>
          <tr style="background-color: unset;">
            <th style="color: #75ccff;">community</th>
            <td>
            <input list="list" type="text" name="community" value="<?=$result2['community'] ?>" style="background: #75ccff59; margin: unset;">
            <datalist id="list">
              <?php foreach($result as $communityVal):?>
              <option value='<?=$communityVal["community"] ?>'><?=$communityVal["community"] ?></option>
              <?php endforeach; ?>
            </datalist>
            </td>
          </tr>
          <tr>
          <th style="color: #75ccff;">name</th>
            <td><input type="text" name="name" value="<?=$result2['name'] ?>" style="background: #75ccff59; margin: unset;"></td>
          </tr>
          <tr style="background-color: unset;">
            <th style="color: #75ccff;">age</th>
            <td>
              <?php
                echo "<select name='age' style='background: #75ccff59; height: 40px; width: 100px; text-align: center; border: none;'>\n";
                echo "<option value='".$result2['age']."'>変更しない</option>\n";
                for($i=-50;$i<51;$i++){
                echo "<option value='$i'>$i</option>\n";
                }
                echo "</select>";
              ?>
            </td>
          </tr>
          <tr>
          <th style="color: #75ccff;">sex</th>
            <td>
              <select name="sex" style="background: #75ccff59; height: 40px; width: 100px; text-align: center; border: none;">
                <option value="<?=$result2['sex'] ?>" selected>変更しない</option>
                <option value="-">選択しない</option>
                <option value="M">男性</option>
                <option value="F">女性</option>
                <option value="X">第三の性</option>
              </select>
            </td>
          </tr>
          <tr style="background-color: unset;">
            <th style="color: #75ccff;">feature</th>
            <td><input type="text" name="feature" value="<?=$result2['feature'] ?>" style="background: #75ccff59; margin: unset;"></td>
          </tr>
          <tr>
            <th style="color: #75ccff;">remarks</th>
            <td><input type="text" name="remarks" value="<?=$result2['remarks'] ?>" style="background: #75ccff59; margin: unset;"></td>
          </tr>
          <tr style="background-color: unset;">
            <th style="color: #75ccff;">others</th>
            <td>
              <textarea class="editTextarea" name="others" rows="5" cols="33"><?=$result2['others'] ?></textarea>
            </td>
          </tr>
        </table>
        <div class="sendContainer">
          <input class="send" type="submit" value="edit">
          <a class="top" href="acquaintanceAll.php" style="
          display: inline-block;
          background: #d075ff;
          border: none">all</a>
        </div>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="/0428/peoput/public/js/acquaintanceEdit.js"></script>
  </body>
  <?php include "footer.php"; ?>
</html>