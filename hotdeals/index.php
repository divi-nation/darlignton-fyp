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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>
<body>

<div class="mycart">
    <h4>SHOPPING CART</h4>
    <!-- Click to update cart -->
    <div class='cen update' onclick="location.reload();">Click To Update Cart</div>

    <div class="cont" >
        <div class="oy" id="cartItemsContainer">
            <!-- Cart items will be dynamically inserted here -->
        </div>
    </div>
</div>

<div class="container">
    <?php require_once "../components/nav.php"?>

    

    <div class="content cen">
        <div class="hero">
            <span class="hs1">
                <h3>Be An Early Bird, Get The Hottest Deals Now</h3>
                <button>Pay Now</button>
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
