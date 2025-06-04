<?php
include("config.php");
session_start();
$teacher_id = $_REQUEST['teacher_id'];
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];
$gender = $_REQUEST['gender'];


$fileName = $_FILES['image']['name'];
$fileTmp = $_FILES['image']['tmp_name'];

$folder = "uploads/".$fileName."_".time();

if($folder === "uploads/".""."_".time()){
  $sql = "UPDATE `teacher` SET `teacher_name`='$name',`teacher_email`='$email',`teacher_phone`='$phone',`teacher_gender`='$gender' WHERE `teacher_id`='$teacher_id'";
}else{
	move_uploaded_file($fileTmp, $folder);
	if(file_exists($_SESSION['oldImage'])){
      unlink($_SESSION['oldImage']);
	}
	$sql = "UPDATE `teacher` SET `teacher_name`='$name',`teacher_email`='$email',`teacher_phone`='$phone',`teacher_gender`='$gender',`teacher_image`='$folder' WHERE `teacher_id`='$teacher_id'";
}

 $result = $conn->query($sql);
  if($result){
  	echo "<script>alert('Updated successfully!!')</script>";
		           echo "<script>window.location.href='teacher_dashboard.php'</script>";
 }else{
		 echo "<script>alert('Updation failed!!')</script>";
		 echo "<script>window.location.href='update_teacher.php'</script>";
	}
?>