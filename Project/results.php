<?php
session_start();
require "connection.php";
if(isset($_SESSION["LOGIN"]))
{
$HTNO=$_SESSION["HTNO"];
require "connection.php";
$sql="select *from results where HTNO=$HTNO";
$res=mysqli_query($con,$sql);
?>
        <html>
            <head>
                <link rel="stylesheet" href="table.css">
                <link rel="stylesheet" href="styles.css">
            </head>
            <body>
            <marquee>Note:If your hall ticket no is not shown in the below then you are not selected into any branch.</marquee>
            <table> 
                    <tr>
                       <th>HALL TICKET NO.</th>
                       <TH>BRANCH</TH>
                </tr>
            <TR><?php 
            while($row=mysqli_fetch_array($res))
            {?>
              <td>  <?PHP echo $row["HTNO"];?></td>
              <td>  <?PHP echo $row["BRANCH"];?></td>
            </TR>
            <?php }
}
else 
{
    echo"you are not logged on";
}
?></table>
            </body>
        </html>
    