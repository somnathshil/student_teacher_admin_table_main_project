<?php
include("config.php");
$sub_id = $_REQUEST['id'];

$sql = "SELECT * FROM subject a LEFT OUTER JOIN teacher b ON a.sub_teacher=b.teacher_id WHERE a.sub_id='$sub_id'";
$data = $conn->query($sql);
$result = $data->fetch_assoc();

$sqlForTeacher = "SELECT * FROM `teacher`";
$dataForTeacher = $conn->query($sqlForTeacher);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Subject Add</title>
	<style type="text/css">
		.regformcont{
			width: 30%;
			margin: auto;
			
		}
		.input{
			width: 22rem;
			height: 1.5rem;
			margin-bottom: 1rem;

		}
		.formbtn{
			width: 5rem;
			height: 2rem;
			background-color: #54bfa4;
			margin-top: 1rem;
			border: none;

		}
		.formbtn:hover{
			border: 1px solid black;
			background-color: #36e3b7;
		}
		
		
	
	</style>
</head>
<body>
	<h1 style="text-align: center;background-color: #bf8b54;height: 3rem;width: 65%;margin: auto;margin-bottom: 2rem;">Add New Subject</h1>
<div class="regformcont">
	<form method="post" action="editSub_action.php" >
		<input type="hidden" name="sub_id" value="<?php echo $result['sub_id']; ?>">
		<label for="sub_name">Subject Name:</label><br>
		<input type="text" name="sub_name" class="input" value="<?php echo $result['sub_name'];?>"><br>

		<label for="sub_teacher">Teacher Name:</label><br>
		<select name="sub_teacher" class="input">
			<option value="">Choose Teacher</option>
			<?php 
			while ($resForTeacher = $dataForTeacher->fetch_assoc()) {
				?>
			 	<option value="<?php echo $resForTeacher['teacher_id']; ?>" <?php if($result['teacher_name'] === $resForTeacher['teacher_name']){echo "selected";} ?> ><?php echo $resForTeacher['teacher_name']; ?></option>
			 	<?php
			 } ?>
		</select><br>
		<button class="formbtn">submit</button>
	</form>
</div>
</body>
</html>