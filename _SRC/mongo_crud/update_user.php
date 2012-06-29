<?php
	require_once('mongo_config.php');
	
	if(!empty($_GET['name'])){
	$name = $_GET['name'];
	$query = array('name'=>$name)
	;
	
	$person = $collection->findOne($query);
	
	$name = $person['name'];
	$age =  $person['age'];
	$likes =  $person['likes'];
?>

<form action="update_user.php" method="post">
  <p>
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?php echo $name; ?>" readonly>
  </p>
  <p>
    <label for="age">Age:</label>
    <input type="text" name="age" value="<?php echo $age; ?>">
  </p>
  <p>
    <label for="likes">Likes:</label>
    <input type="text" name="likes" value="<?php echo $likes; ?>">
  </p>
  <p>
    <input type="submit" value="Update">
  </p>
</form>
<?php } ?>
<?php 
	if(!empty($_POST)){
		$empty = check_empty($_POST);
		if($empty != 1){
			$name = $_POST['name'];
			$age = $_POST['age'];
			$likes = $_POST['likes'];
		
			$query = array('name'=>$name);
			
			$person = $collection->findOne($query);
			
			$person['age'] = $age;
			$person['likes'] = $likes;
			
			$collection->save($person);
			
			echo 'Update Successful!';
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
