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
             <div class="jumbotron">
                <h2>Welcome to CS143 Query System! (Demo)</h2>
                <br>
    Declariation:
	<br><br>
    <ul>
      <li>This is just a simple demo site created by students Yi Wang and Zhen Feng. Thanks for their work!</li>
      <li>This demo site may not "fully satisfy" 
      all the requirments assigned in the spec. The only purpose of this site is to give
      you a sense. Whenever there is a conflict, the official project spec always prevails.</li>
      <li>Copycat is strongly discouraged. Feel free to beat this demo site.</li>
    </ul>
            </div>

        </div>
      </div>
    </div>
  

</body>
</html>
