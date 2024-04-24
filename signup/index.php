<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/signup.css">
</head>
<body>

    <div class="container cen bg">
        <form action="../backend/vendorSignUp.php" method="POST">
            <div class="form-group">
                <label for="businessName">Business Name:</label>
                <input type="text" id="businessName" name="businessName" placeholder="Enter your business name" required>
            </div>
        
            <div class="form-group">
                <label for="businessCategory">Business Category:</label>
                <select id="businessCategory" name="businessCategory" required>
                    <option value="Food & clothing">Food & clothing</option>
                    <!-- Add more options for other business categories if needed -->
                </select>
            </div>
        
            <div class="form-group">
                <label for="businessAddress">Business Address:</label>
                <input type="text" id="businessAddress" name="businessAddress" placeholder="Enter your business address" required>
            </div>
        
            <div class="form-group">
                <label for="businessPhone">Business Phone Number:</label>
                <input type="tel" id="businessPhone" name="businessPhone" placeholder="Enter your business phone number" required>
            </div>
        
            <div class="form-group">
                <label for="businessEmail">Business Email Address:</label>
                <input type="email" id="businessEmail" name="businessEmail" placeholder="Enter your business email address" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="businessEmail" name="password" placeholder="Enter your password" required>
            </div>
        
            <div class="form-group">
                <label for="personalName">Your Full Name:</label>
                <input type="text" id="personalName" name="personalName" placeholder="Enter your full name" required>
            </div>
        
            <div class="form-group">
                <label for="personalAddress">Your Address:</label>
                <input type="text" id="personalAddress" name="personalAddress" placeholder="Enter your address" required>
            </div>
        
            <div class="form-group">
                <label for="personalPhone">Your Phone Number:</label>
                <input type="tel" id="personalPhone" name="personalPhone" placeholder="Enter your phone number" required>
            </div>
        
            <div class="form-group">
                <label for="mobileMoney">Payout Mobile Money Number:</label>
                <input type="text" id="mobileMoney" name="mobileMoney" placeholder="Enter your Mobile Money number" required>
            </div>

            <div class="btn">
                <button class="su" type="submit">Sign Up</button>
                <button class="su bth" type="button" onclick="location.href='../home/'" >Back To Home</button>


            </div>
        
            
        </form>
        
        
    </div>
    
</body>
</html>