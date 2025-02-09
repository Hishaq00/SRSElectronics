<?php
include('connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") { $name = $_POST['name']; $email = $_POST['email']; $subject = $_POST['subject']; $message = $_POST['message']; // Prepare and bind 
$stmt = $con->prepare("INSERT INTO contact_form (name, email, subject, message) VALUES (?, ?, ?, ?)"); $stmt->bind_param("ssss", $name, $email, $subject, $message); // Execute the statement
 if ($stmt->execute()) { echo "<script>alert('New record created successfully')</script>"; } else { echo "Error: " . $stmt->error; } // Close the statement and connection
  $stmt->close(); 
  $con->close();
 } 
  ?>