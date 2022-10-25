<?php
  include "connection.php";

  //this is to create new table
  $sql="CREATE TABLE IF NOT EXISTS student(username varchar(40),  passwd varchar(40));";
  $result=mysqli_query($conn, $sql);

  if(! $result){
    echo "Failed to create table";
  }
  echo "Created table!!";


  //this is to add data to table
  $usrnm = $_POST["fname"];
  $pswd = $_POST["passwd"];
  $regno = $_POST["regno"];
  $emailId = $_POST["emailId"];
  

  $username = stripcslashes($usrnm);
  $password = stripcslashes($pswd);
  $username = mysqli_real_escape_string($conn,$username);
  $password = mysqli_real_escape_string($conn,$password);

  $sql = "INSERT INTO studentTemp VALUES('$username', '$password');";
  $result = mysqli_query($conn, $sql);

  if(! $result){
    echo "Couldn't insert into the table!";
  }
  include "../pages/signin.html";
?>