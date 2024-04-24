<?php
// Start session to access session variables
session_start();


echo "reached php file";
// Check if the buyer ID is stored in the session
if (isset($_SESSION['buyer_id'])) {
    // Get the buyer ID from the session
    $buyerId = $_SESSION['buyer_id'];


    require_once "../connection/conn.php";



    

 

    // SQL to delete cart items for the specified buyer ID
    $sql = "DELETE FROM cart WHERE buyer_id = '$buyerId'";

    if ($conn->query($sql) === TRUE) {
        // Cart cleared successfully
        echo json_encode(array("success" => true));
    } else {
        // Error occurred while clearing cart
        echo json_encode(array("success" => false, "error" => "Error: " . $conn->error));
    }

    // Close connection
    $conn->close();
} else {
    // Buyer ID not found in session
    echo json_encode(array("success" => false, "error" => "Buyer ID not found in session"));
}

header("Location: ../shop/");
?>
