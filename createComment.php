<!--HEAD-->
<?php
	include 'inc/header1.inc';
?>
<title>createComment</title>
<?php
	include 'inc/header2.inc';
?>


<!--BODY/MENU-->
<?php
	include 'inc/userMenu.inc';
?>

<div data-role="header"> 
	<h1>createComment</h1> 
</div> 


<!--FORM-->
<?php
	require_once('inc/mongoConfigComments.inc');
?>

<form action="createComment.php" method="post">
  <p>
    <label for="projName">PROJECT NAME:</label>
    <input type="text" name="projName" required autofocus>
  </p>
  <p>
    <label for="devName">DEVELOPER NAME:</label>
    <input type="text" name="devName" required placeholder="Andy Android">
  </p>
  <p>
    <label for="slideNum">SLIDE NUMBER:</label>
    <input type="number" name="slideNum" required placeholder="77">
  </p>
  <p>
    <label for="revName">REVIEWER NAME:</label>
    <input type="text" name="revName" required placeholder="Jon Johnson">
  </p>
  <p>
    <label for="revEmail">REVIEWER EMAIL:</label>
    <input type="email" name="revEmail" required placeholder="jon@johnson.com">
  </p>
  <p>
    <label for="revComment">REVIEWER COMMENT:</label>
    <textarea name="revComment" rows="4" cols="50" required placeholder="Insert your feedback here."></textarea>
  </p>
  <p>
    <input type="hidden" name="status" readonly value="1">
  </p>
  <p>
    <label for="timestamp">TIMESTAMP:</label>
    <input type="text" name="timestamp" value="<?php $date = new DateTime();echo $date->format('Y-m-d H:i:s'); ?>" readonly size="25">
  </p>
  <p>
    <input type="submit" value="Save" data-icon="check" data-theme="b" onClick="PageRefresh">
  </p>
</form>
<?php
	if(!empty($_POST)){
		$people = $collection->find();
		$people_count = $people->count();
		
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
			
			$person = array('projName'=>$projName, 'devName'=>$devName, 'slideNum'=>$slideNum, 'revName'=>$revName, 'revEmail'=>$revEmail, 'revComment'=>$revComment, 'status'=>$status, 'timestamp'=>$timestamp);
			
			$collection->insert($person);
			echo '<hr/>' . $projName . ' Added!' . '<br/><br/>What would like to do next? ' . '<a href="createComment.php">createComment</a> or <a href="viewComments.php">viewComments</a>';
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