<?php
session_start();
if(!isset($_SESSION['username'])){
header('Location: login.php');}
else{
	require_once("../lib/connection.php");
	$username=$_SESSION['username'];
	$sql="select * from users where username='$username'";
		$query = mysqli_query($conn,$sql);
            $data = mysqli_fetch_array($query);
			if($data['level']!=4) header('Location: login.php');
}?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Trang chủ-BKKPI</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>
<script>
b{color: red;
font-size: 16px;
}</script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
     <?php
	 ?>
	 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                       <a class="navbar-brand" href="#"><span><img id="main_text_header_ctl00" src="../images/bk.ico" alt="" style="height:32px;width:32px;">BachKhoa</span>KPI</a>
                        <ul class="user-menu">
                            <li class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
								<?php $sql="select * from users where username='$username'";
		$query = mysqli_query($conn,$sql);
            $data = mysqli_fetch_array($query);
			?>
			<b><?php switch($data["level"]){
				case 1: echo "Admin";break;
				case 2: echo "Sinh viên";break;
				case 3: echo "Phụ huynh";break;
				case 4: echo "Giảng viên";break;}
				?></b>
								<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="hoso.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Hồ sơ</a></li>
                                    <li><a href="login.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Đăng xuất</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                                    
                </div><!-- /.container-fluid -->
            </nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		
		<form><?php $sql="select * from users where username='$username'";
		$query = mysqli_query($conn,$sql);
            $data = mysqli_fetch_array($query);
			?>
			<b><?php 
			if($data['gioitinh']=="Nam") 
		echo "Xin chào thầy ".($data["name"]); else if($data['gioitinh']== "Nu") 
		echo "Xin chào cô ".($data["name"]); else echo "Xin chào thầy (cô) ".($data["name"]);?></b></form>
		<ul class="nav menu">
			<li ><a href="giaodienGV.php"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>Quản lý lớp tín chỉ</a>
			
			</li>
			<li class="active"><a href="qlttgv.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thông tin</a></li>
        </ul>
	</div><!--/.sidebar-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Sửa thông tin tài khoản</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sửa thông tin tài khoản</h1>
				
			</div>
		</div><!--/.row-->
		
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
					
                      <?php
	
		if (isset($_POST["save"])) {
			    	
 			 $name = $_POST["name"];
  			$email = $_POST["email"];
			$cmt=$_POST["cmt"] ; 
			$gioitinh=$_POST["gioitinh"];
			 
		    	$sql = "update users set name = '$name',gioitinh='$gioitinh', email = '$email',  cmt='$cmt' where username = '$username'";
		    	mysqli_query($conn, $sql);?>
				<div class="alert alert-success">
					<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Bạn đã chỉnh sửa thành công</div>
				<?php
				
			  }
		?>
								
                                <form action="qlttsv.php" role="form" method="post">
								 <div class="form-group">
                                    <label>Tên đăng nhập:  <p class="form-control-static"><?php echo $username; ?></p></label>
                                </div>
                                <div class="form-group">
                                    <label>Họ & Tên</label>
                                    <input name="name" required class="form-control" placeholder="Name" value ="<?php echo $data["name"]; ?>">
                                </div>
								<div class="form-group">
									<label>Giới tính</label>
									
									<input name="gioitinh" required type="radio"  value="Nam" <?php if($data["gioitinh"]=="Nam") echo "checked"?>/>Nam
									<input name="gioitinh" required type="radio"  value="Nữ" <?php if($data["gioitinh"]=="Nu") echo "checked"?>/>Nữ
									<input name="gioitinh" required type="radio"  value="Khác" <?php if($data["gioitinh"]=="Khác") echo "checked"?>/>Khác
									
								</div>
								
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" required type="text" class="form-control" placeholder="Email" value ="<?php echo $data["email"]; ?>">
                                </div>
								<div class="form-group">
                                    <label>Số CMT/CCCD</label>
                                    <input name="cmt" required type="text" class="form-control" placeholder="CMT/CCCD" value ="<?php echo $data["cmt"]; ?>">
                                </div>
								                                                              
                                <button name="save" type="submit" class="btn btn-success">Lưu</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
		<!--/.main-->	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-table.js"></script>	
</body>
</html>