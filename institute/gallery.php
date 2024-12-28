<?php
require "conn.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch gallery data
$sql = "SELECT * FROM gallery";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallery - Loyola Polytechnic</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Basic Gallery Styling */
        .gallery-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 20px;
        }

        .gallery-item {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        .gallery-item img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            /* Optional: Add border-radius for rounded image corners */
        }

        .gallery-item p {
            margin-top: 10px;
            font-size: 16px;
            color: #333;
        }

        @media (max-width: 768px) {
            .gallery-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .gallery-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <!-- Navigation Header -->
    <header>
        <div class="logo">
            <img src="loy.jpg" alt="Loyola Polytechnic (YSRR) Logo">
            <p>Loyola Polytechnic (YSRR)</p>
        </div>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Courses</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="#">Admissions</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Marks</a></li>
                <li><a href="#">Facilities</a></li>
                <li><a href="Admin.php">Admin</a></li>
            </ul>
        </nav>
    </header>

    <!-- Gallery Section -->
    <section class="gallery">
        <h2>Gallery</h2>
        <div class="gallery-container">
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    // Get image data and convert it to base64 for display
                    $imageData = $row['image']; // Assuming the 'image' column is of BLOB type
                    $base64Image = base64_encode($imageData); // Convert to base64

                    echo '<div class="gallery-item">';
                    echo '<img src="data:image/jpeg;base64,' . $base64Image . '" alt="Gallery Image">';
                    echo '<p>' . $row['text'] . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>No images found in the gallery.</p>';
            }
            ?>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Loyola Polytechnic (YSRR). All rights reserved.</p>
        <p>Bakarapuram, Pulivendula, YSR(Dist), Andhra Pradesh, 516300 | Phone: 08568-286309 | Email: loyolapoly.pulivendla@gmail.com</p>
        <div class="social-media">
            <a href="#">Facebook</a> |
            <a href="#">Twitter</a> |
            <a href="#">Instagram</a> |
            <a href="#">LinkedIn</a>
        </div>
    </footer>

</body>

</html>

<?php
// Close the database connection
$conn->close();
?>
