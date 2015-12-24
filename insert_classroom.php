<?php
  if(isset($_POST['submitted'])) {
    include('connection-mysql.php');

    $room = $_POST['room'];
    $building = $_POST['building'];
    $teacher = $_POST['teacher'];

    $teacher_id = mysqli_query($dbcon, "SELECT teacher_id FROM teachers WHERE lname='$teacher'");
    $row = mysqli_fetch_row($teacher_id);

    // check to see if the teacher input is NULL
    if($teacher == "") {
      $sqlinsert = "INSERT INTO classrooms (room_num, building) VALUES ('$room', '$building')";
      $insert = $dbcon->query($sqlinsert);

      if(!$insert) {
        die("Error: {$dbcon->errno} : {$dbcon->error}");      
      }
    }
    
    else {
      $sqlinsert = "INSERT INTO classrooms (room_num, building, teacher_id) VALUES ('$room', '$building', '$row[0]')";
      $insert = $dbcon->query($sqlinsert);

      if(!$insert) {
        die("Error: {$dbcon->errno} : {$dbcon->error}");      
      }
    }
  }

  header("Location:http://web.engr.oregonstate.edu/~spolsdoj/cs340/classrooms.php");
?>  