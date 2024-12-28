<?php
 require "connection.php";
$sql = "SELECT *FROM payments";
$res=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <title>check payments</title>

    <script  src="jj.js" type="text/javascript"></script>
    <script>
   $(document).ready(function() {
     $("#res").hide();
       $.ajax({
         url: "adminajax.php",
         success: function(result) {
         
           if (result.trim() == "1") {
             $("#res").hide();
           } else {
             $("#bb").hide();
             $("#res").show();
             $("#res").html(result);
 
           }
         },
         error: function() {
           $("#res").html("Error fetching data");
         }
       });
   });
 </script>
         
    <link rel="stylesheet" href="table.css">
<link rel="stylesheet" href="styles.css">
  
</head>
 
<body><div id="res"></div><div id="bb">
    <section>
        <H1>CHECK PAYMENTS</H1>
      
        <table>
            <tr>
                <th>HT NUMBER</th>
                <th>TXNID </th>
                <TH> SCREEN SHOT</TH>
                <th>ACTION</th>
            </tr>
           
            <?php 
                 while($rows=$res->fetch_assoc())
                {
            ?>
            <tr>
               
            
                <td><?php  echo $rows["HTNO"];?></td>
                <td><?php  echo $rows["TXNID"];?></td>
                <td><?php  
                $imageData = $rows["image_data"];
                $imageType = $rows["image_type"];
                $base64Image = 'data:' . $imageType . ';base64,' . base64_encode($imageData);
                echo '<img src="' . $base64Image . '" alt="Image" height="30%" width="30%">';
            ?> </td>
                <td><button><a href="deletep.php?HTNO=<?php echo $rows['HTNO'];?>"class="delete">DELETE</a></button>
                <BR><a href="confirmp.php?HTNO=<?php echo $rows['HTNO'];?>"class="confirm"><button>CONFIRM</button></a></td>
                </tr></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </section></div>
</body>
 
</html>