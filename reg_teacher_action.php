<?php
include("config.php");
session_start();
$admin_id = $_SESSION['id'];

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


	$sqlForEmailPhoneCheck = "SELECT * FROM `teacher` WHERE `teacher_email`='$email' OR `teacher_phone`='$phone'";
	$dataForEmailPhoneCheck = $conn->query($sqlForEmailPhoneCheck);

	if($dataForEmailPhoneCheck->num_rows>0){

      echo "<script>alert('This email or phone already exists !!')</script>";
   echo "<script>window.location.href='reg_teacher.php'</script>";
	}else{

		  $sql = "INSERT INTO `teacher`( `teacher_name`, `teacher_email`, `teacher_phone`, `teacher_gender`, `teacher_password`, `teacher_image`, `admin_id`) VALUES ('$name','$email','$phone','$gender','$password','$folder','$admin_id')";


		 $conn->query($sql);
		  if($conn->affected_rows>0){
             
              $sqlLastTeacherId = "SELECT * FROM `teacher` WHERE `teacher_email`='$email'";
              $dataLastTeacher = $conn->query($sqlLastTeacherId);
              $resLastTeacher = $dataLastTeacher->fetch_assoc();

              $sub_teacher = $resLastTeacher['teacher_id'];

              $sqlSetSub = "UPDATE `subject` SET `sub_teacher`='$sub_teacher' WHERE `sub_id`='$subject'";
              $result = $conn->query($sqlSetSub);

              if($result){
              	  echo "<script>alert('Registration successfull !!')</script>";
		         echo "<script>window.location.href='show_teachers.php'</script>";
              }else{
              	echo "<script>alert('Something went wrong with subject !!')</script>";
		       echo "<script>window.location.href='show_teachers.php'</script>";
              }

		  	
		 }else{
				 echo "<script>alert('Registration failed!!')</script>";
				 echo "<script>window.location.href='reg_teacher.php'</script>";
			}
	}


  
?>