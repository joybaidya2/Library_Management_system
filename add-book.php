<?php
session_start();
include "db.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$title = "";
$author = "";
$year = "";
$edit_mode = false;
$message = "";

// Edit Mode: Load book data
if (isset($_GET["edit"]) && $_GET["edit"] == "1" && isset($_GET["id"])) {
    $book_id = (int)$_GET["id"];
    $edit_mode = true;

    $res = $mysqli->query("SELECT * FROM books WHERE id = $book_id");
    if ($res && $res->num_rows == 1) {
        $book = $res->fetch_assoc();
        $title = $book["title"];
        $author = $book["author"];
        $year = $book["publication_year"];
    } else {
        $message = "Book not found!";
    }
}

// Handle Form Submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $mysqli->real_escape_string($_POST["title"]);
    $author = $mysqli->real_escape_string($_POST["author"]);
    $year = (int)$_POST["year"];

    if (isset($_POST["book_id"]) && $_POST["book_id"] != "") {
        // Update
        $book_id = (int)$_POST["book_id"];
        $update = $mysqli->query("UPDATE books SET title='$title', author='$author', publication_year='$year' WHERE id=$book_id");

        if ($update) {
            header("Location: home.php?message=Book updated successfully!");
            exit;
        } else {
            $message = "Error updating book: " . $mysqli->error;
        }
    } else {
        // Add
        $insert = $mysqli->query("INSERT INTO books (title, author, publication_year) VALUES ('$title', '$author', '$year')");

        if ($insert) {
            header("Location: home.php?message=Book added successfully!");
            exit;
        } else {
            $message = "Error adding book: " . $mysqli->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $edit_mode ? "Edit Book" : "Add Book" ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-md max-w-md w-full">
        <h2 class="text-2xl font-bold mb-6 text-center">
            <?= $edit_mode ? "Edit Book" : "Add New Book" ?>
        </h2>

        <?php if ($message): ?>
            <p class="mb-4 text-center text-red-600 font-semibold"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>

        <form method="POST">
            <?php if ($edit_mode): ?>
                <input type="hidden" name="book_id" value="<?= htmlspecialchars($book_id) ?>">
            <?php endif; ?>
            <input type="text" name="title" placeholder="Book Title" value="<?= htmlspecialchars($title) ?>" required class="mb-4 w-full px-4 py-2 border rounded" />
            <input type="text" name="author" placeholder="Author Name" value="<?= htmlspecialchars($author) ?>" required class="mb-4 w-full px-4 py-2 border rounded" />
            <input type="number" name="year" placeholder="Publication Year" value="<?= htmlspecialchars($year) ?>" required class="mb-4 w-full px-4 py-2 border rounded" />
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                <?= $edit_mode ? "Update Book" : "Add Book" ?>
            </button>
        </form>

        <p class="mt-4 text-center">
            <a href="home.php" class="text-blue-600 hover:underline">Back to Home</a>
        </p>
    </div>
</body>
</html>
