<?php 
  include "connection.php";
  $usrnm = $_POST["fname"];
  $pswd = $_POST["passwd"];
  $regno = $_POST["regno"];
  $emailId = $_POST["emailId"];

  $username = stripcslashes($usrnm);
  $password = stripcslashes($pswd);
  $regno = stripcslashes($regno);

  $username = mysqli_real_escape_string($conn,$username);
  $password = mysqli_real_escape_string($conn,$password);
  $regno = mysqli_real_escape_string($conn,$regno);
  $emailId = mysqli_real_escape_string($conn,$emailId);





?>