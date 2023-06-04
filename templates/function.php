<?php
function check_login($conn)
{
	if(isset($_SESSION['user_id'])){

		$id = $_SESSION['user_id'];
		$role = $_SESSION['role'];
		if($role == "reviewer"){
			$query = "SELECT * from reviewers where user_id = '$id' limit 1";
		}else{
			$query = "SELECT * from students where user_id = '$id' limit 1";
		}
		$result = mysqli_query($conn,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
		
	} else {
		header("Location: index1.php?error=IncorrectPassword");
		die;
	}
	
}

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4, $length);

	for ($i=0; $i < $len; $i++)
	{
		#code....

		$text .= rand(0,9);
	}

	return $text;
}

?>