<?php
$mysqli = new mysqli("localhost", "root", "", "library_management_db");
if ($mysqli->connect_error) {
  die("Faild to connect.") . $mysqli->connect_error;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["reset"])) {
  $result = $mysqli->query("SELECT * FROM users");
  unset($_POST["search"]);
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["search"]) && !empty($_POST['search'])) {
  $result = $mysqli->query("SELECT * FROM users WHERE name LIKE '%" . $_POST["search"] . "%'");
} else {
  $result = $mysqli->query("SELECT * FROM users");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User List</title>
</head>

<body class="bg-gradient-to-br from-purple-100 via-pink-100 to-blue-100 min-h-screen px-4 py-10">

  <div class="max-w-6xl mx-auto bg-white shadow-2xl rounded-3xl p-8">
    <h1 class="text-3xl font-extrabold text-center text-purple-700 mb-6">All Registered Users</h1>
    
   <div class="mb-6">
  <form action="" method="POST" class="flex flex-col sm:flex-row items-center gap-3 sm:gap-4">
    <input type="text" name="search" placeholder="Search users..." class="flex-1 w-full sm:max-w-xs px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-400" value="<?php if (isset($_POST['search'])) { echo $_POST['search']; } ?>" />
    <button type="submit" name="reset" value="reset" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg shadow-sm transition">Reset</button>
    <button type="submit" class="px-4 py-2 bg-purple-500 hover:bg-purple-600 text-white rounded-lg shadow-sm transition">Search</button>
  </form>
</div>

    <?php
    if(isset($_GET["message"]) && $_GET["message"] == "deleted"){
    ?>
    <p style="text-align: center; color:red; font-weight:700; font-size:larger; padding-bottom:6px;">User Delete Successfully.!</p>
    <?php }?>

    <?php
    if(isset($_GET["message"]) && $_GET["message"] == "updated"){
    ?>
    <p style="text-align: center; color:green; font-weight:700; font-size:larger; padding-bottom:6px;">User Update Successfully.!</p>
    <?php }?>
    <div class="overflow-x-auto">
      <table class="min-w-full bg-white text-center border border-gray-200 rounded-xl">
        <thead class="bg-gradient-to-r from-purple-400 to-pink-400 text-white">
          <tr>
            <th class="py-3 px-4 border-r">Name</th>
            <th class="py-3 px-4 border-r">Email</th>
            <th class="py-3 px-4 border-r">Created Time</th>
            <div>
              <th class="py-3 px-4 border-r">#</th>
            </div>
          </tr>
        </thead>
        <tbody class="text-gray-700">
          <?php
          while ($row = $result->fetch_assoc()) {
            echo "<tr class='border-t hover:bg-gray-100 transition'>
                <td class='py-3 px-4 border-r'>" . $row['name'] . "</td>
                <td class='py-3 px-4 border-r'>" . $row['email'] . "</td>
                <td class='py-3 px-4 border-r'>" . $row['created_at'] . "</td>
                <td class='py-3 px-4 border-r space-x-2'><a class=\"inline-block px-3 py-1 bg-green-500 text-white text-sm rounded-lg shadow hover:bg-green-600 transition\" href=\"user-edit-form.php?id=".$row["id"]."\">Edit</a>
                <a class=\"inline-block px-3 py-1 bg-red-500 text-white text-sm rounded-lg shadow hover:bg-green-600 transition\" href=\"delete-user.php?id=".$row["id"]."\">Delete</a></td>
                </tr>";
          }
          ?>

        </tbody>
      </table>
    </div>
  </div>
  <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>
<?php
unset($_POST);
$_POST = array();
?>