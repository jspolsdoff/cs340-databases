<?php
  if(isset($_POST['submitted'])) {
    include('connection-mysql.php');

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $degree = $_POST['degree'];

    $sqlinsert = "INSERT INTO teachers (fname, lname, degree) VALUES ('$fname', '$lname', '$degree')";
    $insert = $dbcon->query($sqlinsert);

    if(!$insert) {
      die("Error: {$dbcon->errno} : {$dbcon->error}");      
    }
  }

  header("Location:http://web.engr.oregonstate.edu/~spolsdoj/cs340/teachers.php");
?>  