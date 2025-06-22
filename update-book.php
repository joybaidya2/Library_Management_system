<?php
$mysqli = new mysqli("localhost","root","","library_management_db");
if($mysqli->connect_error){
    die("Faild to connect").$mysqli->connect_error;
}

$title = $_POST["title"];
$author = $_POST["author"];
$publication_year = $_POST["publication_year"];
$book_id = $_POST["id"];

$result_saved = $mysqli->query("UPDATE books SET `title`='".$title."', `author`='".$author."', `publication_year`='".$publication_year."' WHERE id='".$book_id."' ");

if($result_saved){
    header("location:book-list.php?message=update");
}else{
    echo "Book didn't update";
}
?>