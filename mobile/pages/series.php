<?php
connect($PASSWORD_SQL,$DATABASE);
?>
<div data-role="page">

	<header data-role="header" class="Serien" data-position="fixed">
		<h1><?php echo series;?></h1>
		<a href="./" data-rel="back"> Back </a>
		<a href="./" class="ui-btn-right" data-icon="home" data-direction="reverse">Home</a>	
	</header><!-- /header -->

		<div data-role="content">
            <ul data-role="listview" data-theme="d" data-inset="true" data-filter="true">
                <?php
						$sql_series = ("SELECT DISTINCT id_serie, serie_name FROM series");
						$req_series = mysql_query($sql_series) or die ('SQL Error '.mysql_error());
 
                        while($row = mysql_fetch_array($req_series))
                        {
							echo "
							<li>
								<a href=\"./index.php?s=list_season&id_serie=" . $row['id_serie'] . "&name=" . $row['serie_name'] . "\"><img src=\"../images/poster_small/s-" . $row['id_serie'] . ".jpg\" />" . $row['serie_name'] . "</a>
							</li>";
                        }
                ?>
            </ul>
        </div>
		<!-- /content -->
<!--footer-->
<?php include('pages/footer.php'); ?>
</div><!-- /page -->
