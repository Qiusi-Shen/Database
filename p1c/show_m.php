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
         <h3><b> Movie Information Page :</b></h3>
         <hr>
         <?php
         if(!empty($_GET['identifier']))
         {
            require_once('dblib/connect.php');
            $identifier = mysqli_real_escape_string($db, $_GET['identifier']);
            $rs = $db->query("SELECT * FROM Movie where id = '$identifier'");
            $movie= $rs->fetch_assoc();
            $mtable = '<h4><b> Movie Information is:</b></h4>';
            $mtable.='Title : '.$movie['title'].'('.$movie['year'].')<br>';
            $mtable.='MPAA Rating : '.$movie['rating'].'<br>';
               $id=$movie['id'];
            $mdrs=$db->query("SELECT * FROM MovieDirector where mid = '$id'");
            $md = $mdrs->fetch_assoc();
               $did = $md['did'];
            $drs=$db->query("select * from Director where id='$did'");
            $d = $drs->fetch_assoc();

            $mgrs = $db->query("select * from MovieGenre where mid ='$id'");
            //var_dump($mgrs);
            //print_r($mgrs);die("FFFFFFFFFFFFFFFFF");
            $gs = $mgrs->fetch_assoc();

            $mtable .= 'Director: '.$d['first'].' '.$d['last'].' ('.$d['dob'].')<br>';
            $mtable .= 'Genre: ';
            $mtable.=$gs['genre'].' ';

            $mtable.='<h4><b> Actors in this Movie:</b></h4>';

            $mars = $db->query("select * from MovieActor where mid = '$id'");



            $mtable .='<div class="table-responsive">
                <table class="table table-bordered table-condensed table-hover">
                  <tr><td>Name</td><td>Role</td></tr>';
            while($ma = $mars->fetch_assoc()) //mid, aid, role
            {
            	  $aid = $ma['aid'];
                $atrs = $db->query("select * from Actor where id = '$aid'");
                while($act=$atrs->fetch_assoc())
                {
                    $id = $act['id'];
                    $first = $act['first'];
                    $last = $act['last'];
                }
                $mtable.='<tr><td><a href="show_a.php?identifier='.$id.'">'.$first.' '.$last.'</a></td><td>'.$ma['role'].'</td></tr>';
            }
            $mtable.='</table>';

            echo($mtable);

            print '<hr>';

            $rev ='<h4><b>User Review :</b></h4>';
            $rvrs = $db->query("select * from Review where mid = '$identifier'");
            if(empty($rvrs))
            {
                $text='<a href=" GiveReview.php?MovieID='.$identifier.'">By now, nobody ever rates this movie. Be the first one to give a review</a>';
                echo($text);
            }
            else
            {
                $totalRating=0;
                $ratingCount=0;
                while($rv =  $rvrs->fetch_assoc())
                {
                    $rev.='<string>'.$rv['name'].'</strong> rates this movie with score ';
                    $rev.= $rv['rating'].' and left a review at '. $rv['time'].'<br>';
                    $rev.='Comment: <br>';
                    $rev.=$rv['comment'];
                    $totalRating+=$rv['rating'];
                    $ratingCount++;
                 }
                 $rev ='Average score for this Movie is '.$totalRating/max($ratingCount, 1).'/5 based on '.$ratingCount.' people\'s reviews<br>
                   <a href="GiveReview.php?MovieID='.$identifier.'">Leave your review!</a><br>';
                 echo($rev);
             }

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