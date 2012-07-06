<!--HEAD-->
<?php
	include 'inc/header1.inc';
?>
<title>Forgot</title>
<?php
	include 'inc/header2.inc';
?>

<!--BODY/MENU-->
<?php
	include 'inc/userMenuForgot.inc';
?>


<!--FORM-->
<?php
	require_once('inc/mongoConfigUsers.inc');
?>

<!--BODY/MENU-->
<form action="login.php" method="post">
  <p>
    <label for="email">EMAIL:</label>
    <input type="email" name="email" required placeholder="me@me.com">
  </p>
  <p>
    <input type="hidden" name="ip" readonly value="<?php
		//GET USER IP ADDRESS - http://tutorialfeed.net/development/geo-targeting-with-php
		function get_ip(){
			if( !empty($_SERVER['HTTP_CLIENT_IP'])){
				$ip = $_SERVER['HTTP_CLIENT_IP'];}
					elseif(!empty( $_SERVER['HTTP_X_FORWARDED_FOR'])){
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];}
					else{$ip = $_SERVER['REMOTE_ADDR'];}echo $ip;}
				get_ip();
		?>">
  </p>
  <p>
    <input type="hidden" name="status" readonly value="1" required>
  </p>
  <p>
    <input type="submit" value="Recover Password" data-icon="check" data-theme="b">
  </p>
</form>

<!--FOOTER-->
		 
	</div>
</div>
	<div data-role="footer">
		<h1><a href="http://edustudios.com/projects/feedback-the-captivate-review-tools/" target="_blank">feedback</a> by: <a href="http://edustudios.com" target="_blank">eduStudios</a></h1> 
	</div>
</body>
</html>