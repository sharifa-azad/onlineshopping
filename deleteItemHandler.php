<?php 
include 'connection.php';
if(isset($_POST['itemCode']))
{
		$itemCode=$_POST['itemCode'];
		$sql="DELETE FROM item WHERE itemCode=:itemCode";
	
	$result=$conn->prepare($sql);
	$result->execute([':itemCode'=>$itemCode]);
	header('location:welcome.php');
}
?>


