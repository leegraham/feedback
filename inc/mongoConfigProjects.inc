<?php
	//CONNECT
	$connProj = new Mongo();
	//DATABASE
	$dbProj = $connProj->edustudios;
	//COLLECTION
	$collectionProj = $dbProj->projects;
?>