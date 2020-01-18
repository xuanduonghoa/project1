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
			<li  class="active"><a href="muctieuht.php"><svg class="glyph stroked pen tip "><use xlink:href="#stroked-notepad"/></svg>Quản lý học tập</a></li>
			<li><a href="kpi.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>KPI học tập</a></li>
			<li ><a href="qlchitieusv.php"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý chi tiêu</a></li>
			<li ><a href="qlttsv.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Sửa thông tin sinh viên</a></li>
			<li ><a href="quanlytk.php"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg>Quản lý tài khoản</a></li>
            <li ><a href="dkht.php"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg>Đăng kí môn học</a></li>
			<li><a href="ttph.php"><svg class="glyph stroked heart"><use xlink:href="#stroked-heart"/></svg>Phụ huynh</a></li>
  </ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản lý học tập</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quản lý học tập</h1>
				
			</div>
		</div><!--/.row-->
                       <?php
		require_once("../lib/connection.php");
		date_default_timezone_set("Asia/Bangkok");
				$sql="select * from hocki where curdate() between ngaybd and ngaykt";
 $q=mysqli_query($conn,$sql);
 $result=mysqli_fetch_array($q);
 $hocki=$result["hocki"];
		?>
	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
					<?php
					$date=getdate();
					$dat = date_create("2019-08-25");
	$month=$date['mon'];
 $day_1 = date_format($dat,"Y-m-d") ;
$da=date_create($date['year']."-".$date['mon']."-".$date['mday']);
//	$da=$dat = date_create("2019-09-02");		
			
 $day_2 = date_format($da,"Y-m-d") ; //current date
			
 $days = (strtotime($day_2) - strtotime($day_1)) / (60 * 60 * 24*7.0);
 $tuan= ceil($days); 		?>
 <?php 
								if (isset($_POST["btn_gk"])) {
  			$diem=$_POST["diemgk"];
			$maloptc=$_POST["maloptc"];
			
					if($diem <0 and $diem>=10){
						?>
						<div class="alert alert-danger">Vui lòng nhập đúng điểm!</div>
						<?php 
					}else
					{
						if($maloptc===""){?>
							<div class="alert alert-danger">Vui lòng chọn môn học!</div>
						<? } else {
							$sql="update svdk set diemgkmt ='$diem' where masv='$username' and maloptc='$maloptc' ";
					mysqli_query($conn, $sql);
					$sql="select TenHP from loptc l, courselist c  where l.mahp=c.MaHP and maloptc='$maloptc' ";
					$q=mysqli_query($conn, $sql);
					$data = mysqli_fetch_array($q);
					?>
						<div class="alert alert-success">Bạn đã cập nhật thành công mục tiêu điểm giữa kì cho môn học <?php echo $data["TenHP"];?> trong kì này!</div>
								<?php }}} else 
									if (isset($_POST["btn_ck"])) {
  			$diem=$_POST["diemck"];
			$maloptc=$_POST["maloptc"];
			
					if($diem <0 and $diem>=10){
						?>
						<div class="alert alert-danger">Vui lòng nhập đúng điểm!</div>
						<?php 
					}else
					{
						if($maloptc===""){?>
							<div class="alert alert-danger">Vui lòng chọn môn học!</div>
						<? } else {
							$sql="update svdk set diemckmt ='$diem' where masv='$username' and maloptc='$maloptc' ";
					mysqli_query($conn, $sql);
					$sql="select TenHP from loptc l, courselist c  where l.mahp=c.MaHP and maloptc='$maloptc' ";
					$q=mysqli_query($conn, $sql);
					$data = mysqli_fetch_array($q);
					?>
						<div class="alert alert-success">Bạn đã cập nhật thành công mục tiêu điểm cuối kì cho môn học <?php echo $data["TenHP"];?> trong kì này!</div>
								<?php }}}
								?>
							<form action="muctieuht.php" role="form" method="post">
								
									<div class="form-group">
                                    <label>Môn học trong kì</label>
									<?php
									$sql ="SELECT l.maloptc,c.TenHP FROM courselist as c, svdk as d, loptc l where c.MaHP=l.mahp and l.maloptc=d.maloptc and masv='$username' and l.hocki='$hocki'";
									$query= mysqli_query($conn,$sql);
									$num=mysqli_num_rows($query );
									
									;?>
									<select name= "maloptc">
									<option value="" >Chọn môn học</option>
									<?php
									while($data=mysqli_fetch_array($query)){
									?>
									
									<option  value = "<?php echo $data["maloptc"];?>"><?php echo $tenhp=$data["TenHP"];?></option>
									<?php }?>
									</select>
									
                                </div>
								<div class="row">
									<div class="col-md-4"><label>Mục tiêu giữa kì</label>
                                    <input name="diemgk" type ="number" min ="0" max="10" step ="0.25"  class="form-control" placeholder="Điểm mục tiêu giữa kì">
									
									</div>
									
									<div class="col-md-4"><label>Mục tiêu cuối kì</label>
                                    <input name="diemck" type ="number" min ="0" max="10" step ="0.25"  class="form-control" placeholder="Điểm mục tiêu cuối kì">
									</div>

									<div class="col-md-4"></div>
									</div>
								
								<div class="row">
									<div class="col-md-4"> <button name="btn_gk" type="submit" class="btn btn-success" <?php if($tuan>=4) echo "disabled";?> >Lưu</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
									</div>
									
									<div class="col-md-4"><button name="btn_ck" type="submit" class="btn btn-success" <?php if($tuan>=12) echo "disabled";?>>Lưu</button>
                                <button type="reset" class="btn btn-default">Làm mới</button></div>

									<div class="col-md-4"></div>
									</div>
                                
                        </form>
						
                        </div>
						
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
			
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
								<th data-field="gkmt" data-sortable="true"><b>Điểm giữa kì mục tiêu</b></th>
								<th data-field="gktt" data-sortable="true"><b>Điểm giữa kì thực tế</b></th>
								<th data-field="ckmt" data-sortable="true"><b>Điểm cuối kì mục tiêu</b></th>
								<th data-field="cktt" data-sortable="true"><b>Điểm cuối kì thực tế</b></th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
							
            $stt = 1 ;
			$sql="select l.mahp,c.TenHP,diemgkmt,diemqt,diemckmt, diemck from svdk s, courselist c, loptc l where l.maloptc=s.maloptc and l.mahp=c.MaHP and masv='$username' and l.hocki='$hocki' ";
            $query = mysqli_query($conn,$sql);
			if($query===false) echo "err";
						
            while ($data = mysqli_fetch_array($query)) {
          ?>
            <tr>
              <td scope="row"><?php echo $stt++ ;?></td>
              <td><?php echo $data["mahp"]; ?></td>
              <td><?php echo $data["TenHP"]; ?></td>
			  <td align="center"><?php echo $data["diemgkmt"]; ?></td>
			  <td><?php echo $data["diemqt"]; ?></td>
			  <td><?php echo $data["diemckmt"]; ?></td>
			  <td><?php echo $data["diemck"]; ?></td>
            </tr>
			<?php }
			 ?>
			</tbody>										
	
                                   
                              
						</table>
						<?php /*
			if($num<$stt-1) {
						
						?>
				<div class="alert alert-danger"><b>Bạn cần nhập đủ mục tiêu điểm của các môn</b></div>
		<?php } else {
			?>
			
			<div class="alert alert-success"><b>Bạn đã nhập đủ mục tiêu điểm của các môn trong học kì này. Hãy cố gắng học tập chăm chỉ để đạt được mục tiêu và vượt mục tiêu nhé!</b></div>
			<?php } */ ?>
			
				</div>
			</div>
			
		</div><!--/.row-->	
		

	</div>	<!--/.main-->	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-table.js"></script>	
</body>

</html>