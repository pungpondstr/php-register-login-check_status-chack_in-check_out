<?php

session_start();

date_default_timezone_set("Asia/Bangkok");
$date = date('Y-d-m').'-'.date("H:i:s");
$date1 = date('d');

$db_con = "mysql:host=localhost;dbname=type";
$user = 'root';
$pass = '';

try {
  $object1 = new PDO($db_con, $user, $pass);
  //echo 'welcme';
} catch (\Exception $e) {
  $e -> getMessage();
}


?>
