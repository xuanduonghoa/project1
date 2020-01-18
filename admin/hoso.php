<?php
session_start();
if(!isset($_SESSION['username'])){
header('Location: login.php');}
else{
	$username=$_SESSION['username'];
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
	 require_once("../lib/connection.php");?>
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
                                    <li><a href="login.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Đăng xuất</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                                    
                </div><!-- /.container-fluid -->
            </nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		
		<form><?php $sql="select u1.name nameph, u2.name namesv, sinhvien from users u1, users u2, userph u where u1.username=u.username and u2.username=u.sinhvien and u.username='$username' and u.svxacnhan=1 and phxacnhan=1";
		$query = mysqli_query($conn,$sql);
            $data = mysqli_fetch_array($query);
			
			$sinhvien=$data["sinhvien"];
			?>
			<b><?php 
		echo "Xin chào phụ huynh ".$data["nameph"]; echo "</p>";
		echo "Là phụ huynh của sinh viên ".($data["namesv"]);
		
		?></b></form>
		<ul class="nav menu">
			<li ><a href="qlhtsv.php"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg>Quản lý học tập</a></li>
			<li ><a href="qlctph.php"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý chi tiêu</a></li>
			<li class="active"><a href="hoso.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thông tin</a></li>
			<li><a href="ph-sv.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thông tin sinh viên</a></li>
        </ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="qlhtsv.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản lý thông tin tài khoản</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quản lý thông tin tài khoản</h1>
				
			</div>
		</div><!--/.row-->
		
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
					
                      <?php		
			    	
		    	$sql = "select * from users where username = '$username'";
		    	$query =mysqli_query($conn, $sql);
					$data=mysqli_fetch_array($query);
					
		?>
								
                               
								 <div class="form-group">
                                    <label>Username:  <p class="form-control-static"><?php echo $username; ?></p></label>
                                </div>
                                <div class="form-group">
                                    <label>Họ & Tên</label>
                                    <p class="form-control-static"><?php echo $data["name"]; ?></p>
                              </div>
								<div class="form-group">
									<label>Giới tính</label>
                                    <p class="form-control-static"><?php echo $data["gioitinh"]; ?></p>

									
								</div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <p class="form-control-static"><?php echo $data["email"]; ?></p>
                                </div>
								<div class="form-group">
                                    <label>Số CMT/CCCD</label>
                                    <p class="form-control-static"><?php echo $data["cmt"]; ?></p>
                                </div>
								                                                              
                                <a href="qlttsv.php"><button class="btn btn-primary">Sửa thông tin</button></a>
                                
                            </div>
                       
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