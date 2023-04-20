<?php

$conn = mysqli_connect("localhost","root","root","interwoven_research_journal");

if(!$conn) {
die('Could not connect: '.mysqli_connect_error());
}

$result1 = mysqli_query($conn, "SELECT * FROM pdf_db ;"); 


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
	
	<body bgcolor="black" text="white"> 
	<table align="center" border="1px" style="width:600px; line-height:40px;"> 
	<tr> 
		<th colspan="3"><h2>Files Uploaded</h2></th> 
		</tr> 
			  <th> ID </th> 
			  <th> Path </th> 
			  <th> Topic </th> 
			  
		</tr> 
		
		<?php while($rows=mysqli_fetch_assoc($result1)) 
		{ 
		?> 
		<tr> <td> <?php echo  $rows['id']; ?></td> 
		<td> <?php echo $rows['id']." "."<a href = ".$rows['path'] ."> file donwload <br></a>" ?></td>
		<td><?php echo  $rows['topic_name']; ?></td> 
		</tr> 
	<?php 
               } 
          ?> 

	</table> 
	</body> 
	</html>