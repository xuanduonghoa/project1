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
							$sql="update tgbieu set tgkt=curtime(), timehoc=time_to_sec(subtime(curtime(),tgbd)) where  username='$username' and tuan= '$tuanx' and thu='$thux' and tennvu='$maloptc' and mtbd='$giobd'";
							$query=mysqli_query($conn, $sql);
							/* $sql="select mtbd, mtkt,hour(mtbd) giobd, minute(mtbd) phutbd,
							hour(mtkt) giokt, minute(mtkt) phutkt,
							hour(tgbd) giotgbd, minute(tgbd) phuttgbd,
							hour(tgkt) , minute(tgkt) phutbd,  
							from tgbieu  where  username='$username' and tuan= '$tuanx' and thu='$thux' and tennvu='$maloptc' and mtbd='$giobd'";
							$query=mysqli_query($conn, $sql);
							$data=mysqli_fetch_array($query);
							$time=$data[" */
							header('Location: tgbieu.php');
							
							?>
							