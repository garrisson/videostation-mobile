<?php
$id_genre = mysql_real_escape_string($_GET['id_genre']);
$genre_name = mysql_real_escape_string($_GET['name']);
connect($PASSWORD_SQL,$DATABASE);
?>
<div data-role="page" id="FilmInfo">

	<header data-role="header" class="<?php echo $genre_name . ""; ?>" data-position="fixed">
		<h1><?php echo ucwords($genre_name); ?></h1>
		<a href="./index.php?s=genres" data-rel="back"> Back </a>
		<a href="./" class="ui-btn-right" data-icon="home" data-direction="reverse">Home</a>
	</header><!-- /header -->

	<div data-role="content">
        <ul data-role="listview" data-theme="d" data-split-theme="d" data-inset="true" data-filter="true">
            <?php
                $sql_list_mov_in_gen = ("SELECT DISTINCT fk_id_genre, fk_id_movie, id_movie, link, dir, name FROM movie_genre LEFT JOIN movies ON(movie_genre.fk_id_movie = movies.id_movie) WHERE fk_id_genre = '".$id_genre."' AND movies.id_movie IS NOT NULL ORDER BY name ASC");
				$req_list_mov_in_gen = mysql_query($sql_list_mov_in_gen) or die ('SQL Error '.mysql_error());
 
                while($row = mysql_fetch_array($req_list_mov_in_gen))
                    {
						echo "
						<li>
							<a href=\"./index.php?s=film_info&id_movie=" . $row['fk_id_movie'] . "\"><img src=\"../images/poster_small/" . $row['fk_id_movie'] . ".jpg\" /><h3>" . $row['name'] . "</h3><p>" . $row['link'] . "</p></a>
							<a href=\"../" . $row['dir'] . "/" . $row['link'] . "\">" . link . "</a>
						</li>";
                    }
            ?>
        </ul>
    </div>
	<!-- /content -->
	<!--footer-->
	<?php include('pages/footer.php'); ?>
</div><!-- /page -->
