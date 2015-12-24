<?php
  if(isset($_POST['submitted'])) {
    include('connection-mysql.php');

    $student_id = $_POST['student_id'];
    $course_name = $_POST['class'];

    // run query to get the course_id
    $sql_course_id = mysqli_query($dbcon, "SELECT course_id FROM courses WHERE name='$course_name'");
    $teacher_id = mysqli_fetch_row($sql_course_id);

    $sqlinsert = "INSERT INTO students_courses (student_id, course_id) VALUES ('$student_id', '$teacher_id[0]')";
    $insert = $dbcon->query($sqlinsert);

    if(!$insert) {
      die("Error: {$dbcon->errno} : {$dbcon->error}");      
    }
  }

  header("Location:http://web.engr.oregonstate.edu/~spolsdoj/cs340/student.php?studentID={$student_id}");
?>  