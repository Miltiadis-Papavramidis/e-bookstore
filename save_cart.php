<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Assuming you have a way to identify the user (you might need to modify this part)
    $userId = 1;

    // Decode JSON data from the request body
    $postData = json_decode(file_get_contents('php://input'), true);

    // Check if JSON decoding was successful
    if ($postData === null && json_last_error() !== JSON_ERROR_NONE) {
        http_response_code(400); // Bad Request
        header('Content-Type: application/json');  // Set the content type to JSON
        echo json_encode(['status' => 'error', 'message' => 'Invalid JSON data']);
        exit;
    }

    // Extract relevant data from the decoded JSON
    $cart = $postData['cart'] ?? [];

    try {
        $conn->begin_transaction();
        // Clear the user's existing cart
        $clearCartQuery = "DELETE FROM cart WHERE user_id = ?";
        $clearCartStatement = $conn->prepare($clearCartQuery);

        if (!$clearCartStatement) {
            throw new Exception('Error preparing clear cart statement');
        }

        $clearCartStatement->bind_param('i', $userId);
        $clearCartResult = $clearCartStatement->execute();

        if (!$clearCartResult) {
            throw new Exception('Failed to clear existing cart');
        }

        // Insert the new cart items
        $insertCartQuery = "INSERT INTO cart (user_id, book_id, quantity, price) VALUES (?, ?, ?, ?)";
        $insertCartStatement = $conn->prepare($insertCartQuery);

        if (!$insertCartStatement) {
            throw new Exception('Error preparing insert cart statement');
        }

        foreach ($cart as $bookId => $item) {
            $quantity = $item['quantity'];
            $parsedPrice = $item['price'];

            // Insert cart item into the cart table
            $insertCartStatement->bind_param('iiid', $userId, $bookId, $quantity, $parsedPrice);
            $insertCartResult = $insertCartStatement->execute();

            if (!$insertCartResult) {
                // Log error and continue to the next item
                error_log('Error inserting cart item into the cart table: ' . $insertCartStatement->error);
            }
        }

        // Commit the transaction
        $conn->commit();

        // Cart saved successfully
        echo json_encode(['status' => 'success', 'message' => 'Cart data saved successfully']);
        exit;
    } catch (Exception $e) {
        // Rollback the transaction in case of an exception
        $conn->rollback();

        // Log any exception that might occur
        error_log('Exception caught: ' . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'An error occurred while processing the request']);
        exit;
    } finally {
        // Close the database connection
        $conn->close();
    }
} else {
    // Fetch cart items for the specific user
    $userId = 1; // Modify as needed to dynamically fetch the logged-in user ID
    $selectCartQuery = "SELECT c.quantity, c.price, b.title, b.cover_image FROM cart c INNER JOIN books b ON c.book_id = b.book_id WHERE c.user_id = ?";
    $selectCartStatement = $conn->prepare($selectCartQuery);

    if (!$selectCartStatement) {
        die("Error preparing select cart statement: " . $conn->error);
    }

    $selectCartStatement->bind_param('i', $userId);
    $selectCartResult = $selectCartStatement->execute();

    if (!$selectCartResult) {
        die("Failed to fetch cart items: " . $selectCartStatement->error);
    }

    // Fetch cart items
    $cartItems = $selectCartStatement->get_result()->fetch_all(MYSQLI_ASSOC);

    // Return cart items as JSON
    header('Content-Type: application/json');
    echo json_encode($cartItems);
    exit;
}
?>
