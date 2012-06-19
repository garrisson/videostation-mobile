<?php
require("lib/config.php");
require("lib/functions.php");
connect($PASSWORD_SQL,$DATABASE);
if(isSet($_POST['lastid']))
{
$lastid=$_POST['lastid'];
$lastid=mysql_real_escape_string($lastid);
$result=mysql_query("select * from movies where id<'$lastid' order by id desc limit 9");
while($row=mysql_fetch_array($result))
{
$id=$row['id'];
$id_movie=$row['id_movie'];
$name=$row['name'];
?>
<li>
<a href="./film_info.php?id_movie=<?php echo $id_movie; ?>"><img src="../images/poster_small/<?php echo $id_movie; ?>.jpg" /><?php echo $name; ?></a>
</li>
<?php
}
?>
<li class="ui-li ui-li-static ui-body-d ui-corner-bottom">
<div id="more<?php echo $lastid+9; ?>" class="custom" >
<a data-theme="c" data-wrapperels="span" data-iconshadow="true" data-shadow="true" data-corners="true" href="#" id="<?php echo $lastid+9; ?>" data-role="button" class="more ui-btn ui-shadow ui-btn-corner-all ui-focus ui-btn-up-c"><span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text">More</span></span></a>
</div>
</li>
<?php
}
?>