<?php
$id_episode = mysql_real_escape_string($_GET['id_episode']);
connect($PASSWORD_SQL,$DATABASE);
		$sql_infos = ("SELECT * FROM series WHERE id_episode='".$id_episode."'");
		$req_infos = mysql_query($sql_infos) or die ('SQL Error '.mysql_error());
		
		while($row = mysql_fetch_array($req_infos))
		{
		$poster = $row['poster'];
		$season_nb = $row['season_nb'];
		$episode_nb = $row['episode_nb'];
		$synopsis = $row['synopsis'];
		$trailer = $row['trailer'];
		$name = $row['name'];
		$dir = $row['dir'];
		$link = $row['link'];
		}
?>
<div data-role="page" id="episode_info">

   <header data-role="header" class="<?php echo $name . ""; ?>" data-position="fixed">
      <h1><?php echo ucwords($name); ?></h1>
      <a href="./list_episodes.php" data-rel="back"> Back </a>
	  <a href="./" class="ui-btn-right" data-icon="home" data-direction="reverse">Home</a>
   </header><!-- /header -->

   <div data-role="content">   
	     
      <ul data-role="listview" data-theme="d" data-inset="true">
		<li>
			<center><p><img src="<?php echo ($poster); ?>" alt="<?php echo ucwords($name); ?>"></center></p>
		</li>
		<li>
			&nbsp;<?php echo season;?>: <?php echo ($season_nb); ?><br><br>
			&nbsp;<?php echo episode;?>: <?php echo ($episode_nb); ?>
		</li>
      
		<li>
			<div data-role="collapsible" data-collapsed="true">
				<h3><?php echo synopsis;?></h3>
				<?php echo ($synopsis); ?>
			</div>
		</li>
		<li>
			<div data-role="collapsible" data-collapsed="true">
				<h3><?php echo link;?></h3>
				<a href="<?php echo ($dir); ?>/<?php echo ($link); ?>"><?php echo link;?></a>
			</div>
		</li>
		</ul>
	</div><!-- /content -->

	<!--footer-->
	<?php include('pages/footer.php'); ?>
</div><!-- /page -->
