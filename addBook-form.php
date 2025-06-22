<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add or Edit Book</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 via-purple-100 to-pink-100 min-h-screen flex items-center justify-center px-4">
  <div class="bg-white shadow-2xl rounded-3xl w-full max-w-md p-8">
    <h2 class="text-3xl font-extrabold text-center text-purple-700 mb-6">
      Add Book
    </h2>

    <?php
    if(isset($_GET["message"]) && $_GET["message"] == "saved"){
    ?>
    <p style="padding-bottom: 4px; color:green; font-weight:700;">Book add successfully.!</p>
    <?php
    }
    ?>
    <form action="addBook-manager.php" method="POST">
      <div class="mb-4">
        <label for="title" class="block text-sm font-semibold text-gray-700 mb-1">Book Title</label>
        <input type="text" id="title" name="title" placeholder="Enter book title" class="w-full px-4 py-2 border border-purple-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-400" required />
      </div>

      <div class="mb-4">
        <label for="author" class="block text-sm font-semibold text-gray-700 mb-1">Author</label>
        <input type="text" id="author" name="author" placeholder="Enter author's name" class="w-full px-4 py-2 border border-purple-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-400" required />
      </div>

      <div class="mb-6">
        <label for="year" class="block text-sm font-semibold text-gray-700 mb-1">Publication Year</label>
        <input type="number" id="year" name="publication_year" placeholder="e.g. 2025" class="w-full px-4 py-2 border border-purple-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-400" required />
      </div>

      <button type="submit" class="w-full bg-gradient-to-r from-purple-500 to-pink-500 text-white font-bold py-2 rounded-xl hover:from-purple-600 hover:to-pink-600 transition duration-200"> Save Book </button>
    </form>

    <div class="text-center mt-6">
      <a href="all-information.php" class="text-purple-600 hover:underline font-medium"> Back to Home</a>
    </div>
  </div>
</body>
</html>
