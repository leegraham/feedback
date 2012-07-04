<!--HEAD-->
<?php
	include 'inc/header1.inc';
?>
<title>deleteComment</title>
<?php
	include 'inc/header2.inc';
?>


<!--BODY/MENU-->
<div data-role="page" class="type-home">
	<div data-role="header">
    	<a href="viewComments.php" data-icon="arrow-l" data-theme="b">View Comments</a>
		<h1>Delete Comment?</h1>
	</div> 
	
	<div data-role="content">
    	<div class="content-secondary">


<!--FORM-->
<h3>deleteComment</h3>

<?php
	require_once('inc/mongoConfigComments.inc');
	
	if(!empty($_GET['projName'])){
		$projName = $_GET['projName'];
		$query = array('projName'=>$projName
	);
	
	$person = $collectionComm->findOne($query);
	
	$projName = $person['projName'];
	$slideNum =	$person['slideNum'];
	$revComment = $person['revComment'];
	$status = $person['status'];
?>
<form action="deleteComment.php" method="post">
	  <p>
    <label for="projName">PROJECT NAME:</label>
    <input type="text" name="projName" value="<?php echo $projName; ?>" readonly>
  </p>
  <p>
    <label for="slideNum">SLIDE NUMBER:</label>
    <input type="number" name="slideNum" value="<?php echo $slideNum; ?>" readonly>
  </p>
  <p>
    <label for="revComment">COMMENT:</label>
    <input type="text" name="revComment" value="<?php echo $revComment; ?>" size="150" readonly>
  </p>
  <p>
    <label for="status">STATUS:</label>
    <input type="number" name="status" value="<?php echo $status; ?>" readonly>
  </p>
  <p>
	<p>
		<input type="submit" value="Confirm Delete?" data-icon="delete" data-theme="b" onClick="PageRefresh">
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
			$status = '2';
			$timestamp = $_POST['timestamp'];
			
			$query = array('projName'=>$projName);
			
			$person = $collectionComm->findOne($query);
				
			$person['devName'] = $devName;
			$person['slideNum'] = $slideNum;
			$person['revName'] = $revName;
			$person['revEmail'] = $revEmail;
			$person['revComment'] = $revComment;
			$person['status'] = '2';
			$person['timestamp'] = $timestamp;
			
			$collectionComm->save($person);
				
			echo 'Comment Deleted!';
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
	</div>
</div>