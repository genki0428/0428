<?php
require_once(ROOT_PATH .'/Models/Model.php');

class Controller {
  private $request;     //リクエストパラメータ（GET,POST）
  private $Model;      //Modelモデル

  public function __construct() {
    // //リクエストパラメータの取得
    $this->request['get'] = $_GET;
    $this->request['post'] = $_POST;

    // //モデルオブジェクトの生成
    $this->Model = new Model();
    $dbh = $this->Model->get_db_handler();
  }

  public function newUser() {
    $result = $this->Model->newUser($this->request['post']['accountName'], $this->request['post']['mail'], $this->request['post']['pass']);
    return $result;
  }

  public function getUserByName() {
    $result = $this->Model->getUserByName($this->request['post']['accountName']);
    return $result;
  }

  public function getUserByEmail() {
    $result = $this->Model->getUserByEmail($this->request['post']['mail']);
    return $result;
  }

  // public function addAcquaintanceAllTable() {
  //   $this->Model->addAcquaintanceAllTable($this->request['post']['accountName']);
  // }

  // public function communityTable() {
  //   $this->Model->communityTable();
  // }

  public function checkLogin() {
    $result = $this->Model->checkLogin();
    return $result;
  }

  public function login() {
    $result = $this->Model->login($this->request['post']['mail'], $this->request['post']['pass']);
    if ($result === false) {
      header("Location: login.php");
    }
  }

  // public function createTable() {
  //   $this->Model->createTable($this->request['post']['community']);
  // }

  // public function addAcquaintance() {
  //   $this->Model->addAcquaintance
  //   (
  //     $this->request['post']['community'], $this->request['post']['community'], $this->request['post']['name'], $this->request['post']['age'], $this->request['post']['sex'], $this->request['post']['feature'], $this->request['post']['remarks'], $this->request['post']['others']
  //   );
  // }

  public function addNewAcquaintance() {
    $this->Model->addNewAcquaintance
    (
      $this->request['post']['community'], $this->request['post']['name'], $this->request['post']['age'], $this->request['post']['sex'], $this->request['post']['feature'], $this->request['post']['remarks'], $this->request['post']['others']
    );
  }

  public function fullList() {
    $page = 0;
    if(isset($this->request['get']['page'])) {
      $page = $this->request['get']['page'];
    }
    $acquaintanceFullList = $this->Model->findAll($page);
    $acquaintanceCount = $this->Model->countAll();
    $params = [
      'acquaintanceFullList' => $acquaintanceFullList,
      'pages' => $acquaintanceCount / 20
    ];
    return $params;
  }

  public function detail() {
    $result = $this->Model->detail($this->request['get']['id']);
    return $result;
  }

  public function communityList() {
    $result = $this->Model->communityList();
    return $result;
  }

  public function acquaintanceEdit() {
    $this->Model->acquaintanceEdit
    (
      $this->request['post']['id'], $this->request['post']['community'], $this->request['post']['name'], $this->request['post']['age'], $this->request['post']['sex'], $this->request['post']['feature'], $this->request['post']['remarks'], $this->request['post']['others']
    );
  }

  // public function communityTblReset() {
  //   $this->Model->communityTblReset();
  // }

  // public function noDataTblDel() {
  //   $this->Model->noDataTblDel();
  // }

  public function acquaintanceDel() {
    $this->Model->acquaintanceDel($this->request['get']['id']);
  }

  public function acquaintanceSearch() {
    $result = $this->Model->acquaintanceSearch($this->request['post']['search1'], $this->request['post']['search2'], $this->request['post']['search3'], $this->request['post']['search4'], $this->request['post']['search5'], $this->request['post']['search6']);
    return $result;
  }

  public function searchTblDel() {
    $this->Model->searchTblDel();
  }

  public function userList() {
    $result = $this->Model->userList();
    return $result;
  }

  public function userDel() {
    $this->Model->userDel($this->request['get']['id']);
  }

  public function logout() {
    $this->Model->logout();
  }

  public function userData() {
    $result = $this->Model->userData($this->request['get']['id']);
    return $result;
  }

  public function userEdit() {
    $this->Model->userEdit($this->request['post']['id'], $this->request['post']['name'], $this->request['post']['email']);
  }

  public function passReset() {
    $this->Model->passReset($this->request['post']['mail'], $this->request['post']['pass']);
  }







  
  public function test() {
    $result=$this->Model->test();
    return $result;
  }
}