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

<div data-role="header"> 
	<h1>viewProjects</h1> 
</div> 


<!--FORM-->
<?php
	require_once('inc/mongoConfigProjects.inc');
	
	$people = $collection->find();
	$people_count = $people->count();
	
	echo $people_count . ' records found<br/>';
	
	if($people_count > 0){
?>

<table border="1">
  <thead>
    <tr>
      <th>PROJECT NAME</th>
      <th>DEVELOPER NAME</th>
      <th>STATUS</th>
      <th>ACTIONS</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($people as $v){ ?>
    <tr>
      <td><?php echo $v['projName']; ?></td>
      <td><?php echo $v['devName']; ?></td>
      <td><?php echo $v['status']; ?></td>
      <td><a title="<?php echo $v['_id']; ?>" href="updateProject.php?projName=<?php echo $v['projName']; ?>">EDIT</a> | <a title="<?php echo $v['_id']; ?>" href="updateProject.php?projName=<?php echo $v['projName']; ?>">DELETE</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<?php } ?>


<!--FOOTER-->
<?php
	include 'inc/footer.inc';
?>