<?php
  include('connection-mysql.php');
  $sqlselect = "SELECT * FROM teachers";
  $result1 = mysqli_query($dbcon, $sqlselect);  
?>

<!DOCTYPE html>
<html>
  <head>
    <title>CS340 Final Project - Teachers</title>
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
      <h3>Teachers</h3>
      <table class="table table-striped">
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Degree</th>
          <th></th>
        </tr>
        <?php while($row1 = mysqli_fetch_array($result1)):; ?>
        <tr>
          <td><?php echo $row1[1]; ?></td>
          <td><?php echo $row1[2]; ?></td>
          <td><?php echo $row1[3]; ?></td>
          <td><a href="edit_teacher.php?teacherID=<?php echo $row1[0]; ?>">Edit</a></td>
        </tr>
        <?php endwhile; ?>
      </table>


      <form method="post" action="insert_teacher.php">
        <input type="hidden" name="submitted" value="true" />
        <legend>Add Teacher</legend>
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