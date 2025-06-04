<?php
include("config.php");
$teacher_id = $_REQUEST['id'];
$sql = "SELECT * FROM `teacher` WHERE `teacher_id`='$teacher_id'";
$data = $conn->query($sql);
$result = $data->fetch_assoc();
if(file_exists($result['teacher_image'])){
	unlink($result['teacher_image']);
}

$sqlForSub = "UPDATE `subject` SET `sub_teacher`=NULL WHERE `sub_teacher`='$teacher_id'";
$conn->query($sqlForSub);
if($conn->affected_rows>0){

	$sqlForDelete = "DELETE FROM `teacher` WHERE `teacher_id`='$teacher_id'";
	 $conn->query($sqlForDelete);
	 if($conn->affected_rows>0){
	 	echo "<script>alert('Deleted successfully !!')</script>";
	 	echo "<script>window.location.href='show_teachers.php'</script>";
	 }else{
	 	echo "<script>alert('Deletion failed !!')</script>";
	 	echo "<script>window.location.href='show_teachers.php'</script>";
	 }

 }else{
 	$sqlForDelete = "DELETE FROM `teacher` WHERE `teacher_id`='$teacher_id'";
	 $conn->query($sqlForDelete);
	 if($conn->affected_rows>0){
	 	echo "<script>alert('Deleted successfully !!')</script>";
	 	echo "<script>window.location.href='show_teachers.php'</script>";
	 }else{
	 	echo "<script>alert('Deletion failed !!')</script>";
	 	echo "<script>window.location.href='show_teachers.php'</script>";
	 }
 }	 
?>