<?php
 session_start();
require "connection.php";
if(isset($_SESSION['LOGIN']))
{
    $HTNO=$_SESSION['HTNO'];
    $sql="select *from verifypayments where HTNO =$HTNO";
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)!=0)
    {
        $sql="select *from admissions where HTNO =$HTNO";
        $res=mysqli_query($con,$sql);
        if(mysqli_num_rows($res)==0)
        {
            echo 1;
        }
        else{
            echo'YOU ARE  SUBMITTED SUCCESSFULLY';
        }
    }
    else {
        echo'YOU ARE NOT PAID THE FEE';
    }
}
else {
    echo'YOU ARE NOT LOGGED ON';
}