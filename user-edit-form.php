<?php 
$mysqli = new mysqli("localhost", "root", "", "library_management_db");
if ($mysqli->connect_error) {
  die("Faild to connect.") . $mysqli->connect_error;
}
$result = $mysqli->query("SELECT * FROM users WHERE id='".$_GET["id"]."'");
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-pink-100 via-blue-100 to-purple-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-2xl shadow-2xl max-w-md w-full">
        <h2 class="text-3xl font-extrabold text-center text-purple-700 mb-6">Create Account</h2>

        <form action="update-user.php" method="POST" class="space-y-4">
            <input type="text" name="name" value="<?php echo $user['name']?>" placeholder="Your Name" required class="w-full px-4 py-2 border border-purple-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400" />
            <input type="email" name="email" value="<?php echo $user['email']?>" placeholder="Email" required class="w-full px-4 py-2 border border-purple-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400" />
            <input type="password" name="password" value="<?php echo $user['password']?>" placeholder="Password" required class="w-full px-4 py-2 border border-purple-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400" />

            <button type="submit" class="w-full bg-gradient-to-r from-purple-500 to-pink-500 text-white font-semibold py-2 rounded-lg hover:from-purple-600 hover:to-pink-600 transition"> Register </button>
             <input type="hidden" name="id" value="<?php echo $_GET["id"];?>" >
        </form>

        <p class="mt-6 text-center text-sm text-gray-600"> Already have an account? <a href="login-form.php" class="text-purple-600 font-medium hover:underline">Login here</a>
        </p>
    </div>
</body>

</html>