<?php

session_start();

  include("connections.php");
  include("function.php");

        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
        //SOMETHING WAS POSTED
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name']; 

        $email_id = $_POST['email_id'];

        $mobile_no = $_POST['mobile_number'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $subject = $_POST['subject'];

        if(!empty($email_id) && !empty($password) && !is_numeric($email_id))
        {

          //save to database
          if($role == "reviewer"){
            
            $user_id = random_num(3);
            $query = mysqli_query($conn,"INSERT INTO reviewers (user_id, First_Name, Last_Name, Email_Id, Mobile_No, Password, Role, Subject) VALUES ('$user_id','$first_name','$last_name','$email_id','$mobile_no','$password','$role','$subject')");

                header("Location: login.php");
                die;
          }else{

            $user_id = random_num(3);
            $query = mysqli_query($conn,"INSERT INTO students (user_id, First_Name, Last_Name, Email_Id, Mobile_No, Password, Role) VALUES ('$user_id','$first_name','$last_name','$email_id','$mobile_no','$password','$role')");

                header("Location: login.php");
                die;
          }
          
        }else
            {
        echo "Please enter some valid information!";
            }
       }

?>


<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
      .d-none{
        display: none;
      }
    </style>
   </head>
<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="../images/frontImg.jpg" alt="">
        <div class="text">
          <span class="text-1">Research is<br> creating new <br>knowledge<br><br></span>
          <span class="text-2">Let's get connected</span>
        </div>
      </div>
      <div class="back">
        <img class="../images/backImg" src="backImg.jpg" alt="">
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
          <form onsubmit="actionOnSubmit()" method="POST" name="login">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input name="email_id" type="text" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input name="password" type="password" placeholder="Enter your password" required>
              </div>
              <label for="role1" style="color: #333;">Choose a Role:</label>
                <select name="lrole" id="lrole" required>
                  <option value="reviewers">Reviewer</option>
                  <option value="students">Student</option>
                </select>
              <div class="button input-box">
                <input type="submit" value="Sumbit">
              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip">Sigup now</label></div>
            </div>
        </form>
      </div>
        
 <div class="signup-form">
          <div class="title">Signup</div>
        <form action="login.php" method="POST">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="First name" name="first_name" required>
              </div>
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Last name" name="last_name" required>
              </div>

              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter your email" name="email_id" required>
              </div>
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Number" name="mobile_number" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password" name="password" required>
              </div>

              <label for="role" style="color: #333;">Choose a Role:</label>
                <select name="role" id="role" required onchange="enableSubject(this)">
                  <option value="student">Student</option>
                  <option value="reviewer">Reviewer</option>
                </select>
                <select name="subject" id="subject" class="d-none">
                  <option value="os">Operating System</option>
                  <option value="cn">Computer Networks</option>
                  <option value="ai">Artificial Intelligence</option>
                  <option value="cs">Cyber Security</option>
                  <option value="dbms">Database Management Systems</option>
                  <option value="others">Others</option>
                </select>

                <script type="text/javascript">
                  function enableSubject(answer) {
                    console.log(answer); 
                    if(answer.value == "reviewer") {
                      document.getElementById('subject').classList.remove('d-none');
                    } else {
                      document.getElementById('subject').classList.add('d-none');
                    }
                  };
                </script>

              <div class="button input-box">
                <input type="submit" value="Sumbit">
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>
      </form>
    </div>

    </div>
    </div>
  </div>

  <script>

  function actionOnSubmit() {

    //Get the select select list and store in a variable
    var e = document.getElementById("lrole");

    //Get the selected value of the select list
    var formaction = e.options[e.selectedIndex].value;

    if(formaction == "students") {
      document.login.action = "student/s_index.php";
    } else {
      document.login.action = "reviewer/r_index.php";
    }
    //Update the form action
    // document.login.action = formaction;

}
</script>
  
</body>
</html>