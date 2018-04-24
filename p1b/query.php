<!DOCTYPE html>
<html>
<head>
<title>CS143 Project 1B</title>
</head>
<body>
<p>
<form method="GET">
<textarea name="query" rows="10" cols="50"></textarea>
<br>
<input type = "submit" value = "Submit">
</form>
</p>
<?php
if($_GET["query"]){
	$db = mysqli_connect("localhost", "cs143", "", "CS143");
	if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
	  $q = $_GET["query"];
	  if (!($rs = $db->query($q))) {
    $errmsg = $db->error;
    print "Query failed: $errmsg <br />";
    exit(1);
}
	//$q = "SELECT * from Movie";
	print("<table border=\"1\">");
		print("<tr>");
	if($r = mysqli_query($db, $q)){
		$fieldinfo = mysqli_fetch_fields($r);
		foreach($fieldinfo as $val){
			print("<th>$val->name</th>");
		}
		print("</tr>");
	}
	//print_r($r);
	//print "<br>";
	//var_dump($r);
	
	while($row = mysqli_fetch_row($r)){
		print("<tr>");
		foreach($row as $value){
			if($value==NULL)
				$value="N/A";
			print("<td>$value</td>");
		}
		print("</tr>");
	}

	while($row = mysqli_fetch_array($r))
	{
		print_r($row); print "<br>";
		print $row['last'].' '.$row['first'].' '.$row['sex'].'<br>';
		//print "<br>";
	}
}
	//if($db)
	//	print 'con';
	//else
	//	print 'no';
?>
</html>


