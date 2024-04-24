<?php require_once "../connection/conn.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marina Mall Marketplace</title>
    <!-- External Stylesheets -->
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/shop.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- External JavaScript Library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <!-- Include navigation component -->
        <?php require_once "../components/nav.php"?>
        
        <div class="content cen">
            <!-- Hero section -->
            <div class="hero">
                <span class="hs1">
                    <h3>Limited Time Offer, Save Big on MacBook and MacBook Air</h3>
                    <button>Shop Now</button>
                </span>
                <span class="hs2">
                    <img src="../assets/mac.png" alt="">
                </span>
            </div>

            <!-- Categories section -->
            <?php require_once "../components/categories.php"?>

            <!-- Featured products section -->
            <div class="featured">
                <?php require_once "../components/showProducts.php"?>
            </div>

            <!-- Become a vendor section -->
            <div class="merch">
                <span class="s1">
                    <div class="slant"></div>
                    <h3>Become A Vendor</h3>
                    <p>Discover the opportunities awaiting you as a vendor in our thriving marketplace. Sign up today and become part of our diverse community, which already boasts over 300 vendors. Showcase your products, connect with customers, and unlock new possibilities for your business. With our platform, you'll gain access to valuable resources, support, and promotional opportunities to help you succeed. </p>
                    <button onclick="showVendorAuthentication()" >Sign Up</button>
                </span>
                <span></span>
            </div>

           
        </div>
    </div>

    <!-- External JavaScript Files -->
    <script src="../scripts/shop.js"></script>
    <script src="../scripts/clearCart.js"></script>
    <script src="../scripts/searchLogic.js"></script>
    <script src="../scripts/script.js"></script>

    <!-- JavaScript function to view product details -->
    <script>
        function viewProduct(productId) {
            // Redirect to product.php with the product ID in the URL
            window.location.href = '../productShowcase/?product_id=' + btoa(productId);

 
        }
    </script>
</body>
</html>
