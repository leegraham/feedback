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
	
	$people = $collectionUser->find();
	$people_count = $people->count();
?>

<div data-role="header" data-theme="b"> 
	<h1>Users (<?php echo $people_count ?>)</h1> 
</div> 


<!--FORM-->
<?php
	if($people_count > 0){
?>

    <?php foreach($people as $v){ ?>
    
    <div data-role="collapsible" data-theme="c" data-content-theme="d">
	<h3><?php echo $v['name']; ?></h3>
        <p>ID: <?php echo $v['_id']; ?></p>
        <p>NAME: <a href="mailto:<?php echo $v['email']; ?>"><?php echo $v['name']; ?></a></p>
        <p>NEWSLETTER: <?php echo $v['newsletter']; ?></p>
        <p>IP: <?php echo $v['ip']; ?></p>
        <p>STATUS: <?php echo $v['status']; ?></p>
        <div data-role="controlgroup" data-type="horizontal">
			<a href="updateUser.php?name=<?php echo $v['name']; ?>" data-role="button"data-icon="gear" data-theme="b">Edit</a>
    		<a href="updateUser.php?name=<?php echo $v['name']; ?>" data-role="button" data-icon="delete" data-rel="dialog" data-transition="slidedown" data-theme="a">Delete</a>
		</div>
	</div>

    <?php } ?>
<?php } ?>


<!--FOOTER-->
<?php
	include 'inc/footer.inc';
?>