<?php
session_start();
include "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $mysqli->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            header("Location: home.php");
            exit;
        }
         else {
            $message = "Login Successfully";
        }
    } else {
        $message = "Incorrect password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Login</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
<div class="bg-white p-8 rounded shadow-md max-w-md w-full">
<h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

<?php if ($message): ?>
    <p class="mb-4 text-center text-red-600"><?= $message ?></p>
<?php endif; ?>

<form method="POST" autocomplete="off">
    <input type="email" name="email" placeholder="Email" required class="mb-4 w-full px-4 py-2 border rounded" />
    <input type="password" name="password" placeholder="Password" required class="mb-4 w-full px-4 py-2 border rounded" />
    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Login</button>
</form>

<p class="mt-4 text-center">Don't have an account? <a href="register.php" class="text-blue-600 hover:underline">Register here</a></p>
</div>
</body>
</html>
