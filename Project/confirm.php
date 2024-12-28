<?php
 require "connection.php";
$HTNO=$_GET['HTNO'];
$sql="INSERT INTO admissions1 SELECT *FROM admissions WHERE HTNO = $HTNO;";
mysqli_query($con,$sql);
$sql="delete from admissions where HTNO=$HTNO";
mysqli_query($con,$sql);
$sql="insert into verifyadmissions values($HTNO)";
mysqli_query($con,$sql);
$con->close();
header("location:check admissions.php")
?>