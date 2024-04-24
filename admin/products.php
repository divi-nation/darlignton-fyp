<?php // Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

    <div class="container">
        <nav>
            Products
        </nav>
        <div class="panel cen">
            <span onclick="location.href='vendor.php'">Dashboard</span>
            <span onclick="location.href='products.php'">Products</span>
            <span onclick="location.href='orders.php'">Orders</span>
            <span>Settings</span>
         </div>
         <div class="content">
            <h4>All Products On Display</h4>
            <p>Hello, Here are all the products you have posted</p>

            <div class="add">Add Product</div>

            <div class="products orders">
                <h4>Product Information</h4>
                <div class="ot">
                    <div class="line header">
                        <span>Image</span>
                        <span>Product Name</span>
                        <span>Description</span>
                        <span>Price</span>
                        <span>Category</span>
                        <span>Actions</span>
                    </div>

                    <?php
                    // Start the session
                    session_start();

                    // Check if the vendor ID is stored in the session
                    if(isset($_SESSION['user_id'])) {
                        // Include the database connection file
                        require_once "../connection/conn.php";

                        // Escape the vendor ID to prevent SQL injection
                        $vendor_id = $conn->real_escape_string($_SESSION['user_id']);

                        // Query to fetch product information based on vendor ID
                        $sql = "SELECT * FROM products WHERE vendor_id = '$vendor_id'";
                        $result = $conn->query($sql);

                        // Check if there are any products
                        if ($result->num_rows > 0) {
                            // Output product information
                            while ($row = $result->fetch_assoc()) {
                                echo '<div class="line">';
                                echo '<span><img src="' . $row["image"] . '" alt="' . $row["product_name"] . '"></span>';
                                echo '<span>' . $row["product_name"] . '</span>';
                                echo '<span>' . $row["product_description"] . '</span>';
                                echo '<span>' . $row["product_price"] . '</span>';
                                echo '<span>' . $row["category"] . '</span>';
                                echo '<span onclick="deleteProduct(' . $row["product_id"] . ')" class=`delete`>Delete Product</span>';
                                echo '</div>';
                            }
                            
                        } else {
                            echo '<div class="line">No products found.</div>';
                        }

                        // Close the database connection
                        $conn->close();
                    } else {
                        // If vendor ID is not set in the session, redirect to login page
                        header("Location: ../login/");
                        exit();
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>


    <script>
    function deleteProduct(productId) {
        // Display a SweetAlert confirmation dialog to the user
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this product!",
            icon: "warning",
            buttons: ["Cancel", "Delete"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                // If the user confirms, redirect to delete_product.php with the product_id
                window.location.href = 'backend/deleteProduct.php?product_id=' + productId;
            } else {
                // If the user cancels, do nothing
            }
        });
    }
</script>
    
</body>
</html>
