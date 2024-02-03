<?php
include "data.php";

 if (isset($_GET['id']) ) {
  $id = $_GET['id'];

  $sql = "DELETE FROM todo_list WHERE id=$id";
  $query = mysqli_query($db, $sql);

  if (!$query) {
    die("gagal menghapus");
    
  } else {
    header('Location: index.php');
  }
 } else {
  die('denied');
 }

?>