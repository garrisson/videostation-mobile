<?php
include('inc/db.php');

$genres_id = mysql_real_escape_string($_GET['id_genre']);

$sql = "select * from movie_genre where fk_id_genre = " . $genres_id;

$sql2 = "select * from genres where id_genre = " . $genres_id;

//Fetch movie name
//$fk_id_movie = "SELECT `fk_id_movie` FROM `movie_genre` WHERE `fk_id_genre` = " . $genres_id;

//$movie_name_sql2 = "select * from movies where id_movie = " . $fk_id_movie;

//$movie_get_data = db_select_single($movie_name_sql2);

//$movie_name = strtolower($movie_get_data['name']);

//
$feed = db_select_single($sql);

$feed2 = db_select_single($sql2);

$feedName = strtolower($feed2['name']);

include('genreData.php');