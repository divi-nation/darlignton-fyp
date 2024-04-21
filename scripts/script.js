
        function addToCart(productId) {
            // AJAX request to add product to cart
            $.ajax({
                type: "POST",
                url: "backend/add_cart.php", // Path to your cart.php file
                data: { productId: productId }, // Include the product ID in the data sent to cart.php
                success: function(response) {
                    console.log(response); // Log the response from cart.php
                }
            });
        }


        function viewProduct(productId) {
            // Redirect to product.php with the product ID in the URL
            window.location.href = 'product.php?product_id=' + btoa(productId);
        } 