<!--HEAD-->
<?php
	include 'inc/header1.inc';
?>
<title>viewProjects</title>
<?php
	include 'inc/header2.inc';
?>


<!--BODY/MENU-->
<?php
	include 'inc/userMenu.inc';
?>

<?php
	require_once('inc/mongoConfigProjects.inc');
	
	$people = $collection->find();
	$people_count = $people->count();
?>
	
<div data-role="header"> 
	<h1>viewProjects (<?php echo $people_count ?>)</h1> 
</div> 


<!--FORM-->
<?php
	if($people_count > 0){
		echo '<label for="select-choice-0" class="select">LABEL:</label><select name="select-choice-0" id="select-choice-1" data-theme="b" data-overlay-theme="a" data-native-menu="false">';
?>
    <?php foreach($people as $v){ ?>
           <option value="<?php echo $v['projName']; ?>"><?php echo $v['projName']; ?></option>
    <?php } ?>
    <?php echo '</select>'; ?>
<?php } ?>


<!--FOOTER-->
<?php
	include 'inc/footer.inc';
?>