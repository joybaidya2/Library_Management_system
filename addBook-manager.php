<?php
$mysqli = new mysqli("localhost","root","","library_management_db");
if($mysqli->connect_error){
    die("Connection Faild").$mysqli->connect_error;
}
$title = $_POST["title"];
$author = $_POST["author"];
$publication_year = $_POST["publication_year"];

$result_saved = $mysqli->query("INSERT INTO books (`title`,`author`,`publication_year`) VALUES ('".$title."','".$author."','".$publication_year."') ");

if($result_saved){
    header("location:addBook-form.php?message=saved");
}else{
    echo "Book didn't saved in db";
}
?>