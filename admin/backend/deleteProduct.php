<?php
// Start the session
session_start();

// Include the database connection file
require_once "../../connection/conn.php";

// Check if the vendor ID is stored in the session
if(isset($_SESSION['user_id'])) {
    // Escape the vendor ID and product ID to prevent SQL injection
    $vendor_id = $conn->real_escape_string($_SESSION['vendor_id']);
    $product_id = $conn->real_escape_string($_GET['product_id']);

    // Query to delete the product based on product ID and vendor ID
    $sql_delete = "DELETE FROM products WHERE product_id = '$product_id'";
    $result_delete = $conn->query($sql_delete);

    // Check if the delete operation was successful
    if($result_delete) {
        // Redirect back to the products page after deleting the product
        header("Location: ../products.php");
        exit();
    } else {
        // Error handling if the delete operation fails
        echo "Error deleting product: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If vendor ID is not set in the session, redirect to login page
    header("Location: ../login/");
    exit();
}
?>
