
<?php
 session_start();
if(!isset($_SESSION['username'])){
header('Location: login.php');}
else{
	$username=$_SESSION['username'];
} ?><?php

// Connexion à la base de données
require_once('bdd.php');
//echo $_POST['title'];
if (isset($_POST['save']) ){
	
 $title = $_POST['title'];
 $note = $_POST['note'];
 $start = $_POST['start'];
 $end = $_POST['end'];
	$sql = "INSERT INTO events(username ,title,note, start, end) values ('$username','$title','$note' ,'$start', '$end')";
	//$req = $bdd->prepare($sql);
	//$req->execute();
	
	
	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>