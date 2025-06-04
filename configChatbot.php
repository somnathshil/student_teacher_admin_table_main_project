<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "som_ejob5";


try{

$conn = new PDO("mysql:host={$host};dbname={$db}",$username,$password);

$conn->setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $err){
  echo "The error is ".$err;
}
?>