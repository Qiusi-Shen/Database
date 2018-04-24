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
    
?>

