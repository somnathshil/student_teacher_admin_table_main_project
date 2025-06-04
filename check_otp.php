<?php
include("config.php");
session_start();
$user_id = $_SESSION['user_id'];
$OTP = $_SESSION['OTP'];
$userType = $_SESSION['user_type'];
 $timeLimit = 180;

 $enteredOTP = $_REQUEST['enteredOTP'];
 $enteredPass = md5($_REQUEST['enteredPass']);
  
  if(time()-$_SESSION['time'] > $timeLimit){
  	echo "<script>alert('OTP is expired!!')</script>";
echo "<script>window.location.href='forgotPass.php'</script>";
  }else{

  	 if($enteredOTP == $OTP){
        if($userType === "ADMIN"){
         $sql = "UPDATE `admin` SET `admin_password`='$enteredPass' WHERE `admin_id`='$user_id'";
        }else{
           if($userType === "TEACHER"){
            $sql = "UPDATE `teacher` SET `teacher_password`='$enteredPass' WHERE `teacher_id`='$user_id'";
         }else{
             $sql = "UPDATE `student` SET `stu_password`='$enteredPass' WHERE `stu_id`='$user_id'";
         }
        }
       
        $conn->query($sql);

           if($conn->affected_rows>0){
           	  echo "<script>alert('Password updated successfully!!')</script>";
              echo "<script>window.location.href='login.php'</script>";
           }else{
           	  echo "<script>alert('Password updation failled!!')</script>";
              echo "<script>window.location.href='forgotPass.php'</script>";
           }
  	 }else{
  	 	echo "<script>alert('OTP not matching!!')</script>";
         echo "<script>window.location.href='forgotPass.php'</script>";
  	 }
  	
  }

?>