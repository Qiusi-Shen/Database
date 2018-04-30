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
                <button type="submit" name="submit" class="btn btn-default">Add!</button            </form>
            <?php
            //print_r($_GET); 
            
              //print_r($_GET); 
              $db = mysqli_connect("localhost", "cs143", "", "TEST");
              if($db->connect_errno > 0)
              { 
                die('Unable to connect to database [' . $db->connect_error . ']'); 
              }
              $q = "SELECT MAX(id) FROM MaxPersonID";
              if (!$rs = $db->query($q)) {
                die('Error: ' . mysqli_error($db));
              }
              //print_r($_GET);
              $infoR = $rs->fetch_row();
              $M_ID= $infoR[0];
              $M_ID =$M_ID+1;
              //$q = "UPDATE MaxPersonID SET id=id+1";
              //$rs = $db->query($q);
              // escape variables for security
              //echo"AAAAAAAAAAAAAAAAA";
              function validDate($date) {
                $t = explode('-', $date);
                return (checkdate($t[1], $t[2], $t[0]));  //mm dd yyyy
              }
              $type = $_GET["identity"];
              $firstname = mysqli_real_escape_string($db, $_GET['fname']);
              $lastname = mysqli_real_escape_string($db, $_GET['lname']);
              $sex = mysqli_real_escape_string($db, $_GET['sex']);
              $dob = mysqli_real_escape_string($db, $_GET['dateb']);
              $dod = mysqli_real_escape_string($db, $_GET['dated']);
              if(empty($firstname)){
                exit(1);
              }
              if(empty($lastname)){
                exit(1);
              }
              if(empty($dod)) {
                $dod = "NULL";
              }
              else if(!validDate($dod)){
                exit(1);
              }
              else {
                $dod = "\"".$dod."\"";
              }
              
              if(empty($dob)) {
                $dob = "NULL";
              }
              else if(!validDate($dob)){
                exit(1);
              }
              else {
                $dob = "\"".$dob."\"";
              }
              if($type == "Actor")
                    $sql = "INSERT INTO Actor VALUES (".$M_ID.", '".$lastname."', '".$firstname."', '".$sex."', ".$dob.", ".$dod.");";
              else if($type == "Director")
                    $sql = "INSERT INTO Director VALUES (".$M_ID.", '".$lastname."', '".$firstname."', ".$dob.", ".$dod.");";
              // if (!mysqli_query($db,$sql)) {
              //   die('Error: ' . mysqli_error($db));
              // }
              if (!$rs = $db->query($sql)) {
                die('Error: ' . mysqli_error($db));
              }
              $idq = "UPDATE MaxPersonID SET id = id+1;";
              if (!$rs = $db->query($idq)) {
                die('Error: ' . mysqli_error($db));
              }
              //print 'Total rows updated: ' . $db->affected_rows;
              //echo "1 record added";
              if($db->affected_rows > 0){
              echo "<br>";
              echo "Add "."$type "."Success:";
              echo "<br>";
              echo "$M_ID "."$lastname "."$firstname "."$dob "."$sex "."$dod";
            }
          else {
            echo "<br>";
            echo "Add "."$type "."FAILED!!";
            echo "<br>";
          }
              mysqli_close($db);
            ?>
        </div>
      </div>
    </div>
  

</body>
</html>