<?php
error_reporting(E_ALL);
$time_start = microtime(true);
session_start();
require('../lib/config.php');
require('../lib/functions.php');
require('../lib/lang.php');
login_check($LOGIN,$PORT_SYNO,$SECURE);
if($INSTALL){
if($_GET['action'] == 'login') echo '<script>document.location.href="index.php"</script>';
die (include('INSTALL.php'));
 }
$root = admin($root);
if($LOGIN){ if(empty($_SESSION['user'])) die (include('login.php'));}
?>
<!DOCTYPE html>
<?php include('inc/header.php'); ?>
<body>
		<?PHP
			$includeDir = ".".DIRECTORY_SEPARATOR."pages".DIRECTORY_SEPARATOR;
			$includeDefault = $includeDir."home.php";
			
			if(isset($_GET['s']) && !empty($_GET['s']))
			{
			
				$_GET['s'] = str_replace("\0", '', $_GET['s']);
				$includeFile = basename(realpath($includeDir.$_GET['s'].".php"));
				$includePath = $includeDir.$includeFile;
				
				if(!empty($includeFile) && file_exists($includePath)) 
				{
					include($includePath);
				}
				else 
				{
				include($includeDefault);
				}

			} 
			else 
			{
				include($includeDefault);
			}
		?>
</body>
</html>