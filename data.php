<?php

$server = "localhost";
$user = "root";
$password = "";
$database_name = "todo_list";

$db = mysqli_connect($server, $user, $password, $database_name);

if (!$db) {
  echo "data base erorr";
  die();
} 

?>