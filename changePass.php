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

		.errMsg{
			background-color: red;
			color:white;
		}

		.errInput {
  border: 1px solid red !important;
  outline: none;           /* remove focus outline */
  box-shadow: none !important; /* remove any shadows */
}
.sucrssInput {
  border: 1px solid green !important;
  outline: none;           /* remove focus outline */
  box-shadow: none !important; /* remove any shadows */
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
	<input type="password" name="newPassword" class="input newpassInput" oninput="passwordValid()"><br>
	<div class="newpassErrDiv" style="width:90%"></div><br>

	<label for="conPassword">Confirm Password :</label><br>
	<input type="text" name="conPassword" class="input conpassInput" oninput="conpassValid()"><br>
	<div class="conpassErrDiv" style="width:90%"></div><br>

	<button name="btn" class="formbtn">submit</button>
</form>
</div>

<script type="text/javascript">
		function passwordValid(){
		const password = document.querySelector(".newpassInput");
		const errDiv = document.querySelector(".newpassErrDiv");
				if(password.value === "" || password.value === null){
		             errDiv.innerHTML = "<p>You must enter New Password</p>";
		             password.classList.remove("sucrssInput");
		             errDiv.classList.add("errMsg");
		             password.classList.add("errInput");

				}else{
		              
		              const passwordRegex = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[#@$!%*?&])[A-Za-z\d@#$!%*?&]{8,}$/;
		              if(passwordRegex.test(password.value)){
		                    errDiv.innerHTML = "";
		                    errDiv.classList.remove("errMsg");
		                 password.classList.remove("errInput");
		                 password.classList.add("sucrssInput");
		                 
		              }else{
		              	 errDiv.innerHTML = "<p>Invalid Data</p>";
		              	 password.classList.remove("sucrssInput");
		                errDiv.classList.add("errMsg");
		                password.classList.add("errInput");
		              }
				}
		checkAllValid();
	}
	passwordValid();


function conpassValid(){
		const password = document.querySelector(".conpassInput");
		const errDiv = document.querySelector(".conpassErrDiv");
				if(password.value === "" || password.value === null){
		             errDiv.innerHTML = "<p>You must enter Confirm Password</p>";
		             password.classList.remove("sucrssInput");
		             errDiv.classList.add("errMsg");
		             password.classList.add("errInput");

				}else{
		              
		              const passwordRegex = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[#@$!%*?&])[A-Za-z\d@#$!%*?&]{8,}$/;
		              if(passwordRegex.test(password.value)){
		                    errDiv.innerHTML = "";
		                    errDiv.classList.remove("errMsg");
		                 password.classList.remove("errInput");
		                 password.classList.add("sucrssInput");
		                 
		              }else{
		              	 errDiv.innerHTML = "<p>Invalid Data</p>";
		              	 password.classList.remove("sucrssInput");
		                errDiv.classList.add("errMsg");
		                password.classList.add("errInput");
		              }
				}
		checkAllValid();
	}
	conpassValid();


function checkAllValid() {
  const newPassValid = document.querySelector(".newpassInput").classList.contains("sucrssInput");
  const conPassValid = document.querySelector(".conpassInput").classList.contains("sucrssInput");

  const allValid = newPassValid && conPassValid;

  document.querySelector(".formbtn").disabled = !allValid;
}


</script>
</body>
</html>