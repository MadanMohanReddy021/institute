<?php
require "connection.php";
$HTNO=$_POST["HTNO"];
$PASS=$_POST["PASSWORD"];
$PHNO=$_POST['PHNO'];
$NAME=$_POST["NAME"];
echo $NAME;
$res=mysqli_query( $con,"select 'HTNO' from details where HTNO=$HTNO");
if (mysqli_num_rows($res)==0) {  
mysqli_query( $con,"insert into details values('$NAME',$HTNO,'$PHNO','$PASS')");
 echo' your are signed in successfully ';
}
else {
  echo'you are already registered with this hallticket no';
}

?>
<html>
<body>
  
