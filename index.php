 <?php
  ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("connection.php");
if (isset($_GET['cat'])) {
  $sql=$conn->prepare("SELECT item.itemName,item.itemCode,item.category,item.itemPrice,item.image,retailer.retailerName,retailer.phoneNumber FROM item,retailer WHERE (item.retailerId=retailer.retailerId and item.category=:cat)");
  $sql->execute(array('cat' => $_GET['cat'] ));
}else{
  $sql=$conn->prepare("SELECT item.itemName,item.itemCode,item.category,item.itemPrice,item.image,retailer.retailerName,retailer.phoneNumber FROM item,retailer WHERE (item.retailerId=retailer.retailerId)");
  $sql->execute();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ONLINE SHOPPING PLATFORM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   -->
  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.3.5.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href=css/css.css rel="stylesheet" type="text/css">
  <style type="text/css">
    
  </style>
</head>
<body>
<nav class="navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Online Shopping</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="index.php">All</a></li>
          <li><a href="index.php?cat=Men Clothes">Men's Clothes</a></li>
          <li><a href="index.php?cat=Women Clothes">Women's Clothes</a></li>
          <li><a href="index.php?cat=Babies Clothes">Babies' Clothes</a></li>
          <li><a href="index.php?cat=Electronics">Electronics</a></li>
          <li><a href="index.php?cat=Foods">Foods</a></li>
          <li><a href="index.php?cat=Beverages">Beverages</a></li>
          <li><a href="index.php?cat=Cooking Remedies">Cooking Remedies</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><button data-toggle="modal" data-target="#signup" class="glyphicon glyphicon-user nav-btn"></button>Sign Up</li>
      <li><button data-toggle="modal" data-target="#login" class="glyphicon glyphicon-log-in nav-btn">Login</button></li>
        <!--<a class="login" href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>-->
    </ul>
  </div>
</nav>
  
<div class="container">
  <div class="row">
    <?php
      while($row=$sql->fetch()){
    ?>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <div class="thumbnail">
            <a href="<?php echo $row["image"]; ?>">
              <img src="<?php echo $row["image"]; ?>" alt="Lights" style="height: 200px;">
            </a>
            <div class="caption">
              <p>
                <table width="100%">
                  <tr>
                    <td><?php echo $row["itemName"]; ?></td>
                    <td align="right"><?php echo $row["itemPrice"]; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $row["retailerName"]; ?></td>
                    <td align="right"><?php echo $row["phoneNumber"]; ?></td>
                  </tr>
                  <tr>
                    <td colspan="2" align="center">
                      <button class="btn btn-xs">order</button>
                    </td>
                  </tr>
                </table>
              </p>
            </div>
          </div>
        </div>
    <?php
      }
    ?>
  </div>
</div>
<nav class="navbar navbar navbar-fixed-bottom">
  <div class="container-fluid">
    <div class="navbar-header">
      
    </div>
  </div>
</nav>


<div class="modal fade" id="signup">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <!--<h4 class="modal-title">Modal Heading</h4>-->
             <!--<img src="imgs/GOLDS3.png" class="logo" style="opacity: 8.9; padding-top: 1px; padding-bottom: 2px; margin-bottom: 5px; width:168PX; height: 130PX" >-->
             <h4 class="modal-title" style="color: #D2AC47;margin-top: 15px;">Create a new account</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="signupHandler.php" method="POST">
            <div class="row">
              <div class="col-sm-12">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>

                <label>Username</label>
                <input type="text" name="username" class="form-control" required>

                 <label>Password</label>
                <input type="text" name="password" class="form-control" required>

                 <label>Email</label>
                <input type="text" name="email" class="form-control" required>

                 <label>Phone Number</label>
                <input type="text" name="phone" class="form-control" required><br>

                 <label >Gender</label>
                 <select name="gender" class="form-control">
                   <option value="Male">Male</option>
                   <option value="Female">Female</option>
                 </select><br>
                <!--<input type="radio" value="male" class="form-control" checked required>Male
                <input type="radio" value="female" class="form-control" required>Female-->

                <label>Place of Residence</label>
                 <input type="text" class="form-control" required name="place">

              </div>

            </div>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Sign Up" name="signup">

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
        
      </div>
    </div>
  </div>
  
</div>


</body>
<div class="modal fade" id="login">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #25024a;">
          <!--<h4 class="modal-title">Modal Heading</h4>-->
          <!--   <img src="imgs/GOLDS3.png" class="logo" style="opacity: 8.9; padding-top: 1px; padding-bottom: 2px; margin-bottom: 5px; width:168PX; height: 130PX" >-->
             <h4 class="modal-title" style="color: #D2AC47;margin-top: 15px;">Please Login here</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="loginHandler.php" method="POST">
            <div class="row">
              <div class="col-sm-12">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Enter your username" required>

                 <label>Password</label>
                <input type="text" name="password" class="form-control" placeholder="Enter your password" required>

              </div>

            </div>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Login" name="login">

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
        
      </div>
    </div>
</html>
