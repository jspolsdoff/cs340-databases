<?php
  include('connection-mysql.php');

  // run sql query to make name dynamically appear
  $teacher_id = $_GET["teacherID"];
  $sqlname = "SELECT lname FROM teachers WHERE teacher_id='$teacher_id'";
  $name_query = mysqli_query($dbcon, $sqlname);
  $name = mysqli_fetch_array($name_query);

  // run sql query to pull up students class schedule
  $sqlprofile = "SELECT * FROM teachers WHERE teacher_id='$teacher_id'";
  $profile_query = mysqli_query($dbcon, $sqlprofile);
  
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
        <ul class="nav navbar-nav navbar-right">
          <li><a href="students.php">Students</a></li>
          <li><a href="teachers.php">Teachers</a></li>
          <li><a href="courses.php">Courses</a></li>
          <li><a href="classrooms.php">Classrooms</a></li>
        </ul>
      </div>
    </div>

    <div class="container">
      <h3>Edit Record For <?php echo $name[0]; ?></h3>
      <table class="table table-striped">
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Degree</th>
        </tr>
        <?php while($profile = mysqli_fetch_array($profile_query)):; ?>
        <tr>
          <td><?php echo $profile[1]; ?></td>
          <td><?php echo $profile[2]; ?></td>
          <td><?php echo $profile[3]; ?></td>
        </tr>
        <?php endwhile; ?>
      </table>


      <form method="post" action="update_teacher.php">
        <input type="hidden" name="submitted" value="true" />
        <input type="hidden" name="teacher_id" value="<?php echo htmlspecialchars($_GET["teacherID"]); ?>" />
        <legend>Edit Teacher</legend>
        <div class="form-group">
          <label for="teacherinputname">First Name</label>
          <input type="text" name="fname" class="form-control" id="teacherinputfname" placeholder="">
        </div>
        <div class="form-group">
          <label for="teacherinputlname">Last Name</label>
          <input type="text" name="lname" class="form-control" id="teacherinputlname" placeholder="">
        </div>
        <div class="form-group">
          <label for="teacherinputdegree">Degree</label>
          <input type="text" name="degree" class="form-control" id="teacherinputdegree" placeholder="">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>

    </div> 

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>