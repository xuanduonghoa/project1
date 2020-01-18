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
			<li class="active"><a href="qlctph.php"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý chi tiêu</a></li>
			<li><a href="hoso.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thông tin</a></li>
			<li><a href="ph-sv.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thông tin sinh viên</a></li>
        </ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="qlhtsv.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản lý chi tiêu sinh viên</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quản lý chi tiêu sinh viên</h1>
			
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
		</div>
		
                     
					
	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<label>Số tiền học phí (đơn vị nghìn đồng): </label>
						<?php $sql="select * from hocphisv where username='$sinhvien' and hocki='$hocki'";
						$query = mysqli_query($conn,$sql);
						$num=mysqli_num_rows($query);
            $data = mysqli_fetch_array($query);
			echo ($hocphi=$data["hocphi"]).",000";
			$sql="select * from hocphisv where username='$sinhvien' and hocki='$hocki'";
						$query = mysqli_query($conn,$sql);
						$data = mysqli_fetch_array($query);
						$tong=$data["hpdanop"];
						if( $tong==0) {
							?>
							<div class="alert alert-danger">Sinh viên chưa nộp học phí kì này</div>
						<?php } else {
						if($hocphi-$tong>0) {
						?>
						<div class="alert alert-warning">Sinh viên đã nộp <?php echo $tong;?>,000 tiền học phí kì này! Số tiền còn phải nộp: <?php echo $hocphi-$tong;?>,000</div>
						<?php } else {?>
						<div class="alert alert-success">Sinh viên đã nộp hết học phí kì này</div><?php }}?>
						<?php
						if(isset($_POST["save"])){
							$tien=$_POST["tien"];
							$sql="insert into tienchucap (username, sinhvien, tien,time) values ('$username','$sinhvien','$tien', now())";
							$q=mysqli_query($conn,$sql);
							
						?>
						<div class="alert alert-success">Bạn đã thêm <?php echo $tien;?>000 vào mục tiền chu cấp</div>
						<?php }?>
						<form action="qlctph.php" role="form" method="post">
			<div class="form-group">
                                    <label>Tiền trợ cấp (đơn vị nghìn đồng) </label>
									<input type="number" name="tien" class="form-control" />
									<button name="save" type="submit" class="btn btn-primary">Lưu</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
								</form>
						<table 
                            data-toolbar="#toolbar"
                            data-toggle="table">

						    <thead>
							
						    <tr>
						        <th data-field="id" data-sortable="true"><b>STT</b></th>
								<th data-field="tien" data-sortable="true"><b>Số tiền (nghìn đồng)</b></th>
						        <th data-field="tg"  data-sortable="true"><b>Thời gian</b></th>
						       
								   </tr>
                            </thead>
                            <tbody>
							<?php
            $stt = 1 ; 
			
			 $sql = "SELECT *  FROM tienchucap  where username='$username' and sinhvien='$sinhvien' order by time desc";
            // thực thi câu $sql với biến conn lấy từ file connection.php
            $query = mysqli_query($conn,$sql);
			//$num_rows=mysqli_num_rows($query);
            while ($data = mysqli_fetch_array($query)) {
          ?>
            <tr>
              <td scope="row"><?php echo $stt++ ?></td>
              <td><?php $mahp=$data["tien"]; echo $mahp;  ?></td>
				<td><?php echo $data["time"];?></td>
			</tr>
			<?php }?>
			
					 </div>
				</div>
			</div>
		</div>
		    
	</div>	<!--/.main-->	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-table.js"></script>	
</body>

</html>