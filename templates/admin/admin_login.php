<?php

session_start();

   include("../connections.php");
   include("function.php");

       if($_SERVER['REQUEST_METHOD'] == "POST")
       {
        //SOMETHING WAS POSTED
        $email_id = $_POST['email_id'];
        $password = $_POST['password'];

        if(!empty($email_id) && !empty($password) && !is_numeric('email_id'))
        {

          //read from database
            $query = "SELECT * from admin where email_id = '$email_id' limit 1";
           
          // $query = "SELECT * from signup_details where email_id = '$email_id' limit 1";
                  
                  $result = mysqli_query($conn ,$query);

                  if ($result)
                  {
                    if($result && mysqli_num_rows($result) > 0)
                  {
                      $user_data = mysqli_fetch_assoc($result);
                      if($user_data['Password'] === $password)
                          {
                              $_SESSION['user_id'] = $user_data['user_id'];

                                header("Location: admin_index.php");                            
                                          die;
                          }
                  }
                  }

                  echo "Account Not Exist !!!!";
        }else
            {
        echo "Account Not Exist !!";
            }
       }

?>

<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
    <link rel="stylesheet" href="../../css/style.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
   </head>
<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="../../images/frontImg.jpg" alt="">
        <div class="text">
          <span class="text-1">Research is<br> creating new <br>knowledge<br><br></span>
          <span class="text-2">Let's get connected</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
          <form action="" method="POST">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="email_id" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Enter your password" required>
              </div>
              <div class="button input-box">
                <input type="submit" value="Sumbit">
        </form>

    </div>
    </div>
    </div>
  </div>
</body>
</html>
