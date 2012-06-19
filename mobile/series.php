<?php
//error_reporting(E_ALL);
require('../lib/config.php');
require('../lib/lang.php');
require('../lib/functions.php');
connect($PASSWORD_SQL,$DATABASE);
include('inc/header.php'); 
?>
<!DOCTYPE html>
<body> 

<div data-role="page">

	<header data-role="header" class="Serien" data-position="fixed">
		<h1><?php echo series;?></h1>
		<a href="./" data-rel="back"> Back </a>
		<a href="./" class="ui-btn-right" data-icon="home" data-iconpos="notext" data-direction="reverse">Home</a>	
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
								<a href=\"./list_season.php?id_serie=" . $row['id_serie'] . "&name=" . $row['serie_name'] . "\"><img src=\"images/poster_small/s-" . $row['id_serie'] . ".jpg\" />" . $row['serie_name'] . "</a>
							</li>";
                        }
                ?>
            </ul>
        </div>
		<!-- /content -->
	<div data-role="footer">
		<h4> <?php echo $APP_NAME;?> </h4>
	</div>
</div><!-- /page -->

</body>
</html>
