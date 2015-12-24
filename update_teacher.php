<?php
  if(isset($_POST['submitted'])) {
    include('connection-mysql.php');

    $teacher_id = $_POST['teacher_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $degree = $_POST['degree'];

    if ($fname != "") {
      $sqlupdate = "UPDATE teachers SET fname='$fname' WHERE teacher_id='$teacher_id'";
      $insert = $dbcon->query($sqlupdate);

      if(!$insert) {
        die("Error: {$dbcon->errno} : {$dbcon->error}");      
      }
    }

    if ($lname != "") {
      $sqlupdate = "UPDATE teachers SET lname='$lname' WHERE teacher_id='$teacher_id'";
      $insert = $dbcon->query($sqlupdate);

      if(!$insert) {
        die("Error: {$dbcon->errno} : {$dbcon->error}");      
      }
    }

    if ($degree != "") {
      $sqlupdate = "UPDATE teachers SET degree='$degree' WHERE teacher_id='$teacher_id'";
      $insert = $dbcon->query($sqlupdate);

      if(!$insert) {
        die("Error: {$dbcon->errno} : {$dbcon->error}");      
      }
    }

  }

  header("Location:http://web.engr.oregonstate.edu/~spolsdoj/cs340/teachers.php");
?>  