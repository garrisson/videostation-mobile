<?php include('inc/header.php'); 
error_reporting(E_ALL);?>
<body> 

<div data-role="page" id="FilmInfo">

   <header data-role="header" class="<?php echo $feedName . " feed"; ?>" data-position="fixed">
      <h1><?php echo ucwords($feedName); ?></h1>
      <a href="./#Genres" data-rel="back"> Back </a>
  </header><!-- /header -->

		<div data-role="content">
            <ul data-role="listview" data-theme="d" data-inset="true" data-filter="true">
                <?php
                    try
                    {
                        $connection = mysql_connect("localhost","root","");
                        mysql_select_db("video", $connection);
                        $result = mysql_query("SELECT DISTINCT fk_id_genre, fk_id_movie, id_movie, name FROM movie_genre LEFT JOIN movies ON(movie_genre.fk_id_movie = movies.id_movie) WHERE fk_id_genre = '".$genres_id."' AND movies.id_movie IS NOT NULL ORDER BY name ASC");
 
                        while($row = mysql_fetch_array($result))
                        {
							echo "<li><a href=\"./feed.php?id_movie=" . $row['fk_id_movie'] . "\"><img src=\"../images/poster_small/" . $row['fk_id_movie'] . ".jpg\" />" . $row['name'] . "</a></li>";
                        }
 
                        mysql_close($connection);
                    }
                    catch(Exception $e)
                    {
                        echo $e->getMessage();
                    }
                ?>
            </ul>
        </div>
		<!-- /content -->
   <div data-role="footer">
      <h4> Videotation </h4>
   </div>
</div><!-- /page -->

</body>
</html>
