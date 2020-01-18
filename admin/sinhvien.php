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
                                    <li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Đăng xuất</a></li>
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
			<li class="active"><a href="sinhvien.php"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>Quản lý thời gian</a></li>
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
				<li class="active">Quản lý thời gian</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quản lý thời gian</h1>
				<h3><?php $date=getdate();
				echo $ngay =$date['mday'].$date['mon'].$date['year'];
	echo "Thứ ".$date['weekday']." ngày ".$date['mday']." tháng ".$date['mon']." năm ".$date['year']." ";
	echo date('Bây giờ là H giờ');
	echo date('\B\â\y \g\i\ờ \l\à H \g\i\ờ');
   				?>
				</h3>
				
			</div>
		</div><!--/.row-->
		<!--<div id="toolbar" class="btn-group">
            <a href="add_user.php" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm thành viên
            </a>
        </div>-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
					<!--<div class="form-group">
                                    <label>Học kì</label>
                                    <select name="hocki" class="text-overflow">
                                        <option selected="selected" value="20191" >20191</option>
                                        <option value="20182" >20182</option>
										
										<option value="21081">20181</option>
                                    </select>
                                </div>-->
                        <table 
                            data-toolbar="#toolbar"
                            data-toggle="table">

						    <thead>
						    <tr>
						        <th data-field="stt" data-sortable="true">Tuần</th>
								<th data-field="2" data-sortable="true">Thứ hai</th>
						        <th data-field="3"  data-sortable="true">Thứ ba</th>
								<th data-field="4" data-sortable="true">Thứ tư</th>
                                <th data-field="5" data-sortable="true">Thứ năm</th>
								<th data-field="6" data-sortable="true">Thứ sáu</th>
								<th data-field="7" data-sortable="true">Thứ bảy</th>
								<th data-field="8" data-sortable="true">Chủ nhật</th>
								<th data-field="sum" data-sortable="true">Tổng</th>
                               
						    </tr>
                            </thead>
                            <tbody>
							<?php
							//$hocki=$_POST["hocki"]; 
							
            $stt = 1 ;$thu=2;$tuan=1;
			$hocki="20191";
            $sql = "SELECT * FROM theodoitg where username='$username' and hocki='$hocki' and tglt1 is not null";
            // thực thi câu $sql với biến conn lấy từ file connection.php
            $query = mysqli_query($conn,$sql);
			$num_rows= mysqli_num_rows($query);
			if(($num_rows%7) <>0){
			$tuanht=($num_rows/7)+1;
			$thuht=$num_rows%7+1;
			}
			else {$tuanht=$num_rows/7;
			$thuht =8;
			}
			  while($tuan<$tuanht){
				$thu=2;?>
			  <tr>
			  <td scope="row"><?php echo $stt++ ?></td>
			  <?php while($thu<9){?>             
			  <td class="form-group">
			 <a href="suatheodoi.php?username=<?php echo $data["username"]; ?>&tuan=<?php echo $tuan?>&thu=<?php echo $thu++?>&hocki=<?php echo $hocki?>" class="btn btn-success"> <i class="glyphicon glyphicon-pencil"></i></a>
			</td>
			  <?php }?>
			  <td><a href="" class ="btn btn-default"><i class="glyphicon glyphicon-pencil"></i></a>
			</td>
			</tr>
			<?php $tuan++;}?>
			<tr>
			  <td scope="row"><?php echo $stt++ ?></td>
			  <?php $thu=2; while($thu<=$thuht){?>
               <td><a href="suatheodoi.php?username=<?php echo $data["username"]; ?>&tuan=<?php echo $tuan?>&thu=<?php echo $thu++?>&hocki=<?php echo $hocki?>" class="btn btn-success"> <i class="glyphicon glyphicon-pencil"></i></a>
				</td>  <?php }; while($thu<9){?> 
               <td><a href="nhaptheodoi.php?username=<?php echo $data["username"]; ?>&tuan=<?php echo $tuan?>&thu=<?php echo $thu++?>&hocki=<?php echo $hocki?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></a>
			</td><?php }; $tuan++;?>
			<td><a href="" class ="btn btn-default"><i class="glyphicon glyphicon-pencil"></i></a>
			</td>
			</tr>
			<?php
			while($tuan>$tuanht and $tuan<19){
				$thu=2;
				?>
				<tr>
			  <td scope="row"><?php echo $stt++ ?></td>
			  <?php while($thu<9){?>             
			  <td class="form-group">
               <a href="nhaptheodoi.php?username=<?php echo $data["username"]; ?>&tuan=<?php echo $tuan?>&thu=<?php echo $thu++?>&hocki=<?php echo $hocki?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></a>
			</td>
			<?php }?>
			<td><a href="" class ="btn btn-default"><i class="glyphicon glyphicon-plus"></i></a>
			</td>
			
			</tr>
			<?php $tuan++;}?>
			
			 <!--<a href="#" class="btn btn-warning"><i><svg class="glyph stroked eye"><use xlink:href="#stroked-eye"/></svg>Xem</i></a>-->
			 
			
           
			<?php //$tuan++;}?>
          </tbody>										
	<?php
	
		/*if (isset($_GET["username"])) {
			
			
		    	$username = $_GET["username"];
			
		    	$sql = "delete from users where username = '$username'";
			mysqli_query($conn, $sql);}*/
			?>
                                   
                              
						</table>
                    </div>
                    <div class="panel-footer">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </nav>
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