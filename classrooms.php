<?php
  include('connection-mysql.php');
  
  // query to display current courses
  $sqlselect = "SELECT * FROM classrooms";
  $result1 = mysqli_query($dbcon, $sqlselect); 

  // query to get teachers last names
  $sqlteachername = "SELECT lname FROM teachers";
  $result2 = mysqli_query($dbcon, $sqlteachername); 

?>

<!DOCTYPE html>
<html>
  <head>
    <title>CS340 Final Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  </head>
  <body>
    <div class="navbar navbar-inverse">
      <div class="navbar-inner">
        <a class="brand" href="index.html">CS340 Final Project</a>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="students.php">Students</a></li>
          <li><a href="teachers.php">Teachers</a></li>
          <li><a href="courses.php">Courses</a></li>
          <li><a href="classrooms.php">Classrooms</a></li>
        </ul>
      </div>
    </div>

    <div class="container">
      <h3>Classrooms</h3>
      <table class="table table-striped">
        <tr>
          <th>Room</th>
          <th>Building</th>
          <th>Teacher</th>
          <th></th>
        </tr>
        <?php while($row1 = mysqli_fetch_array($result1)):; ?>
        <tr>
          <td><?php echo $row1[1]; ?></td>
          <td><?php echo $row1[2]; ?></td>
          <?php $room_teacher = "SELECT lname FROM teachers WHERE teacher_id = '$row1[3]'"; ?>
          <?php $result3 = mysqli_query($dbcon, $room_teacher); ?>
          <?php $row3 = mysqli_fetch_array($result3); ?>
          <td><?php echo $row3[0]; ?></td>
          <td><a href="edit_classroom.php?classroomID=<?php echo $row1[0]; ?>">Edit</a></td>
        </tr>
        <?php endwhile; ?>
      </table>


      <form method="post" action="insert_classroom.php">
        <input type="hidden" name="submitted" value="true" />
        <legend>Add Classroom</legend>
        <div class="form-group">
          <label for="classinputroom">Room</label>
          <input type="text" name="room" class="form-control" id="classinputroom" placeholder="">
        </div>
        <div class="form-group">
          <label for="classinputbuilding">Building</label>
          <input type="text" name="building" class="form-control" id="classinputbuilding" placeholder="">
        </div>
        <div class="form-group">
          <label for="classinputteacher">Teacher</label>
          <select class="form-control" name="teacher">
            <option></option>
            <?php while($row2 = mysqli_fetch_array($result2)):; ?>
              <option><?php echo $row2[0]; ?></option>
            <?php endwhile; ?>
          </select>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>

    </div> 

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>