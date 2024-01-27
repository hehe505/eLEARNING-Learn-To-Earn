<?php
include('db_config.php');

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and process login data
    // ...

    // Check user credentials
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);

    // Bind parameter
    $stmt->bind_param('s', $username);

    // Set parameter
    $username = $_POST['username'];

    // Execute the prepared statement
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Fetch user data
    $user = $result->fetch_assoc();

    // Verify password
    if ($user && password_verify($_POST['password'], $user['password'])) {
        echo "Login successful!";
    } else {
        echo "Invalid username or password.";
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
    <title>Login</title>
    <!-- Include your CSS and other head elements -->
</head>
<body>
    <!-- Your login form HTML -->
    <form method="post" action="login.php">
        <!-- Include your form fields for username, password, etc. -->
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>

    <!-- Include your other HTML content and scripts -->
</body>
</html>
