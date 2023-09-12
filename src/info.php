<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    // Validate and sanitize the data (you can add more validation here)
    $firstname = htmlspecialchars($firstname);
    $lastname = htmlspecialchars($lastname);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($message);
    
    // Connect to the MySQL database (replace 'db_host', 'db_user', 'db_password', and 'db_name' with your actual credentials)
    $conn = new mysqli('localhost:3306', 'admin_x', 'ctcongress@004!971', 'netadmin_blackjuly');
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Prepare and execute the query to insert the data into the database
    $sql = "INSERT INTO contact_form (firstname, lastname, email, message, "") VALUES ('$firstname', '$lastname', '$email', '$message')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Form submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Close the database connection
    $conn->close();
}
?>
