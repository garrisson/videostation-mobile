<?php
connect($PASSWORD_SQL,$DATABASE);
?>
<div data-role="page" id="Genres">
        <div data-role="header" data-position="fixed">
            <h1>Genres</h1>
			<a href="./" data-rel="back"> Back </a>
			<a href="./" class="ui-btn-right" data-icon="home" data-direction="reverse">Home</a>
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
								<a href=\"./index.php?s=list_movies_in_genre&id_genre=" . $row['id_genre'] . "&name=" . $row['name'] . "\">" . $row['name'] . "</a>
							</li>";
                        }
                ?>
            </ul>
        </div>
 
	<!--footer-->
	<?php include('pages/footer.php'); ?>
</div><!-- /page -->

