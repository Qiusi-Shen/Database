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
        <form method = 'GET' action='#'> 
        <div class="form-group">
        <label for="m_id">Movie Title:</label>
        <select class="form-control" name='m_id'><option value=NULL> </option>
        <?php 
            $db = new mysqli('localhost', 'cs143', '', 'TEST');
                    if($db->connect_errno > 0){
                        die('Error connecting to the database [' . $db->connect_error . ']');
                    }
                    $rs = $db->query('SELECT * FROM Movie');
                    while($row = $rs->fetch_assoc()) {
                            echo "<option value=\"" . $row['id'] . "\">" . $row['title'] . "</option>";
                    }
                ?>
            </select>
        </div>

        <div class="form-group">
                            <label for="a_id" class="">Actor:</label>
                            <select class="form-control" name="a_id">
                            <option value=NULL> </option>
                                <?php 
                                    $db = new mysqli('localhost', 'cs143', '', 'TEST');
                                    if($db->connect_errno > 0){
                                      die('Error connecting to the database [' . $db->connect_error . ']');
                                    }
                                    $rs = $db->query('SELECT * FROM Actor');
                                    while($row = $rs->fetch_assoc()) {
                                        echo "<option value=" . $row['id'] . ">" . $row['first'] . " " . $row['last'] . " (" . $row['dob']  .")</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="role">Role: </label>
                            <input class="form-control" id="role" name="role" type="text">
                        </div>

                        <button type="submit" class="btn btn-default" value="Submit">Click me!</button>
                    </form>
                </div>
            </div>
        </div>

          <div class="container">
            <div class="row">

<?php
		//$firstname = mysqli_real_escape_string($db, $_GET['fname']);
		$db = mysqli_connect('localhost', 'cs143', '', 'TEST');
		 	if($db->connect_errno > 0)
                 { 
                   die('Unable to connect to database [' . $db->connect_error . ']'); 
				 }
				 //$m_id = $_GET['m_id'];
				 $a_id = mysqli_real_escape_string($db, $_GET['a_id']);
				 //$d_id = $_GET['d_id'];
                 $d_id = mysqli_real_escape_string($db, $_GET['d_id']);
                 $role = mysqli_real_escape_string($db, $_GET['role']);
			$query = 'insert into MovieActor (mid, aid, role) values (' . $m_id . ',' . $a_id . ',' . $role .')';
			$rs = $db->query($query);
			if (!$rs) { 
                $errmsg = $db->error;
                print "Query failed: $errmsg <br />";
                exit(1);
            }
			if($db->affected_rows > 0){
				echo "<p><b> Added successfully!</b></p>";
			  }
				mysqli_close($db);
?>
            </div>
        </div>

    </body> 
</html>