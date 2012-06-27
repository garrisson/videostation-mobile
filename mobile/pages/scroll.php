<?php
require('../../lib/config.php');
require('../../lib/functions.php'); 
connect($PASSWORD_SQL,$DATABASE);

$lid = $_GET['lastID'];

if ($lid != '') {
	$lastid=mysql_real_escape_string($lid);
	
	$sql_movies = ("SELECT * FROM movies WHERE id > '$lastid' ORDER BY id ASC LIMIT 10");
	$req_movies = mysql_query($sql_movies) or die ('SQL Error '.mysql_error());
 
    while($row = mysql_fetch_array($req_movies))
        {
		echo "
		<li>
		<a class=\"comment\" id=" . $row['id'] . " href=\"./index.php?s=film_info&id_movie=" . $row['id_movie'] . "\"><img src=\"../images/poster_small/" . $row['id_movie'] . ".jpg\" /><h3>" . $row['name'] . "</h3><p>" . $row['link'] . "</p></a>
		<a href=\"../" . $row['dir'] . "/" . $row['link'] . "\">" . link . "</a>
		</li>";
        }
}
?>