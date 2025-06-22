<?php 
$mysqli = new mysqli("localhost","root","","library_management_db");
if($mysqli->connect_error){
    die("Connection Faild in db").$mysqli->connect_error;
}

$book_id = $_GET["id"];

$mysqli->query("DELETE FROM rents WHERE book_id='".$book_id."'");
$deleted = $mysqli->query("DELETE FROM books WHERE id='".$book_id."'");

if($deleted){
    header("location:book-list.php?message=deleted");
}else{
    echo "Book didn't deleted in db";
}
?>