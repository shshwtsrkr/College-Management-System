<?php
  include "connection.php";

  //this is to create new table
  $sql="CREATE TABLE IF NOT EXISTS student(reg_no varchar(9) NOT NULL PRIMARY KEY, username varchar(50), passwd varchar(50), phone_no varchar(10), email varchar(50), gender varchar(1), branch varchar(50), present_year int, fee_paid boolean, is_registered boolean);";
  $result=mysqli_query($conn, $sql);
  // if(! $result){
  //   echo "Failed to create table";
  // }
  // echo "Created table!!";

  //this is to add data to table

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

  $sql2 = "INSERT INTO student(reg_no, username, passwd, email, is_registered) VALUES('$regno', '$username', '$password', '$emailId', 0);";
  $result2 = mysqli_query($conn, $sql2);

  if(! $result2){
    echo "Couldn't insert into the table because such a reg no already exists!";
    include "../pages/signup.html";    
  }else{
    include "../pages/signin.html";
  }
?>