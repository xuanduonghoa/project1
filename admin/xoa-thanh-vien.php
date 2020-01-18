<?php if(isset($_GET["username"])){
	require_once("../lib/connection.php");
	 $username=$_GET["username"];
$sql = "delete  FROM users where username='$username'";
            $query = mysqli_query($conn,$sql);
			
header('Location: user.php');
}?>