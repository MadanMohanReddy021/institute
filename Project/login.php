<?php
session_start();
if($_POST)
{
require "connection.php";
$HTNO=$_POST["HTNO"];
$PASS=$_POST["PASSWORD"];
$result=mysqli_query($con,"select * from details where HTNO = $HTNO");
while($r=$result->fetch_assoc())
{
  $CPASS=$r["PASSWORD"];
  $NAME=$r['NAME'];
}
$count=mysqli_num_rows($result);
if($count==0)
{
 echo"User Not Found.You must sign up first.";
}
else{

if ($PASS==$CPASS)
       {
        echo"LOGIN SUCCESSFUL";
        $_SESSION['LOGIN']=1;
        $_SESSION['HTNO']=$HTNO;
        $_SESSION['NAME']=$NAME;
       }
       else {
       echo"INCORRECT PASSWORD";
       } 
}  }
?>
<html><head>
<link rel="stylesheet" href="../styles.css"></link>

</head>
 <body>
  <div> </div>
  <form action="login.php" method="post" id="app"><fieldset>
    <legend >LOGIN</legend>

   <table border="0">
     <tr>
       
        <td colspan="2"> <input type="number"id="htno" placeholder="Hall Ticket NO." name="HTNO"width="250px"required></td>
     </tr>
     <tr>
      <td></td><td></td>
     </tr>
     <tr>
      <td></td><td></td>
     </tr>
     <tr>
       
       <td colspan="2"><input type="password" placeholder="Password:" id="pass"width="250px" NAME="PASSWORD"></td>
     </tr><tr>
      <td></td><td></td>
     </tr><tr>
      <td></td><td></td>
     </tr>
     <tr>
       <td colspan="2"><input type="submit" ></td>
     </tr>
   </table>   <p id="ref">
     <small ><a href="sinup.htm" align="right">Don't have account?</a></small>
   </p></fieldset>
  </form>
 </body>
</html>