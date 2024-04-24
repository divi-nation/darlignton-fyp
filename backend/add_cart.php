<?php
session_start();

require_once "../connection/conn.php";

if(isset($_POST['productId'])) {
    $product_id = $_POST['productId'];
    
    // Check if buyer_id session variable is set
    if(isset($_SESSION['buyer_id'])) {
        // Buyer ID is set
        echo $buyer_id = $_SESSION['buyer_id'];

        // Check if there is an entry for the buyer_id and product_id in the cart table
        $sql_check = "SELECT * FROM cart WHERE buyer_id = '$buyer_id'";
        $result_check = $conn->query($sql_check);



        if ($result_check->num_rows > 0) {
            echo "first";

            // Select product IDs associated with the current buyer from the cart table
            $sql_select = "SELECT product_id FROM cart WHERE buyer_id = '$buyer_id' limit 1";
            $result_select = $conn->query($sql_select);

            if ($result_select->num_rows > 0) {
                // Output product IDs
                while($row = $result_select->fetch_assoc()) {
 
                    $products_in_cart_ids = $row["product_id"];
                    echo $products_in_cart_ids;

                    $new_id_to_append = $product_id;


                    // Explode the string into an array
                    $product_ids_array = explode(",", $products_in_cart_ids);

                    // Check if the new ID to append is already in the array
                    if(in_array($new_id_to_append, $product_ids_array)) {
                        echo "Product already in cart";
                    } else {

                        $update_pro_id = $products_in_cart_ids . "," . $new_id_to_append;

                        // Update the cart table with the new product ID
                        $sql_update = "UPDATE cart SET product_id = '$update_pro_id' WHERE buyer_id = '$buyer_id'";
                        if ($conn->query($sql_update) === TRUE) {
                            echo "Product added to cart successfully";

                            $num_items = count($product_ids_array) + 1;

                            // Create a string with "1" repeated for each item in the array, separated by commas
                            echo $new_quantity = implode(",", array_fill(0, $num_items, "1"));

                            $sql_update = "UPDATE cart SET quantity = '$new_quantity' WHERE buyer_id = '$buyer_id'";
                            if ($conn->query($sql_update) === TRUE) {

                                // SQL to fetch product prices based on product IDs in the $update_pro_id string
                                $sql_sum_price = "SELECT SUM(product_price) AS total_price FROM products WHERE product_id IN ($update_pro_id)";

                                // Execute the SQL query
                                $result_sum_price = $conn->query($sql_sum_price);

                                // Check if the query was successful
                                if ($result_sum_price) {
                                    // Fetch the total price from the result
                                    $row_total_price = $result_sum_price->fetch_assoc();
                                    // Get the total price from the fetched row
                                    $total = $row_total_price['total_price'];

                                    // Output the total price
                                    echo "Total price: " . $total;
                                } else {
                                    // Error handling if the query fails
                                    echo "Error: " . $conn->error;
                                }



                            }
                        } else {
                            echo "Error updating cart: " . $conn->error;
                        }                    }

                    

                    

                }
            } else {
                echo "No products in cart";
            }


            
        } else {

            echo "second";
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

                $insert_qty = "1,";
                $insert_pro_id = $product_id;

                // Insert into cart table
                $sql_insert = "INSERT INTO cart (buyer_id, product_id, quantity, price, total_price)
                               VALUES ('$buyer_id', '$insert_pro_id', '$insert_qty', '$product_price', '$total_price')";
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
