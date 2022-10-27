<?php 
  include "connection.php";

  session_start();
  $regno = $_SESSION['var'];

  $phoneNo = $_POST["phoneNo"];
  $branch = $_POST["branch"];
  $currentYear = $_POST["currentYear"];
  $gender = $_POST["gender"];
  $feePaid = $_POST["feePaid"];

  $phoneNo = stripcslashes($phoneNo);
  $branch = stripcslashes($branch);
  $currentYear = stripcslashes($currentYear);
  $gender = stripcslashes($gender);
  $feePaid = stripcslashes($feePaid);

  $phoneNo = mysqli_real_escape_string($conn,$phoneNo);
  $branch = mysqli_real_escape_string($conn,$branch);
  $currentYear = mysqli_real_escape_string($conn,$currentYear);
  $gender = mysqli_real_escape_string($conn,$gender);
  $feePaid = mysqli_real_escape_string($conn,$feePaid);

  // echo "Gender: '$gender', Fee Paid: '$feePaid', Reg No: '$regno'";


  $sql = "UPDATE student SET phone_no='$phoneNo', gender='$gender', branch='$branch', present_year='$currentYear', fee_paid='$feePaid', is_registered='1' WHERE reg_no='$regno';";

  $result = mysqli_query($conn, $sql);


  if(! $result){
    echo "Couldn't insert into the table because wrong or invalid data inputted!";
    include "../pages/dummyError.html";    
  }else{
    // echo "This is landing from register html";
    include "../pages/dashboard.html";
  }

?>