function clearCart() {
    console.log("greee i am here");

    $(document).ready(function() {
        // Event listener for the "CLEAR CART" button
        $('#clearCartButton').click(function() {
            // Get the buyer ID from wherever it's stored (e.g., a variable or input field)
            var buyerId = getBuyerId(); // Implement the function to get the buyer ID

            // Send an AJAX request to clear the cart for the buyer ID
            $.ajax({
                url: 'backend/clearCart.php',
                type: 'POST',
                data: { buyerId: buyerId }, // Send the buyer ID to the backend
                success: function(response) {
                    // Handle success (e.g., reload the page or update the cart display)
                    console.log('Cart cleared successfully');
                    // For example, you can reload the page to reflect the changes
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error('Error clearing cart:', error);
                    // Display an error message or handle it as appropriate
                }
            });
        });
    });
}

// Function to get the buyer ID
function getBuyerId() {
    // Implement this function to retrieve the buyer ID from wherever it's stored
    // For example, you can retrieve it from a session variable or an input field
    // Replace the return value below with your actual implementation
    return 'buyer123'; // Example buyer ID
}

// Call the clearCart function whenever needed
