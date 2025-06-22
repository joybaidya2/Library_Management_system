<?php
$mysqli = new mysqli("localhost","root","","library_management_db");
if($mysqli->connect_error){
    die("Faild to connect").$mysqli->connect_error;
}

$email = $_POST["email"];
$password = $_POST["password"];

$allUser = $mysqli->query(("SELECT * FROM users WHERE email='".$email."' AND password='".$password."' "));
if($allUser && $allUser->num_rows > 0){
    $user = $allUser->fetch_assoc();
    session_start();
    $_SESSION["id"] = $user["id"];
    $_SESSION["email"] = $user["email"];
    $_SESSION["role"] = $user["role"];
    header("location:all-information.php");
}else{
    header("location:login-form.php?failed=true");
}
?>