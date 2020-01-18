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
		 
		<form><?php  $sql="select * from users where username='$username'";
		$query = mysqli_query($conn,$sql);
            $data = mysqli_fetch_array($query);
			$sql="select * from hocki where curdate() between ngaybd and ngaykt";
 
			?>
			<b><?php 
		echo "Xin chào ".($data["name"]);
$q=mysqli_query($conn,$sql);
 $result=mysqli_fetch_array($q);
 $hocki=$result["hocki"];		?></b></form>
		<ul class="nav menu">
			<li ><a href="index.php"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>Quản lý thời gian biểu</a></li>
			<li ><a href="muctieuht.php"><svg class="glyph stroked pen tip "><use xlink:href="#stroked-notepad"/></svg>Quản lý học tập</a></li>
			<li><a href="kpi.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>KPI học tập</a></li>
			<li ><a href="qlchitieusv.php"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý chi tiêu</a></li>
			<li ><a href="qlttsv.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Sửa thông tin sinh viên</a></li>
			<li ><a href="quanlytk.php"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg>Quản lý tài khoản</a></li>
            <li ><a href="dkht.php"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg>Đăng kí môn học</a></li>
			<li class="active"><a href="ttph.php"><svg class="glyph stroked heart"><use xlink:href="#stroked-heart"/></svg>Phụ huynh</a></li>

        </ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Thông tin phụ huynh</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thông tin phụ huynh</h1>
				
			</div>
		</div><!--/.row-->		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
                      <?php
		require_once("../lib/connection.php");
		    	$sql = "select users.* from users, userph where userph.username=users.username and  sinhvien= '$username' and svxacnhan=1 and phxacnhan=1";
		    	$query =mysqli_query($conn, $sql);
					while($data=mysqli_fetch_array($query)){
		?>
								
                                
								<div>
								 <div class="form-group">
                                    <label>Username:  <p class="form-control-static"><?php echo $data["username"]; ?></p></label>
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
					</div><?php }?>                          
                                
								
		<?php //}
		if(isset($_POST["save"])){
			$ph=$_POST["tkph"];
			$sql="select * from users where username='$ph' and level=3";
			$query=mysqli_query($conn,$sql);
			$num_rows=mysqli_num_rows($query);
			if($num_rows >0){
				$mysql="select * from userph where username='$ph' and sinhvien='$username'";
				$q=mysqli_query($conn,$mysql);
				$row=mysqli_num_rows($q);
				if($row >0){
					$data=mysqli_fetch_array($q);
					if($data["svxacnhan"]<> 1 ){
						
						$my="update userph set svxacnhan=1 where username='$ph' and sinhvien='$username'";
						mysqli_query($conn,$my);
					?> 
					<div class="alert alert-success">Bạn đã xác nhận tài khoản <b><?php echo $ph;?></b> là phụ huynh của mình thành công!</div>
					<?php } else  {
						if($data["phxacnhan"]==1){?>
						<div class="alert alert-warning">Tài khoản <?php echo $ph;?> đã là phụ huynh của bạn!</div>
					<?php } else {?>
					<div class="alert alert-warning">Đang chờ tài khoản <?php echo $ph;?> xác nhận yêu cầu!</div>
					<?php 
				}}} else {						
				$sql="insert into userph (username, sinhvien,svxacnhan) values ('$ph','$username',1)";
				$query=mysqli_query($conn,$sql);
				?>
						<div class="alert alert-warning">Bạn đã gửi yêu cầu xác nhận Tài khoản <?php echo $ph;?> đã là phụ huynh của mình!</div>
	<?php 
		}}else {
			?>
			<div class="alert alert-danger">Tài khoản không tồn tại !</div>
			<?php }
		}?>
		<form action="qlttph.php" role="form" method="post">
			<div class="form-group">
                                    <label>Thêm tài khoản phụ huynh</label>
                                    <input name="tkph" required class="form-control" placeholder="Username">
                                </div>
                                <button name="save" type="submit" class="btn btn-primary">Lưu</button></form>

		
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