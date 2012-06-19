<?php
error_reporting(E_ALL);
require('../lib/config.php');
require('../lib/lang.php');
require('../lib/functions.php');
connect($PASSWORD_SQL,$DATABASE);
include('inc/header.php'); 
?>
<!DOCTYPE html>
<body> 

    <div data-role="page" id="Filme">
        <div data-role="header" data-position="fixed">
            <h1>Filme</h1>
			<a href="./" data-rel="back"> Back </a>
			<a href="./" class="ui-btn-right" data-icon="home" data-iconpos="notext" data-direction="reverse">Home</a>
        </div>
        <div data-role="content">
            <ul data-role="listview" data-theme="d" data-inset="true" data-filter="true">
                <?php
						$sql_genres = ("SELECT * FROM genres");
						$req_genres = mysql_query($sql_genres) or die ('SQL Error '.mysql_error());
 
                        while($row = mysql_fetch_array($req_genres))
                        {
							echo "
							<li>
								<a rel=\"external\" href=\"./list_movies_in_genre.php?id_genre=" . $row['id_genre'] . "&name=" . $row['name'] . "\">" . $row['name'] . "</a>
							</li>";
                        }
                ?>
            </ul>
        </div>
 
        <div data-role="footer">
            <h1> <?php echo $APP_NAME;?> </h1>
        </div>
    </div><!-- /page -->

</body>
</html>