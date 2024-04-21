<!DOCTYPE html>
<html>
<head>
    <title>User Files Display and Update</title>
</head>
<body>

<?php
// Connect to the database
$servername = "localhost"; // Set the server name
$username = "username"; // Set the database username
$password = "password"; // Set the database password
$dbname = "your_database"; // Set the database name

// Determine the current user
$currentUserId = 1; // This should be the ID of the current user

// Establish a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the 'count' value from the 'users' table for the current user
$sql_count_select = "SELECT count FROM users WHERE user_id = $currentUserId";
$result_count_select = $conn->query($sql_count_select);

// Check if the 'count' value was retrieved successfully
if ($result_count_select->num_rows > 0) {
    // Fetch the 'count' value
    $row = $result_count_select->fetch_assoc();
    $count = $row["count"];
} else {
    // If 'count' value not found, display an error message and exit
    echo "Error: Unable to retrieve the count for the current user.";
    $conn->close();
    exit();
}

// Select one record from the 'user_files' table where the 'id' is greater than the retrieved 'count'
$sql_select = "SELECT * FROM user_files WHERE id > $count LIMIT 1";
$result_select = $conn->query($sql_select);

// Check if any record was found
if ($result_select->num_rows > 0) {
    // If a record was found, fetch the data and store it in variables
    $row = $result_select->fetch_assoc();
    $id = $row["id"];
    $userId = $row["user_id"];
    $postTitle = $row["post_title"];
    $description = $row["description"];
    $image = $row["image"];
    
    // Display the fetched data
    echo "id: $id - user_id: $userId - post_title: $postTitle - description: $description - image: $image<br>";
} else {
    // If no records found, display a message indicating so
    echo "No new records found.";
}

// Update the 'count' column in the 'users' table with the latest 'id' from 'user_files' for the current user
$sql_update = "UPDATE users SET count = $id WHERE user_id = $currentUserId";
if ($conn->query($sql_update) === TRUE) {
    // If the update was successful, display a success message
    echo "Users table updated successfully.";
} else {
    // If there was an error updating the table, display an error message
    echo "Error updating users table: " . $conn->error;
}

// Close the database connection
$conn->close();
?>

</body>
</html>
