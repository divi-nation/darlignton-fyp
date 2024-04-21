<?php session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Sign Up</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
    
    
<?php
 
 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $productName = $_POST["productName"];
    $productPrice = $_POST["productPrice"];
    $productDescription = $_POST["productDescription"];
    $category = $_POST["category"];
    $vendorId = $_SESSION["user_id"]; // Assuming the session variable is named "userId"

    // File uploads
    $productImage1 = $_FILES["productImage1"]["name"];
    $productImage2 = $_FILES["productImage2"]["name"];
    $productImage3 = $_FILES["productImage3"]["name"];
    $productImage4 = $_FILES["productImage4"]["name"];

    // Temporary file paths
    $tempImage1 = $_FILES["productImage1"]["tmp_name"];
    $tempImage2 = $_FILES["productImage2"]["tmp_name"];
    $tempImage3 = $_FILES["productImage3"]["tmp_name"];
    $tempImage4 = $_FILES["productImage4"]["tmp_name"];

    // Move uploaded images to the products folder with unique names
    $uploadDir = "../../products/";
    $image1Path = $uploadDir . uniqid('product_') . basename($productImage1);
    $image2Path = $uploadDir . uniqid('product_') . basename($productImage2);
    $image3Path = $uploadDir . uniqid('product_') . basename($productImage3);
    $image4Path = $uploadDir . uniqid('product_') . basename($productImage4);

    // Move uploaded files to the products folder
    move_uploaded_file($tempImage1, $image1Path);
    move_uploaded_file($tempImage2, $image2Path);
    move_uploaded_file($tempImage3, $image3Path);
    move_uploaded_file($tempImage4, $image4Path);

    // Connect to the database (Replace these values with your database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "swiftpay";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert data into the products table
    $sql = "INSERT INTO products (vendor_id, product_name, product_price, product_description, category, image1, image2, image3, image4) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    // Check if the statement preparation succeeded
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters and execute the statement
    $stmt->bind_param("issssssss", $vendorId, $productName, $productPrice, $productDescription, $category, $image1Path, $image2Path, $image3Path, $image4Path);

    if ($stmt->execute()) {
        // Display success message using SweetAlert
        echo "<script>
            Swal.fire({
                title: 'Product Added Successfully',
                text: 'Your product has been added successfully!',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../addProduct.php';
                }
            });
        </script>";
    } else {
        echo "Error: " . $conn->error;
        // Display error message using SweetAlert
        echo "<script>
            Swal.fire({
                title: 'Error!',
                text: 'Failed to add the product. Please try again later.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>";
    }
    

    // Close statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // If accessed directly without form submission, redirect to the signup page
    header("Location: your-signup-page.html");
    exit;
}
?>
