<?php
$mysqli = new mysqli("localhost", "root", "", "library_management_db");
if ($mysqli->connect_error) {
  die("Faild to connect.") . $mysqli->connect_error;
}
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$student_id = $_POST["id"];

$result_saved = $mysqli->query("UPDATE users SET `name`='".$name."', `email`='".$email."', `password`='".$password."' WHERE id='".$student_id."'");

if($result_saved){
    header("location:users-list.php?message=updated");
}else{
    echo "Faild to updated in db".$mysqli->connect_error;
}
?>