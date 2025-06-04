<?php
include("configChatbot.php");

$sql = "SELECT * FROM `chatbot_answers`";
$query = $conn->prepare($sql);
$query->execute();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>chatbot</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<style type="text/css">
		.question{
			
			background-color: #8ca393;
			width: 40%;
			padding: 1rem;
			 margin-left: 25rem;
			 font-style: 1.5rem;
		}
		.answer{
			width: 50%;
			padding: 1rem;
			font-style: 1.5rem;
		}
		.answerCont{
			width: 65%;
			margin: auto;
			margin-top: 3rem;

		}
		.selQst{
			width: 20rem;
			height: 3rem;
           display: block;
           margin: auto;
           font-size: 1rem;
		}
		.srchBtn{
   width: 7rem;
   height: 2rem;
   background-color: #0ea136;
   color: white;
   display: block;
   margin: auto;
   border: none;
		}
   .srchBtn:hover{
   	 background-color: #085c1f;
   border: 1px solid #0e5c23;
   }

    .backlink button{
               width: 8rem;
               height: 2rem;
               background-color: #1867c7;
               color: white;
               margin-top: 1rem;
               border: none;
          }

          .backlink button:hover{
               border: 1px solid black;
               background-color: #072c59;
          }

	</style>
</head>
<body>
	<h1 style="width: 65%;text-align: center;font-style: italic;background-color: aqua;margin: auto;">Ask me your queries</h1>
<div id="answer" class="answerCont"></div>
<select id="question" class="selQst">
	<?php while ($res = $query->fetch(PDO::FETCH_LAZY)) {
		?>
		<option value="<?php echo $res['id']; ?>"><?php echo $res['question']; ?></option>
		<?php
	} ?>
	
</select><br>
<button id="btn" class="srchBtn">Search</button>
<a href="student_profile.php" class="backlink"><button>Back</button></a>

<script type="text/javascript">
	$(document).ready(function(){
        $("#btn").click(function(){
        	var qst = $("#question").val();

        	$.ajax({
        		type:"post",
        		url: "chatbot_action.php",
        		data: {qst:qst},
        		success: function(response){
                  $("#answer").append(response);
        		},
        		error:function(xhr, status, error){
        			$("#answer").html("An error occurred: " + error);
        		}
        	})
        })
	})
</script>
</body>
</html>