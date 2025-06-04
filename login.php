<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>log in</title>
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
		.newreglink{
         margin-left: 29rem;
		}
		.newreglink button{
			width: 8rem;
			height: 2rem;
			background-color: #5979e3;
			margin-top: 1rem;
			border: none;

		}
		.newreglink button:hover{
			border: 1px solid black;
			background-color: #1f49d1;
		}
		.forgotPasslink{
			margin-left: 2rem;
		}
		.forgotPasslink button{
            width: 8rem;
			height: 2rem;
			background-color: #a3c9d6;
			margin-top: 1rem;
			border: none;

		}

		.forgotPasslink button:hover{
			border: 1px solid black;
			background-color: #80bcd1;
		}
	</style>
</head>
<body>
	<h1 style="text-align: center;background-color: #bf8b54;height: 3rem;width: 65%;margin: auto;margin-bottom: 2rem;">Log in</h1>
	<div class="loginformcont">
	<form method="post" action="login_action.php">
		<label for='user_type'>Log in as:</label><br>
		<select name="user_type" class="input">
			<option value="">Your Account Type</option>
			<option value="STUDENT">STUDENT</option>
			<option value="TEACHER">TEACHER</option>
			<option value="ADMIN">ADMIN</option>
		</select><br>
		<label for='emailOrPhone'>Email or phone:</label><br>
		<input type="text" name="emailOrPhone" class="input"><br>
		<label for="password">Password:</label><br>
		<input type="password" name="password" class="input"><br>
		<button name="btn" class="formbtn">Log in</button>
	</form><br>
    </div>
<a href="reg.php" class="newreglink"><button>New Registration</button></a>
<a href="forgotPass.php" class="forgotPasslink"><button>Forgot Password</button></a>
</body>
</html>