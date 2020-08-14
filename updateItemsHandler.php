<?php 
include 'connection.php';
if(isset($_POST['itemCode']))
{
	$itemName=$_POST['itemName'];
	$itemCode=$_POST['itemCode'];
	$quantity=$_POST['quantity'];
    $category=$_POST['category'];
    $itemPrice=$_POST['itemPrice'];

	$sql="update item set itemName=:itemName,quantity=:quantity,category=:category,itemPrice=:itemPrice where itemCode=:itemCode";

	$result=$conn->prepare($sql);
	$result->execute( array(':itemName' =>$itemName,':itemCode'=>$itemCode,'quantity'=>$quantity,':category'=>$category,':itemPrice'=>$itemPrice));
	header('location:welcome.php');
}
?>