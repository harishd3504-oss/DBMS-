<?php include 'db.php'; ?>

<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM books WHERE id=$id");
    header("Location: view.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Books</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<a href="add.php" 
   style="background:#3b82f6; color:white; padding:10px 18px; 
   text-decoration:none; font-weight:bold; border-radius:10px; 
   margin-left:20px; display:inline-block; margin-top:20px;">
   + Add New Book
</a>

<h2>All Books</h2>

<div class="table-container">
<table cellpadding="8">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Publisher</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM books");
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo $row['publisher']; ?></td>
            <td>
                <a href="view.php?delete=<?php echo $row['id']; ?>"
                   onclick="return confirm('Delete this book?');"
                   style="background:#ff4d6d; color:white; padding:8px 14px;
                   border-radius:10px; text-decoration:none; font-weight:bold;
                   display:inline-block;">
                   Delete
                </a>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
</div>

</body>
</html>