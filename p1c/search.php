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
            <h3><b> Searching Page :</b></h3>
            <hr>
            <label for="search_input">Search:</label>
            <form class="form-group" method ="GET" id="usrform">
              <input type="text" id="search_input"class="form-control" placeholder="Search..." name="result"><br>
              <input type="submit" value="Click Me!"class="btn btn-default" style="margin-bottom:10px">
            </form>
            <!--php query start from here -->
            <?php
            if(!empty($_GET['result']))
            {
                require_once('dblib/connect.php');
                $result= mysqli_real_escape_string($db, $_GET['result']);
                $q = "Select id, last, first, dob FROM Actor 
                      WHERE last LIKE '%$result%' OR first LIKE '%$result%'
                      ORDER BY last ASC";
                //print_r($q); die('HHHHHHHHHHHHH');
                $rs = $db->query($q);
                //print_r($rs); //die('JJJJJJJJJJJJJJJJJJJ');
                $table='<h4><b>matching Actors are:</b></h4>
                   <div class="table-responsive">
                   <table class="table table-bordered table-condensed table-hover">
                      <tr><td>Name</td><td>Date of Birth</td></tr>
                   ';
                while($row=$rs->fetch_assoc())
                {
                    $table.='<tr><td><a href=show_a.php?identifier='.$row['id'].'>'.$row['first'].' '.$row['last'].'</a></td>
                    <td><a href=show_a.php?identifier='.$row['id'].'>'.$row['dob'].'</a></td><tr>';
                }
                $table.='</table>';
                echo $table;
                
                $mq = "SELECT id, title, year from Movie WHERE
                       title LIKE '%$result%' ORDER BY title ASC";
                
                // print_r($mq); die("UUUUUUUUUUUUUUUUUUU");
                
                $mrs = $db->query($mq);
                
               //print_r($mrs); die("UUUUUUUUUUUUUUUUUUU");
                
                $mtable ='<h4><b>matching Movie are:</b></h4>
                  <div class="table-responsive">
                  <table class="table table-bordered table-condensed table-hover">
                  <tr><td>title</td><td>year</td></tr>
                ';
                
                while($row=$mrs->fetch_assoc())
                {
                    $mtable.='<tr><td><a href=show_m.php?identifier='.$row['id'].'>'.$row['title'].'</a></td>
                    <td><a href=show_m.php?identifier='.$row['id'].'>'.$row['year'].'</a></td><tr>';
                }
                $mtable.='</table>';
                echo $mtable;
            }
            ?>
            <!--php query end from here -->
        </div>
      </div>
    </div>

<?php
/*
<!--php query start from here -->
 
        <tr>
          <td><a href=" Show_A.php?identifier=68632 ">Ana Álvarez</a></td>
          <td><a href=" Show_A.php?identifier=68632 ">1969-11-19</a></td>
        </tr>
        <tr>
          <td><a href=" Show_A.php?identifier=68635 ">Marian Álvarez</a></td>
          <td><a href=" Show_A.php?identifier=68635">1978-04-01</a></td>
        </tr>
    </tbody>
   </table>
</div>
<hr>

</div>
<!--php query end from here -->
*/
?>




</body>
</html>