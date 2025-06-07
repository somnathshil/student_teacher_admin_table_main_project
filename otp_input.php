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
	<h1 style="text-align: center;background-color: #bf8b54;height: 3rem;width: 65%;margin: auto;margin-bottom: 2rem;">Enter OTP & Create new Password</h1>
    <div class="formcont">
    	<form method="post" action="check_otp.php">
    		<label>Enter 4 digit OTP :</label><br>
    		<input type="number" name="enteredOTP" class="input otpInput" oninput="otpValid()"><br>
    		<div class="otpErrDiv" style="width:90%"></div><br>

    		<label>Create new Password :</label><br>
    		<input type="text" name="enteredPass" class="input passwordInput" oninput="passwordValid()"><span class="showPass"><i class="fa-solid fa-eye"></i></span><br>
    		<div class="passwordErrDiv" style="width:90%"></div><br>
    		<button name="btn" class="formbtn">submit</button>
    	</form>
    </div>


    <script type="text/javascript">

      function otpValid(){
		const otp = document.querySelector(".otpInput");
		const errDiv = document.querySelector(".otpErrDiv");
				if(otp.value === "" || otp.value === null){
		             errDiv.innerHTML = "<p>You must enter otp</p>";
		             otp.classList.remove("sucrssInput");
		             errDiv.classList.add("errMsg");
		             otp.classList.add("errInput");

				}else{
		              
		              const otpRegex = /^[0-9]{4,}$/;
		              if(otpRegex.test(otp.value)){
		                    errDiv.innerHTML = "";
		                    errDiv.classList.remove("errMsg");
		                 otp.classList.remove("errInput");
		                 otp.classList.add("sucrssInput");
		                 
		              }else{
		              	 errDiv.innerHTML = "<p>Invalid Data</p>";
		              	 otp.classList.remove("sucrssInput");
		                errDiv.classList.add("errMsg");
		                otp.classList.add("errInput");
		              }
				}
		checkAllValid();
	}
	otpValid();



    	function passwordValid(){
		const password = document.querySelector(".passwordInput");
		const errDiv = document.querySelector(".passwordErrDiv");
				if(password.value === "" || password.value === null){
		             errDiv.innerHTML = "<p>You must enter password</p>";
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


let isPassShow = false;
const showPass = document.querySelector(".showPass");

showPass.addEventListener("click",function(){
    isPassShow = !isPassShow;
   if(isPassShow){
    document.querySelector(".showPass").innerHTML = "<i class='fa-solid fa-eye-slash'></i>";
    document.querySelector(".passwordInput").type = "text";
   }else{
   	document.querySelector(".showPass").innerHTML = "<i class='fa-solid fa-eye'></i>";
   	document.querySelector(".passwordInput").type = "password";
   }
});


function checkAllValid() {
  const otpValid = document.querySelector(".otpInput").classList.contains("sucrssInput");
  const passwordValid = document.querySelector(".passwordInput").classList.contains("sucrssInput");

  const allValid = otpValid &&  passwordValid;

  document.querySelector(".formbtn").disabled = !allValid;
}

    </script>
</body>
</html>
