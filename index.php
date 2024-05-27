<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'db.php';

// Auto-delete books when the session ends
if (!isset($_SESSION['visited'])) {
    $_SESSION['visited'] = true;
    register_shutdown_function(function() {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM books");
        $stmt->execute();
    });
}

// Handle removal of a book
if (isset($_GET['remove_id'])) {
    $remove_id = $_GET['remove_id'];
    $stmt = $conn->prepare("DELETE FROM books WHERE id = ?");
    $stmt->execute([$remove_id]);
    header("Location: index.php");
    exit();
}

// Check if a book was successfully added
$book_added = isset($_GET['book_added']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Library Index</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script>
        window.onload = function() {
            var notification = document.querySelector('.notification');
            if (notification) {
                setTimeout(function() {
                    notification.style.opacity = '0';
                }, 2000);
                setTimeout(function() {
                    notification.remove();
                }, 2500);
            }
        }
    </script>
</head>
<body>
    <?php if ($book_added): ?>
    <div class="notification">
        <img src="images/success.png" alt="Success">
        Book Has Been Added Successfully
    </div>
    <?php endif; ?>
    <header>
        <img src="images/small_image.png" alt="Small Image">
        <h1>KYRIAKOS ANTONIADIS CSE GROUP 637 PHP PROJECT</h1>
        <h2>3rd Year Advanced Web Programming Project V 1.4</h2>
    </header>
    <div class="container">
        <h1>Welcome to Library Index</h1>
        <button onclick="window.location.href='add_book.php'">Add New Book</button>
        <div class="books-section">
            <h2>List of Available Books:</h2>
        </div>
        <div class="book-list">
            <?php
            if (isset($conn)) {
                $stmt = $conn->prepare("SELECT * FROM books");
                $stmt->execute();
                $books = $stmt->fetchAll();
                foreach ($books as $book) {
                    echo "
                        <div class='book-item'>
                            <button class='remove-button' onclick=\"window.location.href='index.php?remove_id={$book['id']}'\">Remove</button>
                            <span>Title:</span> <strong>{$book['title']}</strong><br>
                            <span>Author:</span> <em>{$book['author']}</em><br>
                            <span>Category:</span> {$book['category']}<br>
                            <span>Publisher:</span> <small>{$book['publisher']}</small><br>
                            <span>Price:</span> \${$book['price']}<br>
                            <div class='cover-placeholder'>";
                    if (!empty($book['cover_image'])) {
                        echo "<img src='images/{$book['cover_image']}' alt='Cover Image' class='cover-image'>";
                    } else {
                        echo "Book Cover Is Not Available!";
                    }
                    echo "</div>
                        </div>
                    ";
                }
            } else {
                echo "Error: Database connection not established.";
            }
            ?>
        </div>
    </div>
</body>
</html>
