<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Sign Up</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
    
<?php
 
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    echo $businessEmail = $_POST["businessEmail"];
    echo $password = $_POST["password"];



    // Validate form data (You can add more validation as needed)
    if (empty($businessEmail) || empty($password)) {
        // Display error message using SweetAlert if any field is empty
        echo "<script>
                Swal.fire({
                    title: 'Error!',
                    text: 'Please enter both email and password.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = 'index.php';
                });
            </script>";
        exit();
    } else {
        // Connect to the database (Replace these values with your database credentials)
        $servername = "localhost";
        $username = "root";
        $db_password = "";
        $dbname = "swiftpay";

        // Create connection
        $conn = new mysqli($servername, $username, $db_password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement to fetch user data based on email
        $sql = "SELECT * FROM vendors WHERE business_email=?";
        $stmt = $conn->prepare($sql);

        // Bind parameters and execute the statement
        $stmt->bind_param("s", $businessEmail);
        $stmt->execute();

        // Get result
        $result = $stmt->get_result();

 

        // Check if user exists and verify password
        if ($row = $result->fetch_assoc()) {
            echo $row['acc_password'];

            // Verify password
            if ($password == $row["acc_password"]) {
                // Password is correct, set session variable for user ID
                $_SESSION["user_id"] = $row["id"];
                
                // Redirect to vendor.php upon successful login
                echo "<script>
                        Swal.fire({
                            title: 'Success!',
                            text: 'Login successful. Redirecting...',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500,
                            onClose: () => {
                                window.location.href = '../admin/vendor.php';
                            }
                        });
                    </script>";
            } else {
                // Display error message using SweetAlert if password is incorrect
                echo "<script>
                        Swal.fire({
                            title: 'Error!',
                            text: 'Invalid password.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            window.location.href = '../vendorLogin.php';
                        });
                    </script>";
            }
        } else {
            // Display error message using SweetAlert if user does not exist
            echo "<script>
                    Swal.fire({
                        title: 'Error!',
                        text: 'Vendor does not exist.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = '../vendorLogin.php';
                    });
                </script>";
        }

        // Close statement and database connection
        $stmt->close();
        $conn->close();
    }
} else {
    // If accessed directly without form submission, redirect to the login page
    header("Location: index.php");
    exit();
}
?>
