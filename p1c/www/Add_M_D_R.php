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
          
<form method = 'GET' action='#'> <div class="form-group"><label for="m_id">Movie Title:</label><select  class="form-control" name='m_id'><option value=NULL> </option>
<?php 
				$db = new mysqli('localhost', 'cs143', '', 'TEST');
				if($db->connect_errno > 0){
					die('Unable to connect to database [' . $db->connect_error . ']');
				}
				$rs = $db->query('SELECT * FROM Movie');
				while($row = $rs->fetch_assoc()) {
						echo "<option value=\"" . $row['id'] . "\">" . $row['title'] . "</option>";
				}
?>
				</select>
</div>

<div class="form-group">
				<label for="d_id" class="">Director:</label>
				<select class="form-control" name="d_id">
				<option value=NULL> </option>
					<?php 
						$db = new mysqli('localhost', 'cs143', '', 'TEST');
						if($db->connect_errno > 0){
							die('Unable to connect to database [' . $db->connect_error . ']');
						}
						$rs = $db->query('SELECT * FROM Director');
						while($row = $rs->fetch_assoc()) {
							echo "<option value=" . $row['id'] . ">" . $row['first'] . " " . $row['last'] . " (" . $row['dob']  .")</option>";
						}
					?>
				</select>
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
				 $m_id = mysqli_real_escape_string($db, $_GET['m_id']);
				 //$d_id = $_GET['d_id'];
				 $d_id = mysqli_real_escape_string($db, $_GET['d_id']);
			$query = "INSERT INTO MovieDirector VALUES (".$m_id.", ".$d_id.");";
			$rs = $db->query($query);
			
			if($db->affected_rows > 0){
				echo "<p><b> Added successfully!</b></p>";
			  }
				mysqli_close($db);
		 
?>
			</div>
        </div>
    </body> 
</html>