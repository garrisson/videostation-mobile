<?php
require('../lib/config.php');
require('../lib/lang.php');
if($INSTALL === TRUE){
session_unset();
session_destroy();
setcookie('user');
}
?>
<!DOCTYPE html>
<?php include('inc/header.php'); ?>
<body>
<?php
if($INSTALL){
echo '<div style="width:100%;text-align:center;color:red;">'.warning2.'</div>';
}
?>
    <!-- Login -->
    <div data-role="page" id="Login">
        <div data-role="header" data-position="fixed">
            <h1>Login</h1>
        </div>
        <div data-role="content">
        <form method="POST" action="index.php?action=login" data-ajax="false">
		<label for="user" class="ui-hidden-accessible">Username:</label><br>
		<input type="text" name="user" id="user" class="custom" placeholder="Username"/><br>
		<label for="pass" class="ui-hidden-accessible">Password:</label><br>
		<input type="password" name="pass" id="pass" placeholder="Password"/><br>
		<label for="cookie">Set Cookie:</label><br>
		<input type="checkbox" name="cookie" id="cookie" class="custom"/><br>
		<button id="login_submit" type="submit" data-theme="a">Submit</button>
		</form>
        </div>
 
        <div data-role="footer">
            <h1> Videostation </h1>
        </div>
    </div>
</body>
</html>