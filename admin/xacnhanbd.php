<?php
session_start();
if(!isset($_SESSION['username'])){
header('Location: login.php');}
else{
	$username=$_SESSION['username'];
}?>

							<?php 
								 require_once("../lib/connection.php");

							if(isset($_GET["mahp"]) and isset($_GET["tuan"]) and isset($_GET["thu"]))	
							{
								$maloptc=$_GET["maloptc"];
							$tuanx=$_GET["tuan"];
							$thux=$_GET["thu"];
							} else echo "err";
							$sql="insert into tgbieu (username, tuan, thu, tennvu, tgbd) values ('$username', '$tuanx','$thux','$maloptc',curtime())";
							$query=mysqli_query($conn, $sql);
							header('Location: tgbieu.php');
							
							?>
							