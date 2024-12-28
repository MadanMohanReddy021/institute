<?php
session_start();
if(isset($_SESSION['admin']))
{
require "connection.php";
$sqll = "SELECT * FROM admissions";
$res = mysqli_query($con,$sqll);
?>
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
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
 
<body><div id="res"></div>
    <section><div id="bb">
        <H1>CHECK ADMISSIONS</H1>
      
        <table >
            <tr><th>DETAILS</th>
                <th>SCREEN SHOT </th>
            </tr>
           
            <?php 
                 while( $rows=$res->fetch_assoc())
                {
            ?>
            <tr>
               
                 <TD><?php  echo "NAME:".$rows["NAME"];?><br>
                <?php  echo "HTNO:".$rows["HTNO"];?><br>
                <?php  echo "MARKS:".$rows["MARKS"];?><br>
                Action:<a href="delete.php?HTNO=<?php echo $rows['HTNO'];?>"><button class="delete">DELETE</button></a>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="confirm.php?HTNO=<?php echo $rows['HTNO'];?>"><button class="confirm">CONFIRM</button></a></td>
              </td>
                <td><?php  
                $imageData = $rows["image_data"];
                $imageType = $rows["image_type"];
                $base64Image = 'data:' . $imageType . ';base64,' . base64_encode($imageData);
                echo '<img src="' . $base64Image . '" alt="Image" height="30%" width="30%">';
            ?> </td>
                
            </tr>
            <?php
                }
              }
              else{
                header("Location:adminlogin.php");
              }

            ?>
        </table></div>
    </section>
</body>
 
</html>
