<?php require_once "conn.php"?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="product.css">
</head>
<body>

    <div class="container">
        <nav class="">
            <div class="logo n cen">
                <img src="logo.png" alt="">
            </div>

            <div class="nav_content n cen">
                <div class="tabs cen">
                    <span class="cen">Categories</span>
                    <span class="cen">Discover</span>
                    <span class="cen">Shop</span>
                    <span class="cen">Hot Deals</span>
                    <span class="cen">Swift Pay</span>
                </div>
            </div>

            <div class="search n cen">
                <input type="text" placeholder="Search for products or vendors">
                <i class="bi bi-search"></i>
            </div>

            <div class="cart n cen">
                <div class="cir cen">
                    <i class="bi bi-cart4"></i>
                </div>
            </div>
        </nav>

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
                            echo '<img src="./products' . $row["image1"] . '" alt="' . $row["product_name"] . '">';
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
                        <?php echo '<img src="./products' . $row["image2"] . '" alt="' . $row[""] . '">';?>
                    </div>
                    <div class="sub_image cen">
                        <?php echo '<img src="./products' . $row["image3"] . '" alt="' . $row[""] . '">';?>
                    </div>
                    <div class="sub_image cen">
                        <?php echo '<img src="./products' . $row["image4"] . '" alt="' . $row[""] . '">';?>
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
                    <button>Buy Now</button>
                    <button>Add To Cart</button>
                </div>
            </aside>
        </div>
    </div>
</body>
</html>
