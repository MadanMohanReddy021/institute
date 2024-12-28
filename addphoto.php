<?php
require "connection.php";
if($_POST)
{
   $name= $_POST["name"];
$imageData = file_get_contents($_FILES["image"]["tmp_name"]);
        $imageType = $_FILES["image"]["type"];
        $stmt = $con->prepare("INSERT INTO gallery VALUES ('$name',?,?)");
        $stmt->bind_param("ss", $imageData, $imageType);
        if ($stmt->execute()) {
            echo "PHOTO  ADDED  SUCESSFULLY.";
        } else {
            echo "ERROR IN ADDING " . $stmt->error;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD-PHOTO</title>
    <script src="jquery.js"></script>
    <script>
        $.ajax({
                    url: 'AdminAjax.php',
                    type: 'GET',  
                    success: function(response) {
                        if(response=='1')
                    {
                        $('#admin').show();
                        $("#box").hide();
                    }
                    else{
                        $("#admin").hide();
                        $("#box").text("YOUR ARE A CHEATER,YOU CANT ACESS THIS WITHOUT LOGGING IN WITH A PROPER ADMIN AND FINALLY YOU HAVE A BRIGHT FEATURE AT HACKING");
                    }
                    },
                    error: function(xhr, status, error) {
                       
                        $('#r').html('<p>Error: ' + error + '</p>');
                    }
                });
    </script>
</head>
<body >
<p id="box"></p>
    <div id="admin">
<form action="addphoto.php" method="post" enctype="multipart/form-data">

        <input type="text" name="name" placeholder="ENTER THE NAME OF PHOTO" required>
        <input  type="file"id="mm" name="image" required>
        <input type="submit" value="submit">
    </form></div>
</body>
</html>