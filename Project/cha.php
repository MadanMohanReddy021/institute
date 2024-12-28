<?php
 require "connection.php";
$sqll = "SELECT *FROM admissions";
$res = $con->query($sqll);
?>
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
   <link rel="stylesheet" href="table.css">
<link rel="stylesheet" href="styles.css">
</head>
 
<body>
    <section>
        <H1>CHECK ADMISSIONS</H1>
      
        <table >
            <tr><th>NAME</th>
                <th>HT NUMBER</th>
                <th>MARKS </th>
                <th>MARKS MEMO</th>
                <TH> ACTION</TH>
            </tr>
           
            <?php 
                 while( $rows=$res->fetch_assoc())
                {
            ?>
            <tr>
               
                 <TD><?php  echo $rows["NAME"];?></TD>
                <td><?php  echo $rows["HTNO"];?></td>
                <td><?php  echo $rows["MARKS"];?></td>
                <td><?php  
                $imageData = $rows["image_data"];
                $imageType = $rows["image_type"];
                $base64Image = 'data:' . $imageType . ';base64,' . base64_encode($imageData);
                echo '<img src="' . $base64Image . '" alt="Image">';
            ?> </td>
                <td><a href="delete.php?HTNO=<?php echo $rows['HTNO'];?>"><button class="delete">DELETE</button></a>
            <BR><a href="confirm.php?HTNO=<?php echo $rows['HTNO'];?>"><button class="confirm">CONFIRM</button></a></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </section>
</body>
 
</html>
