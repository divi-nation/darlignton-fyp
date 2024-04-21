<?php session_start();
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
 

error_reporting(E_ALL);
ini_set('display_errors', 1);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $businessName = $_POST["businessName"];
    $businessCategory = $_POST["businessCategory"];
    $businessAddress = $_POST["businessAddress"];
    $businessPhone = $_POST["businessPhone"];
    $businessEmail = $_POST["businessEmail"];
    $acc_password = $_POST["password"];
    $personalName = $_POST["personalName"];
    $personalAddress = $_POST["personalAddress"];
    $personalPhone = $_POST["personalPhone"];
    $mobileMoney = $_POST["mobileMoney"];

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

    // Prepare SQL statement to insert data into the vendors table
    $sql = "INSERT INTO vendors (business_name, business_category, business_address, business_phone, business_email, acc_password, personal_name, personal_address, personal_phone, mobile_money) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Check if the statement preparation succeeded
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters and execute the statement
    $stmt->bind_param("ssssssssss", $businessName, $businessCategory, $businessAddress, $businessPhone, $businessEmail, $acc_password, $personalName, $personalAddress, $personalPhone, $mobileMoney);

    if ($stmt->execute()) {
        // Get the user ID of the inserted record
        $userId = $stmt->insert_id;

        // Set the user ID as a session variable
        $_SESSION["user_id"] = $userId;

        $session_id = $_SESSION["user_id"];

        // Display success message using SweetAlert
        echo "<script>
                  Swal.fire({
                      title: 'Thank you for signing up, $personalName!',
                      text: 'Your information has been successfully recorded. Your application is currently under review',
                      icon: 'success',
                      confirmButtonText: 'OK'
                  }).then((result) => {
                      if (result.isConfirmed) {
                          window.location.href = '../admin/vendor.php';
                      }
                  });
              </script>";
    } else {
        // Display error message using SweetAlert
        echo "<script>
                  Swal.fire({
                      title: 'Error!',
                      text: 'Failed to record your information. Please try again later.',
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
