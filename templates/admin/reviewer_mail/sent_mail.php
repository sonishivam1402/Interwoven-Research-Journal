<?php 
session_start();
?>
<!doctype html>
<html lang="en">
<head>
<title>How to generate PDF in PHP dynamically by using TCPDF</title>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width" />
<link rel="stylesheet" href="../../../css/homestyle.css">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/> -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

</head>
<body>
<!--  -->
<script>
function myFunction() {
  alert("Mail Sent !!!");
}
</script>
<!--  -->
	<header>
    <nav class="navbar">
      <div class="front">
        <img src="../../../images/logo.png" alt="" height="100px" width="300px">
      </div>

      <ul class="menu">
        <li><a href="../../../docs/about.pdf" target="_blank"><b>About</b></a></li> &nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;
        <li><a href="../../../docs/aim.pdf" target="_blank"><b>Aim</b></a></li>&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;
        <li><a href="../../../docs/Objectives.pdf" target="_blank"><b>Objective</b></a></li>&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;
        <li><a href="../../../docs/policy.pdf" target="_blank"><b>Policy</b></a></li>&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;
        <li><a href="../../../docs/authors.pdf" target="_blank"><b>Authors</b></a></li>
      </ul>
	 <div class="buttons">
        <a href="../admin_index.php"><input type="button" value="Home"></a>
      </div>
    </nav><br>
  
<div class="container">
	<!-- <div class="row"> -->
		<!-- <div class="col-lg-12" align="center"> -->

			<h2 align="center">List of Reviewers</h2><br>
			
			<table class="table">
			<thead>
			  <tr>
				<th>User Id</th>
				<th>Reviewer Name</th>
				<th>Subject</th>
				<th>Contact No</th>
				<th>Email Id</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php                
			require '../../connections.php'; 

			$display_query = "SELECT user_id, First_Name,Subject, Mobile_No, Email_Id FROM reviewers ";             
			$results = mysqli_query($conn,$display_query);   
			$count = mysqli_num_rows($results);			
			if($count>0) 
			{
				while($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC))
				{
					?>
				 <tr>
				 	<td><?php echo $data_row['user_id']; ?></td>
				 	<td><?php echo $data_row['First_Name']; ?></td>
				 	<td><?php echo $data_row['Subject']; ?></td>
				 	<td><?php echo $data_row['Mobile_No']; ?></td>
				 	<td><?php echo $data_row['Email_Id']; ?></td>
				 	<td>
				 		<form action="mail.php" method="POST">
            				<button  name="email_id" value="<?php echo $data_row['Email_Id']; ?>" onclick="myFunction()">Send Email</button>
        				</form>
					</td>
				 </tr>
				 <?php
				}
			}
			?>
			</tbody>
			</table>
		<!-- </div> -->
	<!-- </div> -->
</div>
</body>
</html> 