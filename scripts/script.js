// Function to toggle the visibility of items
function toggle_items(item_name){
    // Select the element with the specified name
    var element = document.querySelector(item_name);
    // Toggle the "active" class to show/hide the element
    element.classList.toggle("active");
}
// Function to add a product to the cart
function addToCart(productId) {
    console.log("got here");
    // AJAX request to add product to cart
    $.ajax({
        type: "POST",
        url: "../backend/add_cart.php", // Path to your add_cart.php file
        data: { productId: productId }, // Include the product ID in the data sent to add_cart.php
        success: function(response) {
            console.log(response); // Log the response from add_cart.php
            // Show SweetAlert notification
            Swal.fire({
                icon: 'success',
                title: 'Added to Cart',
                showConfirmButton: false,
                timer: 3000 // Display the notification for 3 seconds
            }).then(function() {
                // Refresh the page after the notification disappears
                location.reload();
            });
        }
    });
    // Call the function to animate the cart
    animateCart(productId);
}


// Function to animate the cart after adding a product
function animateCart(productId){
    // Find the "Add to Cart" button corresponding to the productId
    var $button = $('.bag[onclick*="addToCart(' + productId + ')"]');
    
    // Clone the "Add to Cart" button
    var $clone = $button.clone();

    // Set initial CSS properties for the cloned button
    $clone.css({
        'position': 'absolute',
        'top': $button.offset().top,
        'left': $button.offset().left,
        'width': $button.width(),
        'height': $button.height(),
        'opacity': '0.6', // Optional: Reduce opacity during animation
        'z-index': '1000',
        'color': 'white',
        'background': 'blue' // Adjust as needed
    }).appendTo($('body')); // Append the clone to the body

    // Animate the cloned button with wiggle effect
    $clone.animate({
        'top': '1rem',  // Adjust as needed
        'left': '95vw',  // Adjust as needed
        'width': '50px', // Adjust as needed
        'opacity': '0.1', // Adjust as needed
        'height': '50px' // Adjust as needed
    }, {
        duration: 2000, // Duration of animation (in milliseconds)
        step: function(now, fx) {
            // Apply a wiggle effect during animation
            var wiggle = Math.sin(now * 10) * 1; // Adjust the amplitude and frequency as needed
            $(this).css('left', parseFloat($(this).css('left')) + wiggle);
        },
        complete: function() {
            // Remove the cloned button after animation is complete
            $(this).remove();
        }
    });

    // Show a message indicating that the item has been added to the cart
    $('#cartMessage').fadeIn('fast').delay(1000).fadeOut('slow');

    // Remove the clone after animation completes
    setTimeout(function() {
        $clone.remove();
    }, 1900);
}

// Function to view a product details
function viewProduct(productId) {
    // Redirect to product.php with the product ID in the URL
    window.location.href = '../productShowcase/?product_id=' + btoa(productId);
}
