<?php
// Include the database connection file
include("data.php");

// Check for the presence of the 'id' parameter in the URL
if (!isset($_GET['id'])) {
  // If not present, redirect to the index page
  header('Location: index.php');
  exit; // Prevent further code execution
} else {
  // If present, sanitize the 'id' parameter
  $id = mysqli_real_escape_string($db, $_GET['id']);

  // Retrieve the todo item data from the database
  $sql = "SELECT * FROM todo_list WHERE id = $id";
  $query = mysqli_query($db, $sql);

  // Check if any todo item matches the ID
  if (mysqli_num_rows($query) < 1) {
    die("Data tidak ditemukan.");
  }

  // Fetch the todo item data as an associative array
  $list = mysqli_fetch_assoc($query);

  // Handle form submission if the 'update' button is pressed
  if (isset($_POST["update"])) {
    $keinginan = $_POST["input"];

    // Sanitize the input data
    $keinginan = mysqli_real_escape_string($db, $keinginan);

    // Update the todo item in the database
    $sql1 = "UPDATE todo_list SET keinginan = '$keinginan' WHERE id = $id";
    $query = mysqli_query($db, $sql1);

    if ($query) {
      header('Location: index.php');
    } else {
      echo "Terjadi kesalahan saat memperbarui data.";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Todo Item</title>
</head>

<body>
  <h1>Edit Todo Item</h1>

  <form action="edit.php?id=<?php echo $id; ?>" method="post">
    <input type="text" name="input" value="<?php echo $list['keinginan']; ?>">
    <input type="submit" name="update" value="Update">
  </form>

</body>

</html>