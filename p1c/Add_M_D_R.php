<?php
include 'library.php';
$header = generateHeader('CS 143 Project 1c');
print $header;
?>

<div class="container">
      <div class="row">
        <?php
        echo($sideBar);
        ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <form method = 'GET' action='#'>
            <div class="form-group">
                <label for="m_id">Movie Title:</label>
                <select  class="form-control" name='m_id'>
                    <option value=NULL> </option>
                    <?php
                    require_once('dblib/connect.php');
                    //die ('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA');
                    $rs = $db->query('SELECT * FROM Movie LIMIT 3');
                    //print_r($rs); die ('HHHHHHHHHHHHH');

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
                    $rs = $db->query('SELECT * FROM Director LIMIT 3');
                    //print_r($rs); die ('HHHHHHHHHHHHH');
                    while($row = $rs->fetch_assoc()) {
                        echo "<option value=" . $row['id'] . ">" . $row['first'] . " " . $row['last'] . " (" . $row['dob']  .")</option>
                        ";
                    }
                ?>
				</select>
			</div>

			<button type="submit" name="submit" class="btn btn-default" value="Submit">Click me!</button>
        <?php
        if(!empty($_GET['submit']))
        {
            //var_dump(isset(NULL));
           //die ('');exit();
            $m_id = mysqli_real_escape_string($db, $_GET['m_id']);
            $d_id = mysqli_real_escape_string($db, $_GET['d_id']);

            $errCheck=false;

            if($m_id=='NULL')
            {
                print 'ERROR: movie wasn\'t be selected<br>';
                $errCheck=true;
            }
            if($d_id=='NULL')
            {
                print 'ERROR: director wasn\'t be selected<br>';
                $errCheck=true;
            }
            if(!$errCheck)
            {
                $query = "INSERT INTO MovieDirector VALUES ('$m_id', '$d_id');";
                $rs = $db->query($query);

                if($db->affected_rows > 0){
                    echo "<p><b> Added successfully!</b></p>";
                }
            }
        }
        mysqli_close($db);
        ?>
        </form>
        </div>
      </div>
    </div>
    </body>
</html>