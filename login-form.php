<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-2xl shadow-2xl max-w-md w-full">
        <h2 class="text-3xl font-extrabold text-center text-blue-700 mb-6">Welcome Back</h2>
        <?php
        if(isset($_GET["failed"]) && $_GET["failed"] == "true"){
           ?>
           <p style="color: red; font-weight:700; padding-bottom: 4px;">Username or password did not match.</p>
           <?php
        }
     ?>
     <?php
     if(isset($_GET["message"]) && $_GET["message"] == "saved"){
     ?>
     <p style="font-weight:700; padding-bottom: 4px; color:green; ">Register Successfully. Login now</p>
       <?php }
       ?>
        <form action="login-manager.php" method="POST" class="space-y-4">
            <div>
                <input type="email" name="email" placeholder="Email" required class="w-full px-4 py-2 border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
            </div>
            <div>
                <input type="password" name="password" placeholder="Password" required class="w-full px-4 py-2 border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
            </div>
            <div>
                <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-purple-500 text-white font-semibold py-2 rounded-lg hover:from-blue-600 hover:to-purple-600 transition">Login</button>
            </div>
        </form>

        <p class="mt-6 text-center text-sm text-gray-600"> Don't have an account? <a href="register-form.php" class="text-purple-600 font-medium hover:underline">Register here</a>
        </p>
    </div>
</body>

</html>