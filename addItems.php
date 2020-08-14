<?php 
session_start();
include 'connection.php';
?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-10">
    <h2>Items Collection</h2>
  </div>
    <div class="row">
       <div class="col-sm-2">
    <button data-toggle="modal" data-target="#addItem" class="btn btn-primary" name="addItem">Add Item</button>
  </div>
</div>
  </div>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Item Name</th>
        <th>Item Code</th>
        <th>Quantity</th>
        <th>Category</th>
        <th>Item Price</th>
        <th>Image</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody> 
      <?php 
      $sql=$conn->prepare("select * from item");
      $sql->execute();
      $rows=$sql->fetchAll();
      if(!empty($rows))
      {
        foreach ($rows as $row) {
          
       
      ?>
      <tr>
        <td><?php echo $row['itemName']?></td>
        <td><?php echo $row['itemCode']?></td>
        <td><?php echo $row['quantity']?></td>
        <td><?php echo $row['category']?></td>
        <td><?php echo number_format($row['itemPrice'])?></td>
        <td><img height="50" width="60"src="<?php echo $row['image']?>"></td>
        <td><!--<a href="updateItemsHandler.php" id="update" class="btn btn-success">Update</a>-->
          <button data-toggle="modal" data-target="#updateItem" class="btn btn-success" name="updateItem">Update</button>

        </td>
      <td><button data-toggle="modal" data-target="#deleteItem" class="btn btn-danger" name="deleteItem">Delete</button></td>


      </tr>
    <?php }}?>
    </tbody>
  </table>


</div>
<!--modal adding item-->
<div class="modal fade" id="addItem">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
             <h4 class="modal-title">Add Item here</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form action="itemsHandler.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          
            <div class="row">
              <div class="col-sm-12">
                <label>Item Name</label>
                <input type="text" name="itemName" class="form-control" required>

                <label>Item Code</label>
                <input type="text" name="itemCode" class="form-control" required>

                 <label>Quantity</label>
                <input type="text" name="quantity" class="form-control" required>

                 <label>Category</label>
                 <select name="category" class="form-control">
                   <option value="Men Clothes">Men Clothes</option>
                   <option value="Women Clothes">Women Clothes</option>
                   <option value="Babies Clothes">Babies Clothes</option>
                   <option value="Electronics">Electronics</option>
                   <option value="Foods">Foods</option>
                   <option value="Beverages">Beverages</option>
                   <option value="Cooking Remedies">Cooking Remedies</option>

                 </select><br>

                 <label>Item Price</label>
                <input type="text" name="itemPrice" class="form-control" required><br>

                <label>Image</label>
                <input type="file" name="pic" class="form-control" required>

                

              </div>

            </div>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
           <input type="hidden"  value="<?php echo $_SESSION['retailerID']?>"name="retailerID">
 
          <input type="submit" class="btn btn-primary" value="Add" name="addItem">

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
        
      </div>
    </div>
  </div>

<!--modal updating items-->
<div class="modal fade" id="updateItem">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
             <h4 class="modal-title">Update Item</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form action="updateItemsHandler.php" method="POST">
        <div class="modal-body">
          
            <div class="row">
              <div class="col-sm-12">
                <div class="col-sm-6">
                <label>Item Name</label>
                <input type="text" name="itemName" class="form-control" required value="<?php echo $row['itemName']?>">

                <label>Item Code</label>
                <input type="text" name="itemCode" readonly class="form-control" required value="<?php echo $row['itemCode']?>">

                 <label>Quantity</label>
                <input type="text" name="quantity" class="form-control" required value="<?php echo $row['quantity']?>">
              </div>
              <div class="col-sm-6">
                 <label>Category</label>
                 <select name="category" class="form-control" >
                  <option value="<?php echo $row['category']?>"><?php echo $row['category']?></option>
                   <option value="Men Clothes">Men Clothes</option>
                   <option value="Women Clothes">Women Clothes</option>
                   <option value="Babies Clothes">Babies Clothes</option>
                   <option value="Electronics">Electronics</option>
                   <option value="Foods">Foods</option>
                   <option value="Beverages">Beverages</option>
                   <option value="Cooking Remedies">Cooking Remedies</option>

                 </select>

                 <label>Item Price</label>
                <input type="text" name="itemPrice" class="form-control" required value="<?php echo $row['itemPrice']?>">

                <!--<label>Image</label>
                <input type="file" name="pic" class="form-control" required>-->
              </div>

                

              </div>

            </div>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="submit" class="btn btn-success" value="Update" name="updateItem">

          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
        
      </div>
    </div>
  </div>

  <!--modal deleting item-->
  <div class="modal fade" id="deleteItem">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
             <h4 class="modal-title">Delete Item</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form action="deleteItemHandler.php" method="POST">
        <div class="modal-body">
          <p>Click delete if you are sure you want to delete this</p>
          
            <div class="row">
              <div class="col-sm-12">
                <div class="col-sm-4"></div>

                <div class="col-sm-4">
                <input type="hidden" name="itemCode" value="itemCode" class="form-control" required value="<?php echo $row['itemCode']?>">
              </div>

                <div class="col-sm-4"></div>


              </div>
         
              </div>
            </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="submit" class="btn btn-danger" value="Delete" name="deleteItem">

          <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
        </div>
      </form>
        
      </div>
    </div>
  </div>