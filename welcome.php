<?php
session_start();
include 'connection.php';
if(isset($_SESSION['retailerID']))
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>FOR RETAILERS ONLY</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.3.5.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href=css/css.css rel="stylesheet" type="text/css">
</head>
<body>

<nav class="navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Online Shopping</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#" id="home">Home</a></li>
      <li class="addItem"><a href="#" id="items">Items</a></li>

      <!--<li class="profile"><a href="#" id="profile">Profile</a></li>-->
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="navbtn1"><a href="logout.php"><span class=" glyphicon glyphicon-user" ></span>Log Out</a></li>
    </ul>
  </div>
</nav>
  
<div class="container-fluid" id="content">
  <?php
  include("home.php");

  ?>
</div>


  <script>
    $(document).ready(function(){
      $('#items').click(function(){
        $("#content").load("addItems.php");
      });
      $('#home').click(function(){
        $("#content").load("home.php");
      });
      //$('#profile').click(function(){
        //$("#content").load("retailerProfile.php");
      //});
    });
  </script>
</div>
<nav class="navbar navbar navbar-fixed-bottom">
  <div class="container-fluid">
    <div class="navbar-header">
      <div class="row">
       <div class="col-sm-10">
        <p style="color: #D2AC47">Website Implemented By Sharifa Azad Sharif</p>
      </div>
      <div class="col-sm-2">
        <a href="https://api.whatsapp.com/send?phone=0789028454" id="contact" class="btn btn-success">WhatsApp Me</a>
      </div>
    </div>
      
    </div>
    
  </div>
</nav>

</body>
</html>
<?php }else {
    header("location:index.php");

} ?>