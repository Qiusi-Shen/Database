<?php
include 'library.php';
$header = generateHeader('CS 143 Project 1c');
print $header;
?>

<?php
$q = "SELECT title,id FROM Movie ORDER BY title"";
$r = mysqli_query($q, $db);
$numrows = mysqli_num_rows($r);
$options = '';
$counter  =1;

if($numrows > 0)
	{
		echo "Movie: ";
		echo "<select name=\"movie\">";
		for($i = 0; $i < $numrows; $i++)
		{
			$row = mysqli_fetch_assoc($r);
			print("<option value= \"%s\">%s</option> ", $row['id'], $row['title']);
		}
		echo "</select>";
	}
	echo "<br><br>";
	$query = "SELECT first, last ,id FROM Actor ORDER BY first";
	$r = mysqli_query($q, $db);
	$numrows = mysqli_num_rows($r);
	if($numrows > 0)
	{
		echo "Actor: ";
		echo "<select name=\"actor\">";
		for($i = 0; $i < $numrows; $i++)
		{
			$row = mysqli_fetch_assoc($r);
			print("<option value= \"%s\">%s %s</option> ", $row['id'], $row['first'], $row['last']);
		}
		echo "</select> ";
	}
?>