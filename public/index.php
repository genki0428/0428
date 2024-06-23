<?php
define('ROOT_PATH', str_replace('public', '', $_SERVER["DOCUMENT_ROOT"]));
$parse = parse_url($_SERVER["REQUEST_URI"]);
//ファイル名が省略されていた場合、index.phpを補填する。
if(mb_substr($parse['path'], -1) === '/') {
  $parse['path'] .= $_SERVER["SCRIPT_NAME"];
}
require_once(ROOT_PATH.'Views'.$parse['path']);
// echo (ROOT_PATH.'Views'.$parse['path']);
// // C:/xampp/htdocs/kadai6/Views/index.php
// echo '<br>';
// echo '<br>';
// echo $parse['path'];
// // /index.php
// echo '<br>';
// echo '<br>';
// echo $_SERVER["SCRIPT_NAME"];
// // /index.php
// echo '<br>';
// echo '<br>';
// echo mb_substr($parse['path'], 1);
// // index.php
// echo '<br>';
// echo '<br>';
// echo ROOT_PATH;
// // C:/xampp/htdocs/kadai6/
// echo '<br>';
// echo '<br>';
// echo $_SERVER["DOCUMENT_ROOT"];
// // C:/xampp/htdocs/kadai6/public
// echo '<br>';
// echo '<br>';
// var_dump($parse);
// // array(1) { ["path"]=> string(10) "/index.php" }

// // "C:\xampp\htdocs\kadai6\public\index.php"