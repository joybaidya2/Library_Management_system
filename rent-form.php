<?php
$book_id = isset($_GET['book_id']) ? intval($_GET['book_id']) : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Rent Book</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-green-100 via-blue-100 to-purple-100 min-h-screen flex items-center justify-center px-4">

  <div class="bg-white rounded-3xl shadow-2xl w-full max-w-md p-8">
    <h2 class="text-3xl font-extrabold text-center text-purple-700 mb-6"> Rent This Book</h2>

    <form action="rent-manager.php" method="POST" class="space-y-5">
      <input type="hidden" name="book_id" value="<?php echo $book_id; ?>">
      <div>
        <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Your Name</label>
        <input type="text" name="name" id="name" placeholder="Enter your name" required
          class="w-full px-4 py-2 border border-purple-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-400" />
      </div>

      <div>
        <label for="return_date" class="block text-sm font-semibold text-gray-700 mb-1">Return Date</label>
        <input type="date" name="return_date" id="return_date" required
          class="w-full px-4 py-2 border border-purple-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-400" />
      </div>

      <button type="submit" class="w-full text-center bg-gradient-to-r from-purple-500 to-blue-500 text-white font-bold py-2 rounded-xl hover:from-purple-600 hover:to-blue-600 transition duration-200">Confirm Rent</button>
    </form>

    <div class="text-center mt-6">
      <a href="all-information.php" class="text-purple-600 hover:underline font-medium">Back to Home</a>
    </div>
  </div>

</body>
</html>