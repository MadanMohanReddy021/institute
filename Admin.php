<?php
session_start();
require "connection.php";
if($_POST)
{
    $id=$_POST["id"];
    $password=$_POST["password"];
    $sql="select ID from admin where ID='$id' and PASSWORD='$password'";
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>=1)
    {
        echo"Logged On Successfully";
        $_SESSION["admin"]=1;
    }
    else{
        $sql="select *from admin where  ID='$id'";
        $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)==1)
    {
        echo"Incorrect Password";
    }
    else{
        echo"User Not Found";
    }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="formstyles.css"></link>
    <style>
 /* Basic Styling for the Form */
body {
    font-family: Arial, sans-serif;
    background-color: #f1f1f1; /* Light gray background */
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

form {
    background-color: #ffffff; /* White background for the form */
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 300px;
    box-sizing: border-box;
}

/* Form Heading */
form h2 {
    text-align: center;
    font-size: 1.5rem;
    color: #333333; /* Dark gray text for heading */
    margin-bottom: 20px;
}

/* Text input and password fields */
input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #cccccc; /* Light gray border */
    border-radius: 4px;
    font-size: 1rem;
    box-sizing: border-box;
}

/* Submit Button */
input[type="submit"] {
    width: 100%;
    padding: 12px;
    background-color: #7b31d5; /* Purple background */
    border: none;
    border-radius: 4px;
    color: #ffffff; /* White text */
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #2d36bb; /* Darker blue on hover */
}

/* Placeholder text styling */
input::placeholder {
    color: #888888; /* Light gray for placeholders */
    font-style: italic;
}

/* Media Queries for Different Screen Sizes */

/* For Tablet and Small Screens (max-width: 768px) */
@media (max-width: 768px) {
    form {
        width: 90%; /* Form takes 90% of the screen width */
        padding: 20px;
    }

    input[type="submit"] {
        padding: 14px;
    }
}

/* For Mobile Screens and Below (max-width: 480px) */
@media (max-width: 480px) {
    form {
        width: 100%; /* Full width for the form on mobile */
        padding: 15px;
    }

    input[type="submit"] {
        padding: 16px; /* Increase padding for touch targets */
    }
}


    </style>
</head>
<body>

   <div>
    <h3 >Admin Login</h3>
<form action="Admin.php" method="post">       
<input type="text" name="id" placeholder="Admin ID">
<input type="password" name="password" placeholder="Password" >
<input type="submit" value="Login">  </form>
</div>
</body>
</html>