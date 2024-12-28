
<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

// Create connection
 $con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ( $con->connect_error) {
    die("Connection failed: " .  $con->connect_error);
}

// Fetch image data from database
$sql = "SELECT image_data, image_type FROM images"; // Replace 1 with the actual image ID
$result =  $con->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $image_data = $row['image_data'];
    $image_type = $row['image_type'];

    // Display image
    header("Content-type: " . $image_type);
    echo $image_data;
} else {
    echo "Image not found";
}