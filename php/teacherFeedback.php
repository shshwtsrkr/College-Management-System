<?php
  include "connection.php";

  session_start();
  $regno = $_SESSION['var'];

  $tname = $_POST["tname"];
  $qteaching = $_POST["qteaching"];
  $eteaching = $_POST["eteaching"];
  $pteaching = $_POST["pteaching"];
  $afeed = $_POST["afeed"];

  $tname = stripcslashes($tname);
  $qteaching = stripcslashes($qteaching);
  $eteaching = stripcslashes($eteaching);
  $pteaching = stripcslashes($pteaching);
  $afeed = stripcslashes($afeed);

  $tname = mysqli_real_escape_string($conn,$tname);
  $qteaching = mysqli_real_escape_string($conn,$qteaching);
  $eteaching = mysqli_real_escape_string($conn,$eteaching);
  $pteaching = mysqli_real_escape_string($conn,$pteaching);
  $afeed = mysqli_real_escape_string($conn,$afeed);

  $sql="CREATE TABLE IF NOT EXISTS feedback(reg_no varchar(9), teacher_name varchar(50), quality  int, encourages int, pace int, feedback varchar(200));";
  $result=mysqli_query($conn, $sql);

  $sql2 = "INSERT INTO feedback(reg_no, teacher_name, quality, encourages, pace, feedback) VALUES('$regno', '$tname', '$qteaching', '$eteaching', '$pteaching', '$afeed');";
  $result2 = mysqli_query($conn, $sql2);

  if(! $result2){
    // echo "Couldn't insert the feedback!";
    include "../pages/teacherFeedback.html";    
  }else{
    include "../pages/dashboard.html";
  }
?>