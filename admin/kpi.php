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
		
		<form><?php $sql="select * from users where username='$username'";
		$query = mysqli_query($conn,$sql);
            $data = mysqli_fetch_array($query);
			?>
			<b><?php 
		echo ($data["name"]);?></b></form>
		<ul class="nav menu">
				<li ><a href="index.php"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>Quản lý thời gian biểu</a></li>
			<li ><a href="muctieuht.php"><svg class="glyph stroked pen tip "><use xlink:href="#stroked-notepad"/></svg>Quản lý học tập</a></li>
			<li class="active"><a href="kpi.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>KPI học tập</a></li>
			<li ><a href="qlchitieusv.php"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý chi tiêu</a></li>
			<li ><a href="qlttsv.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Sửa thông tin sinh viên</a></li>
			<li ><a href="quanlytk.php"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg>Quản lý tài khoản</a></li>
            <li ><a href="dkht.php"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg>Đăng kí môn học</a></li>
			<li ><a href="ttph.php"><svg class="glyph stroked heart"><use xlink:href="#stroked-heart"/></svg>Phụ huynh</a></li>
 </ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">KPI học tập</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">KPI học tập</h1>
				<h3><?php $date=getdate();
				$ngay =$date['mday']."/".$date['mon']."/".$date['year'];
				date_default_timezone_set("Asia/Bangkok");
				$sql="select * from hocki where curdate() between ngaybd and ngaykt";
 $q=mysqli_query($conn,$sql);
 $result=mysqli_fetch_array($q);
 $hocki=$result["hocki"];
				switch($date['weekday']){
					case "Monday" : $day="Hai"; break;
					case "Tuesday" : $day="Ba"; break;
					case "Wednesday" : $day="Tư"; break;
					case "Thursday" : $day="Năm"; break;
					case "Friday" : $day="Sáu"; break;
					case "Saturday" : $day="Bảy"; break;
					case "Sunday" : $day="Chủ nhật"; break;
				}$dat = date_create("2019-08-25");
	$month=$date['mon'];
 $day_1 = date_format($dat,"Y-m-d") ;
$da=date_create($date['year']."-".$date['mon']."-".$date['mday']);
			
 $day_2 = date_format($da,"Y-m-d") ; //current date
			
 $days = (strtotime($day_2) - strtotime($day_1)) / (60 * 60 * 24*7.0);
 $tuan= ceil($days); 
 echo "Tuần ".$tuan.", ".$day." ngày ".$date['mday']." tháng ".$date['mon']." năm ".$date['year']." ";
	
   				?>
				</h3>
				
			</div>
		</div><!--/.row-->
		
                       <?php
		require_once("../lib/connection.php");
		?>						
			
			<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<table 
                            data-toolbar="#toolbar"
                            data-toggle="table">

						    <thead>
						    <tr>
						        <th data-field="id" data-sortable="true"><b>STT</b></th>
								<th data-field="mahp" data-sortable="true"><b>Mã học phần</b></th>
						        <th data-field="tenhp"  data-sortable="true"><b>Tên học phần</b></th>
								<th data-field="tg" data-sortable="true"><b>Tổng thời gian học (giờ)</b></th>
								<th data-field="gk" data-sortable="true"><b>KPI giữa kì</b></th>
								<th data-field="ck" data-sortable="true"><b>KPI cuối kì</b></th>
								<th data-field="ca" data-sortable="true"><b>KPI cả kì</b></th>
                                </tr>
                            </thead>
                            <tbody>
							<?php            $stt = 1 ;
		
			/* $sql="select distinct d.*,c.*, round(sum(thoigian)/3600, 2) as tongtg  from svdk d,loptc l, courselist c, events t where d.maloptc=l.maloptc and t.title=c.TenHP and t.username=d.masv and l.mahp=c.MaHP and masv='$username' and l.hocki='$hocki' group by t.title";
			$query=mysqli_query($conn,$sql);
			
			
			$mahp=$data["mahp"];
			
			$x=$data["diemqt"];
			$mtdiem=$data["diemgkmt"];
			$fx=($x>=$mtdiem)?1:$x/($mtdiem);
			
			$y=$data["tongtghoc"];
			$tgtc=$data["tghoc"]*8;
			if($y<$tgtc) {
				if($x===10)
				$kpitime=1;
			else $kpitime=$y/($tgtc);}
			else { $kpitime=$$tgtc/($y);}
			$kpi=$fx*$x/10*$kpitime;
			echo $kpi." "; }} */
			$sql="select distinct d.*,c.*, round(sum(thoigian)/3600, 2) as tongtg  from svdk d,loptc l, courselist c, events t where d.maloptc=l.maloptc and t.title=c.TenHP and t.username=d.masv and l.mahp=c.MaHP and masv='$username' and l.hocki='$hocki' group by t.title";
			$query=mysqli_query($conn,$sql);
			while($data=mysqli_fetch_array($query)){
	          ?> 
            <tr>
              <td scope="row"><?php echo $stt++ ?></td>
              <td><?php echo $data["MaHP"]; ?></td>
              <td><?php echo $data["TenHP"]; ?></td>
              <td><?php echo $data["tongtg"]; ?></td>
			  
			  <td><?php 	if(	$data["diemqt"] ){
		
			$x=$data["diemqt"];
			$mtdiem=$data["diemgkmt"];
			$fx=($x>=$mtdiem)?1:$x/($mtdiem);
			
			$y=$data["tongtg"];
			$tgtc=$data["tghoc"];
			if($y<$tgtc) {
				if($x===10)
				$kpitime=1;
			else $kpitime=$y/($tgtc);}
			else { $kpitime=$tgtc/($y);}
			$kpi=$fx*$x/10*$kpitime;
			echo round(100*$kpi,2);}
			else if($data["diemqt"] <=3 )echo $kpi=0;
			?></td>
			 <td><?php 		
if(	$data["diemck"]	 ){
			
			$x=$data["diemck"];
			$mtdiem=$data["diemckmt"];
			$fx=($x>=$mtdiem)?1:$x/($mtdiem);
			
			$y=$data["tongtg"];
			$tgtc=$data["tghoc"];
			if($y<$tgtc) {
				if($x===10)
				$kpitime=1;
			else $kpitime=$y/($tgtc);}
			else { $kpitime=$tgtc/($y);}
			$kpi=$fx*$x/10*$kpitime;
echo round(100*$kpi,2);}
			else if($data["diemck"] <=3 ) echo $kpi=0;
			?></td>
			  <td>
			  <?php 		
			if(	$data["diemck"]	and $data["diemqt"]	 ){
				if(	$data["diemck"]<=3 or $data["diemqt"]	 <=3){
				$kq=0;$kpi=0;} else {
			
			$t=$data["Trongso"];
			$x=$data["diemck"]*$t+$data["diemqt"]*(1-$t);
			$kq=0;
			if($x>=8.5)
			{ $kq=4;}
			else if($x>=8.0) $kq=3.5;
			else if($x>=7.0) $kq=3.0;
			else if($x>=6.5) $kq=2.5;
			else if($x>=5.5) $kq=2.0;
			else if($x>=5.0) $kq=1.5;
			else if($x>=4.0) $kq=1.0;
			else {$kq=0;$kpi=0;}
			$maloptc=$data["maloptc"];
			$s="update svdk set ketqua=$kq where masv='$username' and maloptc ='$maloptc'";
						$q=mysqli_query($conn,$s);
			$mtdiem=$data["diemckmt"]*$t+$data["diemgkmt"]*(1-$t);
			$kqmt=0;
			if($mtdiem>=8.5)
			{ $kqmt=4;}
			else if($mtdiem>=8.0) $kqmt=3.5;
			else if($mtdiem>=7.0) $kqmt=3.0;
			else if($mtdiem>=6.5) $kqmt=2.5;
			else if($mtdiem>=5.5) $kqmt=2.0;
			else if($mtdiem>=5.0) $kqmt=1.5;
			else if($mtdiem>=4.0) $kqmt=1.0;
			else {$kqmt=0;} 
			
			$fx=($kq>=$kqmt)?1:$kq/($kqmt);
			
			$y=$data["tongtg"];
			$tgtc=$data["tghoc"];
			if($y<$tgtc) {
				if($kq===4)
				$kpitime=1;
			else $kpitime=$y/($tgtc);}
			else { $kpitime=$tgtc/($y);}
			$kpi=$fx*$kq/4*$kpitime;
			echo round(100*$kpi,2);}
			}
			?>
			  </td>
			 
			  
          
              
			
            </tr>
			<?php }	?>
			<tr>
			</td>
			</td>
			</td>
			</td>
			<td>
			<td>
			<td>
			<td>
			<td>
			<td>
			</tr>
          </tbody>										
	
                                   
                              
						</table>
						
					 </div>
				</div>
			</div>
			
		</div><!--/.row-->	
		
<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Bar Chart</div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="main-chart" id="bar-chart" height="200" width="600"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-table.js"></script>	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	
	<script>
		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>