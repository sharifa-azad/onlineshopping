<?php 
//session_start();
include 'connection.php';
?>
<div class="container-fluid">
  <div class="row">
  
  <div class="col-sm-8">

     <h2>Orders Collection</h2>
 <table class="table table-hover">
    <thead>
      <tr>
        <th>Order Id</th>
        <th>Item Name</th>
        <th>Date</th>
        <th>Status</th>
        <th>Change Status</th>
      </tr>
    </thead>
    <tbody> 
      <?php 
      $sql=$conn->prepare("SELECT orders.*,item.itemName FROM orders JOIN customer ON customer.customerId = orders.customerId JOIN item ON item.itemCode = orders.itemCode");
      $sql->execute();
      $rows=$sql->fetchAll();
      if(!empty($rows))
      {
        foreach ($rows as $row) {
          
       
      ?>
      <tr>
        <td><?php echo $row['orderId']?></td>
        <td><?php echo $row['itemName']?></td>
        <td><?php echo $row['date']?></td>
        <td><?php echo $row['status']?></td>
        <td><a href="cancelOrderHandler.php" id="cancelOrder"class="btn btn-warning">Cancel Order</a></td>
      </tr>
    <?php }}?>
    </tbody>
  </table>

    </div>


    <div class="col-sm-4">

      </div>


  </div>
</div>
