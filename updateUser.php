<!--HEAD-->
<?php
	include 'inc/header1.inc';
?>
<title>updateUser</title>
<?php
	include 'inc/header2.inc';
?>


<!--BODY/MENU-->
<?php
	include 'inc/userMenu.inc';
?>


<!--FORM-->
<h3>updateUser</h3>

<?php
	require_once('inc/mongoConfigUsers.inc');
	
	if(!empty($_GET['name'])){
		$name = $_GET['name'];
		$query = array('name'=>$name
	);
	
	$person = $collection->findOne($query);
	
	$name = $person['name'];
	$email = $person['email'];
	$password =	$person['password'];
	$newsletter =	$person['newsletter'];
	$ip =	$person['ip'];
	$status =	$person['status'];
?>
<form action="updateUser.php" method="post">
	<p>
		<label for="name">Name:</label>
		<input type="text" name="name" value="<?php echo $name; ?>" readonly>
	</p>
	<p>
		<label for="name">EMAIL:</label>
		<input type="email" name="email" value="<?php echo $email; ?>" required>
	</p>
	<p>
		<label for="password">PASSWORD:</label>
		<input type="password" name="password" value="<?php echo $password; ?>" required>
	</p>
	<p>
		<label for="newsletter">NEWSLETTER:</label>
		<input type="text" name="newsletter" value="<?php echo $newsletter; ?>">
	</p>
	<p>
		<label for="ip">IP:</label>
		<input type="text" name="ip" readonly value="<?php
		//GET USER IP ADDRESS - http://tutorialfeed.net/development/geo-targeting-with-php
		function get_ip(){
			if( !empty( $_SERVER['HTTP_CLIENT_IP'] ) ){
				$ip = $_SERVER['HTTP_CLIENT_IP'];}
					elseif( !empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ){
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];}
					else{$ip = $_SERVER['REMOTE_ADDR'];}echo $ip;}
				get_ip();
	?>"> (read-only)
	</p>
	<p>
		<label for="status">STATUS:</label>
		<input type="number" name="status" value="<?php echo $status; ?>" required>
	</p>
	<p>
		<input type="submit" value="Save" data-icon="check" data-theme="b" onClick="PageRefresh">
	</p>
</form>
<?php } ?>
<?php 
if(!empty($_POST)){
		$empty = check_empty($_POST);
		if($empty != 1){
			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$newsletter = $_POST['newsletter'];
			$ip = $_POST['ip'];
			$status = $_POST['status'];
			
			$query = array('name'=>$name);
			
			$person = $collection->findOne($query);
				
			$person['password'] = $password;
			$person['email'] = $email;
			$person['newsletter'] = $newsletter;
			$person['ip'] = $ip;
			$person['status'] = $status;
			
			$collection->save($person);
				
			echo 'User Update Successful!';
		}
	}
?>
<?php
	function check_empty($ar){
		$empty = 0;
		if(is_array($ar)){
			foreach($ar as $v){
				if(empty($v)){
					$empty = 1;
				}
			}
		}
		return $empty;
	}	
?>


<!--FOOTER-->
<?php
	include 'inc/footer.inc';
?>