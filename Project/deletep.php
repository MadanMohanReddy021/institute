<?php
require "connection.php";
$HTNO=$_GET['HTNO'];
$sql="delete from payments where HTNO =$HTNO";
mysqli_query($con,$sql);
$con->close();
header("location:check payments.php")
?>