<?php
session_start();
include "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $mysqli->real_escape_string($_POST['name']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Check if email exists
    $result = $mysqli->query("SELECT id FROM users WHERE email='$email'");
    if ($result->num_rows > 0) {
        $message = "Email already registered!";
    } else {
        $insert = $mysqli->query("INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')");
        if ($insert) {
            $message = "Registration successful! You can now <a href='login.php'>login</a>.";
        } else {
            $message = "Error: " . $mysqli->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Register</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
<div class="bg-white p-8 rounded shadow-md max-w-md w-full">
<h2 class="text-2xl font-bold mb-6 text-center">Register</h2>

<?php if ($message): ?>
    <p class="mb-4 text-center text-green-600 "><?= $message ?></p>
<?php endif; ?>

<form method="POST" autocomplete="off">
    <input type="text" name="name" placeholder="Your Name" required class="mb-4 w-full px-4 py-2 border rounded" />
    <input type="email" name="email" placeholder="Email" required class="mb-4 w-full px-4 py-2 border rounded" />
    <input type="password" name="password" placeholder="Password" required class="mb-4 w-full px-4 py-2 border rounded" />
    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Register</button>
</form>

<p class="mt-4 text-center">Already have an account? <a href="login.php" class="text-blue-600 hover:underline">Login here</a></p>
</div>
</body>
</html>
