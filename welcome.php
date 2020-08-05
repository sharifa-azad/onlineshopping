<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
session_start();
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

  <!--<link rel="stylesheet" type="text/css" href="path/to/resources/UberGallery.css" />
<link rel="stylesheet" type="text/css" href="path/to/resources/colorbox/1/colorbox.css" />
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="path/to/resources/colorbox/jquery.colorbox.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("a[rel='colorbox']").colorbox({maxWidth: "90%", maxHeight: "90%", opacity: ".5"});
});
</script>-->
</head>
<body>

<nav class="navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Online Shopping</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <!--<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Items<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Men's Clothes</a></li>
          <li><a href="#">Women's Clothes</a></li>
          <li><a href="#">Babies' Clothes</a></li>
          <li><a href="#">Electronics</a></li>
          <li><a href="#">Foods</a></li>
          <li><a href="#">Beverages</a></li>
          <li><a href="#">Cooking Remedies</a></li>
        </ul>
      </li>-->
      <li class="addItem"><a href="#" id="items">Added Items</a></li>

      <li class="profile"><a href="#">Profile</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="navbtn1"><a href="#"><span class=" glyphicon glyphicon-user" ></span>Log Out</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  <script>
    $(document).ready(function(){
      $('#items').click(function(){
        $(".container").load("addItems.php");
      });
    });
  </script>
</div>
<nav class="navbar navbar navbar-fixed-bottom">
  <div class="container-fluid">
    <div class="navbar-header">
      
    </div>
    
  </div>
</nav>

</body>
</html>
<?php }else {
    header("location:index.php");

} ?>