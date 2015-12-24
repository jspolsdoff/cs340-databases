<?php
  include('connection-mysql.php');
  
  // query to get teachers last names
  $sqlteachername = "SELECT lname FROM teachers";
  $result2 = mysqli_query($dbcon, $sqlteachername); 

?>

<!DOCTYPE html>
<html>
  <head>
    <title>CS340 Final Project - Classrooms</title>
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

      <form method="post" action="update_classroom.php">
        <input type="hidden" name="submitted" value="true" />
        <input type="hidden" name="classroom_id" value="<?php echo htmlspecialchars($_GET["classroomID"]); ?>" />
        <legend>Edit Classroom</legend>
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