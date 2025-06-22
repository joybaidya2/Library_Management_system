<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Library Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-purple-100 via-pink-100 to-blue-100 min-h-screen flex items-center justify-center px-4">

    <div class="bg-white w-full max-w-4xl rounded-3xl shadow-2xl p-8">
        <?php 
        if(isset($_GET["message"]) && $_GET["message"] == "success"){
        ?>
        <p style="text-align: center; color:green; font-weight:600; font-size:x-large; padding-bottom:8px;">Book Rent Successfully.!</p>
        <?php }?>
        <h1 class="text-3xl font-extrabold text-purple-700 text-center mb-6"> Welcome to Your Library </h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <a href="addBook-form.php" class="bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-blue-600 hover:to-indigo-600 text-white text-lg font-semibold py-4 rounded-xl text-center shadow-md transition duration-200"> Add Book </a>

            <a href="book-list.php" class="bg-gradient-to-r from-green-400 to-teal-500 hover:from-green-500 hover:to-teal-600 text-white text-lg font-semibold py-4 rounded-xl text-center shadow-md transition duration-200"> View Books </a>

             <a href="users-list.php" class="bg-gradient-to-r from-yellow-400 to-orange-500 hover:from-yellow-500 hover:to-orange-600 text-white text-lg font-semibold py-4 rounded-xl text-center shadow-md transition duration-200"> View Users </a>
            
             <a href="rent-user-list.php" class="bg-gradient-to-r from-yellow-600 to-orange-700 hover:from-yellow-300 hover:to-orange-600 text-white text-lg font-semibold py-4 rounded-xl text-center shadow-md transition duration-200"> View Rent Users </a>

            <a href="logout.php" class="bg-gradient-to-r from-red-500 to-pink-500 hover:from-red-600 hover:to-pink-600 text-white text-lg font-semibold py-4 rounded-xl text-center shadow-md transition duration-200"> Logout </a>
        </div>
    </div>

</body>

</html>
