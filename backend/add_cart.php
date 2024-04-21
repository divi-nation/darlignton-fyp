<?php
session_start();

require_once "../conn.php";

if(isset($_POST['productId'])) {
    $product_id = $_POST['productId'];
    
    // Check if buyer_id session variable is set
    if(isset($_SESSION['buyer_id'])) {
        // Buyer ID is set
        $buyer_id = $_SESSION['buyer_id'];

        // Check if there is an entry for the buyer_id and product_id in the cart table
        $sql_check = "SELECT * FROM cart WHERE buyer_id = '$buyer_id' AND product_id = '$product_id'";
        $result_check = $conn->query($sql_check);

        if ($result_check->num_rows > 0) {
            // There is already an entry for the buyer_id and product_id
            echo "Product already in cart";
        } else {
            // No entry for the buyer_id and product_id, insert into cart table
            // Retrieve product price from products table
            $sql_price = "SELECT product_price FROM products WHERE product_id = '$product_id'";
            $result_price = $conn->query($sql_price);

            if ($result_price->num_rows > 0) {
                $row_price = $result_price->fetch_assoc();
                $product_price = $row_price['product_price'];

                // Set quantity to 1
                $quantity = 1;

                // Calculate total price
                $total_price = $product_price * $quantity;

                // Insert into cart table
                $sql_insert = "INSERT INTO cart (buyer_id, product_id, quantity, price, total_price)
                               VALUES ('$buyer_id', '$product_id', '$quantity', '$product_price', '$total_price')";
                if ($conn->query($sql_insert) === TRUE) {
                    echo "Product added to cart successfully";
                } else {
                    echo "Error: " . $sql_insert . "<br>" . $conn->error;
                }
            } else {
                echo "Error: Unable to retrieve product price";
            }
        }
    } else {
        // Buyer ID session variable is not set, generate a random 5-digit ID
        $buyer_id = rand(10000, 99999);
        $_SESSION['buyer_id'] = $buyer_id;
        echo "New buyer ID generated: $buyer_id";
    }
} else {
    echo "Product ID not received";
}

// Close connection
$conn->close();
?>
