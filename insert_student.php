<?php
  if(isset($_POST['submitted'])) {
    include('connection-mysql.php');

    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $sqlinsert = "INSERT INTO students (name, address, phone_num) VALUES ('$name', '$address', '$phone')";
    $insert = $dbcon->query($sqlinsert);

    if(!$insert) {
      die("Error: {$dbcon->errno} : {$dbcon->error}");      
    }
  }

  header("Location:http://web.engr.oregonstate.edu/~spolsdoj/cs340/students.php");
?>  