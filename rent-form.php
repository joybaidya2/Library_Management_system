<?php
session_start();
include "db.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $book_id = (int)$_POST["book_id"];
    $user_id = $_SESSION["user_id"];

    // Check if book exists
    $book_check = $mysqli->query("SELECT * FROM books WHERE id = $book_id");
    if ($book_check->num_rows === 0) {
        die("Book not found.");
    }

    // Check if already rented and not returned yet
    $already_rented = $mysqli->query("SELECT * FROM rentals WHERE book_id = $book_id AND user_id = $user_id AND returned = 0");
    if ($already_rented->num_rows > 0) {
        die("You already rented this book and haven't returned it yet.");
    }

    $rented_on = date('Y-m-d');
    $return_date = date('Y-m-d', strtotime('+7 days'));

    $insert = $mysqli->query("INSERT INTO rentals (book_id, user_id, rented_on, return_date, returned) VALUES ($book_id, $user_id, '$rented_on', '$return_date', 0)");

    if ($insert) {
        header("Location: home.php?message=Book rented successfully");
        exit;
    } else {
        die("Error: " . $mysqli->error);
    }
} else {
    header("Location: home.php");
    exit;
}
