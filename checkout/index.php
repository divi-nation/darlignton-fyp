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

    <!-- Include Paystack JavaScript library -->
    <script src="https://js.paystack.co/v1/inline.js"></script>
</head>
<body>
    <div class="container">

    <?php require_once "../components/cart.php"?>
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

    <script src="scripts/shop.js"></script>
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
</body>
</html>
