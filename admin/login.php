<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>BKKPI-Login</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<style>
h1{
		color: white ;
		background-color: #526D9B}
h2{ color: blue;}
body{
background-color: #526D9B;}

</style>
		
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>

	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading"><h1><b>WELCOME TO BKKPI</b></h1></div>
				<div class="panel-body">
					<div class="alert" ><h2>
					<img id="main_text_header_ctl00" src="../images/login_icon.png" alt="" style="height:32px;width:32px;">
					<b>Đăng nhập</b></h2></div>
					<?php
require_once("../lib/connection.php");
if(isset($_POST["btn_submit"]))
{
	$username= $_POST["username"];
	$password=$_POST["password"];
	$sql="select * from users where username ='$username'";
	$query =mysqli_query($conn, $sql);
	
	$data=mysqli_fetch_array($query);
	$level=$data["level"];

	$username = strip_tags($username);
	$username = addslashes($username);
	$password = strip_tags($password);
	$password = addslashes($password);
	$level= strip_tags($level);
	$level= addslashes($level);
	STATIC $error=0;
if($username==""||$password==""){
	$error=2;
	//echo "Username or password không để trống!!!"; 
}else if($level==3){
	$sql="select * from users where username='$username' and password='$password'";
	$query=mysqli_query($conn, $sql);
	$num_rows= mysqli_num_rows($query);
	if($num_rows==0){
		$error=1;
		//echo "Username or password không đúng!";
	}else{
		
		$_SESSION['username']=$username;
header('Location: qlhtsv.php'); }
	
}else if($level==1)
{
	$sql="select * from users where username='$username' and password='$password' and level='$level'";
	$query=mysqli_query($conn, $sql);
	$num_rows= mysqli_num_rows($query);
	if($num_rows==0){$error=1;
		//echo "Username or password không đúng!";
	}else{
		$_SESSION['username']=$username;
header('Location: user.php'); }
}	else if($level==4)
{
	$sql="select * from users where username='$username' and password='$password' and level='$level'";
	$query=mysqli_query($conn, $sql);
	$num_rows= mysqli_num_rows($query);
	if($num_rows==0){$error=1;
		//echo "Username or password không đúng!";
	}else{
		$_SESSION['username']=$username;
header('Location: giaodienGV.php'); }
}	else{
	$sql="select * from users where username='$username' and password='$password' and level='$level'";
	$query=mysqli_query($conn, $sql);
	$num_rows= mysqli_num_rows($query);
	if($num_rows==0){$error=1;
		//echo "Username or password không đúng!";
	}else{
		$_SESSION['username']=$username;
header('Location: index.php'); }
}
?>
				<div class="alert alert-danger">Tài khoản không hợp lệ !</div>
<?php
};?>

				

					<form role="form" method="post">
						<fieldset>
							<div class="form-group">
							<label>Username</label>
								<input class="form-control" placeholder="Username" name="username" type="username" autofocus>
							</div>
							<div class="form-group">
							<label>Password</label>
								<input class="form-control" placeholder="Mật khẩu" name="password" type="password" value="">
							</div>
							<!--<div class="select">
							<label>Quyền</label>
								<select name="level" class="form-control">
									<option value="1" >Administrator</option>
									<option value="2" >Sinh viên</option>
									<option value="3" >Phụ huynh</option>
									<option value="4">Giảng viên</option>

								</select>
							</div>-->
							<div>
							<button type="submit" class="btn btn-primary" name="btn_submit">Đăng nhập</button>
							</div>
							<div>
							<a href ="add_user.php" ><h5>Bạn chưa có tài khoản?<b> Đăng kí</b></h5></a></div>

						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
</body>

</html>
