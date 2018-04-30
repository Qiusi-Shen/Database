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
        <select class="form-control" name='m_id'><option value=NULL> </option>
        <?php
        require_once('dblib/connect.php');
        $rs = $db->query('SELECT * FROM Movie limit 3');
        while($row = $rs->fetch_assoc())
        {
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
                                $rs = $db->query('SELECT * FROM Actor LIMIT 3');
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

                        <button type="submit" name="submit" class="btn btn-default" value="Submit">Click me!</button>
                    </form>
<?php
    if(isset($_GET['submit']))
    {
        $a_id = mysqli_real_escape_string($db, $_GET['a_id']);
		//$d_id = $_GET['d_id'];
        $m_id = mysqli_real_escape_string($db, $_GET['m_id']);
        $role = mysqli_real_escape_string($db, $_GET['role']);

        $errCheck=false;
        if($m_id=='NULL')
        {
            print 'ERROR: movie wasn\'t be selected<br>';
            $errCheck=true;
        }
        if($a_id=='NULL')
        {
            print 'ERROR: Actor wasn\'t be selected.<br>';
            $errCheck=true;
        }
        if(empty($role))
        {
            print 'ERROR: actor should have role';
            $errCheck=true;
        }
        if(!$errCheck)
        {
            //$query = 'insert into MovieActor (mid, aid, role) values (' . $m_id . ',' . $a_id . ',' . $role .')';
            $query = "insert into MovieActor (mid, aid, role) values ('$m_id','$a_id','$role')";
            $rs = $db->query($query);
            if (!$rs) {
                $errmsg = $db->error;
                print "Query failed: $errmsg <br />";
                exit(1);
            }
            if($db->affected_rows > 0){
                echo "<p><b> Added successfully!</b></p>";

            }
        }


    }
		//$m_id = $_GET['m_id'];
	mysqli_close($db);
?>
            </div>
        </div>
    </div>
    </body>
</html>