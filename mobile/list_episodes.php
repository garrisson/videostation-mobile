<?php
require('../lib/config.php');
require('../lib/lang.php');
require('../lib/functions.php');
connect($PASSWORD_SQL,$DATABASE);
$id_saison = mysql_real_escape_string($_GET['id_saison']);
$season_nb = mysql_real_escape_string($_GET['season_nb']);
//error_reporting(E_ALL);
?>
<!DOCTYPE html>
<?php include('inc/header.php'); ?>
<body> 

<div data-role="page" id="list_episodes">

   <header data-role="header" class="<?php echo $season_nb . " feed"; ?>" data-position="fixed">
      <h1>Staffel <?php echo ucwords($season_nb); ?></h1>
      <a href="./list_season.php" data-rel="back"> Back </a>
	  <a href="./" class="ui-btn-right" data-icon="home" data-iconpos="notext" data-direction="reverse">Home</a>
  </header><!-- /header -->

		<div data-role="content">
            <ul data-role="listview" data-split-theme="d" data-inset="true" data-filter="true">
                <?php
                        $sql_episodelist = ("SELECT DISTINCT id_episode, name, episode_nb, dir, link FROM series WHERE id_saison='".$id_saison."' ORDER BY episode_nb ASC");
						$req_episodelist = mysql_query($sql_episodelist) or die ('SQL Error '.mysql_error());
 
                        while($row = mysql_fetch_array($req_episodelist))
                        {
							echo "
							<li>
								<a href=\"./episode_info.php?id_episode=" . $row['id_episode'] . "\"><h3>" . episode ." " . $row['episode_nb'] . "</h3><p>" . $row['link'] . "</p></a>
								<a href=\"" . $row['dir'] . "/" . $row['link'] . "\">" . link . "</a>
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
