<?php
  if(isset($_POST['submitted'])) {
    include('connection-mysql.php');

    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    if ($name != "") {
      $sqlupdate = "UPDATE students SET name='$name' WHERE student_id='$student_id'";
      $insert = $dbcon->query($sqlupdate);

      if(!$insert) {
        die("Error: {$dbcon->errno} : {$dbcon->error}");      
      }
    }

    if ($address != "") {
      $sqlupdate = "UPDATE students SET address='$address' WHERE student_id='$student_id'";
      $insert = $dbcon->query($sqlupdate);

      if(!$insert) {
        die("Error: {$dbcon->errno} : {$dbcon->error}");      
      }
    }

    if ($phone != "") {
      $sqlupdate = "UPDATE students SET phone='$phone' WHERE student_id='$student_id'";
      $insert = $dbcon->query($sqlupdate);

      if(!$insert) {
        die("Error: {$dbcon->errno} : {$dbcon->error}");      
      }
    }
  }

  header("Location:http://web.engr.oregonstate.edu/~spolsdoj/cs340/students.php");
?> 