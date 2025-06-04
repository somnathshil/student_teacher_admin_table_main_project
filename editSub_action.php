<?php
include("config.php");

$sub_id = $_REQUEST['sub_id'];
$sub_name = strtoupper($_REQUEST['sub_name']);
$sub_teacher = $_REQUEST['sub_teacher'];

$sql = "UPDATE `subject` SET `sub_name`='$sub_name',`sub_teacher`='$sub_teacher' WHERE `sub_id`='$sub_id'";
$data = $conn->query($sql);
if($data){
	echo "<script>alert('Subject updated successfully !!')</script>";
	echo "<script>window.location.href='all_course.php'</script>";
}else{
	echo "<script>alert('Subject updation failed !!')</script>";
	echo "<script>window.location.href='editSub.php'</script>";
}
?>