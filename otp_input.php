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
	<h1 style="text-align: center;background-color: #bf8b54;height: 3rem;width: 65%;margin: auto;margin-bottom: 2rem;">Enter OTP & Create new Password</h1>
    <div class="formcont">
    	<form method="post" action="check_otp.php">
    		<label>Enter 4 digit OTP :</label><br>
    		<input type="number" name="enteredOTP" class="input"><br>

    		<label>Create new Password :</label><br>
    		<input type="text" name="enteredPass" class="input"><br>
    		<button name="btn" class="formbtn">submit</button>
    	</form>
    </div>
</body>
</html>