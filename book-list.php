<?php
$mysqli = new mysqli("localhost", "root", "", "library_management_db");
if ($mysqli->connect_error) {
    die("Faild to connect") . $mysqli->connect_error;
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["reset"])){
    $result = $mysqli->query("SELECT * FROM books");
    unset($_POST["search"]);
}elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["search"]) && !empty($_POST['search'])){
     $result = $mysqli->query("SELECT * FROM books WHERE title LIKE '%".$_POST["search"]."%'");
}else{
     $result = $mysqli->query("SELECT * FROM books");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Library Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-pink-100 via-purple-100 to-blue-100 min-h-screen">
    <div class="max-w-6xl mx-auto py-10 px-6">

        <div class="text-center mb-10">
            <h1 class="text-4xl font-extrabold text-purple-700 mb-2"> Welcome to Your Library</h1>
            <p class="text-gray-700 text-lg">Manage your books, add new ones, or rent them anytime!</p>
        </div>

        <?php if (isset($_GET["message"]) && $_GET["message"] == "deleted") {
        ?>
            <p style="text-align: center; color:red; padding-bottom:8px; font-weight:800; font-size:larger;">Book Delete Successfully.!</p>
        <?php } ?>

        <?php if (isset($_GET["message"]) && $_GET["message"] == "update") {
        ?>
            <p style="text-align: center; color:green; padding-bottom:8px; font-weight:800; font-size:larger;">Book Update Successfully.!</p>
        <?php } ?>

        <div class="mb-6">

        </div>

        <div class="flex flex-col sm:flex-row mb-6 items-center">
            <div class="flex-1 w-full">
                <form action="" method="POST" class="flex flex-col sm:flex-row items-center gap-3 sm:gap-4 w-full">
                    <input type="text" name="search" placeholder="Search books..." class="flex-1 w-full sm:max-w-xs px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-400" value="<?php if (isset($_POST['search'])) { echo $_POST['search']; } ?>" />
                    <button type="submit" name="reset" value="reset" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg shadow-sm transition">Reset</button>
                    <button type="submit" class="px-4 py-2 bg-purple-500 hover:bg-purple-600 text-white rounded-lg shadow-sm transition">Search</button>
                </form>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-4">
                <a href="addBook-form.php" class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-6 py-2 rounded-xl font-semibold shadow hover:from-purple-600 hover:to-pink-600 transition duration-200">
                    Add New Book
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!--  here  add a database and get the all books -->
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<div class=\"bg-white shadow-lg rounded-xl p-6 border border-purple-200\">
                   <h2 class=\"text-lg font-semibold text-purple-700 mb-2\"><span class=\"font-bold text-xl\">Title:</span> " . $row['title'] . "</h2>
                   <p class=\"text-gray-600\"><span class=\"font-semibold\">Author:</span> " . $row['author'] . "</p>
                   <p class=\"text-gray-600\"><span class=\"font-semibold\">Published:</span> " . $row['publication_year'] . "</p>
                   <a href=\"rent-form.php?book_id=".$row["id"]."\" class=\"block text-center mt-4 bg-gradient-to-r from-blue-500 to-purple-500 text-white font-semibold py-2 px-4 rounded-xl hover:from-blue-600 hover:to-purple-600 transition-all duration-200 shadow-md hover:shadow-lg\">Rent This Book</a>
                   <div class=\"flex justify-center gap-4 mt-4\">

                   <a href=\"book-edit-form.php?id=" . $row["id"] . "\" class=\"bg-green-500 w-full text-center text-white font-semibold py-2 px-4 rounded-xl hover:from-green-600 hover:to-emerald-600 transition-all duration-200 shadow-md hover:shadow-lg\">Edit</a>
                   <a href=\"delete-book.php?id=" . $row["id"] . "\" class=\"bg-red-500 w-full text-center text-white font-semibold py-2 px-4 rounded-xl hover:from-red-600 hover:to-pink-600 transition-all duration-200 shadow-md hover:shadow-lg\">Delete</a>
</div>

        </div>";
            }
            ?>
</body>

</html>