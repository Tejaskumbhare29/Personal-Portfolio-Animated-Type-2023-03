<?php
$FullName = $_GET['fullName'] ?? '';
$Email = $_GET['Email'] ?? '';
$Message = $_GET['Message'] ?? '';

// Database Connection
$conn = new mysqli('localhost', 'root', '', 'portfolio_website_personal_2025_03');

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO registration (FullName, Email, Message) VALUES (?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("sss", $FullName, $Email, $Message);
        $stmt->execute();
        echo "Message sent successfully!";
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
    $conn->close();
}
?>
