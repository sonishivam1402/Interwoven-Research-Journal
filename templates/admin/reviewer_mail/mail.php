<?php

// $userName = $_SESSION['Email_Id'];

 // $_POST['email_id'];

$to = $_POST['email_id'];
$subject = "Review the Article";
$message = "Please review the article and give acknowledgement ASAP.";
$headers = "From: sonishivam1422@gmail.com";

if(mail($to, $subject, $message, $headers)){
	// echo "Mail Sent";
	header("Location: sent_mail.php");                            
    die;
}else{
	echo "error";
}


?>

<!-- <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>email</title>
	<style type="text/css">
		body{
		background-color: #8EC5FC;
        background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);
	}
	</style>
</head>
<body>

</body>
</html> -->