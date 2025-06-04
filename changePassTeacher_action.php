<?php
include("config.php");
$teacher_id = $_REQUEST['idForPassChange'];
$oldPass = md5($_POST['oldPassword']);
$newPass = md5($_POST['newPassword']);
$conPass = md5($_POST['conPassword']);

$sqlForPassCheck = "SELECT * FROM `teacher` WHERE `teacher_id`='$teacher_id'";
$dataForPassCheck = $conn->query($sqlForPassCheck);
$res = $dataForPassCheck->fetch_assoc();

if($res['teacher_password'] === $oldPass){
      if($oldPass != $newPass){
            if($newPass === $conPass){
            	$sql = "UPDATE `teacher` SET `teacher_password`='$conPass' WHERE `teacher_id`='$teacher_id'";
            	$conn->query($sql);
            	if($conn->affected_rows>0){
            		echo "<script>alert('Password updated successfully!!')</script>";
	                 echo "<script>window.location.href='teacher_dashboard.php'</script>";
            	}else{
            		echo "<script>alert('Password updation failed due to db error!!')</script>";
	                 echo "<script>window.location.href='changePassTeacher.php'</script>";
            	}

            }else{
               	echo "<script>alert('Your new and confirm password not matching!!')</script>";
	           echo "<script>window.location.href='changePassTeacher.php'</script>";	
            }
      }else{
      	echo "<script>alert('Your old and new password are same!!')</script>";
	echo "<script>window.location.href='changePassTeacher.php'</script>";
      }
}else{
	echo "<script>alert('Your old password not matching!!')</script>";
	echo "<script>window.location.href='changePassTeacher.php'</script>";
}

?>