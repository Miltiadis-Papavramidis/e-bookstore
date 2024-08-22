<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ProcessRegistration</title>
    </head>
    <body>
        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['Password'], FILTER_SANITIZE_STRING);

    $conn = new mysqli('localhost', 'root', '', 'bookstore');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Add your logic for checking existing email and inserting into the 'users' table

    $stmt_check_email = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $stmt_check_email->bind_param("s", $email);
    $stmt_check_email->execute();
    $stmt_check_email->bind_result($email_count);
    $stmt_check_email->fetch();
    $stmt_check_email->close();

    if ($email_count > 0) {
        echo "Email already exists. Please choose a different email.";
    } else {
        // Insert data into 'users' table
        $stmt_insert = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt_insert->bind_param("sss", $name, $email, $password);

        if ($stmt_insert->execute()) {
            echo "Registration successful! Data inserted into 'users' table.";
        } else {
            echo "Error: " . $stmt_insert->error;
        }

        $stmt_insert->close();
    }

    $conn->close();
}
?>
    </body>
</html>
