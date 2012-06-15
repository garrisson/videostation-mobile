<?php
include('inc/db.php');

$feed_id = mysql_real_escape_string($_GET['id_movie']);

$sql = "select * from movies where id_movie = " . $feed_id;

$feed = db_select_single($sql);

$feedName = strtolower($feed['name']);

include('feedData.php');