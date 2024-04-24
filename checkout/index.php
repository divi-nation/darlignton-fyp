<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>

    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/checkout.css">
    <link rel="stylesheet" href="../css/cart.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Include Paystack JavaScript library -->
    <script src="https://js.paystack.co/v1/inline.js"></script>
</head>
<body>
    <div class="container">

    <?php require_once "../components/nav.php"?>

        <div class="info">
            <h4>Contact Information</h4>
            <form id="checkoutForm">
                <div class="input cen">
                    <label for="">Full Name</label>
                    <input type="text" id="fullName" placeholder="Enter your full name">
                </div>
                <div class="input cen">
                    <label for="">Phone Number</label>
                    <input type="text" id="phoneNumber" placeholder="Enter your phone number">
                </div>
                <div class="input cen">
                    <label for="">Email Address</label>
                    <input type="text" id="emailAddress" placeholder="Enter your email address">
                </div>
                <div class="input cen">
                    <label for="">Address</label>
                    <input type="text" id="address" placeholder="Enter your address">
                </div>
                <button type="button" id="proceedToPay">Proceed To Pay</button>
            </form>
        </div>

        <div class="products">
            <div class="total cen">
                <h4>Total: GHC<span>4909</span></h4>
            </div>
            <div class="cont">
                <div class="oy" id="cartItemsContainer">
                    <!-- Cart items will be dynamically inserted here -->
                </div>
            </div>
        </div>
    </div>

    <script src="../scripts/shop.js"></script>
    <script>
        $(document).ready(function () {
            $('#proceedToPay').click(function () {
                var fullName = $('#fullName').val();
                var phoneNumber = $('#phoneNumber').val();
                var emailAddress = $('#emailAddress').val();
                var address = $('#address').val();
                
                // Prepare data for Paystack
                var paystackData = {
                    email: emailAddress,
                    amount: 490900, // Amount in kobo (4909 * 100)
                    metadata: {
                        fullName: fullName,
                        phoneNumber: phoneNumber,
                        address: address
                    },
                    callback: function (response) {
                        // Payment successful, you can handle the response here
                        console.log(response);
                        alert('Payment successful!');
                    },
                    onClose: function () {
                        // Handle closure of Paystack popup
                        console.log('Payment window closed');
                    }
                };
                
                // Initialize Paystack inline form
                var handler = PaystackPop.setup(paystackData);
                // Open Paystack popup
                handler.openIframe();
            });
        });
    </script>


<!-- JavaScript Files -->
<script src="../scripts/shop.js"></script>
<script src="../scripts/clearCart.js"></script>
<script src="../scripts/searchLogic.js"></script>
<script src="../scripts/script.js"></script>
<script>
    $(document).ready(function () {
    $('#proceedToPay').click(function () {
        // Get form data
        var fullName = $('#fullName').val();
        var phoneNumber = $('#phoneNumber').val();
        var emailAddress = $('#emailAddress').val();
        var address = $('#address').val();
        
        // Prepare form data
        var formData = {
            fullName: fullName,
            phoneNumber: phoneNumber,
            emailAddress: emailAddress,
            address: address
        };

        // Send form data via AJAX
        $.ajax({
            url: '../backend/orders.php',
            type: 'POST',
            data: formData,
            success: function(response) {
                // Handle success
                console.log(response);
                if (response === "Order placed successfully!") {
                    // Trigger SweetAlert success popup
                    Swal.fire({
                        title: 'Success!',
                        text: 'Order placed successfully!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirect to the homepage
                            window.location.href = '../home/'; // Replace 'homepage.php' with the actual URL of your homepage
                        }
                    });

                } else if (response === "NO_ITEMS") {
                    // Trigger SweetAlert for no items in the cart
                    Swal.fire({
                        title: 'Error!',
                        text: 'No items in the cart for the current buyer.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                } else {
                    // Handle other responses or errors
                    // Display an alert or perform other actions as needed
                    alert(response);
                }
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error('Error:', error);
                // Display an error message or handle it as appropriate
            }
        });
    });
});


</script>


</body>
</html>
