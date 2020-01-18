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
			<li class="active"><a href="nhaptheongay.php"><svg class="glyph stroked clock"><use xlink:href="#stroked-clock"/></svg>Theo dõi học tập hôm nay</a></li>
			<li ><a href="sinhvien.php"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>Quản lý thời gian</a></li>
			<li ><a href="muctieuht.php"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg>Mục tiêu học tập</a></li>
			<li><a href="qlht.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>Quản lý học tập</a></li>
			<li ><a href="muctieuchitieu.php"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg>Mục tiêu chi tiêu</a></li>
			<li><a href="quanlyct.php"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý chi tiêu</a></li>
			<li><a href="qlttsv.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thông tin sinh viên</a></li>
			<li ><a href="quanlytk.php"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg>Quản lý tài khoản</a></li>
            <li ><a href="dkht.php"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg>Đăng kí môn học</a></li>
        </ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Theo dõi học tập hôm nay</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Theo dõi học tập hôm nay</h1>
				<h3><?php $date=getdate();
				$ngay =$date['mday']."/".$date['mon']."/".$date['year'];
				
				switch($date['weekday']){
					case "Monday" : $day="Hai"; break;
					case "Tuesday" : $day="Ba"; break;
					case "Wednesday" : $day="Tư"; break;
					case "Thursday" : $day="Năm"; break;
					case "Friday" : $day="Sáu"; break;
					case "Saturday" : $day="Bảy"; break;
					case "Sunday" : $day="Chủ nhật"; break;
				}
	echo "Thứ ".$day." ngày ".$date['mday']." tháng ".$date['mon']." năm ".$date['year']." ";
	echo $date=date("W",getdate());
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
					
                       <?php 
		if (isset($_POST["btn_submit"])) {
  			//lấy thông tin từ các form bằng phương thức POST
  			$tghoc=$_POST["tghoc"];
			$mahp=$_POST["mahp"];
			
			
  					
					if($tghoc <0 and $tghoc>=24){
						?>
						<div class="alert alert-danger">Vui lòng nhập đúng thời gian học!</div>
						<?php 
					}else
					{
						
					$sql="select * from quanlytghoc where username='$username' and ngay=CURdate() and mahp='$mahp'";
					$kt=mysqli_query($conn, $sql);
					if(mysqli_num_rows($kt)  >0){	
					?>
						<div class="alert alert-danger">Bạn đã nhập thời gian học môn học <?php echo $mahp;?> trong ngày hôm nay!</div>
					<?php } else{
						//thực hiện việc lưu trữ dữ liệu vào db
	    				$sql = "INSERT INTO quanlytghoc (username,ngay,mahp,tghoc) VALUES ('$username',CURDATE(),'$mahp','$tghoc')";
					    // thực thi câu $sql với biến conn lấy từ file connection.php
   						$q=mysqli_query($conn,$sql);
						
						?>						
						<div class="alert alert-success" role="alert">
					<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Bạn đã nhập thành công</div>
					<?php
					}						  					
			  }
	}else if (isset($_POST["remove"])) {
  			//lấy thông tin từ các form bằng phương thức POST
  			$mahp=$_POST["mahp"];
			
					$sql="select * from quanlytghoc where username='$username' and ngay=CURdate() and mahp='$mahp'";
					$kt=mysqli_query($conn, $sql);
					$num=mysqli_num_rows($kt);
					if($num==0){
						
  				
							
					?>
						<div class="alert alert-danger">Bạn chưa nhập thời gian học cho môn học <?php echo $mahp;?> trong hôm nay!</div>
					<?php } else{
						//thực hiện việc lưu trữ dữ liệu vào db
	    				$sql="delete from quanlytghoc where username='$username' and ngay=curdate() and mahp='$mahp'";
					    // thực thi câu $sql với biến conn lấy từ file connection.php
   						mysqli_query($conn,$sql);?>						
						<div class="alert alert-success" role="alert">
					<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Bạn đã xóa thành công</div>
					<?php
					}						  					
			  
	}
	?>
                                <form action="quanlytghoctuan.php" role="form" method="post">
									<div class="form-group">
                                    <label>Môn học trong kì</label>
									<?php
									$hocki="20191";
									$sql ="select s.MaHP, c.TenHP from svdk s, courselist c where s.mahp=c.MaHP and s.masv = '$username' and s.hocki='$hocki'";
									
									$query= mysqli_query($conn,$sql);
									$num=mysqli_num_rows($query );
									
									;?>
									<select name= "mahp">
									<option value="" >Chọn môn học</option>
									<?php
									while($data=mysqli_fetch_array($query)){
									?>
									
									<option  value = "<?php echo $data["MaHP"];?>"><?php echo $data["TenHP"];?></option>
									<?php }?>
									</select>
									
                                </div>
								<div>
								<label>Thời gian học</label>
                                    <input name="tghoc" type ="number" min ="0" max="24" step ="0.25"  class="form-control" placeholder="Thời gian học" autofocus="on">
                                </div>
                                <button name="btn_submit" type="submit" class="btn btn-success">Lưu</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
								<button name="remove" type="submit" class="btn btn-danger">Xóa môn đã nhập</button>
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
								<th data-field="kl" data-sortable="true"><b>Thời gian học</b></th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
							
            $stt = 1 ;$sum=0;
            $sql = "SELECT d.*,c.TenHP  FROM courselist as c, quanlytghoc as d where c.MaHP=d.mahp and username='$username' and ngay=curdate()";
            // thực thi câu $sql với biến conn lấy từ file connection.php
            $query = mysqli_query($conn,$sql);
			
			
            while ($data = mysqli_fetch_array($query)) {
          ?>
            <tr>
              <td scope="row"><?php echo $stt++ ?></td>
              <td><?php echo $data["mahp"]; ?></td>
              <td><?php echo $data["TenHP"]; ?></td>
			  <td><?php echo $data["tghoc"]; ?></td>
			  
          
              
			
            </tr>
			<?php $sum+=$data["tghoc"];}
			 ?>
			<tr>
			<td></td><td/>
			<td align="right">
			Tổng số thời gian đã học hôm nay</td>
			<td ><?php echo $sum;?></td>

			</tr>
          </tbody>										
	
                                   
                              
						</table>
						<?php 
			if($sum>24) {
						$sql="delete from quanlytghoc where username='$username' and ngay=curdate()";
					    // thực thi câu $sql với biến conn lấy từ file connection.php
   						mysqli_query($conn,$sql);
						?>
				<div class="alert alert-danger"><b>Bạn đã nhập sai thời gian. Đề nghị bạn nhập lại thời gian học ngày hôm nay!!!</b></div>
		<?php } else if($sum>=16 && $sum <=24) {
			?>
			<div class="alert alert-warning"><b>Hôm nay thật là một ngày vất vả, cố gắng giữ gìn sức khỏe nhé!</b></div>
		<?php } else if($sum>8 && $sum <16) {
				?>
			<div class="alert alert-success"><b>Bạn đã học tập rất chăm chỉ, cố gắng phát huy nhé!</b></div>
			<?php } else {?>
			<div class="alert alert-warning"><b>Cố gắng chăm chỉ lên nhé!</b></div>
			<?php }?>
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