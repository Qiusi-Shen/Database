<?php
//$firstname = mysqli_real_escape_string($db, $_GET['fname']);
$db = mysqli_connect('localhost', 'root', 'root', 'TEST');
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

/*
include('library.php');

$header = generateHeader('CS143 Project 1c');
print $header;

$q="SELECT id, title from table ORDER BY title DESC";
$results = mysqli_query($q, $db);
    // debug
    print_r($r);
/*
$options = '';
$counter = 1;
while($row=mysqli_fectch_array($resluts))
{

    $options.='<option value='.$row['id'].'>'.$row['title'].'</option>';
    $counter++;
}
//print $options;
*/
?>



</body>
</html>