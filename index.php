<?php
//error_reporting(E_ALL);
$time_start = microtime(true);
session_start();
require('lib/config.php');
require('lib/functions.php');
require('lib/lang.php');
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
            <h1>Videostation Mobile</h1>
        </div>
        <div data-role="content">
            <ul data-role="listview">
                <li>
            <a href="#Filme">Filme</a>
                </li>
				<li>
            <a href="#Genres">Genres</a>
                </li>
            </ul>
        </div>
 
        <div data-role="footer">
            <h1> Videostation </h1>
        </div>
    </div>
 
    <!-- Filme -->
    <div data-role="page" id="Filme">
        <div data-role="header" data-position="fixed">
            <h1>Filme</h1>
			<a href="./" data-rel="back"> Back </a>
        </div>
        <div data-role="content">
            <ul data-role="listview" data-theme="d" data-inset="true" data-filter="true">
                <?php
                    try
                    {
                        $connection = mysql_connect("localhost","root","");
                        mysql_select_db("video", $connection);
                        $result = mysql_query("SELECT * FROM movies ORDER BY name ASC");
 
                        while($row = mysql_fetch_array($result))
                        {
                            //echo "<li><h2>" . $row['name'] . "</h2>" . $row['length'] . "<p class='ui-li-aside'>" . $row['year'] . "<strong></p>";
							echo "<li><a href=\"./feed.php?id_movie=" . $row['id_movie'] . "\"><img src=\"../images/poster_small/" . $row['id_movie'] . ".jpg\" />" . $row['name'] . "</a></li>";
                        }
 
                        mysql_close($connection);
                    }
                    catch(Exception $e)
                    {
                        echo $e->getMessage();
                    }
                ?>
            </ul>
        </div>
 
        <div data-role="footer">
            <h1> Videostation </h1>
        </div>
    </div>
	
 <!-- Genres -->
        <div data-role="page" id="Genres">
        <div data-role="header" data-position="fixed">
            <h1>Genres</h1>
			<a href="./" data-rel="back"> Back </a>
        </div>
        <div data-role="content">
            <ul data-role="listview" data-theme="d" data-inset="true" data-filter="true">
                <?php
				error_reporting(E_ALL);
                    try
                    {
                        $connection = mysql_connect("localhost","root","");
                        mysql_select_db("video", $connection);
                        $result = mysql_query("SELECT * FROM genres");
 
                        while($row = mysql_fetch_array($result))
                        {
							echo "<li><a rel=\"external\" href=\"./genres.php?id_genre=" . $row['id_genre'] . "\">" . $row['name'] . "</a></li>";
                        }
 
                        mysql_close($connection);
                    }
                    catch(Exception $e)
                    {
                        echo $e->getMessage();
                    }
                ?>
            </ul>
        </div>
 
        <div data-role="footer">
            <h1> Videostation </h1>
        </div>
    </div>
</body>
</html>