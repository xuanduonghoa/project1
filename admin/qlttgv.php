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
                                    <p class="form-control-static"><?php if( $data["gioitinh"]=="Nu") echo "Nữ" ;else echo $data["gioitinh"]; ?></p>

									
								</div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <p class="form-control-static"><?php echo $data["email"]; ?></p>
                                </div>
								<div class="form-group">
                                    <label>Số CMT/CCCD</label>
                                    <p class="form-control-static"><?php echo $data["cmt"]; ?></p>
                                </div>
								                                                              
                                <a href="suattgv.php"><button class="btn btn-primary">Sửa thông tin</button></a>
                                
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