<?php
session_start();
if($_POST)
{
require "connection.php";
$HTNO=$_POST['HTNO'];
$TXNID=$_POST['TXNID'];
$imageData = file_get_contents($_FILES["image"]["tmp_name"]);
        $imageType = $_FILES["image"]["type"];

        // Prepare SQL statement to insert image into database
        $stmt =  $con->prepare("INSERT INTO payments (HTNO,TXNID,image_data,image_type) VALUES($HTNO,'$TXNID',?,?)");
        $stmt->bind_param("ss", $imageData, $imageType);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Image uploaded successfully.";
        } else {
            echo "Error uploading image: " . $stmt->error;
        }
      }
?>

<html>
 <head>
  <link rel="stylesheet" href="styles.css"></link>
  <script  src="jj.js" type="text/javascript"></script>
  <style>
   #res
   {
margin-left: 40%;
   }
   </style>
  <script>
 $(document).ready(function() {
   
   $("#res").hide();

     $.ajax({
       url: "payajax.php",
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
<div id="res"></div>
 </head><div id="bb">
  <body>
    <p> <span>NOTE:</span> Pay admission fee to the given phone number via phonepay only.Then copy payment id and payment copy upload in the given below form.If you don't know how to upload payment copy just goto help page</p>
    PHONEPE NUMBER:9502175244
 <form action="payment.php"method="POST"enctype="multipart/form-data">
   <fieldset>
     <legend style="color:red">FEE PAYMENT</legend>
     <table>
       <tr>
         <td colspan="2"><input type="number" placeholder=" Hall Ticket No." value="<?php echo $_SESSION['HTNO']; ?>" name="HTNO" readonly></td>
       </tr>
       
         <td colspan="2"><input type="text" placeholder="PAYMENT ID"name="TXNID"></td>
       </tr>
       <tr>
       <td colspan="2"><input placeholder="PAYMENT PROOF:" type="file" name="image" required></td>
       </tr>
       <tr>
         <td colspan="2" ><input type="submit"></td>
       </tr>
     </table>
   </fieldset>
 </form>
  </body></div>
</html>