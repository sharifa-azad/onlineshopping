 <?php
  
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
      <!--<li class="active"><a href="#" id="profile">Profile</a></li>-->
      <li class="active"><a href="#" id="ordersList">Orders List</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" id="categories">Categories <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="customerPage.php">All</a></li>
          <li><a href="customerPage.php?cat=Men Clothes">Men's Clothes</a></li>
          <li><a href="customerPage.php?cat=Women Clothes">Women's Clothes</a></li>
          <li><a href="customerPage.php?cat=Babies Clothes">Babies' Clothes</a></li>
          <li><a href="customerPage.php?cat=Electronics">Electronics</a></li>
          <li><a href="index.php?cat=Foods">Foods</a></li>
          <li><a href="customerPage.php?cat=Beverages">Beverages</a></li>
          <li><a href="customerPage.php?cat=Cooking Remedies">Cooking Remedies</a></li>
        </ul>
      </li>
    </ul>
    
    <ul class="nav navbar-nav navbar-right">
      <li class="navbtn1"><a href="logout.php"><span class=" glyphicon glyphicon-user" ></span>Log Out</a></li>
      
    </ul>
  </div>
</nav>
  
<div class="container-fluid" id="content">
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
                      <button data-toggle='modal' data-target="#<?php echo $row['itemCode']?>"class="btn btn-xs">Order</button>
                    </td>
                  </tr>
  <div class="modal fade" id="<?php echo $row['itemCode']?>">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
         
             <h4 class="modal-title">Make your Order</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="orderHandler.php" method="POST">
            <div class="row">
              <div class="col-sm-12">
                <label>Quantity</label>
                <input type="number" name="quantity" id="quantity"class="form-control" required>

                <label>Delivery Location</label>
                <input type="text" name="deliveryLocation" id="deliveryLocation"class="form-control" required>

                <input type="hidden" name="itemCode" id="itemCode" value="<?php echo $row['itemCode']?>">

                

              </div>

            </div>



          

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Order" name="order">

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
        
      </div>
    </div>
  </div>
                </table>
              </p>
            </div>
          </div>
        </div>
    <?php
      }
    ?>
  </div>
  <script>
  <!--  //$(document).ready(function(){
      //$('#profile').click(function(){
        //$("#content").load("customerProfile.php");
      //});
    //});


    $(document).ready(function(){
      $('#ordersList').click(function(){
        $("#content").load("customerOrdersList.php");
      });
    });
  </script>
</div>
<nav class="navbar navbar navbar-fixed-bottom">
  <div class="container-fluid">
    <div class="navbar-header">
      <div class="row">
      <div class="col-sm-10">
        <p style="color: #D2AC47">Website Implemented By Sharifa Azad Sharif.</p>
      </div>
      <div class="col-sm-2">
        <a href="https://api.whatsapp.com/send?phone=0789028454" id="contact" class="btn btn-success">WhatsApp Me</a>
      </div>
    </div>
      
    </div>
  </div>
</nav>

</body>

  
</div>

</html>
