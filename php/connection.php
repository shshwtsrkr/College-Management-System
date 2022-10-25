<?php
  $server="localhost";
  $username="monirul";
  $password="mmi";
  $database="student_db";
  $conn = mysqli_connect($server, $username, $password, $database);

  if(! $conn){
    echo "Not successful";
  }
  // echo "Connection successful<br>";
?>