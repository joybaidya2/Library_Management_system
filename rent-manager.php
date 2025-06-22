<?php
$mysqli = new mysqli("localhost", "root", "", "library_management_db");
if ($mysqli->connect_error) {
  die("Faild to connect.") . $mysqli->connect_error;
}
$name = $_POST["name"];
$return_date = $_POST["return_date"];
$book_id = $_POST["book_id"];

$result_saved = $mysqli->query("INSERT INTO rents (`name`,`return_date`,`book_id`) VALUES ('".$name."', '".$return_date."', '".$book_id."') ");
if($result_saved){
    header("location:all-information.php?message=success");
}else{
    echo "Faild to save rent";
}
?>
