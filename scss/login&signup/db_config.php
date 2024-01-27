<?php
$db_config = array(
    'servername' => 'localhost',
    'username' => 'hehe',
    'password' => 'hehe@#123',
    'dbname' => 'login_form'
);

$conn = new mysqli($db_config['servername'], $db_config['username'], $db_config['password'], $db_config['dbname']);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
