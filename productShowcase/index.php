<?php require_once "../connection/conn.php"?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="../css/product.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <!-- jQuery Library -->

         <!-- Sweetalert cdn -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>

    <div class="container">
    <?php require_once "../components/cart.php"?>

    <?php require_once "../components/nav.php"?>

 

        <div class="product">
            <aside class="cen">
                <div class="main_image cen">
                    <?php
                    // Check if product ID is provided in the URL
                    if (isset($_GET['product_id'])) {
                        // Retrieve product ID from URL
                        $productId = base64_decode($_GET['product_id']);
                        
                        // Query to fetch product information based on product ID
                        $sql = "SELECT * FROM products WHERE product_id = $productId";
                        $result = $conn->query($sql);

                        // Check if there are any results
                        if ($result->num_rows > 0) {
                            // Output data of the product
                            $row = $result->fetch_assoc();
                            echo '<img src="../products' . $row["image1"] . '" alt="' . $row["product_name"] . '">';
                        } else {
                            echo 'Product not found';
                        }
                    } else {
                        echo 'Product ID not provided';
                    }
                    ?>
                </div>

                <div class="subs">
                    <!-- Additional images if needed -->
                    <div class="sub_image cen">
                        <?php echo '<img src="../products' . $row["image2"] . '" alt="' . $row[""] . '">';?>
                    </div>
                    <div class="sub_image cen">
                        <?php echo '<img src="../products' . $row["image3"] . '" alt="' . $row[""] . '">';?>
                    </div>
                    <div class="sub_image cen">
                        <?php echo '<img src="../products' . $row["image4"] . '" alt="' . $row[""] . '">';?>
                    </div>
            
                </div>
            </aside>
            <aside class="p_info">
                <?php
                // Check if product ID is provided in the URL
                if (isset($_GET['product_id'])) {
                    // Retrieve product ID from URL
                    $productId = base64_decode($_GET['product_id']);
                    
                    // Query to fetch product information based on product ID
                    $sql = "SELECT * FROM products WHERE product_id = $productId";
                    $result = $conn->query($sql);

                    // Check if there are any results
                    if ($result->num_rows > 0) {
                        // Output data of the product
                        $row = $result->fetch_assoc();
                        echo '<h4>' . $row["product_name"] . '</h4>';
                        echo '<div class="p_price">';
                        echo '<span>GHC</span> ' . $row["product_price"];
                        echo '</div>';
                        echo '<p>' . $row["product_description"] . '</p>';
                        // Additional product details if needed
                    } else {
                        echo 'Product not found';
                    }
                } else {
                    echo 'Product ID not provided';
                }
                ?>
                <div class="buttons cen">
                    <button onclick="location.href='../checkout/'">Buy Now</button>
                    <!-- Add onclick attribute to add product to cart -->
                    <?php echo '<button onclick="addToCart(' . $row["product_id"] . ')">Add To Cart</button>';?>
                </div>
            </aside>
        </div>
    </div>


    <script>
        function toggle_items(item_name){
    // Select the element with the specified name
            element = document.querySelector(item_name);
            // Toggle the "active" class to show/hide the element
            element.classList.toggle("active");
}
    </script>

    <!-- External JavaScript Files -->
    <script src="../scripts/shop.js"></script>
    <script src="../scripts/clearCart.js"></script>
    <script src="../scripts/searchLogic.js"></script>
    <script src="../scripts/script.js"></script>

</body>
</html>
