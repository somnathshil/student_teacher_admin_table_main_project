<?php
include("config.php");
$stu_id = $_REQUEST['id'];
$sql = "SELECT * FROM `student` WHERE `stu_id`='$stu_id'";
$data = $conn->query($sql);
$result = $data->fetch_assoc();
if(file_exists($result['stu_image'])){
	unlink($result['stu_image']);
}
$sqlForDelete = "DELETE FROM `student` WHERE `stu_id`='$stu_id'";
 $conn->query($sqlForDelete);
 if($conn->affected_rows>0){
 	echo "<script>alert('Deleted successfully !!')</script>";
 	echo "<script>window.location.href='admin_dashboard.php'</script>";
 }else{
 	echo "<script>alert('Deletion failed !!')</script>";
 	echo "<script>window.location.href='admin_dashboard.php'</script>";
 }
?>