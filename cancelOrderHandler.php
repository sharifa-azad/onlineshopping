<?php 
include 'connection.php';
if(isset($_GET['id']))
{
	$orderId=$_GET['id'];

	$status='CANCELLED';
	$sql="update orders set status=:st where status='NEW'";

	$result=$conn->prepare($sql);
	$result->execute( array(':orderId' =>$orderId,':st'=>$status));
	header('location:customerPage.php');
}
?>