<?php
include("config.php");
$stu_id = $_REQUEST['idForPassChange'];
$oldPass = md5($_POST['oldPassword']);
$newPass = md5($_POST['newPassword']);
$conPass = md5($_POST['conPassword']);

$sqlForPassCheck = "SELECT * FROM `student` WHERE `stu_id`='$stu_id'";
$dataForPassCheck = $conn->query($sqlForPassCheck);
$res = $dataForPassCheck->fetch_assoc();

if($res['stu_password'] === $oldPass){
      if($oldPass != $newPass){
            if($newPass === $conPass){
            	$sql = "UPDATE `student` SET `stu_password`='$conPass' WHERE `stu_id`='$stu_id'";
            	$conn->query($sql);
            	if($conn->affected_rows>0){
            		echo "<script>alert('Password updated successfully!!')</script>";
	                 echo "<script>window.location.href='student_profile.php'</script>";
            	}else{
            		echo "<script>alert('Password updation failed due to db error!!')</script>";
	                 echo "<script>window.location.href='changePass.php'</script>";
            	}

            }else{
               	echo "<script>alert('Your new and confirm password not matching!!')</script>";
	           echo "<script>window.location.href='changePass.php'</script>";	
            }
      }else{
      	echo "<script>alert('Your old and new password are same!!')</script>";
	echo "<script>window.location.href='changePass.php'</script>";
      }
}else{
	echo "<script>alert('Your old password not matching!!')</script>";
	echo "<script>window.location.href='changePass.php'</script>";
}

?>