<?php
include("config.php");

$id = $_REQUEST['id'];
$sql = "SELECT * FROM `student` WHERE `stu_id`='$id'";
$data = $conn->query($sql);
$result = $data->fetch_assoc();
  
  if($result['stu_auth'] == 0){

        	$sqlForUpdate = "UPDATE `student` SET `stu_auth`='1' WHERE `stu_id`='$id'";
        	 $conn->query($sqlForUpdate);
        if($conn->affected_rows>0){ 
              echo "<script>alert('User blocked!!')</script>";
              echo "<script>window.location.href='admin_dashboard.php'</script>";
        }else{   
            echo "<script>alert('User not blocked!!')</script>";
            echo "<script>window.location.href='admin_dashboard.php'</script>";
          }

  }else{

      	$sqlForUpdate = "UPDATE `student` SET `stu_auth`='0' WHERE `stu_id`='$id'";
      	 $conn->query($sqlForUpdate);
      if($conn->affected_rows>0){
              echo "<script>alert('User unblocked!!')</script>";
              echo "<script>window.location.href='admin_dashboard.php'</script>";
        }else{
            	echo "<script>alert('User not unblocked!!')</script>";
          	echo "<script>window.location.href='admin_dashboard.php'</script>";  
         }

  }


?>