<!--HEAD-->
<?php
	include 'inc/header1.inc';
?>
<title>createUser</title>
<?php
	include 'inc/header2.inc';
?>


<!--BODY/MENU-->
<?php
	include 'inc/userMenu.inc';
?>

<div data-role="header"> 
	<h1>createUser</h1> 
</div> 


<!--FORM-->
<?php
	require_once('inc/mongoConfigUsers.inc');
?>

<form action="createUser.php" method="post">
  <p>
    <label for="name">NAME:</label>
    <input type="text" name="name" required placeholder="Lee Graham" autofocus>
  </p>
  <p>
    <label for="email">EMAIL:</label>
    <input type="email" name="email" required placeholder="me@me.com">
  </p>
  <p>
    <label for="password">PASSWORD:</label>
    <input type="password" name="password" required placeholder="Minimum 8 characters (1 uppercase letter, 1 lowercase letter, 1 number, 1 special character)">
  </p>
  <p>
    <input type="hidden" name="newsletter" value="1">
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
    <input type="submit" value="Save" data-icon="check" data-theme="b" onClick="PageRefresh">
  </p>
</form>
<?php
	if(!empty($_POST)){
		$people = $collectionUser->find();
		$people_count = $people->count();
		
		$empty = check_empty($_POST);
		if($empty != 1){
			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$newsletter = $_POST['newsletter'];
			$ip = $_POST['ip'];
			$status = $_POST['status'];
			
			$person = array('name'=>$name, 'email'=>$email, 'password'=>$password, 'newsletter'=>$newsletter, 'ip'=>$ip, 'status'=>$status);
			
			$collectionUser->insert($person);
			echo '<hr/>' . $name . ' Added!' . '<br/><br/>What would like to do next? ' . '<a href="createUser.php">createUser</a> or <a href="viewUsers.php">viewUsers</a>';
		}else{
			echo 'Please fill out all the fields!';
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