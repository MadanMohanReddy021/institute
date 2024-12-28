







<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="image">
    <input type="submit" value="Upload Image" name="submit">
</form>










<?php
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
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

    // File properties
    $file = $_FILES['image']['tmp_name'];
    $image_data = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_type = $_FILES['image']['type'];

    // Insert image data into database
    $sql = "INSERT INTO images (image_data, image_type) VALUES ('$image_data', '$image_type')";

    if ( $con->query($sql) === TRUE) {
        echo "New image inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" .  $con->error;
    }

     $con->close();
}
?>










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

 $con->close();
?>
