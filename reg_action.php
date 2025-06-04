<?php
include("config.php");

$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];
$gender = $_REQUEST['gender'];
$password = md5($_REQUEST['password']);
$subject = $_REQUEST['subject'];

$sqlForSubId = "SELECT * FROM `subject` WHERE `sub_name`='$subject'";
$dataForSubId = $conn->query($sqlForSubId);
$resForSubId = $dataForSubId->fetch_assoc();

$sub_id = $resForSubId['sub_id'];


$fileName = $_FILES['image']['name'];
$fileTmp = $_FILES['image']['tmp_name'];

$folder = "uploads/".$fileName."_".time();
	move_uploaded_file($fileTmp, $folder);


	$sqlForEmailPhoneCheck = "SELECT * FROM `student` WHERE `stu_email`='$email' OR `stu_phone`='$phone'";
	$dataForEmailPhoneCheck = $conn->query($sqlForEmailPhoneCheck);

	if($dataForEmailPhoneCheck->num_rows>0){
      echo "<script>alert('This email or phone already exists !!')</script>";
   echo "<script>window.location.href='reg.php'</script>";
	}else{

		  $sql = "INSERT INTO `student`( `stu_name`, `stu_email`, `stu_phone`, `stu_gender`, `stu_password`, `stu_image`, `sub_id`) VALUES ('$name','$email','$phone','$gender','$password','$folder','$sub_id')";


		 $conn->query($sql);
		  if($conn->affected_rows>0){
		  	echo "<script>alert('Registration successfully!!')</script>";
		   echo "<script>window.location.href='admin_dashboard.php'</script>";
		 }else{
				 echo "<script>alert('Registration failed!!')</script>";
				 echo "<script>window.location.href='reg.php'</script>";
			}
	}


  
?>