<?php
  include('connection-mysql.php');

  $student_id = $_GET["studentID"];
  $course_id = $_GET["courseID"];

  // remove student from course
  $sqlremove = "DELETE FROM students_courses WHERE student_id='$student_id' AND course_id='$course_id'";
  $remove = $dbcon->query($sqlremove);

  if(!$remove) {
    die("Error: {$dbcon->errno} : {$dbcon->error}");      
  }

  header("Location:http://web.engr.oregonstate.edu/~spolsdoj/cs340/student.php?studentID={$student_id}");
?>  