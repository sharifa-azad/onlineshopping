<?php 
include 'connection.php';
if(isset($_GET['id']))
{
	$orderId=$_GET['id'];

	$status='DELIVERED';
	$sql="update orders set status=:st where orderId=:orderId";

	$result=$conn->prepare($sql);
	$result->execute( array(':orderId' =>$orderId,':st'=>$status));
	header('location:welcome.php');
}
?>