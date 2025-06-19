

<!DOCTYPE html>
<html>
<head>
    <title>Rent Book</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200 min-h-screen flex items-center justify-center">
    <form action="dashBord.php" method="POST" class="bg-white p-6 rounded shadow max-w-md w-full">
        <h2 class="text-xl font-bold mb-4">Rent This Book</h2>
        <input type="hidden" name="book_id" value="<?= $book_id ?>">
        <input type="text" name="student_name" placeholder="Your Name" required class="mb-4 w-full px-4 py-2 border rounded" />
        <label class="block mb-2 font-medium">Return Date</label>
        <input type="date" name="return_date" required class="mb-4 w-full px-4 py-2 border rounded" />
        <button type="submit" class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600">Confirm Rent</button>
    </form>
</body>
</html>
