<?php
  include "connection.php";

  //this is to create new table
  // $sql="CREATE TABLE studentTemp(username varchar(40),  passwd varchar(40));";
  // $result=mysqli_query($conn, $sql);

  // if(! $result){
  //   echo "Failed to create table";
  // }
  // echo "Created table!!";

  $usrnm = $_POST["fname"];
  $pswd = $_POST["passwd"];

  $username = stripcslashes($usrnm);
  $password = stripcslashes($pswd);
  $username = mysqli_real_escape_string($conn,$username);
  $password = mysqli_real_escape_string($conn,$password);

  $sql = "INSERT INTO studentTemp VALUES('$username', '$password');";
  $result = mysqli_query($conn, $sql);

  if(! $result){
    echo "Couldn't insert into the table!";
  }
  // echo "Inserted into the table<br>";
  include "../landing.html";
?>