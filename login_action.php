<?php
include("config.php");
session_start();
$user_type = $_REQUEST['user_type'];
$emailOrPhone = $_REQUEST['emailOrPhone'];
	$password = md5($_REQUEST['password']);

   if($user_type === ""){
   	echo "<script>alert('You did not choose any user type !!')</script>";
   	echo "<script>window.location.href='login.php'</script>";
   }else{
   	 if($user_type === "ADMIN"){
         $sql = "SELECT * FROM `admin` WHERE (`admin_email`='$emailOrPhone' OR `admin_phone`='$emailOrPhone') AND `admin_password`='$password'";
         $data = $conn->query($sql);
         if($data->num_rows == 1){
         	 $result = $data->fetch_assoc();
         	  $_SESSION['id'] = $result['admin_id'];
		           echo "<script>alert('Welcome Admin, Logged in successfully!!')</script>";
		           echo "<script>window.location.href='admin_dashboard.php'</script>";
         }else{
         	 echo "<script>alert('Wrong password or this admin not exists!!')</script>";
		           echo "<script>window.location.href='login.php'</script>";
         }
   	 }else{
   	 	if($user_type === "TEACHER"){
	   	 		$sql = "SELECT * FROM `teacher` WHERE (`teacher_email`='$emailOrPhone' OR `teacher_phone`='$emailOrPhone') AND `teacher_password`='$password'";
	   	 		   $data = $conn->query($sql);
	         if($data->num_rows == 1){
	         	 $result = $data->fetch_assoc();
	         	  $_SESSION['id'] = $result['teacher_id'];
			           echo "<script>alert('Welcome Teacher, Logged in successfully!!')</script>";
			           echo "<script>window.location.href='teacher_dashboard.php'</script>";
	         }else{
	         	 echo "<script>alert('Wrong password or this teacher not exists!!')</script>";
			           echo "<script>window.location.href='login.php'</script>";
	         }
   	 	}else{



   	 		   		$sql = "SELECT * FROM `student` WHERE (`stu_email`='$emailOrPhone' OR `stu_phone`='$emailOrPhone') AND `stu_password`='$password'";
	   	 		   $data = $conn->query($sql);
	         if($data->num_rows == 1){
	         	 $result = $data->fetch_assoc();
	         	 if($result['stu_auth'] == 0){

	         	       $_SESSION['id'] = $result['stu_id'];
			           echo "<script>alert('Welcome Student, Logged in successfully!!')</script>";
			           echo "<script>window.location.href='student_profile.php'</script>";
				       }else{
				       	 echo "<script>alert('Sorry you are blocked by admin')</script>";
			           echo "<script>window.location.href='login.php'</script>";
				       }
	         }else{
	         	 echo "<script>alert('Wrong password or this student not exists!!')</script>";
			           echo "<script>window.location.href='login.php'</script>";
	         }
   	 	}
   	 }
   }
	
	

?>