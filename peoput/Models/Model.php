<?php
// require_once(ROOT_PATH .'/Models/Db.php');
require_once(dirname(__FILE__).'/Db.php');

class Model extends Db {
  public function __construct($dbh = null) {
    parent::__construct($dbh); 
  }

  /**
   * アカウント新規登録⇒一覧テーブルの作成
   */
  public function newUser($name, $mail, $pass) {
    $hashed = password_hash($pass, PASSWORD_BCRYPT);
    $sql = 'INSERT INTO users (name, email, password)'
        . 'VALUES (:name, :mail, :pass)';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':name', $name, PDO::PARAM_STR);
    $sth->bindParam(':mail', $mail, PDO::PARAM_STR);
    $sth->bindParam(':pass', $hashed, PDO::PARAM_STR);
    $sth->execute();

    
    $sql = 'SELECT * FROM users WHERE email = :mail';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':mail', $mail, PDO::PARAM_STR);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);

    $sql = "CREATE TABLE $result[name]_$result[id] (
      id INT(11) AUTO_INCREMENT NOT NULL, 
      community VARCHAR(30),
      name VARCHAR(30),
      age VARCHAR(6),
      sex VARCHAR(10),
      feature VARCHAR(30),
      remarks VARCHAR(30),
      others VARCHAR(300),
      PRIMARY KEY (id))";
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
  }

  /**
   * 新規と既存のアカウント名の重複データ取得
   * @return array|bool $user|false
   */
  public static function getUserByName($name) {
    $sql = 'SELECT * FROM users WHERE name = :name';
    try {
      $sth = connect()->prepare($sql);
      $sth->bindParam(':name', $name, PDO::PARAM_STR);
      $sth->execute();
      $result = $sth->fetch(PDO::FETCH_ASSOC);
      return $result;
    } catch(\Exception $e) {
      $result = false;
      return $result;
    }
  }

  /**
   * 新規と既存のメールアドレスの重複データ取得
   * @return array|bool $user|false
   */
  public static function getUserByEmail($mail) {
    $sql = 'SELECT * FROM users WHERE email = :email';
    try {
      $sth = connect()->prepare($sql);
      $sth->bindParam(':email', $mail, PDO::PARAM_STR);
      $sth->execute();
      $result = $sth->fetch(PDO::FETCH_ASSOC);
      return $result;
    } catch(\Exception $e) {
      $result = false;
      return $result;
    }
  }

  /**
   * 一覧テーブルの作成
   */
  // public function addAcquaintanceAllTable($accountName) {
  //   // $addAcquaintanceAllTableName = $accountName.'_acquaintance_all';
  //   $sql = "CREATE TABLE $accountName(
  //   id INT(11) AUTO_INCREMENT NOT NULL, 
  //   community VARCHAR(30),
  //   name VARCHAR(30),
  //   age VARCHAR(6),
  //   sex VARCHAR(10),
  //   feature VARCHAR(30),
  //   remarks VARCHAR(30),
  //   others VARCHAR(300),
  //   PRIMARY KEY (id))";
  //   $sth = $this->dbh->prepare($sql);
  //   $sth->execute();
  // }

  /**
   * 一覧テーブルへのデータ追加⇒
   * コミュニティ別テーブルの作成⇒
   * コミュニティ別テーブルへの知人登録
   */
  public function addNewAcquaintance($community, $name, $age, $sex, $feature, $remarks, $others) {
    $tbName['tbn'] = $_SESSION['login_user']['name'].'_'.$_SESSION['login_user']['id'];
    $sql = "INSERT INTO  $tbName[tbn](
        community, name, age, sex, feature, remarks, others
      ) VALUE (
        :community, :name, :age, :sex, :feature, :remarks, :others
      )";
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':community', $community, PDO::PARAM_STR);
    $sth->bindParam(':name', $name, PDO::PARAM_STR);
    $sth->bindParam(':age', $age, PDO::PARAM_STR);
    $sth->bindParam(':sex', $sex, PDO::PARAM_STR);
    $sth->bindParam(':feature', $feature, PDO::PARAM_STR);
    $sth->bindParam(':remarks', $remarks, PDO::PARAM_STR);
    $sth->bindParam(':others', $others, PDO::PARAM_STR);
    $sth->execute();

    $sql = "CREATE TABLE $tbName[tbn]_$community (
      id INT(11) AUTO_INCREMENT NOT NULL, 
      community VARCHAR(30),
      name VARCHAR(30),
      age VARCHAR(6),
      sex VARCHAR(10),
      feature VARCHAR(30),
      remarks VARCHAR(30),
      others VARCHAR(300),
      PRIMARY KEY (id))";
    try {
      $sth = $this->dbh->prepare($sql);
      $sth->execute();
    } catch(\Exception $e) {
    }
    
    $sql = "INSERT INTO $tbName[tbn]_$community (
        community, name, age, sex, feature, remarks, others
      ) VALUE (
        :community, :name, :age, :sex, :feature, :remarks, :others
      )";
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':community', $community, PDO::PARAM_STR);
    $sth->bindParam(':name', $name, PDO::PARAM_STR);
    $sth->bindParam(':age', $age, PDO::PARAM_STR);
    $sth->bindParam(':sex', $sex, PDO::PARAM_STR);
    $sth->bindParam(':feature', $feature, PDO::PARAM_STR);
    $sth->bindParam(':remarks', $remarks, PDO::PARAM_STR);
    $sth->bindParam(':others', $others, PDO::PARAM_STR);
    $sth->execute();
  }

  /**
   * communityリストからコミュニティ別テーブルの作成
   */
  // public function communityTable() {
  //   $tbName = $_SESSION['login_user']['name'];
  //   $sql = "SELECT DISTINCT community FROM $tbName";
  //   $sth = $this->dbh->prepare($sql);
  //   $sth->execute();
  //   $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  //   foreach($result as $communityListVal) :
  //     $comLis = $communityListVal['community'];
  //     try {
  //       $sql = "CREATE TABLE $comLis(
  //         id INT(11) AUTO_INCREMENT NOT NULL, 
  //         community VARCHAR(30),
  //         name VARCHAR(30),
  //         age VARCHAR(6),
  //         sex VARCHAR(10),
  //         feature VARCHAR(30),
  //         remarks VARCHAR(30),
  //         others VARCHAR(300),
  //         PRIMARY KEY (id)
  //       )";
  //       $sth = $this->dbh->prepare($sql);
  //       $sth->execute();
  //     } catch(\Exception $e) {
  //       return;
  //     }
  //   endforeach;
  // }

  /**
   * ユーザーログインチェック
   * @param void
   * @return bool $result
   */
  public static function checkLogin() {
    $result = false;

    //セッションにログインユーザが入っていなかったらfalse
    if (isset($_SESSION['login_user']) && $_SESSION['login_user']['id'] > 0) {
      return $result = true;
    }
    return $result;
  }
  
  /**
   * ユーザーログイン
   * @param string $mail
   * @param string $pass
   * @return bool $result
   */
  public static function login($mail, $pass) {
    //結果
    $result = false;
    //ユーザーをmailから検索して取得
    $user = self::getUserByEmail($mail);

    if ($user === false) {
      $_SESSION['Lmsg'] = '正しくメールアドレスを入力してください。';
      return $result;
    }

    //パスワードの照会
    if (password_verify($pass, $user['password'])) {
      //ログイン成功
      session_regenerate_id(true);
      $_SESSION['login_user'] = $user;
      $result = true;
      return $result;
    } else {
      $_SESSION['Lmsg'] = 'パスワードが一致しません。';
      return $result;
    }
  }

  /**
   * 新規テーブル作成
   */
  // public function createTable($tbName) {
  //   $sql = "CREATE TABLE $tbName(
  //     id INT(11) AUTO_INCREMENT NOT NULL, 
  //     community VARCHAR(30),
  //     name VARCHAR(30),
  //     age VARCHAR(6),
  //     sex VARCHAR(10),
  //     feature VARCHAR(30),
  //     remarks VARCHAR(30),
  //     others VARCHAR(300),
  //     PRIMARY KEY (id))";
  //   try {
  //     $sth = $this->dbh->prepare($sql);
  //     $sth->execute();
  //   } catch(\Exception $e) {
  //     return;
  //   }
  // }

  /**
   * 知人登録
   */
  // public function addAcquaintance($tbName, $community, $name, $age, $sex, $feature, $remarks, $others) {
  //   $sql = "INSERT INTO $tbName (
  //       community, name, age, sex, feature, remarks, others
  //     ) VALUE (
  //       :community, :name, :age, :sex, :feature, :remarks, :others
  //     )";
  //   $sth = $this->dbh->prepare($sql);
  //   $sth->bindParam(':community', $community, PDO::PARAM_STR);
  //   $sth->bindParam(':name', $name, PDO::PARAM_STR);
  //   $sth->bindParam(':age', $age, PDO::PARAM_STR);
  //   $sth->bindParam(':sex', $sex, PDO::PARAM_STR);
  //   $sth->bindParam(':feature', $feature, PDO::PARAM_STR);
  //   $sth->bindParam(':remarks', $remarks, PDO::PARAM_STR);
  //   $sth->bindParam(':others', $others, PDO::PARAM_STR);
  //   $sth->execute();
  // }

  /**
   * 一覧テーブルから全データを取得 (20件ごと)
   * 
   * @param integer $page ページ番号
   * @return Arry $result 全データ (20件ごと)
   */
  public function findAll($page = 0) {
    $tbName['tbn'] = $_SESSION['login_user']['name'].'_'.$_SESSION['login_user']['id'];
    $sql = "SELECT * FROM $tbName[tbn]";
    $sql .= ' LIMIT 20 OFFSET '.(20 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    if($result === array()) {
      $_SESSION['noFullList_msg'] = "登録項目がありません。";
    } else {
      return $result;
    }
  }
  
  /**
   * 一覧テーブルから全データ数を取得
   * 
   * @return int $count 全データの件数
   */
  public function countAll() {
    $tbName['tbn'] = $_SESSION['login_user']['name'].'_'.$_SESSION['login_user']['id'];
    $sql = "SELECT count(*) as count FROM $tbName[tbn]";
    try {
      $sth = $this->dbh->prepare($sql);
      $sth->execute();
      $count = $sth->fetchColumn();
      return $count;
    } catch(\Exception $e) {
      return;
    }
  }
  
  /**
   * 知人詳細データを取得
   */
  public static function detail($id) {
    $tbName['tbn'] = $_SESSION['login_user']['name'].'_'.$_SESSION['login_user']['id'];
    $sql = "SELECT * FROM $tbName[tbn] WHERE id = :id";
    $sth = connect()->prepare($sql);
    $sth->bindParam(':id', $id, PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
  }
  
  /**
   * 一覧テーブルからcommunity名リストを取得
   */
  public function communityList():Array {
    $tbName['tbn'] = $_SESSION['login_user']['name'].'_'.$_SESSION['login_user']['id'];
    $sql = "SELECT DISTINCT community FROM $tbName[tbn]";
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
  
  /**
   * community別のテーブル内データを全削除→
   * 一覧データからcommunity別に再振り分け
   */
  // public function communityTblReset() {
  //   $tbName = $_SESSION['login_user']['name'];
  //   $sql = "SELECT DISTINCT community FROM $tbName";
  //   $sth = $this->dbh->prepare($sql);
  //   $sth->execute();
  //   $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  //   foreach($result as $communityListVal) :
  //     $comLis = $communityListVal['community'];
  //     $sql = "DELETE FROM $comLis";
  //     $sth = $this->dbh->prepare($sql);
  //     $sth->execute();
  //     $sql = "INSERT INTO $comLis (community, name, age, sex, feature, remarks, others) SELECT community, name, age, sex, feature, remarks, others FROM test WHERE community = '$comLis'";
  //     $sth = $this->dbh->prepare($sql);
  //     $sth->execute();
  //   endforeach;
  // }

  /**
   * community別のテーブル内データを全削除→
   * 知人一覧データの変更→
   * 一覧データからcommunity別に再振り分け→
   * community別のテーブル内データが0の場合テーブル削除
   */
  public function acquaintanceEdit($id,$community, $name, $age, $sex, $feature, $remarks, $others) {
    $tbName['tbn'] = $_SESSION['login_user']['name'].'_'.$_SESSION['login_user']['id'];
    $sql = "SELECT DISTINCT community FROM $tbName[tbn]";
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $communityListVal) :
      $comN = $tbName['tbn'].'_'.$communityListVal['community'];
      $sql = "DELETE FROM $comN";
      $sth = $this->dbh->prepare($sql);
      $sth->execute();
    endforeach;

    // $sql = "UPDATE $tbName[tbn] SET community = :community, name = :name, age = :age, sex = :sex, feature = :feature, remarks = :remarks, others = :others WHERE id = :id";
    // $sth = $this->dbh->prepare($sql);
    // $sth->bindParam(':id', $id, PDO::PARAM_INT);
    // $sth->bindParam(':community', $community, PDO::PARAM_STR);
    // $sth->bindParam(':name', $name, PDO::PARAM_STR);
    // $sth->bindParam(':age', $age, PDO::PARAM_STR);
    // $sth->bindParam(':sex', $sex, PDO::PARAM_STR);
    // $sth->bindParam(':feature', $feature, PDO::PARAM_STR);
    // $sth->bindParam(':remarks', $remarks, PDO::PARAM_STR);
    // $sth->bindParam(':others', $others, PDO::PARAM_STR);
    // $sth->execute();

    // $tbName['tbn'] = $_SESSION['login_user']['name'].'_'.$_SESSION['login_user']['id'];
    // $sql = "SELECT DISTINCT community FROM $tbName[tbn]";
    // $sth = $this->dbh->prepare($sql);
    // $sth->execute();
    // $result2 = $sth->fetchAll(PDO::FETCH_ASSOC);
    // foreach($result2 as $communityListVal) :
    //   $comN = $tbName['tbn'].'_'.$communityListVal['community'];
    //   $comL = $communityListVal['community'];
    //   try {
    //     $sql = "INSERT INTO $comN (
    //     community, name, age, sex, feature, remarks, others
    //     ) SELECT community, name, age, sex, feature, remarks, others FROM $tbName[tbn] WHERE community = '$comL'";
    //     $sth = $this->dbh->prepare($sql);
    //     $sth->execute();
    //   } catch(\Exception $e) {
    //     $sql = "CREATE TABLE $comN(
    //       id INT(11) AUTO_INCREMENT NOT NULL, 
    //       community VARCHAR(30),
    //       name VARCHAR(30),
    //       age VARCHAR(6),
    //       sex VARCHAR(10),
    //       feature VARCHAR(30),
    //       remarks VARCHAR(30),
    //       others VARCHAR(300),
    //       PRIMARY KEY (id))";
    //     $sth = $this->dbh->prepare($sql);
    //     $sth->execute();
    //     $sql = "INSERT INTO $comN (
    //       community, name, age, sex, feature, remarks, others
    //       ) SELECT community, name, age, sex, feature, remarks, others FROM $tbName[tbn] WHERE community = '$comL'";
    //     $sth = $this->dbh->prepare($sql);
    //     $sth->execute();
    //   }
    // endforeach;
    
    // foreach($result as $communityListVal) :
    //   $comN = $tbName['tbn'].'_'.$communityListVal['community'];
    //   $sql = "SELECT COUNT(*) FROM $comN";
    //   $sth = $this->dbh->prepare($sql);
    //   $sth->execute();
    //   $result3 = $sth->fetch(PDO::FETCH_ASSOC);
    //   if($result3["COUNT(*)"] === 0) {
    //     $sql = "DROP TABLE $comN";
    //     $sth = $this->dbh->prepare($sql);
    //     $sth->execute();
    //   }
    // endforeach;
  }
  
  /**
   * community別のテーブル内データを全削除→
   * 知人一覧からデータの削除→
   * 一覧データからcommunity別に再振り分け（community別が０になった場合テーブル削除）
   */
  public function acquaintanceDel($id) {
    $tbName['tbn'] = $_SESSION['login_user']['name'].'_'.$_SESSION['login_user']['id'];
    $sql = "SELECT DISTINCT community FROM $tbName[tbn]";
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $communityListVal) :
      $comN = $tbName['tbn'].'_'.$communityListVal['community'];
      $sql = "DELETE FROM $comN";
      $sth = $this->dbh->prepare($sql);
      $sth->execute();
    endforeach;

    $sql = "DELETE FROM $tbName[tbn] WHERE id = :id";
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':id', $id, PDO::PARAM_INT);
    $sth->execute();
    
    foreach($result as $communityListVal) :
      $comN = $tbName['tbn'].'_'.$communityListVal['community'];
      $comL = $communityListVal['community'];
      $sql = "INSERT INTO $comN (
      community, name, age, sex, feature, remarks, others
      ) SELECT community, name, age, sex, feature, remarks, others FROM $tbName[tbn] WHERE community = '$comL'";
      try {
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
      } catch(\Exception $e) {
        $sql = "DROP TABLE $comN";
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
      }
    endforeach;
    
    foreach($result as $communityListVal) :
      $comN = $tbName['tbn'].'_'.$communityListVal['community'];
      $sql = "SELECT COUNT(*) FROM $comN";
      $sth = $this->dbh->prepare($sql);
      $sth->execute();
      $result2 = $sth->fetch(PDO::FETCH_ASSOC);
      if($result2["COUNT(*)"] === 0) {
        $sql = "DROP TABLE $comN";
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
      }
    endforeach;
  }
  








  
  /**
   * 検索数分のテンポラリーテーブル（temp_tbl）を作成→
   * 検索1未記入の場合一覧テーブル全てを$temp1に入れる。記入ありの場合、記入内容と一致するか確認して、なければエラーメッセージをセッションに入れてreturn。一致すれば$temp1に入れる。→
   * 検索2未記入の場合$temp1全てを$temp2に入れる。記入ありの場合、記入内容と一致するか確認して、なければエラーメッセージをセッションに入れてreturn。一致すれば$temp2に入れる。→
   * 上記を繰り返して、$temp6をreturn。
   * @return array $result
   */
  public function acquaintanceSearch($search1, $search2, $search3, $search4, $search5, $search6) {
    $tbName['tbn'] = $_SESSION['login_user']['name'].'_'.$_SESSION['login_user']['id'];
    $temp1 = $tbName['tbn'].'_temp1';
    $temp2 = $tbName['tbn'].'_temp2';
    $temp3 = $tbName['tbn'].'_temp3';
    $temp4 = $tbName['tbn'].'_temp4';
    $temp5 = $tbName['tbn'].'_temp5';
    $temp6 = $tbName['tbn'].'_temp6';
    $sql = "CREATE TABLE $temp1 LIKE $tbName[tbn]";
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $sql = "CREATE TABLE $temp2 LIKE $tbName[tbn]";
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $sql = "CREATE TABLE $temp3 LIKE $tbName[tbn]";
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $sql = "CREATE TABLE $temp4 LIKE $tbName[tbn]";
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $sql = "CREATE TABLE $temp5 LIKE $tbName[tbn]";
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $sql = "CREATE TABLE $temp6 LIKE $tbName[tbn]";
    $sth = $this->dbh->prepare($sql);
    $sth->execute();    
    if($search1 === '') {
      $sql = "INSERT INTO $temp1 SELECT * FROM $tbName[tbn];";
      $sth = $this->dbh->prepare($sql);
      $sth->execute();
    } else {
      $sql = "SELECT * FROM $tbName[tbn] WHERE community = :search1";
      $sth = $this->dbh->prepare($sql);
      $sth->bindParam(':search1', $search1, PDO::PARAM_STR);
      $sth->execute();
      $result = $sth->fetch(PDO::FETCH_ASSOC);
      if($result === false) {
        $_SESSION['Smsg'] = '該当する項目がありません。';
        return;
      } else {
        $sql = "INSERT INTO $temp1 SELECT * FROM $tbName[tbn] WHERE community = :search1";
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(':search1', $search1, PDO::PARAM_STR);
        $sth->execute();
      }
    }

    if($search2 === '') {
      $sql = "INSERT INTO $temp2 SELECT * FROM $temp1;";
      $sth = $this->dbh->prepare($sql);
      $sth->execute();
    } else {
      $sql = "SELECT * FROM $temp1 WHERE name = :search2";
      $sth = $this->dbh->prepare($sql);
      $sth->bindParam(':search2', $search2, PDO::PARAM_STR);
      $sth->execute();
      $result = $sth->fetch(PDO::FETCH_ASSOC);
      if($result === false) {
        $_SESSION['Smsg'] = '該当する項目がありません。';  
        return;
      } else {
        $sql = "INSERT INTO $temp2 SELECT * FROM $temp1 WHERE name = :search2";
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(':search2', $search2, PDO::PARAM_STR);
        $sth->execute();
      }
    }

    if($search3 === '') {
      $sql = "INSERT INTO $temp3 SELECT * FROM $temp2;";
      $sth = $this->dbh->prepare($sql);
      $sth->execute();
    } else {
      $sql = "SELECT * FROM $temp2 WHERE age = :search3";
      $sth = $this->dbh->prepare($sql);
      $sth->bindParam(':search3', $search3, PDO::PARAM_STR);
      $sth->execute();
      $result = $sth->fetch(PDO::FETCH_ASSOC);
      if($result === false) {
        $_SESSION['Smsg'] = '該当する項目がありません。';  
        return;
      } else {
        $sql = "INSERT INTO $temp3 SELECT * FROM $temp2 WHERE age = :search3";
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(':search3', $search3, PDO::PARAM_STR);
        $sth->execute();
      }
    }

    if($search4 === '') {
      $sql = "INSERT INTO $temp4 SELECT * FROM $temp3;";
      $sth = $this->dbh->prepare($sql);
      $sth->execute();
    } else {
      $sql = "SELECT * FROM $temp3 WHERE sex = :search4";
      $sth = $this->dbh->prepare($sql);
      $sth->bindParam(':search4', $search4, PDO::PARAM_STR);
      $sth->execute();
      $result = $sth->fetch(PDO::FETCH_ASSOC);
      if($result === false) {
        $_SESSION['Smsg'] = '該当する項目がありません。';  
        return;
      } else {
        $sql = "INSERT INTO $temp4 SELECT * FROM $temp3 WHERE sex = :search4";
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(':search4', $search4, PDO::PARAM_STR);
        $sth->execute();
      }
    }

    if($search5 === '') {
      $sql = "INSERT INTO $temp5 SELECT * FROM $temp4;";
      $sth = $this->dbh->prepare($sql);
      $sth->execute();
    } else {
      $sql = "SELECT * FROM $temp4 WHERE feature = :search5";
      $sth = $this->dbh->prepare($sql);
      $sth->bindParam(':search5', $search5, PDO::PARAM_STR);
      $sth->execute();
      $result = $sth->fetch(PDO::FETCH_ASSOC);
      if($result === false) {
        $_SESSION['Smsg'] = '該当する項目がありません。';  
        return;
      } else {
        $sql = "INSERT INTO $temp5 SELECT * FROM $temp4 WHERE feature = :search5";
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(':search5', $search5, PDO::PARAM_STR);
        $sth->execute();
      }
    }

    if($search6 === '') {
      $sql = "INSERT INTO $temp6 SELECT * FROM $temp5;";
      $sth = $this->dbh->prepare($sql);
      $sth->execute();
    } else {
      $sql = "SELECT * FROM $temp5 WHERE remarks = :search6";
      $sth = $this->dbh->prepare($sql);
      $sth->bindParam(':search6', $search6, PDO::PARAM_STR);
      $sth->execute();
      $result = $sth->fetch(PDO::FETCH_ASSOC);
      if($result === false) {
        $_SESSION['Smsg'] = '該当する項目がありません。';  
        return;
      } else {
        $sql = "INSERT INTO $temp6 SELECT * FROM $temp5 WHERE remarks = :search6";
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(':search6', $search6, PDO::PARAM_STR);
        $sth->execute();
      }
    }

    $sql = "SELECT * FROM $temp6";
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  /**
   * 検索結果のテーブルがあれば削除
   */
  public function searchTblDel() {
    $tbName['tbn'] = $_SESSION['login_user']['name'].'_'.$_SESSION['login_user']['id'];
    $temp1 = $tbName['tbn'].'_temp1';
    $temp2 = $tbName['tbn'].'_temp2';
    $temp3 = $tbName['tbn'].'_temp3';
    $temp4 = $tbName['tbn'].'_temp4';
    $temp5 = $tbName['tbn'].'_temp5';
    $temp6 = $tbName['tbn'].'_temp6';
    $sql = "DROP TABLE $temp1, $temp2, $temp3, $temp4, $temp5, $temp6";
    try {
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    } catch(\Exception $e) {
      return;
    }
  }

  /**
   * ユーザー一覧テーブルの呼び出し
   */
  public function userList() {
    $sql = "SELECT * FROM users";
    try {
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
    } catch(\Exception $e) {
      return;
    }
  }

  /**
   * ユーザー物理削除
   */
  public function userDel($id) {
    $sql = "DELETE FROM users WHERE id = :id";
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':id', $id, PDO::PARAM_STR);
    $sth->execute();
  }

  /**
   * ログアウト
   */
  public static function logout() {
    $_SESSION = array();
    session_destroy();
  } 
  
  /**
   * ユーザーデータを取得
   */
  public function userData($id) {
    $sql = "SELECT * FROM users WHERE id = :id";
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':id', $id, PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  /**
   * ユーザーデータの変更
   */
  public function userEdit($id,$name, $email) {
    $sql = "UPDATE users SET id = :id, name = :name, email = :email WHERE id = :id";
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':id', $id, PDO::PARAM_INT);
    $sth->bindParam(':name', $name, PDO::PARAM_STR);
    $sth->bindParam(':email', $email, PDO::PARAM_STR);
    $sth->execute();
  }

  /**
   * パスワードリセット
   */
  public function passReset($email, $pass) {
    $hashed = password_hash($pass, PASSWORD_BCRYPT);
    $sql = "UPDATE users SET password = :pass WHERE email = :email";
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':pass', $hashed, PDO::PARAM_STR);
    $sth->bindParam(':email', $email, PDO::PARAM_STR);
    $sth->execute();
  }















  /**
   * テスト用
   */
  public function test() {
    $sql = 'SELECT * FROM users WHERE email = "admin@test.jp"';
    try {
      $sth = connect()->prepare($sql);
      // $sth->bindParam(':name', $name, PDO::PARAM_STR);
      $sth->execute();
      $result = $sth->fetch(PDO::FETCH_ASSOC);
      return $result;
    } catch(\Exception $e) {
      $result = false;
      return $result;
    }
  }
}