<?php
include "db_conn.php";
$isbn = $_GET["isbn"];
$sql = "DELETE FROM `buku` WHERE isbn = $isbn";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: index.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}