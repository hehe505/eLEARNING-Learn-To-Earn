<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $phone = $_POST["phone"];

    // Replace these values with your actual database credentials
    $servername = "localhost";
    $username = "hehe";
    $password = "hehe@#123";
    $dbname = "elearning_database";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to insert data into the table
    $sql = "INSERT INTO contact_data (name, email, subject, message, phone) VALUES (?, ?, ?, ?, ?)";

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $email, $subject, $message, $phone);

    if ($stmt->execute()) {
        // Message sent successfully!
        echo "Message sent successfully! <a href='index.html'>Go back to home</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
