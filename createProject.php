<!--HEAD-->
<?php
	include 'inc/header1.inc';
?>
<title>createProject</title>
<?php
	include 'inc/header2.inc';
?>


<!--BODY/MENU-->
<?php
	include 'inc/userMenu.inc';
?>

<div data-role="header"> 
	<h1>createProject</h1> 
</div> 


<!--FORM-->
<?php
	require_once('inc/mongoConfigProjects.inc');
?>

<form action="createProject.php" method="post">
  <p>
    <label for="projName">PROJECT NAME:</label>
    <input type="text" name="projName">
  </p>
  <p>
    <label for="devName">DEVELOPER NAME:</label>
    <input type="text" name="devName">
  </p>
  <p>
    <input type="hidden" name="status" readonly value="1">
  </p>
  <p>
    <input type="submit" value="Save" data-icon="check" data-theme="b">
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
			$status = $_POST['status'];
			
			$person = array('projName'=>$projName, 'devName'=>$devName, 'status'=>$status);
			
			$collection->insert($person);
			echo '<hr/>' . $projName . ' Added!' . '<br/><br/>What would like to do next? ' . '<a href="createProject.php">createProject</a> or <a href="viewProjects.php">viewProjects</a>';
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