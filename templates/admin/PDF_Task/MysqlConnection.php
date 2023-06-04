<?php

# MySql Workbench

$connction = mysqli_connect("localhost","root","root","interwoven_research_journal");
if(!$connction)
	die("could not connect".mysqli_connect_error());

#######################
// /////////////////////////////////////////////////////////////

session_start();
include("../../connections.php");
function check_login($conn)
{
  
  
  if(isset($_SESSION['user_id'])){
    
    $id = $_SESSION['user_id'];
    $query = "SELECT * from admin where user_id = '$id' limit 1";
    $result = mysqli_query($conn,$query);
    if($result && mysqli_num_rows($result) > 0)
    {
      $user_data = mysqli_fetch_assoc($result);
      return $user_data;
    }
  }
  
  //redirect to login
header("Location: ../admin_index.php");
die;
}

$user_data=check_login($conn);

$email =  $user_data['Email_Id']; 

// //////////////////////////////////////////////////////////////

$file = $_FILES ['filename']['name'];
// $filename = $_POST["rollno"];
$topicname = $_POST["topicname"];

// $dest = "./OS/" .$_FILES ['filename']['name']; 

echo $file , "  Uploaded Successfully";

// move_uploaded_file($_FILES['filename']['tmp_name'], $dest);
// rename($file, $filename.".pdf");

if ($topicname == "os"){
	$dest = "./OS/" .$_FILES ['filename']['name'];
	move_uploaded_file($_FILES['filename']['tmp_name'], $dest);
	$add = "/MINOR/templates/admin/PDF_Task/OS/".$file ;
}else if ($topicname == "cn"){
	$dest = "./CN/" .$_FILES ['filename']['name'];
	move_uploaded_file($_FILES['filename']['tmp_name'], $dest);
	$add = "/MINOR/templates/admin/PDF_Task/CN/".$file ;
}else if ($topicname == "dbms"){
	$dest = "./DBMS/" .$_FILES ['filename']['name'];
	move_uploaded_file($_FILES['filename']['tmp_name'], $dest);
	$add = "/MINOR/templates/admin/PDF_Task/DBMS/".$file ;
}else if ($topicname == "ai"){
	$dest = "./AI/" .$_FILES ['filename']['name'];
	move_uploaded_file($_FILES['filename']['tmp_name'], $dest);
	$add = "/MINOR/templates/admin/PDF_Task/AI/".$file ;
}else if ($topicname == "cs"){
	$dest = "./CS/" .$_FILES ['filename']['name'];
	move_uploaded_file($_FILES['filename']['tmp_name'], $dest);
	$add = "/MINOR/templates/admin/PDF_Task/CS/".$file ;
}else{
	$dest = "./OTHERS/" .$_FILES ['filename']['name'];
	move_uploaded_file($_FILES['filename']['tmp_name'], $dest);
	// $add = "/UploadPDF/ECO/".$file .".pdf";
	$add = "/MINOR/templates/admin/PDF_Task/OTHERS/".$file;
}

# $add = "/UploadPDF/".$filename .".pdf";

$query = mysqli_query($connction, "INSERT INTO pdf_db (path,topic_name,email_id,status) VALUES ('$add','$topicname','$email','approved')");

?>