<?php 
include("config.php");
session_start();
$teacher_id = $_REQUEST['id'];
$sql = "SELECT * FROM `teacher` WHERE `teacher_id`='$teacher_id'";
$data = $conn->query($sql);
$result = $data->fetch_assoc();
$_SESSION['oldImage'] = $result['teacher_image'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Teacher Profile</title>
	<style type="text/css">
		.ediformcont{
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
	<h1 style="text-align: center;background-color: #bf8b54;height: 3rem;width: 65%;margin: auto;margin-bottom: 2rem;">Update Teacher Profile</h1>
	<div class="ediformcont">
	<form method="post" action="update_teacher_action.php" enctype="multipart/form-data">
		<input type="hidden" name="teacher_id" value="<?php echo $result['teacher_id']; ?>" >
		<label for="name">Name :</label><br>
		<input type="text" name="name" value="<?php echo $result['teacher_name']; ?>" class="input nameInput"  oninput="nameValid()"><br>
		<div class="nameErrDiv" style="width:90%"></div>

		<label for="email">Email :</label><br>
		<input type="text" name="email" value="<?php echo $result['teacher_email']; ?>" class="input emailInput"  oninput="emailValid()"><br>
		<div class="emailErrDiv" style="width:90%"></div>

		<label for="phone">Phone :</label><br>
		<input type="text" name="phone" value="<?php echo $result['teacher_phone']; ?>" class="input phoneInput" oninput="phoneValid()"><br>
		<div class="phoneErrDiv" style="width:90%"></div>

		<label for="gender">Gender :</label><br>
		<input type="radio" name="gender" value="male" <?php  if($result['teacher_gender'] == "male"){echo "checked";} ?> onchange="genderValid()">Male
		<input type="radio" name="gender" value="female" <?php  if($result['teacher_gender'] == "female"){echo "checked";} ?> onchange="genderValid()">Female<br>
		<div class="genderErrDiv" style="width:90%"></div>

          <img src="<?php echo $result['teacher_image']; ?>" width="100" height="100" ><br>
		<label for="image">Image :</label><br>
		<input type="file" name="image" class="input" ><br>

		<button class="formbtn">submit</button>
		
	</form>
</div>

<script type="text/javascript">



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


function checkAllValid() {
  const nameValid = document.querySelector(".nameInput").classList.contains("sucrssInput");
  const emailValid = document.querySelector(".emailInput").classList.contains("sucrssInput");
  const phoneValid = document.querySelector(".phoneInput").classList.contains("sucrssInput");
  const genderChecked = document.querySelector('input[name="gender"]:checked') !== null;

  const allValid = nameValid && emailValid && phoneValid && genderChecked;

  document.querySelector(".formbtn").disabled = !allValid;
}




</script>
</body>
</html>