<?php
session_start();
if (isset($_SESSION['msg'])) {
  unset($_SESSION['msg']);
}
require_once(ROOT_PATH .'/Controllers/Controller.php');
$communityList = new Controller();
$result2 = $communityList->checkLogin();
if (!$result2) {
  echo "不正なリクエストです！";
?><a href="top.php">peoputトップへ</a><?php
  exit;
}
$result = $communityList->communityList();
$communityList->searchTblDel();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>peoput_知人検索</title>
    <link rel="stylesheet" type="text/css" href="/css/base.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>
  <?php include "../Views/Players/header2.php"; ?>
  <body>
    <div class="container1" style="
    text-align: center;
    margin: 60px 20px;">
      <a class="menu" style="
      background: #75ccff;
      margin: 20px auto;">search</a>
      <form action="searchResult.php" method="post">
        <table>
          <tr style="background-color: unset;">
            <th style="color: #75ccff;">community</th>
            <td>
            <input list="list" type="text" name="search1" style="background: #75ccff59; margin: unset;">
            <datalist id="list">
              <?php foreach($result as $communityVal):?>
              <option value='<?=$communityVal["community"] ?>'><?=$communityVal["community"] ?></option>
              <?php endforeach; ?>
            </datalist>
            </td>
          </tr>
          <tr>
            <th style="color: #75ccff;">name</th>
            <td><input type="text" name="search2" style="background: #75ccff59; margin: unset;"></td>
          </tr>
          <tr style="background-color: unset;">
            <th style="color: #75ccff;">age</th>
            <td>
              <?php
                echo "<select name='search3' style='background: #75ccff59; height: 40px; width: 100px; text-align: center; border: none;'>\n";
                echo "<option></option>\n";
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
              <select name="search4" style="background: #75ccff59; height: 40px; width: 100px; text-align: center; border: none;">
                <option></option>
                <option value="-">選択しない</option>
                <option value="M">男性</option>
                <option value="F">女性</option>
                <option value="X">第三の性</option>
              </select>
            </td>
          </tr>
          <tr style="background-color: unset;">
            <th style="color: #75ccff;">feature</th>
            <td>
              <input type="text" name="search5" style="background: #75ccff59; margin: unset;">
            </td>
          </tr>
          <tr>
            <th style="color: #75ccff;">remarks</th>
            <td>
              <input type="text" name="search6" style="background: #75ccff59; margin: unset;">
            </td>
          </tr>
        </table>
        <div class="sendContainer">
          <input class="send" type="submit" value="search" style="
          background: #75ccff59; 
          margin: unset;
          border: none">
          <a class="top" href="myPage.php" style="
          display: inline-block;">my page</a>
        </div>
      </form>
    </div>
  </body>
  <?php include "../Views/Players/footer.php"; ?>
</html>