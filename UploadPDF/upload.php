<?php

# phpMyAdmin

$servername = "localhost";
$username = "root";;
$password = "root";
$dbname = "interwoven_research_journal";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn) {
die('Could not connect: '.mysqli_connect_error());
}

#################################

$file = $_FILES ['filename']['name'];
$filename = $_POST["rollno"];
echo $file;
move_uploaded_file($_FILES['filename']['tmp_name'], $file);
rename($file, $filename.".pdf");
$add = "/".$filename .".pdf";
$query = mysqli_query($conn, "INSERT INTO pdf_db VALUES ('$filename','$add')");


?>