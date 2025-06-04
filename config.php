<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "som_ejob5";

try{
	
$conn = new mysqli($host,$username,$password,$db);

}catch(EXCEPTION $error){
  echo "Error is = ".$error;
}

?>