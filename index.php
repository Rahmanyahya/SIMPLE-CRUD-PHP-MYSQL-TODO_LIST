<?php

include "data.php";

if (isset($_POST["tambah"]) && empty($_POST["input"])) {
  $massage = "data harus di isi";
} else if (isset($_POST["tambah"]) && isset($_POST["input"])) {


  $keinginan = $_POST["input"];

  $sql = "INSERT INTO todo_list (keinginan) VALUE ('$keinginan')";
  $query = mysqli_query($db, $sql);
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href)
    }
  </script>
  <style> 

  th, td {
    padding: 15px;
  }

</style>
</head>

<body>
  <table border="1">
    <thead>
      <th>
        NO
      </th>
      <th>
        KEINGINAN
      </th>
      <th>
        STATUS
      </th>
      <th>
        OPTION
      </th>
      <th>
        WAKTU
      </th>
    </thead>
    <tbody>
      <?php

      include "data.php";
      $data = mysqli_query($db, "SELECT * FROM todo_list");

      $sql = "SELECT * FROM todo_list";
      $query = mysqli_query($db, $sql);
      $number = 0;



      while ($list = mysqli_fetch_array($query)) {
        
        $number += 1;
        echo "<tr>";
        echo "<td><center>" . $number . "</center></td>";
        echo "<td><center>" . $list['keinginan'] . "</center></td>";
        echo "<td><center><input type=" . "checkbox" . "> </center></td>";
        echo "<td><center><a href='edit.php?id=" . $list['id'] . "'>Edit | </a><a href='hapus.php?id=" . $list['id'] . "'> Hapus</a></center></td>";
        echo "<td><center>" . $list['time'] . "</center></td>";
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>
  <br>
  <br>
  <form action="index.php" method="post">
    <input type="text" name="input">
    <input type="submit" name="tambah" value="tambah">
  </form>

</body>

</html>