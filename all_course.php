<?php
include("config.php");
$sql = "SELECT * FROM subject a LEFT OUTER JOIN teacher b ON a.sub_teacher=b.teacher_id ";
$data = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>All course details</title>
     <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
	<style type="text/css">
          .newSubAddLink{
         margin-left: 15rem;
         margin-bottom: 2rem;
          }
          .newSubAddLink button{
               width: 12rem;
               height: 2rem;
               background-color: #380f08;
               margin-top: 1rem;
               border: none;
               color: white;

          }
          .newSubAddLink button:hover{
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
	<h1 style="text-align: center;background-color: #bf8b54;height: 3rem;width: 65%;margin: auto;margin-bottom: 2rem;">All Course Details</h1>
   <table id="myTable" class="display" border="1px">
     <thead>
   	  <tr>
   	  	 <th style="width: 5rem;height: 1.5rem;">Sl.No.</th>
   	  	 <th style="width: 15rem;height: 1.5rem;">Subject Name</th>
   	  	 <th style="width: 15rem;height: 1.5rem;">Teacher Name</th>
   	  	 <th style="width: 15rem;height: 1.5rem;">Actions</th>
   	  </tr>
       </thead>
       <tbody>
   	  <?php 
   	  $i=1;
      while($result = $data->fetch_assoc()){
      	?>
      	<tr style="text-align:center;height: 2rem;width: 15rem;">
      		<td><?php echo $i;$i++; ?></td>
      		<td><?php echo $result['sub_name']; ?></td>
      		<td><?php echo $result['teacher_name']; ?></td>
      		<td>
      			<a href="editSub.php?id=<?php echo $result['sub_id'] ?>" ><button>Edit</button></a>
      			<a href="deleteSub.php?id=<?php echo $result['sub_id'] ?>" onclick="return confirm('Are you sure?')"><button>Delete</button></a>
      		</td>
   	    </tr>
      	<?php
      }
   	  ?>
   	</tbody>  
   </table>
    <br>
   <a href="reg_sub.php" class="newSubAddLink"><button>Add New Subject </button></a>
   <a href="show_teachers.php" class="prevListLink"><button>Previous page</button></a>
   <a href="logout.php" class="logoutlink"><button>Log out</button></a>
   <br><br><br>

    <script>
  $(document).ready(function() {
    $('#myTable').DataTable();
  });
</script>
</body>
</html>