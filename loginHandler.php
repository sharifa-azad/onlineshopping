<?php
    include "connection.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(isset($_POST["login"])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql="select password,username,retailerId from users WHERE username='$username' and password='$password'";
    $statement=$conn->prepare($sql);
    $result=$statement->execute();
    if($statement->rowCount()>0){
        session_start();
            $getRetailer=$statement->fetch();
        $_SESSION['retailerID']=$getRetailer['retailerId'];
        header("location:welcome.php");
    }
    else
    {
         $sql="select customerId from customer WHERE username='$username' and password='$password'";
    $statement=$conn->prepare($sql);
    $result=$statement->execute();
    if($statement->rowCount()>0){
        session_start();
            $getCustomer=$statement->fetch();
        $_SESSION['customerID']=$getCustomer['customerId'];
        header("location:customerPage.php");
    }else{
      
        header("location:index.php");


    }


    
    }

    }

?>
