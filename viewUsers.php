<!--HEAD-->
<?php
	include 'inc/header1.inc';
?>
<title>viewUsers</title>
<?php
	include 'inc/header2.inc';
?>


<!--BODY/MENU-->
<?php
	include 'inc/userMenu.inc';
?>

<?php
	require_once('inc/mongoConfigUsers.inc');
	
	
	$people = $collection->find();
	$people_count = $people->count();
	
?>

<div data-role="header" data-theme="b"> 
	<h1>viewUsers (<?php echo $people_count ?>)</h1> 
</div> 


<!--FORM-->
<?php
	if($people_count > 0){
?>

    <?php foreach($people as $v){ ?>
    
    <div data-role="collapsible" data-theme="c" data-content-theme="d">
	<h3><?php echo $v['name']; ?></h3>
        <p>ID: <?php echo $v['_id']; ?></p>
        <p>NAME: <?php echo $v['name']; ?></p>
        <p>EMAIL: <?php echo $v['email']; ?></p>
        <p>NEWSLETTER: <?php echo $v['newsletter']; ?></p>
        <p>IP: <?php echo $v['ip']; ?></p>
        <p>STATUS: <?php echo $v['status']; ?></p>
        <div data-role="controlgroup" data-type="horizontal">
			<a href="updateUser.php?name=<?php echo $v['name']; ?>" data-role="button" data-icon="plus">Edit</a>
			<a href="updateUser.php?name=<?php echo $v['name']; ?>" data-role="button" data-icon="grid">Delete</a>
		</div>
	</div>

    <?php } ?>
<?php } ?>


<!--FOOTER-->
<?php
	include 'inc/footer.inc';
?>