<?php require_once "../connection/conn.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marina Mall Marketplace</title>
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/shop.css">
    <link rel="stylesheet" href="../css/cart.css">

    <!-- jQuery Library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Sweetalert cdn -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>


<?php require_once "../components/nav.php"?>


<div class="container">
    <?php require_once "../components/cart.php"?>


    <div class="content cen">
        <div class="hero">
            <span class="hs1">
                <h3>Scan and Pay, Swiftly Pay All Mall Vendors With One Tap</h3>
                <button onclick="location.href='../scan/'">Pay Now</button>
            </span>
            <span class="hs2 ">
                <img src="../assets/pay.png" alt="">
            </span>
        </div>

        
        <?php 
        //require filters
        
        require_once "../components/filters.php"?>
        
        
        <div class="line">
            <h4>Best Products For You</h4>
        </div>

        <div class="featured">
            <?php
            // Include PHP file to display products
            require_once "../components/showProducts.php";
            ?>
        </div>
    </div>
</div>

<!-- JavaScript Files -->
<script src="../scripts/shop.js"></script>
<script src="../scripts/clearCart.js"></script>
<script src="../scripts/searchLogic.js"></script>
<script src="../scripts/script.js"></script>

</body>
</html>
