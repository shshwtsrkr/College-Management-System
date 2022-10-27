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
    // output data of each row
    // echo "User";
    // while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    //   echo "regno: " . $regno. " - Password: " . $row["passwd"]. "Is Registered: " . $row["is_registered"] . "<br>";
    // }
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    // echo "regno: " . $regno. " - Password: " . $row["passwd"]. "Is Registered: " . $row["is_registered"] . "<br>";

    if($row["is_registered"] == 1){
      include "../pages/dashboard.html";
    }else{
      include "../pages/semesterRegistration.html";
    }

  } else {
    echo "This is error from Sign in page";
    include "../pages/dummyError.html";
  }
?>