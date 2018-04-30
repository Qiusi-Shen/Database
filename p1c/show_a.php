<?php
include 'library.php';
$header = generateHeader('CS143 Project 1c - Actor Information');
print $header;
?>
    <div class="container">
      <div class="row">
        <?php
        echo($sideBar);
        ?>
         <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h3><b> Actor Information Page :</b></h3>
         <hr>
         <?php
         require_once('dblib/connect.php');
         if(!empty($_GET['identifier']))
         {
             $identifier = mysqli_real_escape_string($db, $_GET['identifier']);
             $rs = $db->query("SELECT * FROM Actor where id = '$identifier'");
             $actor = $rs->fetch_assoc();
             $atable = '
                 <h4><b>Actor Information is:</b></h4>
                 <div class="table-responsive">
                   <table class="table table-bordered table-condensed table-hover">
                     <tr><td>Name</td><td>Sex</td><td>Date of Birth</td><td>Date of Death</td></tr>';
              $atable.='<tr><td>'.$actor['first'].' '.$actor['last'].'</td>
                     <td>'.$actor['sex'].'</td><td>'.$actor['dob'].'</td><td>';
                     if($actor['dod']==NULL) $atable.='Still Alive';
                     else
                         $atable.=$actor['dod'];
                     $atable.='</td></tr>';
             $atable.='</table></div>';
             echo $atable;

             $rs=$db->query("SELECT * FROM MovieActor WHERE aid='$identifier'");
             $table='<h4><b>Actor\'s Movies and Role:</b></h4>
                     <div class="table-responsive">
                     <table class="table table-bordered table-condensed table-hover">
                         <tr><td>Role</td><td>Movie Title</td></tr>';
             while($row = $rs->fetch_assoc())
             {
                $table.='<tr><td>'.$row['role'].'</td>';
                $r = $db->query("SELECT id, title FROM Movie WHERE id = '".$row['mid']."'");
                //print_r($r); die("CCCCCCCCCCCCCCCCC");
                $t = $r->fetch_assoc();
                $table.='<td><a href="show_M.php?identifier='.$t['id'].'">'.$t['title'].'</a></td></tr>';
             }
             $table.='</table></div>';
             echo $table;

         }
         ?>
         <hr>
          <label for="search_input">Search:</label>
          <form class="form-group" action="search.php" method ="GET" id="usrform">
              <input type="text" id="search_input"class="form-control" placeholder="Search..." name="result"><br>
              <input type="submit" value="Click Me!" class="btn btn-default" style="margin-bottom:10px">
          </form>
         </div>
      </div>
    </div>


</body>
</html>