<?php
include("config.php");

$sub_name = strtoupper($_REQUEST['sub_name']);
$sub_teacher = !empty($_REQUEST['sub_teacher']) ? $_REQUEST['sub_teacher'] : 'null';

$sql = "INSERT INTO `subject`( `sub_name`, `sub_teacher`) VALUES ('$sub_name',$sub_teacher)";
$conn->query($sql);
if($conn->affected_rows>0){
	echo "<script>alert('Subject added successfully !!')</script>";
	echo "<script>window.location.href='all_course.php'</script>";
}else{
	echo "<script>alert('Subject addition failed !!')</script>";
	echo "<script>window.location.href='reg_sub.php'</script>";
}
?>