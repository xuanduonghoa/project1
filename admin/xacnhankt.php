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
								$mahp=$_GET["mahp"];
							$tuanx=$_GET["tuan"];
							$thux=$_GET["thu"];
							} else echo "err";
							$sql="update tgbieu set tgkt=curtime(), timehoc=time_to_sec(subtime(curtime(),tgbd)) where  username='$username' and tuan= '$tuanx' and thu='$thux' and tennvu='$maloptc'";
							$query=mysqli_query($conn, $sql);
							
							header('Location: tgbieu.php');
							
							?>
							