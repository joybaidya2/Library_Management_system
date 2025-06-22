<?php
$mysqli = new mysqli("localhost", "root", "", "library_management_db");
if ($mysqli->connect_error) {
  die("Faild to connect.") . $mysqli->connect_error;
}

$user_id = $_GET["id"];
$deleted = $mysqli->query("DELETE FROM users WHERE id='".$user_id."'");

if($deleted){
    header("location:users-list.php?message=deleted");
}else{
    echo "Faild to deleted from db.";
}
?>