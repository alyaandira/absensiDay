<?php
include "././db-component/config.php";

// Create connection
$conn = new mysqli($hostname, $username, $password, $dbName);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$SQL_query = "SELECT * FROM `$ruangkelas_table`";

// var_dump($SQL_query);

$result = mysqli_query($conn, $SQL_query);


if ($result) {
  $row_count = $result->num_rows;
  $AllClassList = [];

  if ($row_count > 0) {
    $AllClassList = $result->fetch_all(MYSQLI_ASSOC);
    // var_dump($AllClassList);
    // echo "<br";
    // echo "<br";
  }
} else {
  $error_message = $conn->error;
  echo ("Error is = " . $error_message);
  echo
  "<script>
        iziToast.error({
            title: 'Error',
            message: 'SQL error',
        });
    </script>";
}
