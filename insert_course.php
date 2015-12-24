<?php
  if(isset($_POST['submitted'])) {
    include('connection-mysql.php');

    $name = $_POST['name'];
    $department = $_POST['department'];
    $teacher = $_POST['teacher'];

    $teacher_id = mysqli_query($dbcon, "SELECT teacher_id FROM teachers WHERE lname='$teacher'");
    $row = mysqli_fetch_row($teacher_id);

    // check to see if the teacher input is NULL
    if($teacher == "") {
      $sqlinsert = "INSERT INTO courses (name, department) VALUES ('$name', '$department')";
      $insert = $dbcon->query($sqlinsert);

      if(!$insert) {
        die("Error: {$dbcon->errno} : {$dbcon->error}");      
      }
    }
    
    else {
      $sqlinsert = "INSERT INTO courses (name, department, teacher_id) VALUES ('$name', '$department', '$row[0]')";
      $insert = $dbcon->query($sqlinsert);

      if(!$insert) {
        die("Error: {$dbcon->errno} : {$dbcon->error}");      
      }
    }
  }

  header("Location:http://web.engr.oregonstate.edu/~spolsdoj/cs340/courses.php");
?>  