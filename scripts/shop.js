

var TOTAL = 0;

// Function to update quantity and subtotal
function updateQuantity(productId, action, productPrice) {
    const quantityElement = document.querySelector(`.cartitem[data-productid="${productId}"] .qty .cen`);
    const subtotalElement = document.getElementById(`subtotal_${productId}`);
    let quantity = parseInt(quantityElement.innerHTML);
    let subtotal = parseFloat(subtotalElement.innerHTML.split(' ')[2]); // Extract and parse subtotal

    if (action === 'minus') {
        if (quantity > 1) {
            quantity--;
            subtotal -= parseFloat(productPrice); // Subtract the product price
        }
    } else if (action === 'plus') {
        quantity++;
        subtotal += parseFloat(productPrice); // Add the product price
    }

    quantityElement.innerHTML = quantity;
    subtotalElement.innerHTML = `Sub Total: <br> ${subtotal.toFixed(2)}`;

 }


// Update order summary function
function updateOrderSummary() {

    console.log("this was called");
    // Calculate subtotal
    let subtotal = 0;
    $('.cartitem').each(function() {
        const subtotalText = $(this).find('.amt h6').eq(1).text();
        subtotal += parseFloat(subtotalText.split(' ')[2]);
    });
    
    // Update subtotal in the order summary
    $('#subtotal').text(subtotal.toFixed(2));

    // Discount is always 0.00
    const discount = 0.00;
    $('#discount').text(discount.toFixed(2));

    // Calculate total
    const total = subtotal - discount;

    // Update total in the order summary
    $('#total').text(total.toFixed(2));
}

$(document).ready(function() {
    // Function to fetch cart items from the server
    function fetchCartItems() {
        $.ajax({
            url: 'backend/fetch_cart_items.php',
            type: 'GET',
            dataType: 'json', // Specify the expected data type
            success: function(response) {
                console.log(response); // Log the response in the console
                displayCartItems(response);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching cart items:', error);
            }
        });
    }

    // Function to display cart items on the page
    function displayCartItems(cartItems) {
        var cartItemsContainer = $('#cartItemsContainer');
        cartItemsContainer.empty(); // Clear previous items

        if (Array.isArray(cartItems) && cartItems.length > 0) {
            // Loop through each cart item and create HTML
            function addAndLog(number) {
    // Initialize a variable to hold the sum
                let sum = 0;

                // Add the number to the sum
                sum += number;

                // Log the updated sum
                console.log(sum);
            }

            function setTotal(){
                document.querySelector(".total").innerHTML = "43434";

            }

            var TOTAL = 0; // Initialize TOTAL to 0
            cartItems.forEach(function(item) {
                // Extract the image path
                const imagePath = item.product_image ? item.product_image.split('/').slice(2).join('/') : '';

                var current_item_price = item.product_price;
                TOTAL += parseFloat(current_item_price); // Convert to number and add to TOTAL
                console.log("Total is : " + TOTAL);

 


                 // Calculate the subtotal
                const subtotal = item.quantity * item.product_price;

                var cartItemHtml = `
                    <div class="cartitem" data-productid="${item.product_id}">
                        <div class="c_image cen">
                            <img src="./${imagePath}" alt="">
                        </div>
                        <div class="desc">
                            <h3>${item.product_name}</h3>
                            <p>${item.product_description}</p>
                        </div>
                        <div class="price cen">
                            <div class="qty cen">
                               <aside class="b cen minus">Quantity: </aside>
                                <aside class="cen">${item.quantity}</aside>
                                <aside class="b cen plus"></aside>

                             </div>
                            <div class="amt cen">
                                <aside>Unit Price: <br> ${item.product_price}</aside>
                                <aside id="subtotal_${item.product_id}">Sub Total: <br> ${subtotal}</aside>
                            </div>
                        </div>
                    </div>
                    <span>
                    <div class="os">
                    <h3>ORDER SUMMARY</h3>
                    <div class="val cen">
                        <h6>SUBTOTAL</h6>
                        <h6 id="totalValue" >0.00</h6> <!-- Placeholder for subtotal value -->
                    </div>
                    <div class="val cen">
                        <h6>DISCOUNT</h6>
                        <h6>0.00</h6> <!-- Placeholder for discount value -->
                    </div>
                    <div class="val cen">
                        <h6>TOTAL</h6>
                        <h6 id="totalValue2"></h6> <!-- Placeholder for total value -->                    </div>
                        <button>CHECKOUT</button>
                        <button onclick="location.href='backend/clearCart.php'">CLEAR CART</button>
                    </div>


            </span>
                `;
                cartItemsContainer.append(cartItemHtml);

                // Assuming you have calculated the total and stored it in the variable TOTAL
 
// Assuming you have calculated the total and stored it in the variable TOTAL
var totalValueElement = document.getElementById('totalValue');
totalValueElement.textContent = TOTAL.toFixed(2); // Assuming TOTAL is a number, and you want to display it with 2 decimal places
var totalValueElement = document.getElementById('totalValue2');
totalValueElement.textContent = TOTAL.toFixed(2); // Assuming TOTAL is a number, and you want to display it with 2 decimal places

                // Attach event listeners to the plus and minus buttons
                cartItemsContainer.find(`[data-productid="${item.product_id}"] .minus`).click(function() {
                    updateQuantity(item.product_id, 'minus', item.product_price);
                });

                cartItemsContainer.find(`[data-productid="${item.product_id}"] .plus`).click(function() {
                    updateQuantity(item.product_id, 'plus', item.product_price);
                });
            });
        } else {
            cartItemsContainer.html('<p>No items in the cart</p>');
        }
    }

    // Fetch cart items when the page loads
    fetchCartItems();
});
 

function clearCart() {
    window.location.href = 'googele.com';

    console.log("greee i am here");
}

// Function to get the buyer ID
function getBuyerId() {
    // Implement this function to retrieve the buyer ID from wherever it's stored
    // For example, you can retrieve it from a session variable or an input field
    // Replace the return value below with your actual implementation
    return 'buyer123'; // Example buyer ID
}

// Call the clearCart function whenever needed
