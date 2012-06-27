<?php include('inc/header.php'); ?>
<?php
error_reporting(E_ALL);
$time_start = microtime(true);
session_start();
if($_GET['action'] == 'mod' and isset($_POST['pass'])){
	/**if($_POST['oldvideobase'] != $_POST['videobase']){
	$db = mysql_connect("localhost", "root", $_POST['pass']);
	if (!$db) {
    	die('Connexion impossible : ' . mysql_error());
	}
	mysql_select_db($_POST['bdd'],$db);
	$sql_movies = "TRUNCATE TABLE movies";
	$sql_genres = "TRUNCATE TABLE genres";
	$sql_movie_genre = "TRUNCATE TABLE movie_genre";
	mysql_query($sql_movies) or die ('Erreur SQL '.mysql_error());
	mysql_query($sql_genres) or die ('Erreur SQL '.mysql_error());
	mysql_query($sql_movie_genre) or die ('Erreur SQL '.mysql_error());
	mysql_close($db);
	}**/
	$file = fopen('../lib/config.php','w');
	ftruncate($file,0);
	
	$ext = $_POST['ext'];
	$ext = explode(',',$ext);
	$ext_array = 'array(';
	for($i=0;$i<count($ext);$i++){
	$ext_array .= '"'.$ext[$i].'"';
	if($i != (count($ext)-1)) $ext_array .= ',';
	}
	$ext_array .= ')';
	
	$del = $_POST['deletedwords'];
	$del = explode(',',$del);
	$del_array = 'array(';
	for($i=0;$i<count($del);$i++){
	$del_array .= '"'.$del[$i].'"';
	if($i != (count($del)-1)) $del_array .= ',';
	}
	$del_array .= ')';
	
	$hid = $_POST['hiddenfiles'];
	$hid = explode(',',$hid);
	$hid_array = 'array(';
	for($i=0;$i<count($hid);$i++){
	$hid_array .= '"'.$hid[$i].'"';
	if($i != (count($hid)-1)) $hid_array .= ',';
	}
	$hid_array .= ')';
	
	if(empty($_POST['login'])) $login='FALSE';
	else $login='TRUE';
	
	if(empty($_POST['ftp'])) $ftp='FALSE';
	else $ftp='TRUE';
	
	if(empty($_POST['secure'])) $secure='FALSE';
	else $secure='TRUE';
	
	if(empty($_POST['inauto'])) $inauto='FALSE';
	else $inauto='TRUE';
	
	if(empty($_POST['modal'])) $modal='FALSE';
	else $modal='TRUE';
	
	$content_config = '<?php
	$APP_NAME = "'.$_POST['title'].'";
	$VERSION = "'.$_POST['version'].'";
	$PASSWORD_SQL = "'.$_POST['pass'].'";
	$DATABASE = "'.$_POST['bdd'].'";
	$PORT_SYNO = "'.$_POST['port'].'";
	$EXT = '.$ext_array.';
	$HIDDEN_FILES = '.$hid_array.';
	$DELETED_WORDS = '.$del_array.';
	$SERIES_DIR = "'.$_POST['seriesdir'].'";
	$MOVIES_DATABASE = "'.$_POST['videobase'].'" ;
	$SERIES_DATABASE = "'.$_POST['seriebase'].'" ;
	$LANGUAGE = "'.$_POST['lang'].'";
	$SECURE = '.$secure.';
	$LOGIN = '.$login.';
	$MODAL = '.$modal.';
	$FTP = '.$ftp.';
	$INDEXATION_AUTO = '.$inauto.';
?>';
	
	if(fputs($file, $content_config)) $message = 'Konfiguration erfolgreich bearbeitet!';
	else echo 'echec';
}
require_once('../lib/config.php');
require_once('../lib/functions.php');
require_once('../lib/lang.php');
connect($PASSWORD_SQL,$DATABASE);
//login_check($LOGIN,$PORT_SYNO,$SECURE);
//$root = admin($root);
//if(!$root) die (include('login.php'));

?>
<?php //echo round((microtime(true)-$time_start),3);?>
<div data-role="page" id="config">
<!-- HEADER -->
  <header data-role="header" class="config" data-position="fixed">
      <h1>Config</h1>
      <a href="./index.php" data-rel="back"> Back </a>
	  <a href="./" class="ui-btn-right" data-icon="home" data-direction="reverse">Home</a>
  </header>
<!-- /HEADER -->

	<div data-role="content">
		<!-- PARAMETRES DE BASES -->
		<form method="POST" action="test.php?action=mod"><br>
			<?php if(isset($message)) echo '<tr><td colspan="2" style="text-align:center;color:green;">'.$message.'</td></tr>';?>
			<label for="version" ><?php echo version;?></label><br>
			<input type="text" name="version" value=<?php echo "\"".$VERSION."\"";?>><br>
				
			<label for="title" ><?php echo appname;?></label><br>
			<input type="text" name="title" value=<?php echo "\"".$APP_NAME."\"";?>><br>
			
			<label for="login" ><?php echo login;?></label><br>
			<input type="checkbox" name="login" value="login" id="login" class="custom" <?php if($LOGIN) echo 'checked';?>><br>

			<label for="secure" ><?php echo secureconnexion;?></label><br>
			<input type="checkbox" name="secure" value="secure" id="secure" class="custom" <?php if($SECURE) echo 'checked';?>><br>

			<label for="modal" ><?php echo modal;?></label><br>
			<input type="checkbox" name="modal" value="modal" id="modal" class="custom" <?php if($MODAL) echo 'checked';?>><br>

			<label for="ftp" ><?php echo ftp;?></label><br>
			<input type="checkbox" name="ftp" value="ftp" id="ftp" class="custom" <?php if($FTP) echo 'checked';?>><br>

			<label for="inauto" ><?php echo autoindexing;?></label><br>
			<input type="checkbox" name="inauto" value="inauto" id="inauto" class="custom" <?php if($INDEXATION_AUTO) echo 'checked';?>><br>
			

			<fieldset data-role="controlgroup" data-type="horizontal">
			<legend><?php echo dbmovies;?></legend>
			<input type="radio" name="videobase" value="Allocine" id="radio-view-a"<?php if($MOVIES_DATABASE == 'Allocine') echo 'checked';?>>
			<label for="radio-view-a">Filmstarts</label>
			<input type="radio" name="videobase" value="TMDb" id="radio-view-b" <?php if($MOVIES_DATABASE == 'TMDb') echo 'checked';?>>
			<label for="radio-view-b">TMDb</label>
			<input type="hidden" name="oldvideobase" value="<?php echo $MOVIES_DATABASE;?>">
			</fieldset>

			
			
			<fieldset data-role="controlgroup" data-type="horizontal">
			<legend><?php echo dbseries;?></legend>
			<input type="radio" name="seriebase" value="Allocine" id="radio-view-a"<?php if($SERIES_DATABASE == 'Allocine') echo 'checked';?>>
			<label for="radio-view-a">Filmstarts</label>
			<input type="radio" name="seriebase" value="TheTvDb" id="radio-view-b" <?php if($SERIES_DATABASE == 'TheTvDb') echo 'checked';?> disabled>
			<label for="radio-view-b">TheTvDb</label>
			</fieldset>
			
			<label for="lang" class="select"><?php echo lang;?></label><br>
				<select name="lang" id="lang">
					<option value="fr" <?php if($LANGUAGE == 'fr') echo 'selected';?>>Francais</option>
					<option value="en" <?php if($LANGUAGE == 'en') echo 'selected';?>>English</option>
					<option value="de" <?php if($LANGUAGE == 'de') echo 'selected';?>>Deutsch</option>
				</select>

			<label for="seriebase" ><?php echo sqlpass;?>
			<input type="password" name="pass" value=<?php echo "\"".$PASSWORD_SQL."\"";?>>

			<label for="seriebase" ><?php echo dbsql;?>
			<input type="text" name="bdd" value=<?php echo "\"".$DATABASE."\"";?>>
			
			<label for="seriebase" ><?php echo confport;?>
			<input type="text" name="port" value=<?php echo "\"".$PORT_SYNO."\"";?>>
			
			<label for="seriebase" ><?php echo seriesdir;?>
			<input type="text" name="seriesdir" value=<?php echo "\"".$SERIES_DIR."\"";?>>
			
			<label for="seriebase" ><?php echo videoext;?>
			<input type="text" name="ext" value="<?php for($i=0;$i<count($EXT);$i++){echo $EXT[$i];if($i != (count($EXT)-1)) echo ',';}?>">
			
			<label for="seriebase" ><?php echo hidden_files;?>
			<input type="text" size="70" name="hiddenfiles" value="<?php for($i=0;$i<count($HIDDEN_FILES);$i++){echo $HIDDEN_FILES[$i];if($i != (count($HIDDEN_FILES)-1)) echo ',';}?>">
			
			<label for="seriebase" ><?php echo deleted_words;?>
			<input type="text" size="70" name="deletedwords" value="<?php for($i=0;$i<count($DELETED_WORDS);$i++){echo $DELETED_WORDS[$i];if($i != (count($DELETED_WORDS)-1)) echo ',';}?>">
			
			<input type="submit" value="<?php echo update;?>">

		</form>

	</div>

<!--footer-->
<?php include('pages/footer.php'); ?>
</div>