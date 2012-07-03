<?php
	//CONNECT
	$connComm = new Mongo();
	//DATABASE
	$dbComm = $connComm->edustudios;
	//COLLECTION
	$collectionComm = $dbComm->comments;
?>