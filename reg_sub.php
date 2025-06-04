<?php
include("config.php");

$sql = "SELECT * FROM `teacher`";
$data = $conn->query($sql);
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
	<form method="post" action="reg_sub_action.php" >
		<label for="sub_name">Subject Name:</label><br>
		<input type="text" name="sub_name" class="input"><br>

		<label for="sub_teacher">Teacher Name:</label><br>
		<select name="sub_teacher" class="input">
			<option value="">Choose Teacher</option>
			<?php 
			while ($result = $data->fetch_assoc()) {
				?>
			 	<option value="<?php echo $result['teacher_id']; ?>"><?php echo $result['teacher_name']; ?></option>
			 	<?php
			 } ?>
		</select><br>
		<button class="formbtn">submit</button>
	</form>
</div>
</body>
</html>