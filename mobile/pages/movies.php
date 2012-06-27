<?php
connect($PASSWORD_SQL,$DATABASE);
?>	
    <div data-role="page" id="Movies">
        <div data-role="header" data-position="fixed">
            <h1>Movies</h1>
			<a href="./" data-rel="back"> Back </a>
			<a href="./" class="ui-btn-right" data-icon="home" data-direction="reverse">Home</a>
    </div>	
    <div data-role="content" id="movies">
        <ul data-role="listview" id="movies" data-theme="d" data-split-theme="d" data-inset="true" data-filter="true">
            <?php
				$sql_movies = ("SELECT * FROM movies ORDER BY id ASC LIMIT 20");
				$req_movies = mysql_query($sql_movies) or die ('SQL Error '.mysql_error());
 
                while($row = mysql_fetch_array($req_movies))
                {
					echo "
					<li>
						<a class=\"comment\" id=" . $row['id'] . " href=\"./index.php?s=film_info&id_movie=" . $row['id_movie'] . "\"><img src=\"../images/poster_small/" . $row['id_movie'] . ".jpg\" /><h3>" . $row['name'] . "</h3><p>" . $row['link'] . "</p></a>
						<a href=\"../" . $row['dir'] . "/" . $row['link'] . "\">" . link . "</a>
					</li>";
                }
            ?>
			<li>
			<div id="lastPostsLoader" class="lastPostsLoader" >
			</div>
        </ul>
    </div>
<script type="text/javascript">

</script>
<!--footer-->
<?php include('pages/footer.php'); ?>
</div><!-- /page -->