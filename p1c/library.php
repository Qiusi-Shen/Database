<?php
    error_reporting(E_ALL);
    $Navigation = '<html>
    <head>
    <title>Navigation</title>
    <link rel="stylesheet" type="text/css" href="sideframe.css">
    </head>
        <body>
            <div style="height:50px; background-color:#D7D9DA;">
                <div style="display:block; width:900px; margin:0 auto; padding:15px;">
                <img src="images/home.JPG" width="30" height="28" align="absmiddle">
                <a href="index.php">Navigation</a> |
                <a href="add_actor_director.php">Add Actor or Director</a> |
                <a href="add_movie.php">Add Movie</a> |
                <a href="add_comment.php">Add Comment</a> |
                <a href="contact.php">Contact Us</a>
                </div></div>
        </body>
    </html>';
    
    $sideBar='<div class="col-sm-3 col-md-2 sidebar">
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
    ';

      function generateHeader($title)
      {
        $header = '
        <!DOCTYPE html>
        <html lang="en">
          <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
            <title>CS143 Project 1c</title>

            <!-- Bootstrap -->
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="css/project1c.css" rel="stylesheet">

          <body>
          <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container-fluid">
            <div class="navbar-header navbar-defalt">
              <a class="navbar-brand" href="index.php">CS143 DataBase Query System</a>
            </div>
          </div>
        </nav>';
          return $header;
      }

    function isDate($date)
    {
        return (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $date));
    }
?>

