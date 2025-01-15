<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection (update with your credentials)
    $servername = "localhost";
    $username = "if0_38102452";
    $password = "NaDLhhrzojTNH";
    $dbname = "contact_estate";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Insert into database
    $sql = "INSERT INTO contact_form (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to thank you page or send a success message
        echo json_encode(['status' => 'success', 'name' => $name, 'email' => $email, 'message' => $message]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'There was an error submitting your form.']);
    }

    $conn->close();
}
?>
