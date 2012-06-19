<?php
error_reporting(E_ALL);
include('inc/header.php'); 
require('lib/config.php');
require('lib/lang.php');
require('lib/functions.php');
connect($PASSWORD_SQL,$DATABASE);
?>
<!DOCTYPE html>
<body> 

<div data-role="page" id="Filme">

    <header data-role="header" data-position="fixed">
        <h1>Filme</h1>
		<a href="./" data-rel="back"> Back </a>
		<a href="./" class="ui-btn-right" data-icon="home" data-iconpos="notext" data-direction="reverse">Home</a>
    </header>
		
    <div data-role="content">
        <ul data-role="listview" id="movies" data-theme="d" data-inset="true" data-filter="true">
            <?php
				$sql_movies = ("SELECT * FROM movies ORDER BY id ASC LIMIT 9");
				$req_movies = mysql_query($sql_movies) or die ('SQL Error '.mysql_error());
 
                while($row = mysql_fetch_array($req_movies))
                {
					echo "
					<li>
						<a href=\"./film_info.php?id_movie=" . $row['id_movie'] . "\"><img src=\"../images/poster_small/" . $row['id_movie'] . ".jpg\" />" . $row['name'] . "</a>
					</li>";
					$id=$row['id'];
                }
            ?>
			<li>
			<div id="more<?php echo $id; ?>" class="custom" >
			<a href="#" id="<?php echo $id; ?>" data-role="button" class="more" >More</a>
			</div>
        </ul>
    </div>
 
	<div data-role="footer">
		<h1> <?php echo $APP_NAME;?> </h1>
	</div>

</div><!-- /page -->

</body>
</html>