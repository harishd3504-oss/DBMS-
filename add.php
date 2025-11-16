<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Library Management - Add & View Books</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>📚 Add New Book</h2>

    <form method="POST" action="">
        <label>Title</label>
        <input type="text" name="title" required>

        <label>Author</label>
        <input type="text" name="author" required>

        <label>Publisher</label>
        <input type="text" name="publisher" required>

        <button type="submit" name="add">Add Book</button>
    </form>

    <?php
    if (isset($_POST['add'])) {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $publisher = $_POST['publisher'];

        $query = "INSERT INTO books (title, author, publisher) VALUES ('$title', '$author', '$publisher')";
        if (mysqli_query($conn, $query)) {
            echo "<p style='color:limegreen; text-align:center; font-weight:bold;'>✅ Book added successfully!</p>";
        } else {
            echo "<p style='color:red; text-align:center;'>❌ Error: " . mysqli_error($conn) . "</p>";
        }
    }
    ?>

    <h2>📖 Book List</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Publisher</th>
        </tr>

        <?php
        $result = mysqli_query($conn, "SELECT * FROM books ORDER BY id DESC");
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['title']}</td>
                        <td>{$row['author']}</td>
                        <td>{$row['publisher']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No books added yet</td></tr>";
        }
        ?>
    </table>
</body>
</html>