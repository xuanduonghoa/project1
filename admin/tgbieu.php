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
                                    <li><a href="hoso.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Hồ sơ</a></li>
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
			<li class="active"><a href="tgbieu.php"><svg class="glyph stroked clock"><use xlink:href="#stroked-clock"/></svg>Thời gian biểu hôm nay</a></li>
			<li ><a href="muctieuht.php"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg>Quản lý học tập</a></li>
			<li><a href="qlttsv.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Sửa thông tin sinh viên</a></li>
			<li><a href="ttph.php"><svg class="glyph stroked heart"><use xlink:href="#stroked-heart"/></svg>Phụ huynh</a></li>
			<li ><a href="quanlytk.php"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg>Đổi mật khẩu</a></li>
            <li ><a href="dkht.php"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg>Đăng kí lớp</a></li>
        </ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Thời gian biểu hôm nay</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thời gian biểu hôm nay</h1>
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
		
                       <?php
		require_once("../lib/connection.php");
		?>						
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
					
		<div>
		<div class="col-md-6">	
		<?php if(isset($_POST["save"])){
		$tgbd=$_POST["tgbd"];
		$tgkt=$_POST["tgkt"];
		$maloptc=$_POST["maloptc"];
		if( $tgbd==0 or $tgkt==0 or $tgbd>=$tgkt or $maloptc==null){
						?>
						<div class="alert alert-danger">Vui lòng nhập đúng thông tin!</div>
						<?php 
					}else
					{
					if($tgbd<=date('H:i:s')){
						?>
 							<div class="alert alert-danger">Thời gian nhập đã qua!</div>
					<?php } 
					else {
					$s="select * from tgbieu where username='$username' and tuan='$tuan' and thu='$thu'";
					$q=mysqli_query($conn, $s); $check=0;
					while($data=mysqli_fetch_array($q)){
					if($data["mtbd"]===null)
					 {
					/*	if(($tgbd<=$data["tgbd"] and $tgbd<=$data["tgkt"]) or ($tgkt>=$data["tgbd"] and $tgbd<=$data["tgkt"]) or ($tgbd<=$data["tgbd"] and $tgkt>=$data["tgkt"])){
						$check++;}
					} else {
						if(($tgbd>=$data["mtbd"] and $tgbd<=$data["mtkt"]) or ($tgkt>=$data["mtbd"] and $tgbd<=$data["mtkt"]) or ($tgbd<=$data["mtbd"] and $tgkt>=$data["mtkt"])){
						$check++;}
					} */
					if(($tgbd>=$data["tgbd"] and $tgbd<=$data["tgkt"]) or ($tgkt>=$data["tgbd"] and $tgbd<=$data["tgkt"]) or ($tgbd<=$data["tgbd"] and $tgkt>=$data["tgkt"])){
						$check++;}
					} else {
						if(($tgbd>=$data["mtbd"] and $tgbd<=$data["mtkt"]) or ($tgkt>=$data["mtbd"] and $tgbd<=$data["mtkt"]) or ($tgbd<=$data["mtbd"] and $tgkt>=$data["mtkt"])){
						$check++;}
					}}
					if($check>0){
							?>
							<div class="alert alert-danger">Thời gian nhập bị trùng lịch!</div>
					<?php }
					else {
					$sql="insert into tgbieu (username, tennvu,thu,tuan,mtbd, mtkt) values
					('$username','$maloptc','$thu','$tuan', '$tgbd','$tgkt')";
					$kt=mysqli_query($conn, $sql); 
					?>
<div class="alert alert-success" role="alert">
					<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Bạn đã nhập thành công</div>
							<?php }
						
						?>						
			<?php
				//	}						  					
			  }
		}}
		
		?>
		
			<form action="tgbieu.php" role="form" method="post">
			<div class="form-group">
                                    <label>Môn học trong kì</label>
									<?php
									
									$sql ="SELECT *  FROM courselist as c, svdk as d, loptc l where c.MaHP=l.mahp and l.maloptc=d.maloptc and masv='$username' and l.hocki='$hocki'";
									$query= mysqli_query($conn,$sql);
									$num=mysqli_num_rows($query );
									
									;?>
									<select name= "maloptc">
									<option value="" >Chọn môn học</option>
									<?php
									while($data=mysqli_fetch_array($query)){
									?>
									
									<option  value = "<?php echo $data["maloptc"];?>"><?php echo $data["TenHP"];?></option>
									<?php }?>
									</select>
									
                                </div>
								<div>
								<label>Thời gian bắt đầu</label>
                                    <input name="tgbd" type ="time"  class="form-control"  >
                                </div>
								<div>
								<label>Thời gian kết thúc</label>
                                    <input name="tgkt" type ="time"  class="form-control">
                                </div>
                                <button name="save" type="submit" class="btn btn-primary">Lưu</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
								</form>
		</div>
		<div class="col-md-6">
		<?php if(isset($_POST["btn"])){
			
		$tien=$_POST["tien"];
		if($tien!=null){
			
		$loaitien=$_POST["loaitien"];
		switch($loaitien){
			case "tiensinhhoat": $ten="Tiền sinh hoạt"; break;
			case "tienhocthem": $ten="Tiền học thêm"; break;
			case "tienlamthem": $ten="Tiền làm thêm"; break;
			case "tienhocphi": $ten="Tiền học phí"; break;
		}
		$my="select * from quanlychitieu where username='$username' and hocki='$hocki' and thang='$month'";
		$re=mysqli_query($conn,$my);
		$row=mysqli_fetch_array($re);
		$val=$row["$loaitien"]+$tien;
		$my="update quanlychitieu set $loaitien = '$val' where username='$username' and hocki='$hocki' and thang='$month'";
		
		$re=mysqli_query($conn,$my);
		?>
		<div class="alert alert-success" role="alert">
					<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Bạn đã cộng <?php echo $tien?> nghìn đồng vào mục <?php echo $ten?> thành công </div>
		<?php
		}
		else{
			?><div class="alert alert-danger">Vui lòng nhập số tiền!</div>
			<?php
			
		}
		} else if(isset($_POST["tru"])){
			
		$tien=$_POST["tien"];
		if($tien!=null){
			
		$loaitien=$_POST["loaitien"];
		switch($loaitien){
			case "tiensinhhoat": $ten="Tiền sinh hoạt"; break;
			case "tienhocthem": $ten="Tiền học thêm"; break;
			case "tienlamthem": $ten="Tiền làm thêm"; break;
			case "tienhocphi": $ten="Tiền học phí"; break;
		}
		$my="select * from quanlychitieu where username='$username' and hocki='$hocki' and thang='$month'";
		$re=mysqli_query($conn,$my);
		$row=mysqli_fetch_array($re);
		$val=$row["$loaitien"]-$tien;
		$my="update quanlychitieu set $loaitien = '$val' where username='$username' and hocki='$hocki' and thang='$month'";
		
		$re=mysqli_query($conn,$my);
		?>
		<div class="alert alert-success" role="alert">
					<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Bạn đã trừ <?php echo $tien?> nghìn đồng vào mục <?php echo $ten?> thành công </div>
		<?php
		}
		else{
			?><div class="alert alert-danger">Vui lòng nhập số tiền!</div>
			<?php
			
		}
		}?>
		
		
		<form action="tgbieu.php" role="form" method="post">
		
                         <label>Tiền tiêu hôm nay (đơn vị nghìn đồng)</label>
						 <select name= "loaitien">
									
									<option value = "tiensinhhoat" select="selected">Tiền sinh hoạt</option>
									<option value="tienhocthem">Tiền học thêm</option>
									<option value="tienlamthem">Tiền làm thêm</option>
									<option value="tienhocphi">Tiền học phí</option>
									
									</select>
                         <input name="tien" type ="number"  class="form-control" size="50"></input>
						<button name="btn" type="submit" class="btn btn-primary">Thêm</button>
						<button name="tru" type="submit" class="btn btn-warning">Trừ</button>
						<?php 
						$my="select sum(tien) tongtien from tienchucap where sinhvien='$username' and hocki='$hocki'";
						$re=mysqli_query($conn,$my);
						$row=mysqli_fetch_array($re);
						$sum=$row["tongtien"];//viet.ht164648
						$my="select * from quanlychitieu where username='$username' and hocki='$hocki' and thang='$month'";
		$re=mysqli_query($conn,$my);
		$row=mysqli_fetch_array($re);
		$tiensinhhoat=$row["tiensinhhoat"];
		$tienhocthem=$row["tienhocthem"];
		$tienlamthem=$row["tienlamthem"];
		$tienhocphi=$row["tienhocphi"];
		$remain=$sum+$tienlamthem-$tiensinhhoat-$tienhocthem-$tienhocphi;?>
						</p><div class="<?php if($remain>=800) {echo "alert alert-success"; }else {if($remain>=400) {echo "alert alert-warning";} else { echo "alert alert-danger"; }} ?>" role="alert">
						<label>Số tiền còn lại của tháng này (đơn vị nghìn đồng): 
						<?php 
						
		echo $remain;
		
						?></label></div>
		</form>
		
		</div>
		<?php if(isset($_POST["btn_ttbd"])){
								
							
							}
							?>
                       <?php 
					   function abshieutime($h1,$m1, $h2,$m2){
					   if($h1>=$h2)
					   {
						   if($m1>=$m2){
							   $hieu=60*($h1-$h2)+$m1-$m2;
						   } else {
							   $hieu=$m1+60-$m2+60*($h1-$h2-1);
						   }
					   } else return hieutime($h2,$m2,$h1,$m1);
					   return $hieu;}
					   function hieutime($h1,$m1, $h2,$m2){
					   if($h1>=$h2)
					   {
						   if($m1>=$m2){
							   $hieu=60*($h1-$h2)+$m1-$m2;
						   } else {
							   $hieu=$m1+60-$m2+60*($h1-$h2-1);
						   }
					   } else return -1;
					   return $hieu;}
		?>
                               
						
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
						        <th data-field="phong"  data-sortable="true"><b>Phòng học</b></th>
								<th data-field="tgbd" data-sortable="true"><b>Thời gian bắt đầu</b></th>
								<th data-field="ttbd" data-sortable="true"><b>Trạng thái bắt đầu</b></th>
								<th data-field="tgkt" data-sortable="true"><b>Thời gian kết thúc</b></th>
								<th data-field="ttkt" data-sortable="true"><b>Trạng thái kết thúc</b></th>								
                                </tr>
                            </thead>
                            <tbody>
							
							<?php
							$stt = 1 ;
			$sql=" SELECT l.mahp, c.TenHP,l.phong,tgbd,l.maloptc, tgkt, hour(tgbd) giobd, minute(tgbd) phutbd,hour(tgkt) giokt, minute(tgkt) phutkt FROM courselist c, svdk d, loptc l, lichhocloptc t where l.mahp=c.MaHP and d.maloptc=l.maloptc and l.loailop=t.loailop and d.masv='$username' and thu='$thu' and t.tuan='$tuan'";
            $query = mysqli_query($conn,$sql);
			
			////?>
			 <form action="tgbieu.php" role="form" method="post">
								<?php 	
                                   
			////
            while ($data = mysqli_fetch_array($query)) {
          ?>
            <tr>
              <td scope="row"><?php echo $stt++ ?></td>
              <td><?php echo $data["mahp"]; ?></td>
              <td><?php echo $data["TenHP"]; ?></td>
              <td><?php echo $data["phong"]; ?></td>
			  <td><?php echo $data["tgbd"]; ?></td>
			  <td>
			  <?php
			  $maloptc=$data["maloptc"];
			  $s="select * from tgbieu where  username='$username' and tuan= '$tuan' and thu='$thu' and tennvu='$maloptc' and tgbd is not null";
				$q=mysqli_query($conn,$s);
				$num=mysqli_num_rows($q);
				if($num>0){
			?>
			<button class="btn btn-success" disabled>Đã xác nhận</button>
				<?php } else {
			  ?>
			  <a href ="xacnhanbd.php?username=<?php echo $username; ?> & maloptc=<?php echo $data["maloptc"] ?> & tuan=<?php echo $tuan;?> & thu=<?php echo $thu;?>">
			  <button name="btn_ttbd" type="submit" class="btn btn-primary" <?php if(hieutime($data["giobd"],$data["phutbd"],$date["hours"], $date["minutes"]) >10 or hieutime($date["hours"], $date["minutes"],$data["giokt"],$data["phutkt"])>0) echo "disabled"?>>Xác nhận</button></a>
				<?php }?>
				</td>
			  <td><?php echo $data["tgkt"]; ?></td>
			  <td>
			   <?php
			  $maloptc=$data["maloptc"];
			  $s="select * from tgbieu where  username='$username' and tuan= '$tuan' and thu='$thu' and tennvu='$maloptc' and tgbd is not null and tgkt is not null";
				$q=mysqli_query($conn,$s);
				$num=mysqli_num_rows($q);
				if($num>0){
			?>
			<button class="btn btn-success" disabled>Đã xác nhận</button>
				<?php } else {
						$sq="select * from tgbieu where  username='$username' and tuan= '$tuan' and thu='$thu' and tennvu='$maloptc'  and tgbd is not null";
				$qu=mysqli_query($conn,$sq);
				$number=mysqli_num_rows($qu);
			  ?>
			  <a href ="xacnhankt.php?username=<?php echo $username; ?> & maloptc=<?php echo $data["maloptc"] ?> & tuan=<?php echo $tuan;?> & thu=<?php echo $thu;?>">
			  <button name="btn_ttkt" type="submit" class="btn btn-primary" <?php if(hieutime($date["hours"], $date["minutes"],$data["giokt"],$data["phutbd"]) >10 or $number==0 or hieutime($date["hours"], $date["minutes"],$data["giobd"],$data["phutbd"])>0) echo "disabled"?>>Xác nhận</button></a>
				<?php }?>
				</td> </tr>
			<?php }
			 ?>
			<?php 
			$sql="select l.maloptc, c.mahp, c.TenHP, mtbd, mtkt,hour(mtbd) giobd, minute(mtbd) phutbd,hour(mtkt) giokt, minute(mtkt) phutkt from tgbieu b, courselist c, loptc l  where c.mahp=l.mahp and l.maloptc=b.tennvu and  username='$username' and tuan= '$tuan' and b.thu='$thu'  and mtbd is not null ";

			 $query = mysqli_query($conn,$sql);
			
			////?>
			 <form action="tgbieu.php" role="form" method="post">
								<?php 	
                                   
			////
            while ($data = mysqli_fetch_array($query)) {
          ?>
            <tr>
              <td scope="row"><?php echo $stt++ ?></td>
              <td><?php echo $data["mahp"]; ?></td>
              <td><?php echo $data["TenHP"]; ?></td>
              <td><?php echo "Tự học" ?></td>
			  <td><?php echo $mtbd=$data["mtbd"]; ?></td>
			  <td>
			  <?php
			  $maloptc=$data["maloptc"];
			  $s="select * from tgbieu where  username='$username' and tuan= '$tuan' and thu='$thu' and tennvu='$maloptc' and mtbd='$mtbd' and tgbd is not null";
				$q=mysqli_query($conn,$s);
				$num=mysqli_num_rows($q);
				if($num>0){
			?>
			<button class="btn btn-success" disabled>Đã xác nhận</button>
				<?php } else {
			  ?>
			  <a href ="xntgbbd.php?username=<?php echo $username; ?> & maloptc=<?php echo $data["maloptc"] ?>& giobd=<?php echo $data["mtbd"];?> & tuan=<?php echo $tuan;?> & thu=<?php echo $thu;?>">
			  <button name="xntgbbd" type="submit" class="btn btn-primary" <?php if(hieutime($data["giobd"],$data["phutbd"],$date["hours"], $date["minutes"]) >10 or hieutime($date["hours"], $date["minutes"],$data["giokt"],$data["phutkt"])>0) echo "disabled"?>>Xác nhận</button></a>
				<?php }?>
				</td>
			  <td><?php echo $data["mtkt"]; ?></td>
			  <td>
			   <?php
			  //$maloptc=$data["maloptc"];
			  $s="select * from tgbieu where  username='$username' and tuan= '$tuan' and thu='$thu' and tennvu='$maloptc' and mtbd='$mtbd' and tgbd is not null and tgkt is not null";
				$q=mysqli_query($conn,$s);
				$num=mysqli_num_rows($q);
				if($num>0){
			?>
			<button class="btn btn-success" disabled>Đã xác nhận</button>
				<?php } else {
					$sq="select * from tgbieu where  username='$username' and tuan= '$tuan' and thu='$thu' and tennvu='$maloptc' and mtbd='$mtbd' and tgbd is not null";
				$qu=mysqli_query($conn,$sq);
				$number=mysqli_num_rows($qu);
			  ?>
			  <a href ="xntgbkt.php?username=<?php echo $username; ?> & maloptc=<?php echo $data["maloptc"] ?> & giobd=<?php echo $data["mtbd"];?>& tuan=<?php echo $tuan;?> & thu=<?php echo $thu;?>">
			  <button name="xntgbkt" type="submit" class="btn btn-primary" <?php 
			  
			  if(hieutime($date["hours"], $date["minutes"],$data["giokt"],$data["phutkt"]) >10 or hieutime($data["giobd"],$data["phutbd"],$date["hours"], $date["minutes"])>0 or $number==0) echo "disabled"?>>Xác nhận</button></a>
				<?php }?>
				</td>
			</tr>
			<?php }?>
          </tbody>										
						</table></form>
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