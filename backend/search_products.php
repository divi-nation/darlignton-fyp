<?php

// Include database connection
require_once "conn.php";

// Get the search query from the AJAX request
if(isset($_POST['query'])) {
    $searchQuery = $_POST['query'];

    // Query to search for products based on the search query
    $sql = "SELECT product_id, product_name, product_price FROM products WHERE product_name LIKE '%$searchQuery%'";

    // Execute the query
    $result = $conn->query($sql);

    // Check if there are any results
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            // Display product name and price with onclick event
            echo '<span class="cen" onclick="viewProduct(' . $row["product_id"] . ')">';
            echo '<h4>' . $row["product_name"] . '</h4>';
            echo '<h6>' . "Ghc " . $row["product_price"] . '</h6>';
            echo '</span>';
        }
    } else {
        echo "No results found";
    }

    // Close connection
    $conn->close();
}
