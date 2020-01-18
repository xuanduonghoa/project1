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
			<li class="active"><a href="quanlytk.php"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg>Quản lý tài khoản</a></li>
            <li ><a href="dkht.php"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg>Đăng kí môn học</a></li>
			<li ><a href="ttph.php"><svg class="glyph stroked heart"><use xlink:href="#stroked-heart"/></svg>Phụ huynh</a></li>
 </ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản lý tài khoản</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quản lý tài khoản</h1>
				<h4><?php
				date_default_timezone_set("Asia/Bangkok");
				$sql="select * from hocki where curdate() between ngaybd and ngaykt";
 $q=mysqli_query($conn,$sql);
 $result=mysqli_fetch_array($q);
 $hocki=$result["hocki"];
				$date=getdate();
				$ngay =$date['mday']."/".$date['mon']."/".$date['year'];
				
				switch($date['weekday']){
					case "Monday" : $day="Thứ hai";$thu=2; break;
					case "Tuesday" : $day="Thứ ba"; $thu=3; break;
					case "Wednesday" : $day="Thứ tư";$thu=4;  break;
					case "Thursday" : $day="Thứ năm";$thu=5;   break;
					case "Friday" : $day="Thứ sáu"; $thu=6;  break;
					case "Saturday" : $day="Thứ bảy";$thu=7;   break;
					case "Sunday" : $day="Chủ nhật"; $thu=8;  break;
				}
	
	$dat = date_create("2019-08-25");
	$month=$date['mon'];
 $day_1 = date_format($dat,"Y-m-d") ;
$da=date_create($date['year']."-".$date['mon']."-".$date['mday']);
			
 $day_2 = date_format($da,"Y-m-d") ; //current date
			
 $days = (strtotime($day_2) - strtotime($day_1)) / (60 * 60 * 24*7.0);
 $tuan= ceil($days); 
 echo "Tuần ".$tuan.", ".$day." ngày ".$date['mday']." tháng ".$date['mon']." năm ".$date['year']." ";
	?>
				</h4>
				
			</div>
		</div><!--/.row-->
		
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
					
                       <?php 
		if (isset($_POST["btn_submit"])) {
  			//lấy thông tin từ các form bằng phương thức POST
			$sql="select * from users where username='$username'";
			$query=mysqli_query($conn, $sql);
			$data=mysqli_fetch_array($query);
			$password=$data["password"];
			$expassword=$_POST["expassword"];
  			$repassword=$_POST["repassword"];
			  if($password <> $expassword){?>
					<div class="alert alert-danger">Bạn vui lòng nhập đúng lại password!!!!</div>
			<?php } else{
  					// Kiểm tra tài khoản đã tồn tại chưa
		    	$sql = "update users set password='$repassword' where username = '$username'";

						
					    // thực thi câu $sql với biến conn lấy từ file connection.php
   						mysqli_query($conn,$sql);?>							
						<div class="alert alert-success" role="alert">
					<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Bạn đã thay đổi mật khấu thành công</div>
					<?php
		}		}				  					
			  
	?>
                                <form action="quanlytk.php" role="form" method="post">
								 <div class="form-group">
                                    <label>Mật khẩu cũ</label>
                                    <input name="expassword" required type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu mới</label>
                                    <input name="repassword" required type="password"  class="form-control">
                                </div>
                                <button name="btn_submit" type="submit" class="btn btn-success">Đăng kí</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            
                        </form>
						
                        </div>
						
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
			
					
	</div>	<!--/.main-->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-table.js"></script>	
</body>
</html>