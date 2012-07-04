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
	
	$people = $collectionProj->find();
	$people_count = $people->count();
?>
	
<div data-role="header" data-theme="b"> 
	<h1>Projects (<?php echo $people_count ?>)</h1> 
</div> 


<!--FORM-->
<?php
	if($people_count > 0){
?>

    <?php foreach($people as $v){ ?>
    
    <div data-role="collapsible" data-theme="c" data-content-theme="d">
	<h3><?php echo $v['projName']; ?></h3>
        <p>ID: <?php echo $v['_id']; ?></p>
        <p>NAME: <?php echo $v['projName']; ?></p>
        <p>EMAIL: <?php echo $v['devName']; ?></p>
        <p>NEWSLETTER: <?php echo $v['status']; ?></p>
        <p>IP: <?php echo $v['ip']; ?></p>
        <p>STATUS: <?php echo $v['status']; ?></p>
        <div data-role="controlgroup" data-type="horizontal">
			<a href="updateProject.php?projName=<?php echo $v['projName']; ?>" data-role="button" data-icon="gear" data-theme="b">Edit</a>
    		<a href="deletesProject.php?projName=<?php echo $v['projName']; ?>" data-role="button" data-icon="delete" data-rel="dialog" data-transition="slidedown" data-theme="a">Delete</a>
		</div>
	</div>

    <?php } ?>
<?php } ?>


<!--FOOTER-->
<?php
	include 'inc/footer.inc';
?>