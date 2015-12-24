<?php
  if(isset($_POST['submitted'])) {
    include('connection-mysql.php');

    $course_id = $_POST['courseID'];
    $name = $_POST['name'];
    $department = $_POST['department'];
    $teacher = $_POST['teacher'];

    $teacher_id = mysqli_query($dbcon, "SELECT teacher_id FROM teachers WHERE lname='$teacher'");
    $row = mysqli_fetch_row($teacher_id);

    if ($name != "") {
      $sqlupdate = "UPDATE courses SET name='$name' WHERE course_id='$course_id'";
      $update = $dbcon->query($sqlupdate);

      if(!$update) {
        die("Error: {$dbcon->errno} : {$dbcon->error}");      
      }
    }

    if ($department != "") {
      $sqlupdate = "UPDATE courses SET department='$department' WHERE course_id='$course_id'";
      $update = $dbcon->query($sqlupdate);

      if(!$update) {
        die("Error: {$dbcon->errno} : {$dbcon->error}");      
      }
    }

    if ($teacher != "") {
      $sqlupdate = "UPDATE courses SET teacher_id='$row[0]' WHERE course_id='$course_id'";
      $update = $dbcon->query($sqlupdate);

      if(!$update) {
        die("Error: {$dbcon->errno} : {$dbcon->error}");      
      }
    }
  }

  header("Location:http://web.engr.oregonstate.edu/~spolsdoj/cs340/courses.php");
?>  