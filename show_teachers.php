<?php
include("config.php");

$sql = "SELECT * FROM `teacher`";
$data = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Show Teachers</title>
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
     <style type="text/css">
          .newTeaAddLink{
         margin-left: 10rem;
         margin-bottom: 2rem;
          }
          .newTeaAddLink button{
               width: 12rem;
               height: 2rem;
               background-color: #380f08;
               margin-top: 1rem;
               border: none;
               color: white;

          }
          .newTeaAddLink button:hover{
               border: 1px solid black;
               background-color: #120301;
          }
          .prevListLink button{
               width: 8rem;
               height: 2rem;
               background-color: #18495e;
               margin-top: 1rem;
               border: none;
               color: white;

          }
          .prevListLink button:hover{
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
          .allCourseLink button{
               width: 8rem;
               height: 2rem;
               background-color: #1bbf47;
               margin-top: 1rem;
               border: none;
               color: white;

          }
          .allCourseLink button:hover{
               border: 1px solid black;
               background-color: #025c1a;
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
    <h1 style="text-align: center;background-color: #bf8b54;height: 3rem;width: 65%;margin: auto;margin-bottom: 2rem;">All Teachers</h1>
  <table id="myTable" class="display" border="1px">
     <thead>
  	<tr>
  		<th>Teacher's Name</th>
  		<th>Teacher's Email</th>
  		<th>Teacher's Phone</th>
  		<th>Teacher's Gender</th>
  		<th>Teacher's Image</th>
  		<th>Teacher's Subjects</th>
  		<th>Actions</th>
  	</tr>
  </thead>
  <tbody>
  	<?php
     while($result = $data->fetch_assoc()){
          ?>
          <tr>
          <td><?php echo $result['teacher_name']; ?></td>
          <td><?php echo $result['teacher_email']; ?></td>
          <td><?php echo $result['teacher_phone']; ?></td>
          <td><?php echo $result['teacher_gender']; ?></td>
         <td><img src="<?php 
          if(!file_exists($result['teacher_image'])){ 
               if($result['teacher_gender'] === "male"){
                    echo "https://png.pngtree.com/png-vector/20240914/ourmid/pngtree-cartoon-user-avatar-vector-png-image_13572228.png";
               }else{
                    echo "https://t3.ftcdn.net/jpg/10/24/11/58/360_F_1024115848_VTfuHjHj9UVVvrUOaDQqm2clMspgRnGs.jpg";
               } 
       }else{
          echo $result['teacher_image'];
       }
     ?>" width="150" height="150"></td>

     <td>
     	<?php 
     	$sub_teacher = $result['teacher_id'];
         $sqlForSub = "SELECT * FROM `subject` WHERE `sub_teacher`='$sub_teacher'";
         $dataForSub = $conn->query($sqlForSub);
         
         $subArr = [];
           while($resForSub = $dataForSub->fetch_assoc()){
           	  $subArr[] = $resForSub['sub_name'];
           }
          $strSub = implode(",", $subArr);
           echo $strSub;
     	?>
     </td>
     <td>
         <a href="delete_teacher.php?id=<?php echo $result['teacher_id']; ?>" onclick="return confirm('Are you sure?')" ><button>Delete Teacher</button></a>
         
     </td>

     </tr>
       <?php
     }
  	?>
     </tbody>
  </table>
   <br>
   <a href="reg_teacher.php" class="newTeaAddLink"><button>Add New Teacher </button></a>
   <a href="admin_dashboard.php" class="prevListLink"><button>Previous page</button></a>
   <a href="all_course.php" class="allCourseLink"><button>All Course</button></a>
   <a href="logout.php" class="logoutlink"><button>Log out</button></a>
   <br><br><br>

    <script>
  $(document).ready(function() {
    $('#myTable').DataTable();
  });
</script>
</body>
</html>