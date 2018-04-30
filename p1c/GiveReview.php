<?php
include 'library.php';
$header = generateHeader('CS143 Project 1c - Add new commnet');
print $header;
?>
    <div class="container">
      <div class="row">
        <?php
        echo($sideBar);
        ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h4><b>Add new comment here : </b></h4>
        <?php
        require_once('dblib/connect.php');
        $MovieID = mysqli_real_escape_string($db, $_GET['MovieID']);
        $query = "select * from Movie where id = '$MovieID'";
        $mrs = $db->query($query);
        $m = $mrs->fetch_assoc();
        ?>
        <form method="GET" id="userform">
        <input type="hidden" name="MovieID" value="<?php echo $MovieID;?>">
            <div class="form-group">
                <strong>Movie Title:</strong> <?php echo $m['title']; ?>
            <br>
            <div>
            <div class="form-froup">
                <label for="title">Your name</label>
                <input type="text" name="viewer"class="form-control" value="Mr. Anonymous" id="title">
            </div>
            <div class="form-froup">
                <label for="rating">Rating</label>
                <select  class="form-control" name="score" id="rating">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div class="form-froup">
            <textarea class="form-control" name="comment" rows="5"  placeholder="no more than 500 characters" ></textarea><br>
            </div>
            <button type="submit" name="submit" value="submit" class="btn btn-default">Rating it!</button>
        </form>
        <?php
        //print_r($_GET); die ('');
        if(!empty($_GET['submit']))
        {
            $name = mysqli_real_escape_string($db, $_GET['viewer']);
            $rating = mysqli_real_escape_string($db, $_GET['score']);
            $comment = mysqli_real_escape_string($db, nl2br($_GET['comment']));

                    //echo($name.$rating.$comment); //die ('aaa');
            $q ="INSERT INTO Review (name, rating, comment, mid)
                 VALUES ('$name', $rating, '$comment', $MovieID)";
                //echo($q);die ('aaaa');
            $db->query($q);

            if($db->affected_rows > 0)
            {
              echo "<br>";
              echo "Add Success:";
              echo "<hr>";
              echo 'Thanks for your comment! <a href="Show_m.php?identifier='.$MovieID.'">Go back!</a>';
              echo "<br>";
            }

        }
        ?>
         </div>
      </div>
    </div>

</body>
</html>