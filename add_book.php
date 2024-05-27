<!DOCTYPE html>
<html>
<head>
    <title>Add New Book</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script>
        function showErrorBox() {
            var errorBox = document.createElement('div');
            errorBox.className = 'error-box';
            errorBox.innerHTML = 'Image file does not exist. Please place the image in the \'images\' directory.';
            document.body.appendChild(errorBox);

            setTimeout(function() {
                errorBox.style.opacity = '0';
            }, 1000);
            setTimeout(function() {
                errorBox.remove();
            }, 1500);
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
            <label for="cover_image">(Optional) Input Book Cover Image File Name ( Include the file type eg: book.png etc):</label>
            <input type="text" id="cover_image" name="cover_image">
            <input type="submit" value="Add Book">
        </form>
        <div class="info-box">
            <p>If you wish to save a book with a cover image , place the desired cover image in the project's 'images' directory.</p>
        </div>
    </div>
</body>
</html>
