<?php
	include 'inc/userMenu.inc';
?>

<h3>viewProjects</h3>

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
      <th>NAME</th>
      <th>EMAIL</th>
      <th>NEWSLETTER</th>
      <th>IP</th>
      <th>STATUS</th>
      <th>ACTIONS</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($people as $v){ ?>
    <tr>
      <td><?php echo $v['name']; ?></td>
      <td><?php echo $v['email']; ?></td>
      <td><?php echo $v['newsletter']; ?></td>
      <td><?php echo $v['ip']; ?></td>
      <td><?php echo $v['status']; ?></td>
      <td><a title="<?php echo $v['_id']; ?>" href="updateUser.php?name=<?php echo $v['name']; ?>">EDIT</a> | <a title="<?php echo $v['_id']; ?>" href="updateUser.php?name=<?php echo $v['name']; ?>">DELETE</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<?php } ?>
