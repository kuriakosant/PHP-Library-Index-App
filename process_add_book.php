<?php
include 'db.php';

$title = $_POST['title'];
$author = $_POST['author'];
$category = $_POST['category'];
$publisher = $_POST['publisher'];
$price = $_POST['price'];
$cover_image = $_POST['cover_image'];

$image_exists = true;

// Check if the cover image file exists in the images directory
if (!empty($cover_image) && !file_exists("C:/xampp/htdocs/library_index/images/$cover_image")) {
    $image_exists = false;
} else {
    $sql = "INSERT INTO books (title, author, category, publisher, price, cover_image) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$title, $author, $category, $publisher, $price, $cover_image]);
    header("Location: index.php?book_added=1");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Book</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script>
        window.onload = function() {
            var errorBox = document.querySelector('.error-box');
            if (errorBox) {
                setTimeout(function() {
                    errorBox.style.opacity = '0';
                }, 1000);
                setTimeout(function() {
                    errorBox.remove();
                }, 1500);
            }
        }
    </script>
</head>
<body class="blur-background">
    <div class="add-book-container">
        <form class="add-book-form" action="process_add_book.php" method="post">
            <button class="close-button" onclick="window.location.href='index.php'; return false;">&times;</button>
            <h1>Add New Book</h1>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" required>
            <label for="category">Category:</label>
            <input type="text" id="category" name="category" required>
            <label for="publisher">Publisher:</label>
            <input type="text" id="publisher" name="publisher" required>
            <label for="price">Price:</label>
            <input type="text" id="price" name="price" required>
            <label for="cover_image">(Optional) Input Book Cover File Name  ( Include the File type eg. book.png):</label>
            <input type="text" id="cover_image" name="cover_image">
            <input type="submit" value="Add Book">
        </form>
        <div class="info-box">
            <p>Place the book cover image in the project's 'images' directory.</p>
        </div>
        <?php if (!$image_exists): ?>
        <div class="error-box">
            Image file does not exist. Please place the image in the 'images' directory.
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
