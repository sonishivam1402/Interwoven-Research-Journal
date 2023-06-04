<?php
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
?>


<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Admin Upload </title>
    <link rel="stylesheet" href="homestyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

<style type="text/css">

  #text{
    height: 25px;
    border-radius: 5px;
    padding: 4px;
    border: solid thin #aaa;
    width: 100%;
  }
  
  #box{
    margin-top: 50px;
    background-color: whitesmoke;
    margin: auto;
    width: 400px;
    height: 200px;
    padding: 20px;

  }

  .button input{
  outline: none;
  color: #7cb1e3;
  font-size: 18px;
  font-weight: 500;
  border-radius: 12px;
  padding: 6px 15px;
  border: none;
  margin: 0 8px;
  cursor: pointer;
  transition: all 0.3s ease;
  background-color: whitesmoke;
}

.button input:hover{
  transform: scale(0.97);
}


</style>
   </head>
<body>
  
  <header>
    <nav class="navbar">
      <div class="front">
        <img src="../../../images/logo.png" alt="" height="100px" width="300px">
   
        </div>
      <ul class="menu">
        <li><a href="../../../docs/about.pdf"><b>About</b></a></li> &nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;
        <li><a href="../../../docs/aim.pdf"><b>Aim</b></a></li>&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;
        <li><a href="../../../docs/objective.pdf"><b>Objective</b></a></li>&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;
        <li><a href="../../../docs/policy.pdf"><b>Policy</b></a></li>&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;
        <li><a href="../../../docs/authors.pdf"><b>Authors</b></a></li>
      </ul>
      <div class="buttons">
        <a href="../admin_index.php"><input type="button" value="Home"></a>
      </div>
    </nav><br><br>

    <h1 style="color:#ffffff; font-size: 20px;text-align: center">UPLOAD YOUR FILE HERE</h1><br>

    <!--  -->

    <h3 style="color: white"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hello, &nbsp; <?php echo $user_data['First_Name']; ?></h3><br>

    <!--  -->

    <div class="uploadform">

      <form action="MysqlConnection.php" method="post" enctype="multipart/form-data"><br>
        
        <label for="myfile">Select a file: </label>
        <input type="file" id="myfile" name="filename"><br><br>

        <label >Topic Name : </label>
          <select name="topicname">
            <option value="others">Others</option>
            <option value="os">Operating System</option>
            <option value="cn">Comp. Network</option>
            <option value="dbms">DBMS</option>
            <option value="ai">Artificial Intelligence</option>
            <option value="cs">Cyber Security</option>
          </select><br><br><br>   
        
        <center>
          <div class="button">
            <input type="submit" name="submit" value="Upload" class="btn"><br><br>
            <a href="show.php" class="btn"><input type="button" value="Show Uploaded PDF"></a>
          </div>
        </center>
      
  </header>
</body>
</html>