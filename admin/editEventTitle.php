<?php

require_once('bdd.php'); require_once("../lib/connection.php");
if (isset($_POST['delete']) && isset($_POST['id'])){
	
	
	$id = $_POST['id'];
	
	$sql = "DELETE FROM events WHERE id = $id";
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$res = $query->execute();
	if ($res == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}
	
}else
{
	if( isset($_POST['ht']) && isset($_POST['id'])){
	$id = $_POST['id'];
	$ht=$_POST['ht'];
	$sql = "UPDATE events SET   hoanthanh='$ht' WHERE id = $id ";

	
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
	if ((isset($_POST['title']) or isset($_POST['note']) )&& isset($_POST['id'])){
	
	$id = $_POST['id'];
	$title = $_POST['title'];
	//$color = $_POST['color'];
	$ht=$_POST['ht'];
	$note=$_POST['note'];
	$sql = "UPDATE events SET  title = '$title', note='$note' , hoanthanh='$ht' WHERE id = $id ";

	
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
	}
header('Location: index.php');

	
?>
	