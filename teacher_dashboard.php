<?php
include("config.php");
session_start();
$teacher_id = $_SESSION['id'];

$sql_for_all_st = "SELECT * FROM student a LEFT OUTER JOIN subject b ON a.sub_id = b.sub_id 
LEFT OUTER JOIN teacher c ON b.sub_teacher = c.teacher_id WHERE c.teacher_id='$teacher_id'";
$data_for_all_st = $conn->query($sql_for_all_st);

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
         margin-left: 10rem;
         margin-bottom: 2rem;
          }
          .logoutlink button{
               width: 8rem;
               height: 2rem;
               background-color: #e02e22;
               margin-top: 1rem;
               border: none;

          }
          .logoutlink button:hover{
               border: 1px solid black;
               background-color: #e81a0c;
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
	<h1 style="text-align: center;background-color: #bf8b54;height: 3rem;width: 65%;margin: auto;margin-bottom: 2rem;">Teacher Dashboard</h1>
   
      <?php 
         $sql_for_tea_details = "SELECT * FROM  subject e  LEFT OUTER JOIN teacher f  ON e.sub_teacher = f.teacher_id WHERE e.sub_teacher='$teacher_id'";
        $data_for_tea_details = $conn->query($sql_for_tea_details);
        $res = $data_for_tea_details->fetch_assoc();
      ?>

      <h2 style="text-align: center;background-color: #bd4a11;height: 2rem;width: 45%;margin: auto;margin-bottom: 2rem;">Teacher <?php echo $res['teacher_name']; ?></h2> 

      <table border="1px" align="center">
           <tr>
              <th >Teacher's Name</th>
              <th >Teacher's Email</th>
              <th >Teacher's Phone</th>
              <th >Teacher's Gender</th>
              <th >Teacher's Image</th>
              <th > Subjects </th>
              <th > Actions </th>
          </tr> 
          <tr>
              <td><?php echo $res['teacher_name']; ?></td>
              <td><?php echo $res['teacher_email']; ?></td>
              <td><?php echo $res['teacher_phone']; ?></td>
              <td><?php echo $res['teacher_gender']; ?></td>
              <td>
               <img src="<?php 
          if(!file_exists($res['teacher_image'])){ 
               if($res['teacher_gender'] === "male"){
                    echo "https://png.pngtree.com/png-vector/20240914/ourmid/pngtree-cartoon-user-avatar-vector-png-image_13572228.png";
               }else{
                    echo "https://t3.ftcdn.net/jpg/10/24/11/58/360_F_1024115848_VTfuHjHj9UVVvrUOaDQqm2clMspgRnGs.jpg";
               } 
       }else{
          echo $res['teacher_image'];
       }
     ?>" width="150" height="150">
                    
               </td>
              <td >
                   <?php
                    $subArr = [$res['sub_name']];
                    while ($res_for_sub = $data_for_tea_details->fetch_assoc()) {
                         if(!in_array($res_for_sub['sub_name'], $subArr)){
                           $subArr[] = $res_for_sub['sub_name'];
                         } 
                  }
                  $subStr = implode(",", $subArr);
                  echo $subStr;
                   ?>
              </td>
              <td>
              
                 <a href="update_teacher.php?id=<?php echo $res['teacher_id']; ?>"><button>Edit</button></a>  
                 <a href="changePassTeacher.php"><button>Password Change</button></a> 
              </td>
          
          </tr>
      </table>
      <br><br>

<h2 style="text-align: center;background-color: #bd4a11;height: 2rem;width: 45%;margin: auto;margin-bottom: 2rem;">Student Details</h2>
   <table border="1px" id="myTable" class="display">
    
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
   	while($result = $data_for_all_st->fetch_assoc()){
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
   			
   			<!-- <a href="delete.php?id=<?php echo $result['stu_id'] ?>" onclick="return confirm('Are You sure?')"><button>Delete</button></a> -->
   			<?php 
               $id = $result['stu_id'];
   			if($result['stu_auth'] == 0){
   				echo "<a href='blockUnblockByTeacher.php?id=$id'><button>Block</button></a>";
   			}else{
   				echo "<a href='blockUnblockByTeacher.php?id=$id'><button>Unblock</button></a>";   			}

   			 ?>
   			
   		</td>
   		</tr>
        <?php
   	} 
   	?>
   	</tbody>
   </table>
   <a href="logout.php" class="logoutlink"><button>Log out</button></a>

     <script>
  $(document).ready(function() {
    $('#myTable').DataTable();
  });
</script>
</body>
</html>