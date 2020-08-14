<?php 
//session_start();
include 'connection.php';
?>
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
</div>