<?php
require "connection.php";
$sql="select *from gallery";
$res=mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallery | Loyola Polytechnic (YSRR)</title>
    <link rel="stylesheet" href="styles.css">
    <script src="jquery.js"></script>
    <script>
        $.ajax({
                    url: 'AdminAjax.php',
                    type: 'GET',  
                    success: function(response) {
                        if(response=='1')
                    {
                        $('#admin').show();
                    }
                    else{
                        $("#admin").hide();
                    }
                    },
                    error: function(xhr, status, error) {
                       
                        $('#r').html('<p>Error: ' + error + '</p>');
                    }
                });
    </script>
    <style>
/* Basic Styles for the Gallery */
.gallery {
    padding: 20px;
    text-align: center;
}

.gallery h2 {
    font-size: 2rem;
    margin-bottom: 20px;
}

.gallery-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}

.gallery-item {
    position: relative;
    width: 250px;
    text-align: center;
    margin-bottom: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
}

.gallery-item:hover {
    transform: scale(1.05);
}

.gallery-item img {
    width: 100%;
    height: auto;
    border-radius: 10px;
}

.gallery-item .caption {
    margin-top: 10px;
    font-size: 1.2rem;
    color: #333;
    font-weight: bold;
}

/* Media Queries for Different Screen Sizes */

/* For tablet screens and below (max-width: 768px) */
@media (max-width: 768px) {
    .gallery-container {
        justify-content: space-around;
        gap: 15px;
    }

    .gallery-item {
        width: 200px;  /* Make gallery items slightly smaller on tablets */
    }

    .gallery-item .caption {
        font-size: 1rem;  /* Slightly smaller caption text */
    }

    .gallery h2 {
        font-size: 1.8rem;  /* Reduce heading size on smaller screens */
    }
}

/* For mobile screens and below (max-width: 480px) */
@media (max-width: 480px) {
    .gallery-container {
        flex-direction: column;  /* Stack gallery items vertically */
        align-items: center;
    }

    .gallery-item {
        width: 100%;  /* Full-width gallery items for mobile */
        margin-bottom: 20px;  /* Add space between items */
    }

    .gallery-item .caption {
        font-size: 1rem;  /* Make caption text smaller for mobile */
    }

    .gallery h2 {
        font-size: 1.6rem;  /* Reduce heading size further */
        margin-bottom: 15px;  /* Reduce margin between heading and gallery items */
    }
}

/* For larger screens (min-width: 1024px, i.e., desktop) */
@media (min-width: 1024px) {
    .gallery-container {
        justify-content: space-evenly;
        gap: 30px;
    }

    .gallery-item {
        width: 300px;  /* Make items larger on wider screens */
    }

    .gallery h2 {
        font-size: 2.5rem;  /* Increase heading size on larger screens */
    }

    .gallery-item .caption {
        font-size: 1.3rem;  /* Slightly larger caption text */
    }
}


    </style>
</head>

<body>
    <header>
        <div class="logo">
            <img src="loy.jpg" alt="Loyola Polytechnic (YSRR) Logo">
            <p>Loyola Polytechnic(YSRR)</p>
        </div>
    </header>

    
    <section class="gallery">
    <h2>College Gallery</h2>
    <p align="right" id="admin"><a href="addphoto.php"><button type="button">Add</button></a></p>
    <div class="gallery-container">
        <?php 
            while( $rows = $res->fetch_assoc()) {
                $imageData = $rows["image_data"];
                $imageType = $rows["image_type"];
                $base64Image = 'data:' . $imageType . ';base64,' . base64_encode($imageData);
                echo '<div class="gallery-item">';
                echo '<img src="' . $base64Image . '" alt="Image">';
                echo "<div class='caption'>".$rows["NAME"]."</div>";
                echo '</div>';
            }
        ?>
    </div>
</section>


    <footer>
        <p>&copy; 2024 Loyola Polytechnic (YSRR). All rights reserved.</p>
        <p>Bakarapuram, Pulivendula, YSR(Dist), Andhra Pradesh, 516300 | Phone: 08568-286309 | Email: loyolapoly.pulivendla@gmail.com</p>
    </footer>
</body>

</html>
