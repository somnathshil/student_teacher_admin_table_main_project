<?php
include("config.php");
$sql = "SELECT * FROM student a LEFT OUTER JOIN subject b ON a.sub_id = b.sub_id 
LEFT OUTER JOIN teacher c ON b.sub_teacher = c.teacher_id ";
$data = $conn->query($sql);

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
          .stuRegLink{
         margin-left: 10rem;
         margin-bottom: 2rem;
          }
          .stuRegLink button{
               width: 12rem;
               height: 2rem;
               background-color: #380f08;
               margin-top: 1rem;
               border: none;
               color: white;

          }
          .stuRegLink button:hover{
               border: 1px solid black;
               background-color: #120301;
          }
          .teacherListLink button{
               width: 8rem;
               height: 2rem;
               background-color: #18495e;
               margin-top: 1rem;
               border: none;
               color: white;

          }
          .teacherListLink button:hover{
               border: 1px solid black;
               background-color: #082a38;
               
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
               background-color: #9c1503;
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
	<h1 style="text-align: center;background-color: #bf8b54;height: 3rem;width: 65%;margin: auto;margin-bottom: 2rem;">Admin Dashboard</h1>
   <table id="myTable" class="display" border="1px">
     <thead>
    	<tr>
   		<th>Sl. No.</th>
   		<th>Name</th>
   		<th>Email</th>
   		<th>Phone</th>
   		<th>Gender</th>
   		<th>User Type</th>
   		<th>Image</th>
   		<th>Subject Name</th>
   		<th>Teacher Name</th>
   		<th>Actions</th>
   		
   	</tr> 
     </thead>
     <tbody>
   	<?php 
   	$i = 1;
   	while($result = $data->fetch_assoc()){
        ?>
        <tr>
        <td><?php echo $i;$i++; ?></td>
   		<td><?php echo $result['stu_name'] ?></td>
   		<td><?php echo $result['stu_email'] ?></td>
   		<td><?php echo $result['stu_phone'] ?></td>
          <td><?php echo $result['stu_gender'] ?></td>
          <td><?php echo $result['student_user_type'] ?></td>
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
   		<td><?php echo $result['sub_name'] ?></td>
   		<td>
   			<?php
   			echo $result['teacher_name'];
   			 
   			 ?>
   				
   			</td>
   		<td>
   			
   			<a href="delete.php?id=<?php echo $result['stu_id'] ?>" onclick="return confirm('Are You sure?')"><button>Delete</button></a>
   			<?php 
               $id = $result['stu_id'];
   			if($result['stu_auth'] == 0){
   				echo "<a href='blockUnblock.php?id=$id'><button>Block</button></a>";
   			}else{
   				echo "<a href='blockUnblock.php?id=$id'><button>Unblock</button></a>";   			}

   			 ?>
   			
   		</td>
   		</tr>
        <?php
   	} 
   	?>
     </tbody>
   	
   </table>
   <br>
   <a href="reg.php" class="stuRegLink"><button>New Student Register</button></a>
   <a href="show_teachers.php" class="teacherListLink"><button>All Teachers</button></a>
   <a href="logout.php" class="logoutlink"><button>Log out</button></a>
   <br><br><br>

   <script>
  $(document).ready(function() {
    $('#myTable').DataTable();
  });
</script>
</body>
</html>