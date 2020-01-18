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
			<li ><a href="kpi.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>KPI học tập</a></li>
			<li ><a href="qlchitieusv.php"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý chi tiêu</a></li>
			<li ><a href="qlttsv.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Sửa thông tin sinh viên</a></li>
			<li ><a href="quanlytk.php"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg>Quản lý tài khoản</a></li>
            <li class="active"><a href="dkht.php"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg>Đăng kí môn học</a></li>
			<li ><a href="ttph.php"><svg class="glyph stroked heart"><use xlink:href="#stroked-heart"/></svg>Phụ huynh</a></li>
   </ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Đăng kí môn học</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Đăng kí môn học</h1>
				
			</div>
		</div><!--/.row-->
		<!--<div id="toolbar" class="btn-group">
            <a href="add_user.php" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm thành viên
            </a>
        </div>-->
		<?php date_default_timezone_set("Asia/Bangkok");
				$sql="select * from hocki where curdate() between ngaybd and ngaykt";
 $q=mysqli_query($conn,$sql);
 $result=mysqli_fetch_array($q);
 $hocki=$result["hocki"];?>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
					
                       <?php 
		if (isset($_POST["btn_submit"])) {
  			$maloptc=$_POST["search"];
  					$sql="select * from  loptc where maloptc='$maloptc'";
					$kt=mysqli_query($conn, $sql);
					if(mysqli_num_rows($kt)  == 0){
						?>
						<div class="alert alert-danger">Vui lòng nhập đúng mã lớp tín chỉ của môn học!</div>
						<?php 
					}else
					{$data=mysqli_fetch_array($kt);
					$mahp=$data["mahp"];
					$sql="select * from svdk s, loptc l where s.maloptc=l.maloptc and masv ='$username' and l.hocki='$hocki' and l.mahp='$mahp'";
					$kt=mysqli_query($conn, $sql);
					if($check=mysqli_num_rows($kt)  >0){	
					?>
						<div class="alert alert-danger">Bạn đã đăng ký lớp cho <?php echo $mahp;?> trong học kì này!</div>
					<?php } else{
						//thực hiện việc lưu trữ dữ liệu vào db
	    				$sql = "INSERT INTO svdk(masv,maloptc) VALUES ('$username','$maloptc')";
					    // thực thi câu $sql với biến conn lấy từ file connection.php
   						$q=mysqli_query($conn,$sql);
						if($q===false) echo "F";?>						
						<div class="alert alert-success" role="alert">
					<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Bạn đã đăng ký thành công</div>
					<?php
					}						  					
			  }
	}else if (isset($_POST["remove"])) {
  			$maloptc=$_POST["search"];
  					$sql="select * from  loptc where maloptc='$maloptc'";
					$kt=mysqli_query($conn, $sql);
					if(mysqli_num_rows($kt)  == 0){
						?>
						<div class="alert alert-danger">Vui lòng nhập đúng mã lớp tín chỉ của môn học!</div>
						<?php 
					}else
					{
					$sql="select * from svdk s, loptc l where l.maloptc=s.maloptc and masv='$username' and l.hocki='$hocki' and s.maloptc='$maloptc'";
					$kt=mysqli_query($conn, $sql);
					if(mysqli_num_rows($kt)  <0){	
					?>
						<div class="alert alert-danger">Bạn chưa đăng ký mã lớp của môn học <?php echo $maloptc;?> trong học kì này!</div>
					<?php } else{
						//thực hiện việc lưu trữ dữ liệu vào db
	    				$sql="delete from svdk where masv='$username'  and maloptc='$maloptc	'";
					    // thực thi câu $sql với biến conn lấy từ file connection.php
   						mysqli_query($conn,$sql);?>						
						<div class="alert alert-success" role="alert">
					<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Bạn đã xóa đăng kí thành công</div>
					<?php
					}						  					
			  }
	}
	?>
		<div class="col-md-6">
                                <form action="dkht.php" role="form" method="post">
								
                     
								<div class="form-group">
                                    <label>Đăng kí mã lớp học</label>
                                    <input name="search" required class="form-control" placeholder="Mã lớp tín chỉ">
                                </div>
                                
                                <button name="btn_submit" type="submit" class="btn btn-primary">Đăng kí</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
								<button name="remove" type="submit" class="btn btn-danger">Xóa đăng kí</button>
                        </form>
						</div>
						<div class="col-md-6">
                                <form action="dkht.php" role="form" method="post">
                                <button name="tinh" type="submit" class="btn btn-primary">Tính học phí</button>
								</p><label>Số tiền học phí là: 
								<?php $sql="select * from hocphisv where username ='$username' and hocki='$hocki'";
								$q=mysqli_query($conn,$sql);
								$num=mysqli_num_rows($q);
								if($num>0) {
									$data=mysqli_fetch_array($q);
								echo $data["hocphi"]."000";}
								
									if(isset($_POST["tinh"])){
										$sql ="SELECT *  FROM courselist as c, svdk as d, loptc l where  c.MaHP=l.mahp and l.maloptc=d.maloptc and masv='$username' and l.hocki='$hocki'";
            $query = mysqli_query($conn,$sql);;$sumtchp=0;
            while ($data = mysqli_fetch_array($query)) {
			$sumtchp+=$data["TChphi"];}
			$sql="select * from hocphi,sinhvien s where hocphi.mavien=s.mavien and username='$username' and hocki='$hocki'";
			 $query = mysqli_query($conn,$sql);
			 $data = mysqli_fetch_array($query);
			 $sotien=$data["sotientc"];
			 $hp=$sotien*$sumtchp;
			 $sql="update hocphisv set hocphi='$hp' where username='$username' and hocki='$hocki'";
								$query = mysqli_query($conn,$sql);
								}

								?>
								</label>
								</form>
								</div>
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
							<label><b>Thông tin lớp đăng kí</b></label>

						    <thead>
						    <tr>
						        <th data-field="stt" data-sortable="true"><b>STT</b></th>
								<th data-field="malop" data-sortable="true"><b>Mã lớp</b></th>
						        <th data-field="ten_hp"  data-sortable="true"><b>Tên học phần</b></th>
								<th data-field="tgbd" data-sortable="true"><b>Thời gian bắt đầu</b></th>
								<th data-field="tgkt" data-sortable="true"><b>Thời gian kết thúc</b></th>
                                <th data-field="thu" data-sortable="true"><b>Thứ</b></th>
								<th data-field="phong" data-sortable="true"><b>Phòng</b></th>
								<th data-field="gv" data-sortable="true"><b>Giảng viên</b></th>
						    </tr>
                            </thead>
                            <tbody>
							<?php
            $stt = 1 ;$sum=0;
            $sql = "SELECT *  FROM courselist as c, svdk as d, loptc l, giangvien g where g.magv=l.magv and c.MaHP=l.mahp and l.maloptc=d.maloptc and masv='$username' and l.hocki='$hocki'	order by l.thu,l.tgbd";
            // thực thi câu $sql với biến conn lấy từ file connection.php
            $query = mysqli_query($conn,$sql);
            while ($data = mysqli_fetch_array($query)) {
          ?>
            <tr>
              <td scope="row"><?php echo $stt++ ?></td>
              <td><?php echo $data["maloptc"]; ?></td>
              <td><?php echo $data["TenHP"]; ?></td>
			  <td><?php echo $data["tgbd"]; ?></td>
              <td><?php echo $data["tgkt"]; ?></td>
			  <td><?php echo $data["thu"]; ?></td>
			  <td><?php echo $data["phong"]; ?></td>
			  <td><?php echo $data["tengv"]; ?></td>

              
			 
            </tr>
			

			<?php }?>
          </tbody>										
	
                                   
                              
						</table>
					 </div>
				</div>
			</div>
		</div><!--/.row-->	
			<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<table 
                            data-toolbar="#toolbar"
                            data-toggle="table">
							

						    <thead>
							<label><b>Thông tin học phần đăng kí</b></label>
						    <tr>
						        <th data-field="id" data-sortable="true"><b>STT</b></th>
								<th data-field="mahp" data-sortable="true"><b>Mã học phần</b></th>
						        <th data-field="tenhp"  data-sortable="true"><b>Tên học phần</b></th>
								<th data-field="kl" data-sortable="true"><b>Khối lượng</b></th>
								<th data-field="tg" data-sortable="true"><b>Thời gian học 1 tuần (giờ)</b></th>
                                <th data-field="tc" data-sortable="true"><b>Số tín chỉ học phần</b></th>
								<th data-field="tchp" data-sortable="true"><b>Số TCHP</b></th>
								<th data-field="trongso" data-sortable="true"><b>Trọng số cuối kì</b></th>
						    </tr>
                            </thead>
                            <tbody>
							<?php
            $stt = 1 ;$sum=0;$sumtchp=0; $hocki="20191";
            $sql ="SELECT *  FROM courselist as c, svdk as d, loptc l where  c.MaHP=l.mahp and l.maloptc=d.maloptc and masv='$username' and l.hocki='$hocki'";
            $query = mysqli_query($conn,$sql);
            while ($data = mysqli_fetch_array($query)) {
          ?>
            <tr>
              <td scope="row"><?php echo $stt++ ?></td>
              <td><?php echo $data["MaHP"]; ?></td>
              <td><?php echo $data["TenHP"]; ?></td>
			  <td><?php echo $data["ThoiLuong"]; ?></td>
			  <td><?php echo $data["tghoc"]; ?></td>
              <td><?php echo $data["SoTC"]; ?></td>
			  <td><?php echo $data["TChphi"]; ?></td>
			  <td><?php echo $data["Trongso"]; ?></td>

              
			 <?php $sum+=$data["SoTC"];
			 $sumtchp+=$data["TChphi"];}?>
            </tr>
			<tr>
			<td></td><td></td>
			<td colspan="4" align="right">
			Tổng số tín chỉ đã đăng kí</td><td/><td></td>
			<td colspan="3"><?php echo $sum;?></td>
			<td colspan="3"><?php echo $sumtchp;?></td>

			</tr>
          </tbody>										
	
                                   
                              
						</table>
					 </div>
				</div>
			</div>
		</div><!--/.row-->	
		
	</div>	<!--/.main-->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-table.js"></script>	
</body>
</html>