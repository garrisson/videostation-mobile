<?php include('inc/header.php'); ?>
<body> 

<div data-role="page">

   <header data-role="header" class="<?php echo $feedName . " feed"; ?>" data-position="fixed">
      <h1><?php echo ucwords($feedName); ?></h1>
      <a href="./#Filme" data-rel="back"> Back </a>
   </header><!-- /header -->

   <div data-role="content">   
	     
      <ul data-role="listview" data-theme="d" data-inset="true">
	  <li><center><p><img src="../images/poster_small/<?php echo ($feed_id); ?>.jpg" alt="<?php echo ucwords($feedName); ?>"></center></p>
                <?php
                    try
                    {
                        $connection = mysql_connect("localhost","root","");
                        mysql_select_db("video", $connection);
                        $result = mysql_query("select * from movies where id_movie='".$feed_id."'");
 
                        while($row = mysql_fetch_array($result))
                        {
                            echo "<li>L&auml;nge: " . $row['length'] . "<br>Jahr: " . $row['year'] . "</li>";
                        }
 
                        mysql_close($connection);
                    }
                    catch(Exception $e)
                    {
                        echo $e->getMessage();
                    }
                ?>
      
	<li><div data-role="collapsible" data-collapsed="true">
		<h3>Zusammenfassung</h3>
		<?php
                    try
                    {
                        $connection = mysql_connect("localhost","root","");
                        mysql_select_db("video", $connection);
                        $result = mysql_query("select * from movies where id_movie='".$feed_id."'");
 
                        while($row = mysql_fetch_array($result))
                        {
                            echo "" . $row['synopsis'] . "";
                        }
 
                        mysql_close($connection);
                    }
                    catch(Exception $e)
                    {
                        echo $e->getMessage();
                    }
                ?>
	</div></li>
	<li><div data-role="collapsible" data-collapsed="true">
		<h3>Trailer</h3>
		<?php
                    try
                    {
                        $connection = mysql_connect("localhost","root","");
                        mysql_select_db("video", $connection);
                        $result = mysql_query("select * from movies where id_movie='".$feed_id."'");
 
                        while($row = mysql_fetch_array($result))
                        {
                            echo "<a href=\"" . $row['trailer'] ."\">Trailer</a>";
                        }
 
                        mysql_close($connection);
                    }
                    catch(Exception $e)
                    {
                        echo $e->getMessage();
                    }
                ?>
	</div></li>
	</ul>
   </div><!-- /content -->

   <div data-role="footer">
      <h4> Videostation </h4>
   </div>
</div><!-- /page -->

</body>
</html>
