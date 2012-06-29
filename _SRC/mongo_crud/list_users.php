<?php
require_once('mongo_config.php');


$people = $collection->find();
$people_count = $people->count();

echo $people_count . ' records found<br/>';

if($people_count > 0){
?>

<table border="1">
<thead>
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Age</th>
		<th>Likes</th>
	</tr>
</thead>
<tbody>
	<?php foreach($people as $v){ ?>
	<tr>
		<td><a href="update_user.php?name=<?php echo $v['name']; ?>"><?php echo $v['id']; ?></a></td>
		<td><?php echo $v['name']; ?></td>
		<td><?php echo $v['age']; ?></td>
		<td><?php echo $v['likes']; ?></td>
	</tr>
	<?php } ?>
</tbody>
</table>
<?php } ?>