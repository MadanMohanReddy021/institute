<?php
session_start();
if(isset($_SESSION["admin"]) )
{
require "connection.php";
$sqll = "SELECT *FROM results";
$res = $con->query($sqll);
?>
<!DOCTYPE html>
<html lang="en">
<head><link rel="stylesheet" href="table.css">
</link><link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkresults</title>
</head>
<body>
    
    <table>
        <tr><th>HALLTICKET NO.</th>
        <TH>BRANCH</TH>
    </tr>
    <?php 
                 while( $rows=$res->fetch_assoc())
                {
            ?>
            <tr>
               
                 <TD><?php  echo $rows["HTNO"];?></TD>
                 <TD><?php  echo $rows["BRANCH"];?></TD>
                </tr><?php }
                }
                else{
                    header("Location:admin.html");
                  }
                ?>

    
    </table>
</body>
</html>