<?php
session_start();

// Include database connection
require_once "conn.php";

// Assuming you have a session variable for the buyer_id
$buyer_id = $_SESSION['buyer_id'];

// Query to fetch cart items for the current buyer
$sql = "SELECT * FROM cart WHERE buyer_id = '$buyer_id'";
$result = $conn->query($sql);

// Check if there are any cart items
if ($result->num_rows > 0) {
    // Initialize an empty array to store cart items
    $cart_items = array();

    // Loop through each cart item
    while ($row = $result->fetch_assoc()) {
        // Fetch product IDs and quantities
        $product_ids = explode(',', $row['product_id']);
        $quantities = explode(',', $row['quantity']);

        // Loop through each product ID and fetch its details
        foreach ($product_ids as $key => $product_id) {
            $quantity = $quantities[$key];

            // Query to fetch product details
            $product_query = "SELECT * FROM products WHERE product_id = '$product_id'";
            $product_result = $conn->query($product_query);

            // Check if product details are found
            if ($product_result->num_rows > 0) {
                $product_info = $product_result->fetch_assoc();

                // Add product details to the cart item array
                $cart_items[] = array(
                    'product_id' => $product_id,
                    'quantity' => $quantity,
                    'product_name' => $product_info['product_name'],
                    'product_price' => $product_info['product_price'],
                    'product_description' => $product_info['product_description'],
                    'product_image' => $product_info['image1'],

                    // Add more product details here if needed
                );
            }
        }
    }

    // Convert the array to JSON and echo the response
    echo json_encode($cart_items);
} else {
    // No cart items found
    echo "No items in the cart";
}

// Close connection
$conn->close();
?>
