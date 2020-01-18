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
			<li ><a href="sinhvien.php"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>Theo dõi tình hình học tập</a></li>
			<li ><a href="muctieuht.php"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg>Quản lý học tập</a></li>
			<li class="active"><a href="qlctph.php"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý chi tiêu</a></li>
			<li><a href="qlttsv.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thông tin</a></li>
			<li ><a href="quanlytk.php"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg>Đổi mật khẩu</a></li>
        </ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Mục tiêu học tập</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Mục tiêu học tập</h1>
				<h3><?php $date=getdate();
				$ngay =$date['mday']."/".$date['mon']."/".$date['year'];
	echo "Thứ ".$date['weekday']." ngày ".$date['mday']." tháng ".$date['mon']." năm ".$date['year']." ";
   				?>
				</h3>
				
			</div>
		</div>
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
						        <th data-field="tenhp"  data-sortable="true"><b>Thời gian học (giờ)</b></th>
								   </tr>
                            </thead>
                            <tbody>
							<?php
            $stt = 1 ; $hocki="20191";
			//$ngay=$date['year']."-".$date['mon']"-".$date['mday'];
			$day=$date['mday'];
			$month=$date['mon'];
			$year=$date['year'];
			//$ngay =$date['mday']."/".$date['mon']."/".$date['year'];
			 $sql = "SELECT *  FROM quanlytghoc  where username='$username' and day(ngay)='$day' and month(ngay)='$month' and year(ngay)='$year' ";
            // thực thi câu $sql với biến conn lấy từ file connection.php
            $query = mysqli_query($conn,$sql);
			//$num_rows=mysqli_num_rows($query);
            while ($data = mysqli_fetch_array($query)) {
          ?>
            <tr>
              <td scope="row"><?php echo $stt++ ?></td>
              <td><?php $mahp=$data["mahp"]; echo $mahp;  ?></td>
				<td><?php echo $data["tghoc"];?></td>
			</tr>
			<?php }?>
			<?php
           $sql = "(SELECT mahp  FROM  svdk where masv='$username' and hocki='$hocki') ";//MINUS 
			//$sql="(SELECT distince mahp  FROM quanlytghoc  where username='$username' and day(ngay)='$day' and month(ngay)='$month' and year(ngay)='$year')";
            // thực thi câu $sql với biến conn lấy từ file connection.php
            $query = mysqli_query($conn,$sql);
			//$num_rows=mysqli_num_rows($query);
			if($query === FALSE) { 
    //die(mysql_error()); // TODO: better error handling
	echo " error2"
	;
}

            while ($data = mysqli_fetch_array($query)) {
				
          ?>         
			<form action="nhaptheongay.php" role="form" method="post">

            <tr>
              <td scope="row"><?php echo $stt++ ?></td>
              <td><?php $mahp=$data["mahp"]; echo $mahp;  ?></td>
              <td><input name="tghoc" autocomplete="on"  type="number" min="0" max="24" step="0.5" ></td>
			<?php 
			if(!isset($_POST["btn_submit"])){
			break;
			//header('Location: nhaptheongay.php');
			}
			else{
				$tghoc=$_POST["tghoc"];
				$sql1="insert into quanlytghoc (username,ngay,mahp,tghoc) values ('$username', CURDATE(),'$mahp','$tghoc')";
				$query1 = mysqli_query($conn,$sql1);
				
				//	header('Location: nhaptheongay.php');
			}
             ?>
            </tr>
			</form>
			    <?php }?>      
				
          </tbody>										
			
                                   
                              
						</table>
						<div align="center"><button name="btn_submit" type="submit" class="btn btn-success">Lưu</button>
			
			</div>
			<div class="tab">
          <button class="tablinks">PHP</button>
          <button class="tablinks">HTML</button>
          <button class="tablinks">CSS</button>
        </div>
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