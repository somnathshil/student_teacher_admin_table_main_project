<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Teacher Registrtaion</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style type="text/css">
		
		.regformcont{
			width: 30%;
			margin: auto;
			
		}
		.input{
			width: 22rem;
			height: 1.8rem;
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
	<h1 style="text-align: center;background-color: #bf8b54;height: 3rem;width: 65%;margin: auto;margin-bottom: 2rem;">New Teacher Registration</h1>
	<div class="regformcont">
	<form method="post" action="reg_teacher_action.php" enctype="multipart/form-data">
		
		<label for="name">Name :</label><br>
		<input type="text" name="name" class="input nameInput" oninput="nameValid()"><br>
		<div class="nameErrDiv" style="width:90%"></div>


		<label for="email">Email :</label><br>
		<input type="text" name="email"  class="input emailInput" oninput="emailValid()"><br>
		<div class="emailErrDiv" style="width:90%"></div>

		<label for="phone">Phone :</label><br>
		<input type="text" name="phone"  class="input phoneInput" oninput="phoneValid()"><br>
		<div class="phoneErrDiv" style="width:90%"></div>

		<label for="gender">Gender :</label><br>
		<input type="radio" name="gender" value="male" onchange="genderValid()">Male
		<input type="radio" name="gender" value="female" onchange="genderValid()">Female<br>
		<div class="genderErrDiv" style="width:90%"></div>

		<label for="password">Password :</label><br>
		<input type="password" name="password"  class="input passwordInput" oninput="passwordValid()"><span class="showPass"><i class="fa-solid fa-eye"></i></span><br>
		<div class="passwordErrDiv" style="width:90%"></div>


		<label for="subject">Subject :</label><br>
		<?php
         include("config.php");
         $sql = "SELECT * FROM `subject`";
         $data = $conn->query($sql);
		?>
		<select name="subject" class="input subjectInput" onchange="subjectValid()">
			<option value="">Choose Subject</option>
			<?php while ($result = $data->fetch_assoc()) {
				?>
				<option value="<?php echo $result['sub_id']; ?>"><?php echo $result['sub_name']; ?></option>
				<?php
			} ?>
			
		</select><br>
      <div class="subjectErrDiv" style="width:90%"></div><br>


		<label for="image">Image :</label><br>
		<input type="file" name="image" class="input imageInput" onchange="imageValid()"><br>
		<div class="imageErrDiv" style="width:90%"></div><br>

		<button class="formbtn">submit</button>
		
	</form>
</div>

<script type="text/javascript">


// document.querySelector(".formbtn").disabled = true;

	function nameValid(){
				const name = document.querySelector(".nameInput");
				const errDiv = document.querySelector(".nameErrDiv");
				if(name.value === "" || name.value === null){
		             errDiv.innerHTML = "<p>You must enter name</p>";
		             name.classList.remove("sucrssInput");
		             errDiv.classList.add("errMsg");
		             name.classList.add("errInput");

				}else{
		              
		              const nameRegex = /^[a-zA-Z\s]{3,}$/;
		              if(nameRegex.test(name.value)){
		                    errDiv.innerHTML = "";
		                    errDiv.classList.remove("errMsg");
		                 name.classList.remove("errInput");
		                 name.classList.add("sucrssInput");
		                 
		              }else{
		              	 errDiv.innerHTML = "<p>Invalid Data</p>";
		              	 name.classList.remove("sucrssInput");
		                errDiv.classList.add("errMsg");
		                name.classList.add("errInput");
		              }
				}

				checkAllValid();
	}
nameValid();







	function emailValid(){
				const email = document.querySelector(".emailInput");
				const errDiv = document.querySelector(".emailErrDiv");
				if(email.value === "" || email.value === null){
		             errDiv.innerHTML = "<p>You must enter email</p>";
		             email.classList.remove("sucrssInput");
		             errDiv.classList.add("errMsg");
		             email.classList.add("errInput");

				}else{
		              
		              const emailRegex = /^[a-zA-Z0-9$#!%*&_.\s-]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/;
		              if(emailRegex.test(email.value)){
		                    errDiv.innerHTML = "";
		                    errDiv.classList.remove("errMsg");
		                 email.classList.remove("errInput");
		                 email.classList.add("sucrssInput");
		                
		              }else{
		              	 errDiv.innerHTML = "<p>Invalid Data</p>";
		              	 email.classList.remove("sucrssInput");
		                errDiv.classList.add("errMsg");
		                email.classList.add("errInput");
		              }
				}

				checkAllValid();
	}
emailValid();






	function phoneValid(){
				const phone = document.querySelector(".phoneInput");
				const errDiv = document.querySelector(".phoneErrDiv");
				if(phone.value === "" || phone.value === null){
		             errDiv.innerHTML = "<p>You must enter phone</p>";
		             phone.classList.remove("sucrssInput");
		             errDiv.classList.add("errMsg");
		             phone.classList.add("errInput");

				}else{
		              
		              const phoneRegex = /^[6-9]+[0-9]{9,9}$/;
		              if(phoneRegex.test(phone.value)){
		                    errDiv.innerHTML = "";
		                    errDiv.classList.remove("errMsg");
		                 phone.classList.remove("errInput");
		                 phone.classList.add("sucrssInput");
		                 
		              }else{
		              	 errDiv.innerHTML = "<p>Invalid Data</p>";
		              	 phone.classList.remove("sucrssInput");
		                errDiv.classList.add("errMsg");
		                phone.classList.add("errInput");
		              }
				}

				checkAllValid();
	}
	phoneValid();






		
	function genderValid(){
			const genderRadios = document.querySelectorAll('input[name="gender"]');
		    let selectedGender = "";

		    genderRadios.forEach(function(radio) {
		      if (radio.checked) {
		        selectedGender = radio.value;
		      }
		    });

		    const errDiv = document.querySelector('.genderErrDiv');

		    if (!selectedGender) {
		      errDiv.innerHTML = "<p>Please select your gender.</p>";
		      errDiv.classList.add("errMsg");
		    } else {
		      errDiv.innerHTML = "";
		     errDiv.classList.remove("errMsg");
		     
		    }

		    checkAllValid();
	}

genderValid();




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






		function subjectValid(){
		const subject = document.querySelector(".subjectInput");
		const errDiv = document.querySelector(".subjectErrDiv");
				if(subject.value === "" || subject.value === null){
		             errDiv.innerHTML = "<p>You must enter subject</p>";
		             subject.classList.remove("sucrssInput");
		             errDiv.classList.add("errMsg");
		             subject.classList.add("errInput");

				}else{

		             errDiv.innerHTML = "";
		             errDiv.classList.remove("errMsg");
		          subject.classList.remove("errInput");
		          subject.classList.add("sucrssInput");
		                 
		             
				}

				checkAllValid();
	}
subjectValid();





	function imageValid(){
		const fileInput = document.querySelector(".imageInput");
		const errDiv = document.querySelector(".imageErrDiv");

		const file = fileInput.files[0];

			if(!file){
				   errDiv.innerHTML = "<p>You must choose an image</p>";
	             errDiv.classList.add("errMsg");
			}else{
				      errDiv.innerHTML = "";
	              errDiv.classList.remove("errMsg");
	              
			}        
		checkAllValid();
	}
imageValid();





function checkAllValid() {
  const nameValid = document.querySelector(".nameInput").classList.contains("sucrssInput");
  const emailValid = document.querySelector(".emailInput").classList.contains("sucrssInput");
  const phoneValid = document.querySelector(".phoneInput").classList.contains("sucrssInput");
  const genderChecked = document.querySelector('input[name="gender"]:checked') !== null;
  const passwordValid = document.querySelector(".passwordInput").classList.contains("sucrssInput");
  const subjectValid = document.querySelector(".subjectInput").classList.contains("sucrssInput");
  const imageChosen = document.querySelector(".imageInput").files.length > 0;

  const allValid = nameValid && emailValid && phoneValid && genderChecked && passwordValid && subjectValid && imageChosen;

  document.querySelector(".formbtn").disabled = !allValid;
}




</script>
</body>
</html>