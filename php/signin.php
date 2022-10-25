<?php
    include "connection.php";

    $usrnm = $_POST["fname"];
    $pswd = $_POST["passwd"];

    $sql = "SELECT COUNT(*) FROM student WHERE username = $usrnm and passwd = $pswd;";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if($count == 1)
    {
        include "../landing.html";
    }

    else
    {
        include "../signin.html";
    }
?>