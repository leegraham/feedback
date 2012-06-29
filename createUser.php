<?php
	include 'inc/userMenu.inc';
?>

<h3>createUser</h3>

<?php
	require_once('inc/mongoConfigUsers.inc');
?>

<form action="createUser.php" method="post">
  <p>
    <label for="name">NAME:</label>
    <input type="text" name="name">
  </p>
  <p>
    <label for="email">EMAIL:</label>
    <input type="text" name="email">
  </p>
  <p>
    <label for="password">PASSWORD:</label>
    <input type="password" name="password">
  </p>
  <p>
    <input type="hidden" name="newsletter" value="1">
  </p>
  <p>
    <input type="hidden" name="ip" readonly="readonly" value="<?php
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
    <input type="hidden" name="status" readonly="readonly" value="1">
  </p>
  <p>
    <input type="submit" value="Save">
  </p>
</form>
<?php
	if(!empty($_POST)){
		$people = $collection->find();
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
			
			$collection->insert($person);
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
