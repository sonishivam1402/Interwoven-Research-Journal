<?php
session_start();
$conn = mysqli_connect("localhost","root","root","interwoven_research_journal");

if(!$conn) {
die('Could not connect: '.mysqli_connect_error());
}

// $result1 = mysqli_query($conn, "SELECT * FROM pdf_db ;"); 

?>

<!-- // while($row1 = mysqli_fetch_array($result1))
// {
// echo $row1['id']." ";
// echo "<a href = ".$row1['path'] ."> file donwload <br></a>";
// }
 -->


<!DOCTYPE html> 
<html> 
	<head> 
		<title> Fetch Data From Database </title> 
	</head> 

	<style type="text/css">
		body{
			background: linear-gradient(33.2deg, rgb(157, 147, 247) 30.2%, rgb(117, 176, 247) 61.4%); 
		}
	</style>
	
	<body text="black"> 
	<table align="center" border="1px" style="width:600px; line-height:40px;"> 
	<tr> 
		<th colspan="5"><h2>Pending List</h2></th> 
		</tr> 
			  <th> ID </th> 
			  <th> Path </th> 
			  <th> Topic </th>
			  <th> Status</th> 
			  <th> Action</th>
			  
		</tr> 
		
		<?php 
		// show pending list
		$query = "SELECT * FROM pdf_db WHERE status = 'pending'  ORDER BY id ASC";
		$result = mysqli_query($conn,$query);

		while($rows=mysqli_fetch_assoc($result)) 
		{ 
		?> 
		<tr> 
			<td align="center"> <?php echo  $rows['id']; ?></td> 
			<td>&nbsp;&nbsp; <?php echo $rows['id']." "."<a href = ".$rows['path'] ."> file donwload <br></a>" ?></td>

			<td align="center"><?php echo  $rows['topic_name']; ?></td> 

			<td align="center"><?php echo  $rows['status']; ?></td> 

			<td align="center">
				<form action="show.php" method="POST">
            		<input type="hidden" name="id" value="<?php echo $rows['id']; ?>"/>
            		<input type="submit" name="approve" value="approve"> &nbsp &nbsp 
            		<input type="submit" name="delete" value="delete">
        		</form>
			</td>
		</tr> 
	<?php 
               } 
          ?> 

	</table> 

<?php

	if (isset($_POST['approve'])) {
		
		$id = $_POST['id'];
		$select = "UPDATE pdf_db SET status = 'approved' WHERE id = '$id' ";
		$result = mysqli_query($conn,$select);
		header("location:show.php");
	}

	if (isset($_POST['delete'])) {
		
		$id = $_POST['id'];
		$select = "DELETE FROM pdf_db WHERE id = '$id' ";
		$result = mysqli_query($conn,$select);
		header("location:show.php");
	}


?>


<!-- -------------------------------------------------------------------------- -->


&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;


<table align="center" border="1px" style="width:600px; line-height:40px;"> 
	<tr> 
		<th colspan="5"><h2>Approved List</h2></th> 
		</tr> 
			  <th> ID </th> 
			  <th> Path </th> 
			  <th> Topic </th>
			  <th> Status</th> 
			  
		</tr> 
		
		<?php 
		// approved list
		$query = "SELECT * FROM pdf_db WHERE status='approved'";
		$result = mysqli_query($conn,$query);

		while($rows=mysqli_fetch_assoc($result)) 
		{ 
		?> 
		<tr> 
			<td align="center"> <?php echo  $rows['id']; ?></td> 
			<td>&nbsp;&nbsp; <?php echo $rows['id']." "."<a href = ".$rows['path'] ."> file donwload <br></a>" ?></td>

			<td align="center"><?php echo  $rows['topic_name']; ?></td> 

			<td align="center"><?php echo  $rows['status']; ?></td> 
		</tr> 
	<?php 
               } 
          ?> 

	</table> 

	</body> 
	</html>