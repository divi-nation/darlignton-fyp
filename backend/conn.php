<?php
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
