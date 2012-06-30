<!--HEAD-->
<?php
	include 'inc/header1.inc';
?>
<title>viewComments</title>
<?php
	include 'inc/header2.inc';
?>


<!--BODY/MENU-->
<?php
	include 'inc/userMenu.inc';
?>

<?php
	require_once('inc/mongoConfigComments.inc');
	
	$people = $collection->find();
	$people_count = $people->count();
?>

<div data-role="header"> 
	<h1>viewComments (<?php echo $people_count ?>)</h1> 
</div> 


<!--FORM-->
<?php
	if($people_count > 0){
?>

    <?php foreach($people as $v){ ?>
    
    <div data-role="collapsible" data-theme="c" data-content-theme="d">
	<h3><?php echo $v['projName']; ?></h3>
        <p>ID: <?php echo $v['_id']; ?></p>
        <p>PROJECT NAME: <?php echo $v['projName']; ?></p>
        <p>DEVELOPER NAME: <?php echo $v['devName']; ?></p>
        <p>SLIDE NUMBER: <?php echo $v['slideNum']; ?></p>
        <p>REVIEWER NAME: <a href="mailto:<?php echo $v['revEmail']; ?>"><?php echo $v['revName']; ?></a></p>
        <p>COMMENT: <?php echo $v['revComment']; ?></p>
        <p>STATUS: <?php echo $v['status']; ?></p>
        <p>TIMESTAMP: <?php echo $v['timestamp']; ?></p>
        <div data-role="controlgroup" data-type="horizontal">
			<a href="updateComment.php?projName=<?php echo $v['projName']; ?>" data-role="button" data-icon="plus">Edit</a>
			<a href="updateComment.php?projName=<?php echo $v['projName']; ?>" data-role="button" data-icon="grid">Delete</a>
		</div>
	</div>

    <?php } ?>
<?php } ?>


<!--FOOTER-->
<?php
	include 'inc/footer.inc';
?>