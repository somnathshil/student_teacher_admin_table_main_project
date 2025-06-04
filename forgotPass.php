<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forgot Password</title>
	<style type="text/css">
		.formcont{
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
	<h1 style="text-align: center;background-color: #bf8b54;height: 3rem;width: 65%;margin: auto;margin-bottom: 2rem;">Forgot Password</h1>
    <div class="formcont">
    	<form method="post" action="sent_otp_by_email.php">
    		
    		<label for='user_type'>Account Type:</label><br>
		<select name="user_type" class="input">
			<option value="">Your Account Type</option>
			<option value="STUDENT">STUDENT</option>
			<option value="TEACHER">TEACHER</option>
			<option value="ADMIN">ADMIN</option>
		</select><br>
    		<label>Email or Phone :</label>
    		<input type="text" name="emailOrPhone" class="input"><br>
    		<button name="btn" class="formbtn">send otp</button>
    	</form>
    </div>
</body>
</html>

<!-- For Email varification  -->
<!-- 1. Go to google account and create app and password.
2.In terminal pass the command "composer init".
3.In terminal pass the command "composer install".
4. In terminal pass the command "composer require phpmailer/phpmailer".
5. From chatgpt copy the otp sender php code page and put the values of gmail and app password. -->


