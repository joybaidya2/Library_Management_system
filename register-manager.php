<?php
$mysqli = new mysqli("localhost","root","","library_management_db");
if($mysqli->connect_error){
    die("Faild to connect.!".$mysqli->connect_error);
}

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];

$result_saved = $mysqli->query("INSERT INTO users (`name`, `email`,`password`) VALUES('".$name."','".$email."','".$password."') ");
if($result_saved){
    header("location:login-form.php?message=saved");
}else{
    echo "Faild to users saved in bd".$mysqli->error;
}
?>