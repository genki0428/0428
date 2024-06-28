<?php
// require_once(ROOT_PATH .'/database.php');
require_once(dirname(__FILE__).'/../database.php');

class Db {
  protected $dbh;

  public function __construct($dbh = null) {
    if(!$dbh) { //接続情報が存在しない場合
      try {
        $this->dbh = new PDO(
          'mysql:dbname='.DB_NAME.
          ';host='.DB_HOST, DB_USER, DB_PASSWD
        );
        //接続成功
      } catch (PDOException $e) {
        echo "接続失敗: " . $e->getMessage() . "\n";
        exit();
      }
    } else { //接続情報が存在する場合
      $this->dbh = $dbh;
    }
  }
  public function get_db_handler() {
    return $this->dbh;
  }
}

function connect() {
  $host = DB_HOST;
  $db = DB_NAME;
  $user = DB_USER;
  $pass = DB_PASSWD;

  $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
  try {
    $pdo = new PDO($dsn, $user, $pass, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    return $pdo;
  } catch(PDOException $e) {
    echo '接続失敗'.$e->getMessage();
    exit;
  }
}