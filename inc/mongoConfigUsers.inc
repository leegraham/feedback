<?php
	//CONNECT
	$connUser = new Mongo();
	//DATABASE
	$dbUser = $connUser->edustudios;
	//COLLECTION
	$collectionUser = $dbUser->users;
?>