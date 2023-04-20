<?php

# MySql Workbench

$connction = mysqli_connect("localhost","root","root","interwoven_research_journal");
if(!$connction)
	die("could not connect".mysqli_connect_error());

#######################


$file = $_FILES ['filename']['name'];
$filename = $_POST["rollno"];
$topicname = $_POST["topicname"];

// $dest = "./OS/" .$_FILES ['filename']['name']; 

echo $file , "  Uploaded Successfully";

// move_uploaded_file($_FILES['filename']['tmp_name'], $dest);
// rename($file, $filename.".pdf");

if ($topicname == "OS"){
	$dest = "./OS/" .$_FILES ['filename']['name'];
	move_uploaded_file($_FILES['filename']['tmp_name'], $dest);
	$add = "/InterwovenRJ/UploadPDF/OS/".$file ;
}else{
	$dest = "./ECO/" .$_FILES ['filename']['name'];
	move_uploaded_file($_FILES['filename']['tmp_name'], $dest);
	// $add = "/UploadPDF/ECO/".$file .".pdf";
	$add = "/InterwovenRJ/UploadPDF/ECO/".$file;
}

# $add = "/UploadPDF/".$filename .".pdf";

$query = mysqli_query($connction, "INSERT INTO pdf_db (id,path,topic_name) VALUES ('$filename','$add','$topicname')");

?>