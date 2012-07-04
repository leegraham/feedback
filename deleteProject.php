<!--HEAD-->
<?php
	include 'inc/header1.inc';
?>
<title>deleteProject</title>
<?php
	include 'inc/header2.inc';
?>


<!--BODY/MENU-->
<div data-role="page" class="type-home">
	<div data-role="header">
    	<a href="viewProjects.php" data-icon="arrow-l" data-theme="b">View Projects</a>
		<h1>Delete Project?</h1>
	</div> 
	
	<div data-role="content">
    	<div class="content-secondary">


<!--FORM-->
<h3>deleteComment</h3>

<?php
	require_once('inc/mongoConfigProjects.inc');
	
	if(!empty($_GET['projName'])){
		$projName = $_GET['projName'];
		$query = array('projName'=>$projName
	);
	
	$person = $collectionProj->findOne($query);
	
	$projName = $person['projName'];
	$devName = $person['devName'];
	$status = $person['status'];
	
?>
<form action="deleteProject.php" method="post">
	<p>
    	<label for="projName">PROJECT NAME:</label>
    	<input type="text" name="projName" value="<?php echo $projName; ?>" readonly>
  	</p>
  	<p>
    	<label for="devjName">DEVELOPER NAME:</label>
    	<input type="text" name="devName" value="<?php echo $devName; ?>" required>
  	</p>
  	<p>
    	<label for="status">STATUS:</label>
    	<input type="number" name="status" value="<?php echo $status; ?>" required>
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
			$status = '2';
			
			$query = array('projName'=>$projName);
			
			$person = $collectionProj->findOne($query);
				
			$person['devName'] = $devName;
			$person['status'] = '2';
			
			$collectionProj->save($person);
				
			echo 'Project Deleted!';
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