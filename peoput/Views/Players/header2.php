<!DOCTYPE html>
<html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/0428/peoput/public/css/header.css">
  </head>
  <header>
    <div class="header">
      <img src="/0428/peoput/public/img/peoput.png">
      <div class="headerMenu">
        <!-- <a href="login.php">Logout</a> -->
        <a href="myPage.php">MyPage</a>
        <form class="headerLogoutForm" action="logout.php" method="post">
          <input class="headerLogout" type="submit" name="logout" value="Logout">
        </form>
      </div>
      
    
      <!-- ハンバーガーメニュー部分 -->
      <div class="nav">
    
        <!-- ハンバーガーメニューの表示・非表示を切り替えるチェックボックス -->
        <input id="drawer_input" class="drawer_hidden" type="checkbox">
    
        <!-- ハンバーガーアイコン -->
        <label for="drawer_input" class="drawer_open"><span></span></label>
    
        <!-- メニュー -->
        <nav class="nav_content">
          <ul class="nav_list">
            <li class="nav_item"><a href="myPage.php">MyPage</a></li>
            <li class="nav_item">
              <form class="headerLogoutForm" action="logout.php" method="post" style="text-align: center;">
                <input class="headerLogout" type="submit" name="logout" value="Logout">
              </form>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </header>