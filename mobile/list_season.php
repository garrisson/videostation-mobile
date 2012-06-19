<?php
require('../lib/config.php');
require('../lib/lang.php');
require('../lib/functions.php');
connect($PASSWORD_SQL,$DATABASE);
$id_serie = mysql_real_escape_string($_GET['id_serie']);
$serie_name = mysql_real_escape_string($_GET['name']);
//error_reporting(E_ALL);
?>
<!DOCTYPE html>
<?php include('inc/header.php'); ?>
<body> 

<div data-role="page" id="list_season">

   <header data-role="header" class="<?php echo $serie_name . " feed"; ?>" data-position="fixed">
      <h1><?php echo ucwords($serie_name); ?></h1>
      <a href="./series.php" data-rel="back"> Back </a>
	  <a href="./" class="ui-btn-right" data-icon="home" data-iconpos="notext" data-direction="reverse">Home</a>
  </header><!-- /header -->

		<div data-role="content">
            <ul data-role="listview" data-theme="d" data-inset="true" data-filter="true">
                <?php
						$sql_seasonlist = ("SELECT DISTINCT id_saison, season_nb FROM series WHERE id_serie='".$id_serie."'");
						$req_seasonlist = mysql_query($sql_seasonlist) or die ('SQL Error '.mysql_error());
 
                        while($row = mysql_fetch_array($req_seasonlist))
                        {
							echo "
							<li>
								<a href=\"./list_episodes.php?id_saison=" . $row['id_saison'] . "&season_nb=" . $row['season_nb'] . "\">" . season . " " . $row['season_nb'] . "</a>
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
