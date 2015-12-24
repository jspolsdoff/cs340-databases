<?php
  include('connection-mysql.php');
  $sqlselect = "SELECT * FROM students";
  $result1 = mysqli_query($dbcon, $sqlselect);  
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
      <h3>Students</h3>
      <table class="table table-striped">
        <tr>
          <th>Name</th>
          <th>Address</th>
          <th>Phone Number</th>
        </tr>
        <?php while($row1 = mysqli_fetch_array($result1)):; ?>
        <tr>
          <td><a href="student.php?studentID=<?php echo $row1[0]; ?>&amp;studentName=<?php echo $row1[1]; ?>"><?php echo $row1[1]; ?></a></td>
          <td><?php echo $row1[2]; ?></td>
          <td><?php echo $row1[3]; ?></td>
        </tr>
        <?php endwhile; ?>
      </table>


      <form method="post" action="insert_student.php">
        <input type="hidden" name="submitted" value="true" />
        <legend>Add Student</legend>
        <div class="form-group">
          <label for="studentinputname">Name</label>
          <input type="text" name="name" class="form-control" id="studentinputname" placeholder="">
        </div>
        <div class="form-group">
          <label for="studentinputaddress">Address</label>
          <input type="text" name="address" class="form-control" id="studentinputlname" placeholder="">
        </div>
        <div class="form-group">
          <label for="studentinputphone">Phone Number</label>
          <input type="text" name="phone" class="form-control" id="studentinputphone" placeholder="">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>

    </div> 

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>