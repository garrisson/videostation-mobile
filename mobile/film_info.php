<?php
//error_reporting(E_ALL);
require('../lib/config.php');
require('../lib/functions.php');
require('../lib/lang.php');
$id_movie = mysql_real_escape_string($_GET['id_movie']);
connect($PASSWORD_SQL,$DATABASE);
		$sql_infos = ("SELECT * FROM movies WHERE id_movie='".$id_movie."'");
		$req_infos = mysql_query($sql_infos) or die ('SQL Error '.mysql_error());
		
		while($row = mysql_fetch_array($req_infos))
		{
		$length = $row['length'];
		$year = $row['year'];
		$trailer = $row['trailer'];
		$synopsis = $row['synopsis'];
		$name = $row['name'];
		$api = $row['api'];
		$dir = $row['dir'];
		$link = $row['link'];
		}
?>
<!DOCTYPE html>
<?php include('inc/header.php'); ?>
<body> 

<div data-role="page">

   <header data-role="header" class="<?php echo $name . " feed"; ?>" data-position="fixed">
      <h1><?php echo ucwords($name); ?></h1>
      <a href="./movies.php" data-rel="back"> Back </a>
	  <a href="./" class="ui-btn-right" data-icon="home" data-iconpos="notext" data-direction="reverse">Home</a>
   </header><!-- /header -->

   <div data-role="content">   
	     
		<ul data-role="listview" data-theme="d" data-inset="true">
			<li>
				<center><p><img src="../images/poster_small/<?php echo ($id_movie); ?>.jpg" alt="<?php echo ucwords($name); ?>"></center></p>
			</li>
			<li>
			<?php echo length;?>: <?php echo ($length); ?><br>
			<?php echo year;?>: <?php echo ($year); ?>
			</li>
   
			<li><div data-role="collapsible" data-collapsed="true">
				<h3><?php echo synopsis;?></h3>
				<?php echo ($synopsis); ?>
			</div></li>
			<li><div data-role="collapsible" data-collapsed="true">
				<h3><?php echo trailer;?></h3>
				<?php
					if($api == 'Allocine' and !empty($trailer)){
						echo '<div><object type="application/x-shockwave-flash" data="'.$trailer.'" width="420" height="357"><param name="allowFullScreen" value="true"></object></div>';
					}
					elseif(($api == 'TMDb' or $api == 'manual') and !empty($trailer)){
						$codeyoutube = explode('v=',$trailer);
						$codeyoutube = $codeyoutube[1];
						if(strlen($codeyoutube) != 11) {
						$codeyoutube = explode('&',$codeyoutube);
						$codeyoutube = $codeyoutube[0];
						}
					echo '<iframe {max-width:100%;} width="200" height="100" style="margin-left:auto;margin-right:auto;" src="http://www.youtube.de/embed/'.$codeyoutube.'?modestbranding=1&amp;autohide=1&amp;rel=0&amp;" frameborder="0" allowfullscreen></iframe>';
					}
				?>
			</div></li>
		</ul>
   </div><!-- /content -->

   <div data-role="footer">
      <h4> <?php echo $APP_NAME;?> </h4>
   </div>
</div><!-- /page -->

</body>
</html>
