<?php 
// Start session
session_start();

// Include database connection
require_once "conn.php";

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the buyer_id session variable is set
    if (isset($_SESSION['buyer_id'])) {
        // Get the buyer_id from the session
        $buyerId = $_SESSION['buyer_id'];

        // Fetch product_id from the cart table where buyer_id matches the session buyer_id
        $sql = "SELECT product_id FROM cart WHERE buyer_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $buyerId);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if there are any cart items for the buyer
        if ($result->num_rows > 0) {
            // Initialize an array to store product IDs
            $productIds = array();

            // Iterate through the result set and fetch product_id values
            while ($row = $result->fetch_assoc()) {
                $productIds[] = $row['product_id'];
            }

            // Convert the array of product IDs into a comma-separated string
            $itemsOrdered = implode(",", $productIds);

            // Get form data
            $customerName = $_POST['fullName'];
            $email = $_POST['emailAddress'];
            $phone = $_POST['phoneNumber'];
            $address = $_POST['address'];
            $totalAmount = 300; // Example total amount
            $status = 'Pending'; // Default status

            // Prepare and execute the SQL statement to insert the order into the database
            $sql = "INSERT INTO orders (customer_name, email, phone, address, total_amount, status, items_ordered) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssdss", $customerName, $email, $phone, $address, $totalAmount, $status, $itemsOrdered);
            if ($stmt->execute()) {
                // Order inserted successfully
                echo "Order placed successfully!";

                // After inserting the order, delete the corresponding rows from the cart table
                $deleteSql = "DELETE FROM cart WHERE buyer_id = ?";
                $deleteStmt = $conn->prepare($deleteSql);
                $deleteStmt->bind_param("i", $buyerId);
                $deleteStmt->execute();
                $deleteStmt->close();
            } else {
                // Error inserting order
                echo "Error placing order: " . $stmt->error;
            }

            // Close statement and connection
            $stmt->close();
            $conn->close();
        } else {
           // No items in the cart for the current buyer
             echo "NO_ITEMS"; // Return a custom response

        }
    } else {
        // Buyer ID session variable not set
        echo "Error: Buyer ID session variable not set.";
    }
} else {
    // If the request method is not POST, return an error message
    echo "Error: Invalid request method";
}
?>
