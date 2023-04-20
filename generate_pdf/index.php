<!doctype html>
<html lang="en">
<head>
<title>How to generate PDF in PHP dynamically by using TCPDF</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width" />
<!-- *Note: You must have internet connection on your laptop or pc other wise below code is not working -->
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- bootstrap css and js -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
<!-- JS for jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-lg-12" align="center">
			<br>
			<h5 align="center">How to generate PDF in PHP dynamically by using TCPDF</h5>
			<br>
			<table class="table table-striped">
			<thead>
			  <tr>
				<th>User Id</th>
				<th>Reviewer Name</th>
				<th>Contact No</th>
				<th>Email Id</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php                
			require 'database_connection.php'; 
			$display_query = "SELECT T1.user_id, T1.First_Name, T1.Mobile_No, T1.Email_Id FROM reviewer T1";             
			$results = mysqli_query($con,$display_query);   
			$count = mysqli_num_rows($results);			
			if($count>0) 
			{
				while($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC))
				{
					?>
				 <tr>
				 	<td><?php echo $data_row['user_id']; ?></td>
				 	<td><?php echo $data_row['First_Name']; ?></td>
				 	<td><?php echo $data_row['Mobile_No']; ?></td>
				 	<td><?php echo $data_row['Email_Id']; ?></td>
				 	<td>
				 		<a href="pdf_maker.php?MST_ID=<?php echo $data_row['MST_ID']; ?>&ACTION=VIEW" class="btn btn-success"><i class="fa fa-file-pdf-o"></i> View PDF</a> &nbsp;&nbsp; 
				 		<a href="pdf_maker.php?MST_ID=<?php echo $data_row['MST_ID']; ?>&ACTION=DOWNLOAD" class="btn btn-danger"><i class="fa fa-download"></i> Download PDF</a>
						&nbsp;&nbsp; 
				 		<a href="pdf_maker.php?MST_ID=<?php echo $data_row['MST_ID']; ?>&ACTION=UPLOAD" class="btn btn-warning"><i class="fa fa-upload"></i> Upload PDF</a>
				 		&nbsp;&nbsp; 
				 		<a href="pdf_maker.php?MST_ID=<?php echo $data_row['MST_ID']; ?>&ACTION=EMAIL" class="btn btn-info"><i class="fa fa-envelope"></i> Email PDF</a>
					</td>
				 </tr>
				 <?php
				}
			}
			?>
			</tbody>
			</table>
		</div>
	</div>
</div>
<br>
<center>Developed by Shivam </a></center>
</body>
</html> 