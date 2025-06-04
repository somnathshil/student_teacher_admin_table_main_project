<?php
include("config.php");
session_start();
$stu_id = $_SESSION['id'];


$sql = "SELECT * FROM student a LEFT OUTER JOIN subject b ON a.sub_id=b.sub_id LEFT OUTER JOIN teacher c ON b.sub_teacher=c.teacher_id WHERE  a.stu_id='$stu_id'";
$data = $conn->query($sql);

$result = $data->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Dashboard</title>
     <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
      <style type="text/css">
          .logoutlink{
         margin-left: 13rem;
         margin-bottom: 2rem;
          }
          .logoutlink button{
               width: 8rem;
               height: 2rem;
               background-color: #e02e22;
               margin-top: 1rem;
               border: none;
               color: white;

          }
          .logoutlink button:hover{
               border: 1px solid black;
               background-color: #750b01;
          }

          .chatbotlink button{
               width: 8rem;
               height: 2rem;
               background-color: #1867c7;
               color: white;
               margin-top: 1rem;
               border: none;
          }

          .chatbotlink button:hover{
               border: 1px solid black;
               background-color: #072c59;
          }

           #myTable thead tr {
    background-color: #343a40;
    color: white;
    text-align: center;
    font-weight: bold;
    font-size: 16px;
  }

  #myTable thead th {
    padding: 10px;
    border: 1px solid #ccc;
  }
     </style>
</head>
<body>
	<h1 style="text-align: center;background-color: #bf8b54;height: 3rem;width: 65%;margin: auto;margin-bottom: 2rem;">User Profile</h1>
   <table border="1px" id="myTable" class="display" >
     <thead>
   	<tr>
   		<th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Gender</th>
          <th>User Type</th>
          <th>Subject Name</th>
          <th>Teacher Name</th>
           <th>Image</th>
          <th>Actions</th>
   	</tr>
   </thead>
   <tbody>
        <tr>
        
   		<td><?php echo $result['stu_name'] ?></td>
   		<td><?php echo $result['stu_email'] ?></td>
   		<td><?php echo $result['stu_phone'] ?></td>
          <td><?php echo $result['stu_gender'] ?></td>
          <td><?php echo $result['student_user_type'] ?></td>
   		<td><?php echo $result['sub_name'] ?></td>
          <td><?php echo $result['teacher_name'] ?></td>
   		<td><img src="<?php 
          if(!file_exists($result['stu_image'])){ 
               if($result['stu_gender'] === "male"){
                    echo "https://png.pngtree.com/png-vector/20240914/ourmid/pngtree-cartoon-user-avatar-vector-png-image_13572228.png";
               }else{
                    echo "https://t3.ftcdn.net/jpg/10/24/11/58/360_F_1024115848_VTfuHjHj9UVVvrUOaDQqm2clMspgRnGs.jpg";
               } 
       }else{
          echo $result['stu_image'];
       }
     ?>" width="150" height="150"></td>
   		
   		<td>
   			<a href="update.php?id=<?php echo $result['stu_id']; ?>"><button>Edit</button></a>
               <a href="changePass.php"><button>Change Password</button></a>
   				
   		</td>
   		</tr>
   	</tbody>
   </table>
   <a href="logout.php" class="logoutlink"><button>Log out</button></a>
   <a href="chatbot.php" class="chatbotlink"><button>Ask me</button></a>
     <script>
  $(document).ready(function() {
    $('#myTable').DataTable();
  });
</script>
</body>
</html>