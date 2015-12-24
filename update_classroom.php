<?php
  if(isset($_POST['submitted'])) {
    include('connection-mysql.php');

    $classroom_id = $_POST['classroom_id'];
    $room = $_POST['room'];
    $building = $_POST['building'];
    $teacher = $_POST['teacher'];

    $teacher_id = mysqli_query($dbcon, "SELECT teacher_id FROM teachers WHERE lname='$teacher'");
    $row = mysqli_fetch_row($teacher_id);

    if ($room != "") {
      $sqlupdate = "UPDATE classrooms SET room_num='$room' WHERE classroom_id='$classroom_id'";
      $update = $dbcon->query($sqlupdate);

      if(!$update) {
        die("Error: {$dbcon->errno} : {$dbcon->error}");      
      }
    }

    if ($building != "") {
      $sqlupdate = "UPDATE classrooms SET building='$building' WHERE classroom_id='$classroom_id'";
      $update = $dbcon->query($sqlupdate);

      if(!$update) {
        die("Error: {$dbcon->errno} : {$dbcon->error}");      
      }
    }

    if ($teacher != "") {
      $sqlupdate = "UPDATE classrooms SET teacher_id='$row[0]' WHERE classroom_id='$classroom_id'";
      $update = $dbcon->query($sqlupdate);

      if(!$update) {
        die("Error: {$dbcon->errno} : {$dbcon->error}");      
      }
    } 
  }

  header("Location:http://web.engr.oregonstate.edu/~spolsdoj/cs340/classrooms.php");
?>  