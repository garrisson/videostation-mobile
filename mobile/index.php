<?php
//error_reporting(E_ALL);
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

    <!-- indexPage -->
    <div data-role="page" id="indexPage">
        <div data-role="header" data-position="fixed">
            <h1><?php echo $APP_NAME;?></h1>
			<a href="./test.php" class="ui-btn-right" data-icon="gear" data-iconpos="notext" data-direction="reverse">Config</a>
        </div>
        <div data-role="content">
            <ul data-role="listview">
                <li>
            <a href="movies.php"><?php echo movies;?></a>
                </li>
				<li>
            <a href="genres.php"><?php echo genres;?></a>
                </li>
				<li>
            <a href="series.php"><?php echo series;?></a>
                </li>
            </ul>
        </div>
 
        <div data-role="footer">
            <h1> <?php echo $APP_NAME;?> </h1>
        </div>
    </div>
</body>
</html>