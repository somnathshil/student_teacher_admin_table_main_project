<?php
session_start();
if(isset($_SESSION['id'])){
$idForPassChange = $_SESSION['id']; 
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Password change</title>
	<style type="text/css">
		.loginformcont{
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
	<h1 style="text-align: center;background-color: #bf8b54;height: 3rem;width: 65%;margin: auto;margin-bottom: 2rem;">Password Change</h1>
	<div class="loginformcont">
<form method="post" action="changePass_action.php">
	<input type="hidden" name="idForPassChange" value="<?php echo $idForPassChange; ?>">
	<label for="oldPassword">Old Password :</label><br>
	<input type="password" name="oldPassword" class="input"><br>

	<label for="newPassword">New Password :</label><br>
	<input type="password" name="newPassword" class="input"><br>

	<label for="conPassword">Confirm Password :</label><br>
	<input type="text" name="conPassword" class="input"><br>
	<button name="btn" class="formbtn">submit</button>
</form>
</div>
</body>
</html>