<?php
session_start();
include("../connections.php");
include("function.php");

$user_data=check_login($conn);
?>


<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>  
    <meta charset="UTF-8">
    <title> Admin Index Page </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair:ital,wght@0,500;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/homestyle.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style type="text/css">
      
      .content{
        display: block;
        width: 600px;
        height: 230px;
        border: solid white;
        border-radius: 5px;
        border-style: double;
        margin-left: 1em;
        margin-top: 4em;
        background-color: whitesmoke;
      }

       .f-img {
        float: right;
        margin: 20px;
        margin-top: -300px;
        margin-right: 100px;
      }

      p{
          display: block;
          margin-top: 1em;
          margin-bottom: 1em;
          margin-left: 1em;
          margin-right: 0.5em;
          content: justify;
      }

      .quote{
        font-family: 'Playfair', serif;
        text-shadow: 1px 1px 3px red;
        margin-top: 2em;
        font-size: 22px;
      }


      .buttons1 input {
            outline: none;
            color: #363fba;
            font-size: 18px;
            font-weight: 500;
            border-radius: 12px;
            padding: 6px 15px;
            border: none;
            margin-left: 35px;
            margin-top: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            background-color: whitesmoke;
        }
          .buttons1 input:hover{
                transform: scale(0.97);
                background-color: #363fba;
                color: whitesmoke;
          }


      .tbl{
        margin-top: 30px;
      }

    </style>

    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script>
      $(function() {
         $("#includeFooter").load("../../templates/Footer.html");
      });
    </script>

   </head>
<body>
  <header>
    <nav class="navbar">
      <div class="front">
        <img src="../../images/logo.png" alt="" height="100px" width="300px">
      </div>
      
      <ul class="menu">
        <li><a href="../../docs/about.pdf" target="_blank"><b>About</b></a></li> &nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;
        <li><a href="../../docs/aim.pdf" target="_blank"><b>Aim</b></a></li>&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;
        <li><a href="../../docs/Objectives.pdf" target="_blank"><b>Objective</b></a></li>&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;
        <li><a href="../../docs/policy.pdf" target="_blank"><b>Policy</b></a></li>&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;
        <li><a href="../../docs/authors.pdf" target="_blank"><b>Authors</b></a></li>
      </ul>
      
      <div class="buttons">
        <a href="admin_logout.php"><input type="button" value="Log Out"></a>
      </div>

    </nav><br>

    <div class="quote">
      <i><center>"Research is what I’m doing when I don’t know what I’m doing.” - Wernher von Braun</center></i>
    </div>

    <h3 style="color: white"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hello, &nbsp <?php echo $user_data['First_Name']; ?> </h3><br>

    <div class="content" style="color: #000;">
      <marquee direction="up" scrollamount=2 style="height: 90%;" onMouseOver="this.stop()" onMouseOut="this.start()">
          <p>Interwoven is double blind peer reviewed interdisciplinary journal of Navrachana University, published biannually. </p>
          <p>Interwoven, Navrachana University's peer reviewed interdisciplinary journal, weaves together a wide range of ideas to offer a layered mosaic of scholarly work. Peer reviewed journals are essential for academic work as they bring new rigor to make corrections and also a completely new perspective to the proposed idea.
          </p>
      </marquee>

    </div>

    <div class="f-img">
        <img src="../../Images/img.gif" style="width: 500px;">
    </div>


    <div class="buttons1">
        <a href="../../docs/interwoven_template.docx"><input type="button" value="Author Declaration Form >>"></a>
        <a href="../../docs/author_declaration_form.docx"><input type="button" value="Interwoven Template >>"></a>

    </div><br>

    <div class="buttons1">
        <a href="../pdf.html"><input type="button" value="Journals >>"></a>
        <a href="PDF_Task/upload.html"><input type="button" value="Upload >>"></a>
        <a href="reviewer_mail/sent_mail.php"><input type="button" value="List of Reviewer"></a>
        <a href="PDF_Task/show.php"><input type="button" value="Check pdf >>"></a>
    </div>

<br><br><br>

<div id="includeFooter"></div>

</header>
</body>
</html>