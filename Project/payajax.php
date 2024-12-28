<?php
session_start();
require "connection.php";
if(isset($_SESSION['LOGIN']))
{
    $HTNO=$_SESSION['HTNO'];
    $sql="select *from payments where HTNO=$HTNO";
        $res=mysqli_query($con,$sql);
        if(mysqli_num_rows($res)==0)
        {
            echo 1;
        }
        else{
            echo'YOU ARE  SUBMITTED SUCCESSFULLY';
        }
}
else{
    echo'YOU ARE NOT LOGGED ON';
}

?>
