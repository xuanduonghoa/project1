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
}
	</script>
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
		<!--<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>-->
		<form><?php $sql="select * from users where username='$username'";
		$query = mysqli_query($conn,$sql);
            $data = mysqli_fetch_array($query);
			?>
			<b><?php 
		echo ($data["name"]);?></b></form>
		<ul class="nav menu">
			<li ><a href="sinhvien.php"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>Quản lý thời gian</a></li>
			<li ><a href="muctieuht.php"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg>Mục tiêu học tập</a></li>
			<li><a href="qlht.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>Quản lý học tập</a></li>
			<li ><a href="muctieuchitieu.php"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg>Mục tiêu chi tiêu</a></li>
			<li class="active"><a href="quanlyct.php"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý chi tiêu</a></li>
			<li><a href="qlttsv.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thông tin sinh viên</a></li>
			<li ><a href="quanlytk.php"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg>Quản lý tài khoản</a></li>
            <li ><a href="dkht.php"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg>Đăng kí môn học</a></li>
        </ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản lý chi tiêu</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quản lý chi tiêu</h1>
				
			</div>
		</div><!--/.row-->
		<!--<div id="toolbar" class="btn-group">
            <a href="add_user.php" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm thành viên
            </a>
        </div>-->
		<div class="form-group">
                                    <label>Học kì</label>
                                    <select name="hocki" class="text-overflow">
                                        <option selected="selected" value="20191" >20191</option>
                                        <option value="20182" >20182</option>
										
										<option value="21081">20181</option>
                                    </select>
                                </div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
					
                      <?php
		require_once("../lib/connection.php");
		$hocki="20191";
		$thang=1;
		$sql="select * from quanlychitieu where username ='$username' and hocki='$hocki' and thang='$thang'";
			 $query=mysqli_query($conn, $sql);
			 $num_rows=mysqli_num_rows($query);
			 $data=mysqli_fetch_array($query);
		if($num_rows>0){
			//if((isset($_POST["edit1"])){
				
			?><div>             <form action="quanlyct.php" role="form" method="post">

								<div class="form-group">
                                    <label>Tiền sinh hoạt</label>
									<p class="form-control-static"><?php echo $data["tiensinhhoat"]; ?></p>
                                </div>
								
                                <div class="form-group">
                                    <label>Tiền học thêm</label>
									<p class="form-control-static"><?php echo $data["tienhocthem"]; ?></p>
                                </div>
								<div class="form-group">
                                    <label>Tiền làm thêm</label>
									<p class="form-control-static"><?php echo $data["tienlamthem"]; ?></p>
                                </div>
								
                                <button name="edit1" type="submit" class="btn btn-success">Sửa</button>
								</div></form>
		<?php }else{
		if (isset($_POST["save1"])) {
			$thang=1;
			
 			 $tiensinhhoat = $_POST["tiensinhhoat1"];
  			$tienhocthem = $_POST["tienhocthem1"];
			$tienlamthem=$_POST["tienlamthem1"] ; 
			 $sql="insert into quanlychitieu (username, hocki,thang,tiensinhhoat,tienhocthem,tienlamthem) values ('$username','$hocki','$thang','$tiensinhhoat','$tienhocthem','$tienlamthem' )";	
		mysqli_query($conn,$sql);}
		    	?>
				
								<div>
                                <form action="quanlyct.php" role="form" method="post">
								<div><legend>Tháng 1
								 
                                <div class="form-group">
                                    <label>Tiền sinh hoạt</label>
                                    <input name="tiensinhhoat1" required class="form-control" placeholder="">
                                </div>
								
                                <div class="form-group">
                                    <label>Tiền học thêm</label>
                                    <input name="tienhocthem1" required type="text" class="form-control" placeholder="">
                                </div>
								<div class="form-group">
                                    <label>Tiền làm thêm</label>
                                    <input name="tienlamthem1" required type="text" class="form-control" placeholder="">
                                </div>
								
                                <button name="save1" type="submit" class="btn btn-success">Lưu</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
								</legend>
                            </div>
							
                        </form></div>
			<?php }
				
				
				$thang=2;
		$sql="select * from quanlychitieu where username ='$username' and hocki='$hocki' and thang='$thang'";
			 $query=mysqli_query($conn, $sql);
			 $num_rows=mysqli_num_rows($query);
			 $data=mysqli_fetch_array($query);
		if($num_rows>0){
			//if((isset($_POST["edit1"])){
				
			?><div>             <form action="quanlyct.php" role="form" method="post">
								<label>Tháng 2</label>

								<div class="form-group">
                                    <label>Tiền sinh hoạt</label>
									<p class="form-control-static"><?php echo $data["tiensinhhoat"]; ?></p>
                                </div>
								
                                <div class="form-group">
                                    <label>Tiền học thêm</label>
									<p class="form-control-static"><?php echo $data["tienhocthem"]; ?></p>
                                </div>
								<div class="form-group">
                                    <label>Tiền làm thêm</label>
									<p class="form-control-static"><?php echo $data["tienlamthem"]; ?></p>
                                </div>
								
                                <button name="edit1" type="submit" class="btn btn-success">Sửa</button>
								</div></form>
		<?php }else{
		if (isset($_POST["save1"])) {
			$thang=2;
			
 			 $tiensinhhoat = $_POST["tiensinhhoat1"];
  			$tienhocthem = $_POST["tienhocthem1"];
			$tienlamthem=$_POST["tienlamthem1"] ; 
			 $sql="insert into quanlychitieu (username, hocki,thang,tiensinhhoat,tienhocthem,tienlamthem) values ('$username','$hocki','$thang','$tiensinhhoat','$tienhocthem','$tienlamthem' )";	
		mysqli_query($conn,$sql);}
		    	?>
				
								<div>
                                <form action="quanlyct.php" role="form" method="post">
								<div><legend>Tháng 2
								 
                                <div class="form-group">
                                    <label>Tiền sinh hoạt</label>
                                    <input name="tiensinhhoat1" required class="form-control" placeholder="">
                                </div>
								
                                <div class="form-group">
                                    <label>Tiền học thêm</label>
                                    <input name="tienhocthem1" required type="text" class="form-control" placeholder="">
                                </div>
								<div class="form-group">
                                    <label>Tiền làm thêm</label>
                                    <input name="tienlamthem1" required type="text" class="form-control" placeholder="">
                                </div>
								
                                <button name="save1" type="submit" class="btn btn-success">Lưu</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
								</legend>
                            </div>
							
                        </form></div>
			<?php }
				
				$thang=3;
		$sql="select * from quanlychitieu where username ='$username' and hocki='$hocki' and thang='$thang'";
			 $query=mysqli_query($conn, $sql);
			 $num_rows=mysqli_num_rows($query);
			 $data=mysqli_fetch_array($query);
		if($num_rows>0){
			//if((isset($_POST["edit1"])){
				
			?><div>             <form action="quanlyct.php" role="form" method="post">
			<label>Tháng 3</label>

								<div class="form-group">
                                    <label>Tiền sinh hoạt</label>
									<p class="form-control-static"><?php echo $data["tiensinhhoat"]; ?></p>
                                </div>
								
                                <div class="form-group">
                                    <label>Tiền học thêm</label>
									<p class="form-control-static"><?php echo $data["tienhocthem"]; ?></p>
                                </div>
								<div class="form-group">
                                    <label>Tiền làm thêm</label>
									<p class="form-control-static"><?php echo $data["tienlamthem"]; ?></p>
                                </div>
								
                                <button name="edit1" type="submit" class="btn btn-success">Sửa</button>
								</div></form>
		<?php }else{
		if (isset($_POST["save1"])) {
			$thang=3;
			
 			 $tiensinhhoat = $_POST["tiensinhhoat1"];
  			$tienhocthem = $_POST["tienhocthem1"];
			$tienlamthem=$_POST["tienlamthem1"] ; 
			 $sql="insert into quanlychitieu (username, hocki,thang,tiensinhhoat,tienhocthem,tienlamthem) values ('$username','$hocki','$thang','$tiensinhhoat','$tienhocthem','$tienlamthem' )";	
		mysqli_query($conn,$sql);}
		    	?>
				
								<div>
                                <form action="quanlyct.php" role="form" method="post">
								<div><legend>Tháng 3
								 
                                <div class="form-group">
                                    <label>Tiền sinh hoạt</label>
                                    <input name="tiensinhhoat1" required class="form-control" placeholder="">
                                </div>
								
                                <div class="form-group">
                                    <label>Tiền học thêm</label>
                                    <input name="tienhocthem1" required type="text" class="form-control" placeholder="">
                                </div>
								<div class="form-group">
                                    <label>Tiền làm thêm</label>
                                    <input name="tienlamthem1" required type="text" class="form-control" placeholder="">
                                </div>
								
                                <button name="save1" type="submit" class="btn btn-success">Lưu</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
								</legend>
                            </div>
							
                        </form></div>
			<?php }
				
				$thang=4;
		$sql="select * from quanlychitieu where username ='$username' and hocki='$hocki' and thang='$thang'";
			 $query=mysqli_query($conn, $sql);
			 $num_rows=mysqli_num_rows($query);
			 $data=mysqli_fetch_array($query);
		if($num_rows>0){
			//if((isset($_POST["edit1"])){
				
			?><div>             <form action="quanlyct.php" role="form" method="post">
<label>Tháng 4</label>
								<div class="form-group">
                                    <label>Tiền sinh hoạt</label>
									<p class="form-control-static"><?php echo $data["tiensinhhoat"]; ?></p>
                                </div>
								
                                <div class="form-group">
                                    <label>Tiền học thêm</label>
									<p class="form-control-static"><?php echo $data["tienhocthem"]; ?></p>
                                </div>
								<div class="form-group">
                                    <label>Tiền làm thêm</label>
									<p class="form-control-static"><?php echo $data["tienlamthem"]; ?></p>
                                </div>
								
                                <button name="edit1" type="submit" class="btn btn-success">Sửa</button>
								</div></form>
		<?php }else{
		if (isset($_POST["save1"])) {
			$thang=4;
			
 			 $tiensinhhoat = $_POST["tiensinhhoat1"];
  			$tienhocthem = $_POST["tienhocthem1"];
			$tienlamthem=$_POST["tienlamthem1"] ; 
			 $sql="insert into quanlychitieu (username, hocki,thang,tiensinhhoat,tienhocthem,tienlamthem) values ('$username','$hocki','$thang','$tiensinhhoat','$tienhocthem','$tienlamthem' )";	
		mysqli_query($conn,$sql);}
		    	?>
				
								<div>
                                <form action="quanlyct.php" role="form" method="post">
								<div><legend>Tháng 4
								 
                                <div class="form-group">
                                    <label>Tiền sinh hoạt</label>
                                    <input name="tiensinhhoat1" required class="form-control" placeholder="">
                                </div>
								
                                <div class="form-group">
                                    <label>Tiền học thêm</label>
                                    <input name="tienhocthem1" required type="text" class="form-control" placeholder="">
                                </div>
								<div class="form-group">
                                    <label>Tiền làm thêm</label>
                                    <input name="tienlamthem1" required type="text" class="form-control" placeholder="">
                                </div>
								
                                <button name="save1" type="submit" class="btn btn-success">Lưu</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
								</legend>
                            </div>
							
                        </form></div>
			<?php }
				
				?>
				
								 
                             
								
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