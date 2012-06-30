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

<div data-role="header"> 
	<h1>viewComments</h1> 
</div> 


<!--FORM-->
<?php
	require_once('inc/mongoConfigComments.inc');
	
	
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
      <th>SLIDE NUMBER</th>
      <th>REVIEWER NAME</th>
      <th>REVIEWER EMAIL</th>
      <th>COMMENT</th>
      <th>STATUS</th>
      <th>TIMESTAMP</th>
      <th>ACTIONS</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($people as $v){ ?>
    <tr>
      <td><?php echo $v['projName']; ?></td>
      <td><?php echo $v['devName']; ?></td>
      <td><?php echo $v['slideNum']; ?></td>
      <td><?php echo $v['revName']; ?></td>
      <td><?php echo $v['revEmail']; ?></td>
      <td><?php echo $v['revComment']; ?></td>
      <td><?php echo $v['status']; ?></td>
      <td><?php echo $v['timestamp']; ?></td>
      <td><a title="<?php echo $v['_id']; ?>" href="updateComment.php?projName=<?php echo $v['projName']; ?>">EDIT</a> | <a title="<?php echo $v['_id']; ?>" href="updateComment.php?projName=<?php echo $v['projName']; ?>">DELETE</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<?php } ?>



<!--FOOTER-->
<?php
	include 'inc/footer.inc';
?>