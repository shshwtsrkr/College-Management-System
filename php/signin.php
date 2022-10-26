<?php
  include "connection.php";
  
  session_start();

  $regno = $_POST["regno"];
  $passwd = $_POST["passwd"];
  $regno = stripcslashes($regno);
  $password = stripcslashes($passwd);
  $regno = mysqli_real_escape_string($conn,$regno);
  $password = mysqli_real_escape_string($conn,$password);
  $_SESSION['var']=$regno;

  $sql = "SELECT * FROM student WHERE reg_no='$regno' and passwd='$password';";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    include "../pages/semesterRegistration.html";
    // output data of each row
    // echo "User";
    // while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    //     echo "regno: " . $row["regno"]. " - Password: " . $row["passwd"]. "<br>";
    //   }
  } else {
    echo "This is error from Sign in page";
    include "../pages/dummyError.html";
  }

  // echo "This is error from Sign in page";
  // include "../pages/dummyError.html";

?>