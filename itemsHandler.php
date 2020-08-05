<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "connection.php";
if(isset($_POST["addItem"])){
	$itemName=$_POST['itemName'];
	$itemCode=$_POST['itemCode'];
	$quantity=$_POST['quantity'];
	$category=$_POST['category'];
	$itemPrice=$_POST['itemPrice'];
	$retailerId=$_POST['retailerID'];
	
	$itemQuery="select * from item where itemCode='$itemCode';";
	$target_dir = "imgs/";
    $target_file = $target_dir . basename($_FILES["pic"]["name"]);
    if ($_FILES["pic"]["size"] > 500000) {
        echo 'size';
    }
    move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file);
    
        
	$statement=$conn->prepare($itemQuery);
	$result=$statement->execute();
	if($statement->rowCount()<=0)
	{
		$sql="Insert into item values('$itemName','$itemCode',$quantity,'$category',$itemPrice,$retailerId,'$target_file')";
		$conn->exec($sql);
		header("location:welcome.php");
	}

	}


?>