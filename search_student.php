<?php
  include('connection-mysql.php');
  $sqlclasses = "SELECT name FROM courses";
  $result2 = mysqli_query($dbcon, $sqlclasses);

  // run sql query to get student_id from name
  $student_name = $_POST["name"];
  $sqlstudentid = "SELECT student_id FROM students WHERE name='$student_name'";
  $id_query = mysqli_query($dbcon, $sqlstudentid);
  $student_id = mysqli_fetch_array($id_query);

  // run sql query to pull up students class schedule
  $sqlschedule = "SELECT c.course_id, c.name, r.room_num, t.lname FROM courses AS c LEFT JOIN students_courses AS sc ON c.course_id=sc.course_id LEFT JOIN students AS s ON sc.student_id=s.student_id LEFT JOIN teachers AS t ON c.teacher_id=t.teacher_id LEFT JOIN classrooms AS r ON c.teacher_id=r.teacher_id WHERE sc.student_id='$student_id[0]'";
  $schedule_query = mysqli_query($dbcon, $sqlschedule);
  
?>

<!DOCTYPE html>
<html>
  <head>
    <title>CS340 Final Project - Students</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  </head>
  <body>
    <div class="navbar navbar-inverse">
      <div class="navbar-inner">
        <a class="brand" href="index.html">CS340 Final Project</a>
      </div>
    </div>

    <div class="container">
      <h3>Class Schedule For <?php echo $student_name; ?></h3>
      <table class="table table-striped">
        <tr>
          <th>Course</th>
          <th>Room</th>
          <th>Instructor</th>
        </tr>
        <?php while($schedule = mysqli_fetch_array($schedule_query)):; ?>
        <tr>
          <td><?php echo $schedule[1]; ?></td>
          <td><?php echo $schedule[2]; ?></td>
          <td><?php echo $schedule[3]; ?></td>
        </tr>
        <?php endwhile; ?>
      </table>

    </div> 

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>