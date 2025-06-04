<?php
include("config.php");
session_start();
$stu_id = $_REQUEST['stu_id'];
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];
$gender = $_REQUEST['gender'];


$fileName = $_FILES['image']['name'];
$fileTmp = $_FILES['image']['tmp_name'];

$folder = "uploads/".$fileName."_".time();

if($folder === "uploads/".""."_".time()){
  $sql = "UPDATE `student` SET `stu_name`='$name',`stu_email`='$email',`stu_phone`='$phone',`stu_gender`='$gender' WHERE `stu_id`='$stu_id'";
}else{
	move_uploaded_file($fileTmp, $folder);
	if(file_exists($_SESSION['oldImage'])){
      unlink($_SESSION['oldImage']);
	}
	$sql = "UPDATE `student` SET `stu_name`='$name',`stu_email`='$email',`stu_phone`='$phone',`stu_gender`='$gender',`stu_image`='$folder' WHERE `stu_id`='$stu_id'";
}

 $result = $conn->query($sql);
  if($result){
  	echo "<script>alert('Updated successfully!!')</script>";
		           echo "<script>window.location.href='student_profile.php'</script>";
 }else{
		 echo "<script>alert('Updation failed!!')</script>";
		 echo "<script>window.location.href='update.php'</script>";
	}
?>