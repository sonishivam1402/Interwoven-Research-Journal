<?php

session_start();



$conn = mysqli_connect("localhost","root","root","interwoven_research_journal");

if(!$conn) {
die('Could not connect: '.mysqli_connect_error());
}

$email = "";

if (isset($_SESSION['email_id'])) {
  $email = $_SESSION['email_id'];
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
		<th colspan="5"><h2>Approved List</h2></th> 
		</tr> 
			  <th> ID </th> 
			  <th> Path </th> 
			  <th> Topic </th>
			  <th> Status</th> 
			  
		</tr> 
		
		<?php 
		$a = "SELECT * FROM pdf_db WHERE email_id ='";
		$b = (string)$email;
		$c = "'";
		$query = $a.$b.$c;
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