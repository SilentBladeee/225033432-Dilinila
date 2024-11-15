<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Check if the email already exists
    $check_sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($check_sql);

    if ($result->num_rows > 0) {
        // Email already exists
        echo "Error: This email is already registered!";
    } else {
        // Insert new user if email is unique
        $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

        if ($conn->query($sql) === TRUE) {
            echo "New user created successfully!";
            header('Location: index.php'); // Redirect back to index.php after creation
            exit(); // Ensure script execution stops after redirect
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
