<?php
include("config.php");
$sub_id = $_REQUEST['id'];
$sql = "DELETE FROM `subject` WHERE `sub_id`='$sub_id'";
$data = $conn->query($sql);
if($data){
	echo "<script>alert('Subject deleted successfully !!')</script>";
	echo "<script>window.location.href='all_course.php'</script>";
}else{
	echo "<script>alert('Subject deletion failed !!')</script>";
	echo "<script>window.location.href='all_course.php'</script>";
}
?>