<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin-Thêm thành viên</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
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
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Admin <span class="caret"></span></a>
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
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="thanhvien.html"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thành viên</a></li>
			
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="quan_ly_thanh_vien.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Quản lý thành viên</a></li>
				<li class="active">Chỉnh sửa thành viên</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Chỉnh sửa thành viên</h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-8">
							<?php
		require_once("../lib/connection.php");
		if (isset($_POST["save"])) {
			if (isset($_GET["username"])) {
		    	//thực hiện việc lấy thông tin user
		    	$username = $_GET["username"];
			}
		    	
 			 $name = $_POST["name"];
  			$email = $_POST["email"];
			$cmt=$_POST["cmt"] ; 
			$gioitinh=$_POST["gioitinh"];
			 
		    	$sql = "update users set name = '$name',gioitinh='$gioitinh', email = '$email',  cmt='$cmt' where username = '$username'";
		    	mysqli_query($conn, $sql);?>
				<div class="alert alert-success">
					<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Bạn đã chỉnh sửa thành công
				<?php
				
			  }
		?>
								
                                <form action="" role="form" method="post">
								 <div class="form-group">
                                    <label>Mã số sinh viên</label>
                                    <input name="username" required class="form-control" placeholder="<?php $username = $_GET["username"]; echo $username; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Họ & Tên</label>
                                    <input name="name" required class="form-control" placeholder="">
                                </div>
								<div class="form-group">
									<label>Giới tính</label>
									
									<input name="gioitinh" required type="radio"  value="Nam"/>Nam
									<input name="gioitinh" required type="radio"  value="Nữ"/>Nữ
									<input name="gioitinh" required type="radio"  value="Khác"/>Khác
									
								</div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" required type="text" class="form-control">
                                </div>
								<div class="form-group">
                                    <label>Số CMT/CCCD</label>
                                    <input name="cmt" required type="text" class="form-control">
                                </div>
								                                                              
                                <button name="save" type="submit" class="btn btn-success">Lưu</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->	
</body>

</html>
