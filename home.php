<?php 
//session_start();
include 'connection.php';
?>
<div class="container-fluid">
  <div class="row">
  <table>
    <thead>
      <center><h2>My Business Report</h2></center>
    </thead>
  </table>
  <div class="col-sm-12">

 <table class="table table-hover">
    <thead>
      <tr>
        <th>Order Id</th>
        <th>Item Name</th>
        <th>Customer Name</th>
        <th>Delivery Location</th>
        <th>Date</th>
        <th>Status</th>
        <th>Change Status</th>
      </tr>
    </thead>
    <tbody> 
      <?php 
      $sql=$conn->prepare("SELECT orders.*, customer.customerName, item.itemName FROM orders JOIN customer ON customer.customerId = orders.customerId JOIN item ON item.itemCode = orders.itemCode");
      $sql->execute();
      $rows=$sql->fetchAll();
      if(!empty($rows))
      {
        foreach ($rows as $row) {
          
       
      ?>
      <tr>
        <td><?php echo $row['orderId']?></td>
        <td><?php echo $row['itemName']?></td>
        <td><?php echo $row['customerName']?></td>
        <td><?php echo $row['deliveryLocation']?></td>
        <td><?php echo $row['date']?></td>
        <td><?php echo $row['status']?></td>
        <td><a href="statusHandler.php?id=<?php echo($row['orderId'])?>" id="changeStatus" class="btn btn-warning">Change</a></td>
      </tr>
    <?php }}?>
    </tbody>
  </table>

    </div>



  </div>
</div>


      </div>


</div>
</div>