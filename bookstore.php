<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BookStore</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
            top: 0;
            width: 100%;
            left: 0;
        }
        .overlay-box {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            position: absolute;
            top: -15px; 
            left: 2px;
            right: 2px;
            padding: 30px;
            background-color: rgba(0, 0, 0, 0);
        }
        .sticky-nav {
            position: fixed;
            top: 100px;
            width: 100%;
            z-index: 1000;
            background-color: #ccffff;
            text-align: center;
            transition: top 0.3s ease-in-out;
        }
        .sticky-nav ul {
            list-style-type: none;
            margin: 0;
            padding: 10px;
            text-align: center;
        }
        .sticky-nav ul li {
            display: inline;
            margin-right: 20px;
        }
        .sticky-nav ul li a {
            text-decoration: none;
            color: #000;
            font-weight: bold;
        }
        .sticky-nav ul li a:hover {
            color: yellow;
        }
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }
        .menu {
            display: flex;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropbtn {
            background-color: darkblue;
            color: azure;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 120px;
            z-index: 1;
        }
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
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
        }
        .cart-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 999;
        }
        .cart-form button {
            background-color: darkblue;
            color: azure;
            border-radius: 5px;
            padding: 10px 28px;
            border: none;
            margin-top: 10px;
        }
        .book-covers {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 250px;
        }
        .book-cover.hidden {
            display: none;
        }
        .book-cover {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
            width: 190px;
            height: 245px;
            object-fit: cover;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            margin-top: 20px;
        }
        .book-cover img {
            width: 100%;
            height: 100%;
            border-radius: 5px;
            object-fit: cover;
        }
        .quantity-input {
            width: 50px;
            padding: 5px;
        }
        .add-to-cart-btn {
            background-color: aqua;
            color: black;
            border-radius: 20px;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
        .add-to-cart-btn:hover {
            background-color: darkblue;
            color: azure;
        }
        .topic-link {
            text-decoration: none;
            font-size: 16px;
            margin: 5.5px 15px;
            padding: 8px 12px;
            border-radius: 5px;
            background-color: azure;
            transition: all 0.15s ease;
        }
        .topic-link:hover {
            background-color: darkblue; 
            color: azure;
        }
        #registerBtn, #loginBtn, #cartBtn {
            background-color: azure;
            color: black;
            border-radius: 20px; 
            padding: 10px 28px;
            border: none;
            margin-left: 10px;
        }
        .registration-form, .login-form {
            display: none;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 20px;
        }
        .registration-form input, .login-form input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }
        .registration-form button, .login-form button {
            background-color: azure;
            color: black;
            border-radius: 5px;
            padding: 10px 28px;
            border: none;
            margin-top: 10px;
        }
        .search-form {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }
        .search-form input[type="text"] {
            padding: 8px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }
        .search-form button {
            background-color: darkblue;
            color: azure;
            border-radius: 5px;
            padding: 8px 15px;
            border: none;
            margin-left: 5px;
        }
        .search-form input[type="text"],
        .search-form button {
            margin-bottom: 0;
        }
        .search-form input[type="text"]::placeholder {
            color: #999;
        }
        #main-content {
            background-image: url('vecteezy_realistic-library-aisle-mockup_21795110.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            padding-top: 100px; 
            padding-bottom: 100px;
            min-height: 100vh;
        }
        footer {
            text-align: center;
            background-color: darkblue;
            color: white;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
            left: 0;
        }
    </style>
</head>
<body>
    <script>
        function openCart() {
            window.location.href = 'cart.php';
        }
    </script>
    <header>
        <div class="header-content">
            <div>
                <h1>BookStore</h1>
            </div>
            <div>
                <a href="registration.php" id="registerBtn"><b>Register</b></a>
                <a href="login.php" id="loginBtn"><b>Login</b></a>
                <button onclick="openCart()" id="cartBtn" class="dropbtn"><b>Open Cart</b><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
        </div>
    </header>
    <nav class="sticky-nav" id="stickyNav">
        <form action="#" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search...">
            <button type="submit">Search</button>
        </form>
        <div class="menu">
            <div class="dropdown">
                <button class="dropbtn">Topics</button>
                <div class="dropdown-content">
                    <a href="#" class="topic-link" data-topic="fiction">Fiction</a>
                    <a href="#" class="topic-link" data-topic="nonfiction">Non-Fiction</a>
                    <a href="#" class="topic-link" data-topic="biography">Biography</a>
                    <a href="#" class="topic-link" data-topic="comics">Comics</a>
                </div>
            </div>
        </div>
    </nav>
    <div id="main-content">
        <div class="book-covers">
            <?php
            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "bookstore";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT id, title, author, cover_image_url, topic, price FROM books";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $bookId = $row['id'];
                    $bookTitle = $row['title'];
                    $bookAuthor = $row['author'];
                    $bookCover = $row['cover_image_url'];
                    $bookTopic = $row['topic'];
                    $bookPrice = $row['price'];
                    echo "<div class='book-cover' data-topic='$bookTopic' data-book-name='$bookTitle' data-book-id='$bookId'>";
                    echo "<img src='$bookCover' alt='$bookTitle'>";
                    echo "<p><b>$bookTitle</b></p>";
                    echo "<p>$bookAuthor</p>";
                    echo "<input type='number' id='quantity$bookId' class='quantity-input' value='1' min='1'>";
                    echo "<button class='add-to-cart-btn' data-raw-price='$bookPrice'>Add to Cart</button>";
                    echo "</div>";
                }
            } else {
                echo "No books found.";
            }
            $conn->close();
            ?>
        </div>
    </div>
    <footer>
        <div>
            &copy; 2024 BookStore. All rights reserved.
        </div>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const topicLinks = document.querySelectorAll('.topic-link');
            const bookCovers = document.querySelectorAll('.book-cover');
            const cartItems = document.getElementById('cartItems');
            const totalCost = document.getElementById('totalCost');

            let cart = JSON.parse(sessionStorage.getItem('cart')) || {};

            function updateCartUI() {
                if (cartItems) {
                    cartItems.innerHTML = '';
                    let total = 0;
                    for (const bookId in cart) {
                        const item = cart[bookId];
                        const listItem = document.createElement('li');
                        const itemCost = (item.price !== null ? item.price * item.quantity : 0) || 0;
                        listItem.textContent = `${item.name} - Quantity: ${item.quantity} - Price: ${item.price !== null ? '$' + item.price.toFixed(2) : 'N/A'}`;
                        cartItems.appendChild(listItem);
                        total += itemCost;
                    }
                    totalCost.textContent = `Total Cost: $${total.toFixed(2)}`;
                }
            }

            function addToCart(bookName, bookId, defaultQuantity, rawPrice) {
                const quantityInputId = `quantity${bookId}`;
                const quantity = document.getElementById(quantityInputId).valueAsNumber || defaultQuantity;

                const parsedPrice = rawPrice !== null ? parseFloat(rawPrice) : 0;

                if (!isNaN(parsedPrice)) {
                    if (!cart[bookId]) {
                        cart[bookId] = {
                            name: bookName,
                            price: parsedPrice,
                            quantity: quantity
                        };
                    } else {
                        cart[bookId].quantity += quantity;
                    }

                    updateCartUI();
                    localStorage.setItem('cart', JSON.stringify(cart));

                    fetch('save_cart.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ cart: cart })
                    })
                    .then(response => response.json())
                    .then(jsonData => {
                        if (jsonData.status === 'success') {
                            console.log('Cart data sent to server:', jsonData);
                        } else {
                            console.error('Error in server response:', jsonData);
                        }
                    })
                    .catch(error => {
                        console.error('Error handling fetch:', error);
                    });
                }
            }

            topicLinks.forEach(link => {
                link.addEventListener('click', event => {
                    event.preventDefault();
                    const selectedTopic = link.dataset.topic;
                    bookCovers.forEach(cover => cover.classList.add('hidden'));
                    const selectedCovers = document.querySelectorAll(`.book-cover[data-topic="${selectedTopic}"]`);
                    selectedCovers.forEach(cover => cover.classList.remove('hidden'));
                });
            });

            bookCovers.forEach(cover => {
                const addToCartBtn = cover.querySelector('.add-to-cart-btn');
                if (addToCartBtn) {
                    addToCartBtn.addEventListener('click', () => {
                        const { bookName, bookId } = cover.dataset;
                        const rawPrice = addToCartBtn.dataset.rawPrice;
                        addToCart(bookName, bookId, 1, rawPrice);
                    });
                }
            });

            updateCartUI();
        });


    </script>
</body>
</html>         