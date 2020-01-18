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
			<li  class="active"><a href="qlchitieusv.php"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý chi tiêu</a></li>
			<li ><a href="qlttsv.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Sửa thông tin sinh viên</a></li>
			<li ><a href="quanlytk.php"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg>Quản lý tài khoản</a></li>
            <li ><a href="dkht.php"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg>Đăng kí môn học</a></li>
			<li ><a href="ttph.php"><svg class="glyph stroked heart"><use xlink:href="#stroked-heart"/></svg>Phụ huynh</a></li>
 </ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản lý chi tiêu</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quản lý chi tiêu</h1>
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
					
		<div>
		
		<div class="col-md-6">
		<?php if(isset($_POST["btn"])){
			
		$tien=$_POST["tien"];
		$note=$_POST["note"];
		if($tien!=null){
		
		$loaitien=$_POST["loaitien"];
		$sql="insert into history_ct (username , loaitien, tien, time, note) values
		('$username', '$loaitien','$tien',now(),'$note')";
				
		$re=mysqli_query($conn,$sql);
		$sql="select * from quanlychitieusv where username='$username' and id='$loaitien'"; 
									$q=mysqli_query($conn,$sql);
									
									$data=mysqli_fetch_array($q);
									
		?>
		<div class="alert alert-success" role="alert">
					<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Bạn đã cộng <?php echo $tien?> nghìn đồng vào mục <?php echo $data["loaitien"];?> thành công </div>
		<?php
		$loai=$data['loai'];
			$s="update vidientu set sodutk=sodutk+$loai*$tien where username='$username'";
			$q=mysqli_query($conn,$s);
		}
		else{
			?><div class="alert alert-danger">Vui lòng nhập số tiền!</div>
			<?php
			
		}
		}
		?>
		
		
		<form action="qlchitieusv.php" role="form" method="post">
		
                         <label>Tiền tiêu hôm nay (đơn vị nghìn đồng)</label>
						 <select name= "loaitien">
									
									<?php
									$sql="select * from quanlychitieusv where username='$username' and end is null order by start desc"; 
									$q=mysqli_query($conn,$sql);
									
									while($data=mysqli_fetch_array($q)){?>
									<option value="<?php echo $data["id"];?>" selected><?php echo $data["loaitien"];?></option>
									<?php }?>
									
									</select>
                         <input name="tien" type ="number"  class="form-control" size="50"></input>
						 <label>Ghi chú </label>
                         <input name="note" type ="text"  class="form-control" ></input>
						<button name="btn" type="submit" class="btn btn-primary">Thêm</button>
						</p>
			</form>			
						<?php 
						$my="select * from vidientu where username='$username'";
		$re=mysqli_query($conn,$my);
		$row=mysqli_fetch_array($re);
		$remain=$row["sodutk"];?>
						</p><div class="<?php if($remain>=800) {echo "alert alert-success"; }else {if($remain>=400) {echo "alert alert-warning";} else { echo "alert alert-danger"; }} ?>" role="alert">
						<label>Số tiền còn lại trong ví: 
						<?php 
						
		echo $row["sodutk"].",000";
		
						?></label></div>
		
		<button id="btn1" class="btn btn-default ">Thêm loại tiền</button>
						<div id="them" style="display:none">
						<?php 
						if(isset($_POST["themthe"])){
						$tenthe=$_POST["the"];
						$loaithe=$_POST["loaithe"];
						$s="insert into quanlychitieusv (username, loaitien, loai, start) values ('$username','$tenthe','$loaithe', now())";
						$q=mysqli_query($conn,$s);
						?>
						<div class="alert alert-success">Bạn đã thêm thẻ <?php echo $tenthe;?> thành công</div>
						<?php 
						}
						?>
						
						<form action="qlchitieusv.php" role="form" method="post">
						<label>Tên loại tiền</label>
                         <input name="the" type ="text"  class="form-control" required></input>
						 <label>Loại tiền </label>
						 <select name= "loaithe"></p>
						 <option value="-1">Chi</option>
						 <option value="1">Thu</option>
						 
									</select></p>
						<button name="themthe" type="submit" class="btn btn-primary">Thêm loại tiền</button>
						</form>
						
						</div>
						<script language="javascript">
						document.getElementById("btn1").onclick = function () {
                document.getElementById("them").style.display = 'block';
            };
			document.getElementById("btn1").ondblclick = function () {
                document.getElementById("them").style.display = 'none';
            };</script>
			<button id="btn2" class="btn btn-warning">Xóa loại tiền</button>
						<div id="xoa" style="display:none">
						<?php if(isset($_POST["xoathe"])){
							$loaitien=$_POST["loai"];
							$sql="update quanlychitieusv set end=now() where id='$loaitien'";
							$q=mysqli_query($conn,$sql);
							?>
							<div class="alert alert-success">Bạn đã xóa thẻ thành công</div>
							<?php 
						}?>
						<form action="qlchitieusv.php" role="form" method="post">
						<label>Chọn loại tiền</label>
						 <select name= "loai">
									
									<?php
									$sql="select * from quanlychitieusv where username='$username' and end is null"; 
									$q=mysqli_query($conn,$sql);
									
									while($data=mysqli_fetch_array($q)){?>
									<option value="<?php echo $data["id"];?>" selected><?php echo $data["loaitien"];?></option>
									<?php }?>
									
									</select></p>
						<button name="xoathe" type="submit" class="btn btn-danger">Xóa loại tiền</button>
						</form>
						</div>
						<script language="javascript">
						document.getElementById("btn2").onclick = function () {
                document.getElementById("xoa").style.display = 'block';
            };
			document.getElementById("btn2").ondblclick = function () {
                document.getElementById("xoa").style.display = 'none';
            };</script>
			<table 
                            data-toolbar="#toolbar"
                            data-toggle="table">
							

						    <thead>
						    <tr>
						        <th data-field="id" data-sortable="true"><b>Thời gian</b></th>
								<?php $sql="select * from quanlychitieusv where username='$username' and end is null"; 
									$q=mysqli_query($conn,$sql);
									
									while($data=mysqli_fetch_array($q)){?>
								<th data-field="<?php  echo $data["id"];?>" data-sortable="true"><b><?php echo $data["loaitien"];?></b></th>
									<?php }?>
                                </tr>
                            </thead>
                            <tbody>
							<tr> <td>Hôm nay</td>
							<?php $s="SELECT s.loaitien, sum(tien) sumtien from history_ct h, quanlychitieusv s 
							where h.loaitien=s.id and h.username ='20172017' and date (h.time)= curdate() and end is null 
							group by h.loaitien";?>
							
								<td></td>
								
                                   
		
           
          </tbody>										
						</table>
		</div>
		<div class="col-md-6">
		<h2>Lịch sử chi tiêu</h2>
		<fieldset>
		<legend>Ngày hôm nay</legend>
		<ul>
		<?php $sql="select h.loaitien loaitien, tien, time,note,s.loaitien ten,loai,time(time) tg,date(time) date from history_ct h left join quanlychitieusv s on h.loaitien=s.id where h.username='$username' and date(h.time)=curdate() order by time desc";
		$q=mysqli_query($conn, $sql);
		while($data= mysqli_fetch_array($q)){
			if(strcmp($data["loaitien"],"Tiền chu cấp")==0 ) {?>
		<div class="alert alert-success">Phụ huynh đã thêm <?php echo $data["tien"];?>,000 đồng vào Tiền chu cấp lúc <?php echo $data["tg"];?>, <?php echo $data["date"];?></div>
			<?php }
else {		?>
		<div class="<?php if($data["loai"]===1) echo "alert alert-success"; else echo "alert alert-danger";?>">Bạn đã thêm <?php echo $data["tien"];?>,000 đồng vào <?php echo $data["ten"];?> lúc <?php echo $data["tg"];?>, <?php echo $data["date"]; 
		if($data["note"] != null) echo " với ghi chú '".$data["note"]."'";
		?></div>
<?php 
		}}?>
		</ul>
		</fieldset>
		<fieldset>
		<legend>Ngày hôm qua</legend>
		<ul>
		<?php $sql="select h.loaitien loaitien, tien, time,note,s.loaitien ten,loai,time(time) tg,date(time) date from history_ct h left join quanlychitieusv s on h.loaitien=s.id where h.username='$username' and date(h.time)=curdate()-1 order by time desc";
		$q=mysqli_query($conn, $sql);
		while($data= mysqli_fetch_array($q)){
			if(strcmp($data["loaitien"],"Tiền chu cấp")==0 ) {?>
		<div class="alert alert-success">Phụ huynh đã thêm <?php echo $data["tien"];?>,000 đồng vào Tiền chu cấp lúc <?php echo $data["tg"];?>, <?php echo $data["date"];?></div>
			<?php }
else {		?>
		<div class="<?php if($data["loai"]===1) echo "alert alert-success"; else echo "alert alert-danger";?>">Bạn đã thêm <?php echo $data["tien"];?>,000 đồng vào <?php echo $data["ten"];?> lúc <?php echo $data["tg"];?>, <?php echo $data["date"];if($data["note"] != null) echo " với ghi chú '".$data["note"]."'";?></div>
<?php 
		}}?>
		</ul>
		</fieldset>
		<fieldset>
		<legend>Tuần này</legend>
		<ul>
		<?php $sql="select h.loaitien loaitien, tien, time,note,s.loaitien ten,loai,time(time) tg,date(time) date from history_ct h left join quanlychitieusv s on h.loaitien=s.id where h.username='$username' and weekofyear(h.time)=weekofyear(curdate()) order by time desc";
		$q=mysqli_query($conn, $sql);
		while($data= mysqli_fetch_array($q)){
			if(strcmp($data["loaitien"],"Tiền chu cấp")==0 ) {?>
		<div class="alert alert-success">Phụ huynh đã thêm <?php echo $data["tien"];?>,000 đồng vào Tiền chu cấp lúc <?php echo $data["tg"];?>, <?php echo $data["date"];?></div>
			<?php }
else {		?>
		<div class="<?php if($data["loai"]===1) echo "alert alert-success"; else echo "alert alert-danger";?>">Bạn đã thêm <?php echo $data["tien"];?>,000 đồng vào <?php echo $data["ten"];?> lúc <?php echo $data["tg"];?>, <?php echo $data["date"];if($data["note"] != null) echo " với ghi chú '".$data["note"]."'";?></div>
<?php 
		}}?>
		</ul>
		</fieldset>
		<fieldset>
		<legend>Tháng này</legend>
		<ul>
		<?php $sql="select h.loaitien loaitien, tien, time,note,s.loaitien ten,loai,time(time) tg,date(time) date from history_ct h left join quanlychitieusv s on h.loaitien=s.id where h.username='$username' and month(h.time)=month(curdate()) order by time desc";
		$q=mysqli_query($conn, $sql);
		while($data= mysqli_fetch_array($q)){
			if(strcmp($data["loaitien"],"Tiền chu cấp")==0 ) {?>
		<div class="alert alert-success">Phụ huynh đã thêm <?php echo $data["tien"];?>,000 đồng vào Tiền chu cấp lúc <?php echo $data["tg"];?>, <?php echo $data["date"];?></div>
			<?php }
else {		?>
		<div class="<?php if($data["loai"]===1) echo "alert alert-success"; else echo "alert alert-danger";?>">Bạn đã thêm <?php echo $data["tien"];?>,000 đồng vào <?php echo $data["ten"];?> lúc <?php echo $data["tg"];?>, <?php echo $data["date"];if($data["note"] != null) echo " với ghi chú '".$data["note"]."'";?></div>
<?php 
		}}?>
		</ul>
		</fieldset>
		</div>
		
						
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