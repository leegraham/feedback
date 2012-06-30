<!--HEAD-->
<?php
	include 'inc/header1.inc';
?>
<title>updateComment</title>
<?php
	include 'inc/header2.inc';
?>


<!--BODY/MENU-->
<?php
	include 'inc/userMenu.inc';
?>


<!--FORM-->
<h3>updateComment</h3>

<?php
	require_once('inc/mongoConfigComments.inc');
	
	if(!empty($_GET['projName'])){
		$projName = $_GET['projName'];
		$query = array('projName'=>$projName
	);
	
	$person = $collection->findOne($query);
	
	$projName = $person['projName'];
	$devName = $person['devName'];
	$slideNum =	$person['slideNum'];
	$revName =	$person['revName'];
	$revEmail =	$person['revEmail'];
	$revComment = $person['revComment'];
	$status = $person['status'];
	$timestamp = $person['timestamp'];
?>
<form action="updateComment.php" method="post">
	  <p>
    <label for="projName">PROJECT NAME:</label>
    <input type="text" name="projName" value="<?php echo $projName; ?>" readonly="readonly">
  </p>
  <p>
    <label for="devjName">DEVELOPER NAME:</label>
    <input type="text" name="devName" value="<?php echo $devName; ?>">
  </p>
  <p>
    <label for="slideNum">SLIDE NUMBER:</label>
    <input type="text" name="slideNum" value="<?php echo $slideNum; ?>">
  </p>
  <p>
    <label for="revName">REVIEWER NAME:</label>
    <input type="text" name="revName" value="<?php echo $revName; ?>">
  </p>
  <p>
    <label for="revEmail">REVIEWER EMAIL:</label>
    <input type="text" name="revEmail" value="<?php echo $revEmail; ?>">
  </p>
  <p>
    <label for="revComment">COMMENT:</label>
    <input type="text" name="revComment" value="<?php echo $revComment; ?>" size="150">
  </p>
  <p>
    <label for="status">STATUS:</label>
    <input type="text" name="status" value="<?php echo $status; ?>">
  </p>
  <p>
    <label for="timestamp">TIMESTAMP:</label>
    <input type="text" name="timestamp" value="<?php echo $timestamp; ?>">
  </p>
  <p>
	<p>
		<input type="submit" value="Save" data-icon="check" data-theme="b">
	</p>
</form>
<?php } ?>
<?php 
if(!empty($_POST)){
		$empty = check_empty($_POST);
		if($empty != 1){
			$projName = $_POST['projName'];
			$devName = $_POST['devName'];
			$slideNum = $_POST['slideNum'];
			$revName = $_POST['revName'];
			$revEmail = $_POST['revEmail'];
			$revComment = $_POST['revComment'];
			$status = $_POST['status'];
			$timestamp = $_POST['timestamp'];
			
			$query = array('projName'=>$projName);
			
			$person = $collection->findOne($query);
				
			$person['devName'] = $devName;
			$person['slideNum'] = $slideNum;
			$person['revName'] = $revName;
			$person['revEmail'] = $revEmail;
			$person['revComment'] = $revComment;
			$person['status'] = $status;
			$person['timestamp'] = $timestamp;
			
			$collection->save($person);
				
			echo 'Comment Update Successful!';
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