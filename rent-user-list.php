<?php
$mysqli = new mysqli("localhost", "root", "", "library_management_db");
if ($mysqli->connect_error) {
  die("Faild to connect.") . $mysqli->connect_error;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User List</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-teal-100 via-cyan-100 to-blue-100 min-h-screen px-4 py-10">

  <div class="max-w-6xl mx-auto bg-white shadow-2xl rounded-3xl p-8">
    <h1 class="text-3xl font-extrabold text-center text-cyan-700 mb-6">All Registered Users</h1>

   

    <div class="overflow-x-auto">
      <table class="min-w-full bg-white text-center border border-gray-200 rounded-xl">
        <thead class="bg-gradient-to-r from-teal-400 to-cyan-400 text-white">
          <tr>
            <th class="py-3 px-4 border-r">User Name</th>
            <th class="py-3 px-4 border-r">Book name</th>
            <th class="py-3 px-4 border-r">Return Date</th>
          </tr>
        </thead>
        <tbody class="text-gray-700">
          <?php
          $result = $mysqli->query("SELECT * FROM rents");
          while ($row = $result->fetch_assoc()) {
            echo "<tr class='border-t hover:bg-gray-100 transition'>
                <td class='py-3 px-4 border-r'>" . $row['name'] . "</td>
                <td class='py-3 px-4 border-r'>" . $row['book_id'] . "</td>
                <td class='py-3 px-4 border-r'>" . $row['return_date'] . "</td>
                </tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

</body>

</html>
