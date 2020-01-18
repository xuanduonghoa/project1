<?php
session_start();
if(!isset($_SESSION['username'])){
header('Location: login.php');}
else{
	$username=$_SESSION['username'];
}?>

							<?php 
								 require_once("../lib/connection.php");

							if(isset($_GET["maloptc"]) and isset($_GET["tuan"]) and isset($_GET["thu"]) and isset($_GET["giobd"]))	
							{
								$maloptc=$_GET["maloptc"];
							$tuanx=$_GET["tuan"];
							$thux=$_GET["thu"];
							$giobd=$_GET["giobd"];
							} else echo "err";
							$sql="update tgbieu set tgbd =curtime() where username='$username' and tuan='$tuanx' and  thu='$thux'and tennvu='$maloptc' and mtbd='$giobd' ";
							$query=mysqli_query($conn, $sql);
							header('Location: tgbieu.php');
							
							?>
							