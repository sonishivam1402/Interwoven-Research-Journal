<?php
session_start();
# MySql Workbench
include("../connections.php");

$connction = mysqli_connect("localhost","root","root","interwoven_research_journal");
if(!$connction)
	die("could not connect".mysqli_connect_error());

$email ="";

if (isset($_SESSION['email'])) {
	$email = $_SESSION['email'];
}

####################### 


$file = $_FILES ['filename']['name'];
// $filename = $_POST["rollno"];
$topicname = $_POST["topicname"];

// $dest = "./OS/" .$_FILES ['filename']['name']; 

echo $file , "  Uploaded Successfully";


// move_uploaded_file($_FILES['filename']['tmp_name'], $dest);
// rename($file, $filename.".pdf");

if ($topicname == "os"){
	$dest = "../admin/PDF_Task/OS/" .$_FILES ['filename']['name'];
	move_uploaded_file($_FILES['filename']['tmp_name'], $dest);
	$add = "/MINOR/templates/admin/PDF_Task/OS/".$file ;
}else if ($topicname == "cn"){
	$dest = "../admin/PDF_Task/CN/" .$_FILES ['filename']['name'];
	move_uploaded_file($_FILES['filename']['tmp_name'], $dest);
	$add = "/MINOR/templates/admin/PDF_Task/CN/".$file ;
}else if ($topicname == "dbms"){
	$dest = "../admin/PDF_Task/DBMS/" .$_FILES ['filename']['name'];
	move_uploaded_file($_FILES['filename']['tmp_name'], $dest);
	$add = "/MINOR/templates/admin/PDF_Task/DBMS/".$file ;
}else if ($topicname == "ai"){
	$dest = "../admin/PDF_Task/AI/" .$_FILES ['filename']['name'];
	move_uploaded_file($_FILES['filename']['tmp_name'], $dest);
	$add = "/MINOR/templates/admin/PDF_Task/AI/".$file ;
}else if ($topicname == "cs"){
	$dest = "../admin/PDF_Task/CS/" .$_FILES ['filename']['name'];
	move_uploaded_file($_FILES['filename']['tmp_name'], $dest);
	$add = "/MINOR/templates/admin/PDF_Task/CS/".$file ;
}else{
	$dest = "../admin/PDF_Task/OTHERS/" .$_FILES ['filename']['name'];
	move_uploaded_file($_FILES['filename']['tmp_name'], $dest);
	// $add = "/UploadPDF/ECO/".$file .".pdf";
	$add = "/MINOR/templates/admin/PDF_Task/OTHERS/".$file;
}

# $add = "/UploadPDF/".$filename .".pdf";

$query = mysqli_query($connction, "INSERT INTO pdf_db (path,topic_name,email_id,status) VALUES ('$add','$topicname','$email','pending')");

?>