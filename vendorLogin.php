<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="signup.css">
</head>
<body>

    <div class="container cen bg">
        <form action="backend/login.php" method="POST">
            <div class="form-group">
                <label for="businessEmail">Business Email Address:</label>
                <input type="email" id="businessEmail" name="businessEmail" placeholder="Enter your business email address" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button class="su" type="submit">Login</button>
        </form>
    </div>
    
</body>
</html>
