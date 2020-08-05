<?php
include "connection.php";

if(isset($_POST["signup"])){
	$name=$_POST['name'];
	$status='active';
	//$password=$_POST['password'];
	$retailerID=1;
	$username=$_POST['username'];
	$gender=$_POST['gender'];
	$place=$_POST['place'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];

	$checkQuery="select * from retailer where email='$email';";
	$statement=$conn->prepare($checkQuery);
	$result=$statement->execute();
	if($statement->rowCount()<=0)
	{
		$sql="Insert into retailer values('$name','','$phone','$place','$email')";
		$conn->exec($sql);
	}
	
	$getRetailer=$statement->fetch();
	$newRetailer= $getRetailer['retailerId'];
	$insertUser="Insert into users values('$username','12345678','$status','','$newRetailer');";
	$conn->exec($insertUser);
	header("location:welcome.php");
}
?>