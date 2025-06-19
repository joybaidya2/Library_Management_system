<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $book_id = intval($_POST['book_id']);
    $student_name = trim($_POST['student_name']);
    $return_date = $_POST['return_date'];

    if ($student_name == "" || $return_date == "") {
        $_SESSION['rent_message'] = "<p class='text-red-500'>Please fill all fields.</p>";
        header("Location: rent_form.php");
        exit;
    }

    // Check book exists
    $stmt = $mysqli->prepare("SELECT id FROM books WHERE id = ?");
    $stmt->bind_param("i", $book_id);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows == 0) {
        $_SESSION['rent_message'] = "<p class='text-red-500'>Book not found.</p>";
        $stmt->close();
        header("Location: dashboard.php");
        exit;
    }
    $stmt->close();

    // Insert rent record
    $stmt = $mysqli->prepare("INSERT INTO rents (book_id, student_name, rent_date, return_date) VALUES (?, ?, NOW(), ?)");
    $stmt->bind_param("iss", $book_id, $student_name, $return_date);
    if ($stmt->execute()) {
        $_SESSION['rent_message'] = "<p class='text-green-600 font-semibold'>Book rented successfully!</p>";
    } else {
        $_SESSION['rent_message'] = "<p class='text-red-500'>Error: " . htmlspecialchars($stmt->error) . "</p>";
    }
    $stmt->close();

    header("Location: rent_form.php");
    exit;
}

header("Location: dashboard.php");
exit;
?>
