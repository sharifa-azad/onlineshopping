<?php
include "connection.php";

if(isset($_POST["signup"]))
{
	$name=$_POST['name'];
	$status='active';
	$password=$_POST['password'];
	$retailerID=1;
	$username=$_POST['username'];
	$gender=$_POST['gender'];
	$place=$_POST['place'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];

	$role=$_POST['role'];
	if($role=='retailer')
	{

	$checkQuery="select * from retailer where username='$username';";
	$statement=$conn->prepare($checkQuery);
	$result=$statement->execute();
	if($statement->rowCount()<=0)
	{
		$sql="Insert into retailer values('$name','','$phone','$place','$email')";
		$conn->exec($sql);
	}
	
	$getRetailer=$statement->fetch();
	$newRetailer= $getRetailer['retailerId'];
	$insertUser="Insert into users values('$username','$password','$status','','$newRetailer');";
	$conn->exec($insertUser);
}else
{

	$checkQuery="select * from customer where username='$username';";
	$statement=$conn->prepare($checkQuery);
	$result=$statement->execute();
	if($statement->rowCount()<=0)
	{
		echo $phone;
		$sql="Insert into customer(customerName,place,email,phoneNumber,username,PASSWORD) values('$name','$place','$email','$phone','$username','$password')";
		$conn->exec($sql);
	}
	
	// //$getRetailer=$statement->fetch();
	// //$newRetailer= $getRetailer['retailerId'];
	// //$insertUser="Insert into customer values('$name','','$place','$email','$phone','$username','$password');";
	// //$conn->exec($insertUser);
	

}
	header("location:welcome.php");
}

?>