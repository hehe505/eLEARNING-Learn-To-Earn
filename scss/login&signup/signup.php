<?php
include('db_config.php');

// Handle signup form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and process signup data
    // ...
    
    // Insert user data into the database
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param('sss', $username, $email, $hashed_password);

    // Set parameters and hash the password
    $username = $_POST['username'];
    $email = $_POST['email'];
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "User registered successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close database connection
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <!-- Include your CSS and other head elements -->
</head>
<body>
    <!-- Your signup form HTML -->
    <form method="post" action="signup.php">
        <!-- Include your form fields for username, email, password, etc. -->
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Sign Up</button>
    </form>

    <!-- Include your other HTML content and scripts -->
</body>
</html>
