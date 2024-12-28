<?php
require "connection.php";
session_start();
if($_POST)
{
    $id=$_POST['id'];
    $pass=$_POST['pass'];    
$sql="select *from admin where ID=$id";
$result=$con->query($sql);
if($result->num_rows > 0)
{
   $row=$result->fetch_assoc();
   $passs=$row["PASSWORD"];
   if($passs==$pass)
   {
    echo"YOU ARE LOGGED ON SUCCESSFULLY";
    echo"YOU CAN PROCEED WITH YOUR OPERATIONS";
    $_SESSION['admin']=1;
    header("location:admin.html");
   }
   else
   {
   echo"YOUR PASSWORD IS INCORRECT";
   }
}
else
{
    echo"ADMIN ID NOT FOUND";
} 
}
?>
<html>
    <head>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="table.css">
    </head>
</html>
<body>
<form action="adminlogin.php" method="post" id="app"><fieldset>
    <legend>LOGIN</legend>

   <table border="0">
     <tr>
  
        <td colspan="2"><input type="number" placeholder="Admin ID" id="htno" name="id"required></td>
     </tr>
     <tr>
      
       <td><input type="password" placeholder="Password" id="pass" NAME="pass"></td>
     </tr>
     <tr>
       <td colspan="2"><input type="submit"></td>
     </tr>
   </table></fieldset>
  </form>
</body>