<?php
require "conn.php";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$branch_name = isset($_GET['branch_name']) ? $_GET['branch_name'] : '';

if (empty($branch_name)) {
    echo "Branch name is missing in the request.";
    exit();
}

$sql_branch = "SELECT id FROM branches WHERE name = ?";
$stmt = $conn->prepare($sql_branch);
$stmt->bind_param("s", $branch_name);
$stmt->execute();
$result_branch = $stmt->get_result();

if ($result_branch->num_rows > 0) {
    $row_branch = $result_branch->fetch_assoc();
    $branch_id = $row_branch['id'];
} else {
    echo "Branch not found.";
    exit();
}
$sql_images = "SELECT image, description FROM branch_images WHERE branch_id = ?";
$stmt_images = $conn->prepare($sql_images);
$stmt_images->bind_param("i", $branch_id);
$stmt_images->execute();
$result_images = $stmt_images->get_result();

$sql_staff = "SELECT * FROM staff WHERE branch_id = ?";
$stmt_staff = $conn->prepare($sql_staff);
$stmt_staff->bind_param("i", $branch_id);
$stmt_staff->execute();
$result_staff = $stmt_staff->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $branch_name; ?> - Branch Details</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .branch-container {
            padding: 20px;
        }

        .branch-images {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 30px;
        }

        .branch-image {
            width: 30%;
            text-align: center;
        }

        .branch-image img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .staff-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .staff-item {
            border: 1px solid #ddd;
            padding: 15px;
            background-color: #f4f4f4;
            border-radius: 8px;
        }

        .staff-item h3 {
            margin-bottom: 10px;
            font-size: 18px;
        }

        .staff-item p {
            font-size: 16px;
            color: #555;
        }

        @media (max-width: 768px) {
            .branch-images {
                flex-direction: column;
                align-items: center;
            }

            .staff-container {
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
                <li><a href="courses.php">Courses</a></li>
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

    <!-- Branch Details -->
    <section class="branch-container">
        <h2><?php echo $branch_name; ?></h2>

        <!-- Branch Images -->
        <div class="branch-images">
            <?php
            if ($result_images->num_rows > 0) {
                while ($row_image = $result_images->fetch_assoc()) {
                   
                    $image_data = $row_image['image'];
                    $image_type = "image/jpeg"; 
                    
                    echo '<div class="branch-image">';
                    echo '<img src="data:' . $image_type . ';base64,' . base64_encode($image_data) . '" alt="Branch Image">';
                    echo '<p>' . $row_image['description'] . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>No images available for this branch.</p>';
            }
            ?>
        </div>

        <!-- Staff Details -->
        <h3>Our Staff</h3>
        <div class="staff-container">
            <?php
            if ($result_staff->num_rows > 0) {
                while ($row_staff = $result_staff->fetch_assoc()) {
                    echo '<div class="staff-item">';
                    echo '<h3>' . $row_staff['name'] . '</h3>';
                    echo '<p><strong>Position:</strong> ' . $row_staff['position'] . '</p>';
                    echo '<p><strong>Contact:</strong> ' . $row_staff['contact'] . '</p>';
                    echo '<p><strong>Email:</strong> ' . $row_staff['email'] . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>No staff details available for this branch.</p>';
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
$conn->close();
?>
