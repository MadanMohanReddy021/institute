<?php
if($_POST)
{
    require "connection.php"; 
$BRANCH=$_POST["BRANCH"];
$sqll = "SELECT *FROM results where BRANCH ='$BRANCH'";
$res = $con->query($sqll);
while( $rows=$res->fetch_assoc())
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkresults</title>
</head>
<body>

    <table>
        <tr><th>HALLTICKET NO.</th>
        <TH>BRANCH</TH>
    </tr>
    
            <tr>
               
                 <TD><?php  echo $rows["HTNO"];?></TD>
                 <TD><?php  echo $rows["BRANCH"];?></TD>
               
    <TR><?php } 
        }?>

    </TR>
    </table>
</body>
</html>