<?php
include 'library.php';
$header = generateHeader('CS 143 Project 1c');
print $header;
?>
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <p>&nbsp;&nbsp;Add new content</p>
            <li><a href="add_actor_director.php">Add Actor/Director</a></li>
            <li><a href="add_movie.php">Add Movie Information</a></li>
            <li><a href="Add_M_A_R.php">Add Movie/Actor Relation</a></li>
            <li><a href="Add_M_D_R.php">Add Movie/Director Relation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <p>&nbsp;&nbsp;Browsering Content :</p>
            <li><a href="Show_A.php">Show Actor Information</a></li>
            <li><a href="Show_M.php">Show Movie Information</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <p>&nbsp;&nbsp;Search Interface:</p>
            <li><a href="search.php">Search/Actor Movie</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h3>Add new Actor/Director</h3>
            <form method = "GET" action="#">
               <label class="radio-inline">
                    <input type="radio" checked="checked" name="identity" value="Actor"/>
                    Actor
                </label>
                <label class="radio-inline">
                    <input type="radio" name="identity" value="Director"/>Director
                </label>
                <div class="form-group">
                  <label for="first_name">First Name</label>
                  <input type="text" class="form-control" placeholder="Text input"  name="fname"/>
                </div>
                <div class="form-group">
                  <label for="last_name">Last Name</label>
                  <input type="text" class="form-control" placeholder="Text input" name="lname"/>
                </div>
                <label class="radio-inline">
                    <input type="radio" name="sex" checked="checked" value="male">Male
                </label>
                <label class="radio-inline">
                    <input type="radio" name="sex" value="female">Female
                </label>
                <div class="form-group">
                  <label for="DOB">Date of Birth</label>
                  <input type="text" class="form-control" placeholder="Text input" name="dateb">ie: 1997-05-05<br>
                </div>
                <div class="form-group">
                  <label for="DOD">Date of Die</label>
                  <input type="text" class="form-control" placeholder="Text input" name="dated">(leave blank if alive now)<br>
                </div>
                <button type="submit" class="btn btn-default">Add!</button>
            </form>
            <?php

            if($_GET['first_name']&&$_GET['last_name']&&$_GET['sex']&&$_GET['dateb'])
            {
              $db = mysqli_connect("localhost", "cs143", "", "TEST");
	            if (mysqli_connect_errno())
              {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
              }
              $q = "SELECT * FROM MaxPersonID";
              $rs = $db->query($q);
              $rows = $rs->num_rows;
              $id = $row[0];
              $id++;
              $q = "UPDATE MaxPersonID SET id=id+1";
              $rs = $db->query($q);

              // escape variables for security
              echo"AAAAAAAAAAAAAAAAA";
              $firstname = mysqli_real_escape_string($db, $_GET['fname']);
              $lastname = mysqli_real_escape_string($db, $_GET['lname']);
              $sex = mysqli_real_escape_string($db, $_GET['sex']);
              $dob = mysqli_real_escape_string($db, $_GET['dateb']);
              $dod = mysqli_real_escape_string($db, $_GET['dated']);

              $sql="INSERT INTO Actor (id, last, first, sex, dob, dod)
              VALUES ('$id','$lastname', '$firstname', '$sex','$dob','$dod')";

              if (!mysqli_query($db,$sql)) {
                die('Error: ' . mysqli_error($db));
              }
              echo "1 record added";

              mysqli_close($db);
            }
            ?>
        </div>
      </div>
    </div>
  

</body>
</html>
