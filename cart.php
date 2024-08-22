<!DOCTYPE html>
<?php
// Database connection
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

// Assuming you have a way to identify the user (modify as needed)
$userId = 1; // Modify to dynamically fetch the logged-in user ID

// Fetch cart items for the specific user
$selectCartQuery = "SELECT c.quantity, c.price, b.title, b.cover_image 
                    FROM cart c 
                    INNER JOIN books b 
                    ON c.book_id = b.book_id 
                    WHERE c.user_id = ?";
$selectCartStatement = $conn->prepare($selectCartQuery);

if (!$selectCartStatement) {
    die("Error preparing select cart statement: " . $conn->error);
}

$selectCartStatement->bind_param('i', $userId);
$selectCartStatement->execute();
$cartItems = $selectCartStatement->get_result()->fetch_all(MYSQLI_ASSOC);

$conn->close();
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookStore - Your Cart</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        header {
            position: fixed;
            border: 15px white;
            text-align: center;
            color: #ccffff;
            font-family: Brush Script MT, cursive;
            padding: 10px 0;
            z-index: 1;
            background-color: darkblue;
            top: 0px;
            width: 100%;
            left: 0;
        }
        .cart-section {
            margin-top: 80px;
            padding: 20px;
            color: black;
            background-color: white;
            box-sizing: border-box;
        }
        .cart-section h2 {
            text-align: center;
        }
        .cart-items {
            list-style-type: none;
            padding: 0;
        }
        .cart-items li {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
        .cart-items img {
            width: 100px;
            margin-right: 10px;
        }
        #main-content {
            padding-top: 80px;
        }
    </style>
</head>
<body>
    <header>
        <div>
            <h1>BookStore</h1>
        </div>
    </header>
    <div id="main-content">
        <!-- Cart container -->
        <div id="cartContainer" class="cart-section">
            <h2>Your Cart</h2>
            <ul class="cart-items" id="cartItems">
                <?php if (!empty($cartItems)): ?>
                    <?php foreach ($cartItems as $item): ?>
                        <li>
                            <img src="<?php echo htmlspecialchars($item['cover_image']); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>">
                            <div>
                                <h3><?php echo htmlspecialchars($item['title']); ?></h3>
                                <p>Price: $<?php echo htmlspecialchars($item['price']); ?></p>
                                <p>Quantity: <?php echo htmlspecialchars($item['quantity']); ?></p>
                            </div>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>Your cart is empty.</li>
                <?php endif; ?>
            </ul>
            <button onclick="window.location.href='bookstore.php'">Continue Shopping</button>
        </div>
    </div>
</body>
</html>
