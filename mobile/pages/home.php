    <!-- indexPage -->
<div data-role="page" id="indexPage">
    <div data-role="header" data-position="fixed">
        <h1><?php echo $APP_NAME;?></h1>
		<?php if ($root) echo '<a href="./index.php?s=admin" class="ui-btn-right" data-icon="gear" data-direction="reverse">Config</a>';?>
    </div>
		<div data-role="content">
            <ul data-role="listview">
                <li>
            <a href="index.php?s=movies"><?php echo movies;?></a>
                </li>
				<li>
            <a href="index.php?s=genres"><?php echo genres;?></a>
                </li>
				<li>
            <a href="index.php?s=series"><?php echo series;?></a>
                </li>
            </ul>
        </div>
<!--footer-->
<?php include('pages/footer.php'); ?>
</div>