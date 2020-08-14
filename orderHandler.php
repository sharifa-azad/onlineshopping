<?php
session_start();
include 'connection.php';
if(isset($_POST["quantity"])){
	echo "quantity: " . $_POST["quantity"];
	echo "itemCode: " . $_POST["itemCode"];
	$quantity=$_POST['quantity'];
	$itemCode=$_POST['itemCode'];
	$date = date('Y-m-d');
	
	$itemQuery="INSERT INTO orders (`date`, `status`, `deliveryLocation`, `customerId`,`quantity`,`itemCode`) 
					VALUES ('" . $date . "', 'NEW', 'MLANDEGE', " . $_SESSION['customerID'] . ", " . $quantity . ", " . $itemCode . ")";
    //echo $itemQuery;
	$statement=$conn->prepare($itemQuery);
	$result=$statement->execute();
	//if($statement->rowCount()<=0)
	//{
	//	$sql="Insert into orders ";
	//	$conn->exec($sql);
		header("location:customerPage.php");
	//}

	}


?>