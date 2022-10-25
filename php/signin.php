<?php
  include "connection.php";

  $usrnm = $_POST["fname"];
  $pswd = $_POST["passwd"];
  $username = stripcslashes($usrnm);
  $password = stripcslashes($pswd);
  $username = mysqli_real_escape_string($conn,$username);
  $password = mysqli_real_escape_string($conn,$password);

  $sql = "SELECT * FROM student WHERE username='$username' and passwd='$password';";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    include "../pages/landing.html";
    // output data of each row
    // echo "User";
    // while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      //   echo "Username: " . $row["username"]. " - Password: " . $row["passwd"]. "<br>";
      // }
  } else {
    // echo "0 results";
    include "../pages/dummyError.html";
  }

?>