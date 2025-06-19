<?php
session_start();
include "db.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['book_id'])) {
    $book_id = (int)$_POST['book_id'];

    // Delete the book from the database
    $stmt = $mysqli->prepare("DELETE FROM books WHERE id = ?");
    $stmt->bind_param("i", $book_id);

    if ($stmt->execute()) {
        $stmt->close();
        header("Location: home.php?message=Book+deleted+successfully");
        exit;
    } else {
        $stmt->close();
        header("Location: home.php?message=Error+deleting+book");
        exit;
    }
} else {
    header("Location: home.php");
    exit;
}
