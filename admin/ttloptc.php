<?php
session_start();
if(!isset($_SESSION['username'])){
header('Location: login.php');}
else{
	require_once("../lib/connection.php");
	$username=$_SESSION['username'];
	$sql="select * from users where username='$username'";
		$query = mysqli_query($conn,$sql);
            $data = mysqli_fetch_array($query);
			if($data['level']!=4) header('Location: login.php');
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
<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
function myFunctionHT() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInputHT");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}function myFunctionE() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInputE");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
     <?php
	 ?>
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
			if($data['gioitinh']=="Nam") 
		echo "Xin chào thầy ".($data["name"]); else if($data['gioitinh']== "Nu") 
		echo "Xin chào cô ".($data["name"]); else echo "Xin chào thầy (cô) ".($data["name"]);?></b></form>
		<ul class="nav menu">
			<li class="active"><a href="giaodienGV.php"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>Quản lý lớp tín chỉ</a>
			
			</li>
			<li><a href="qlttgv.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thông tin</a></li>
        </ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản lý lớp tín chỉ</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quản lý lớp tín chỉ</h1>
			
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
						<label><h3>Mã lớp tín chỉ: <?php if(isset($_GET["maloptc"])) echo $maloptc=$_GET["maloptc"];?> - Học phần: 
						<?php  $sql = "SELECT *  FROM courselist as c,  loptc l where  c.MaHP=l.mahp and maloptc='$maloptc' ";
            $query = mysqli_query($conn,$sql);
			$data = mysqli_fetch_array($query);
			echo $data['TenHP'];?>
						</h3></label>
						
						
<div><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Tìm kiếm mã số sinh viên">	      
	 <input type="text" id="myInputHT" onkeyup="myFunctionHT()" placeholder="Tìm kiếm tên sinh viên">
     <input type="text" id="myInputE" onkeyup="myFunctionE()" placeholder="Tìm kiếm email sinh viên">
	 <button type="button" onclick="$('table').tblToExcel();" class="btn btn-primary" align="right">Export To Excel</button></div>

						<table id="myTable"
                            data-toolbar="#toolbar"
                            data-toggle="table">

						    <thead>
							
						    <tr>
						        <th data-field="stt" data-sortable="true"><b>STT</b></th>
								<th data-field="mssv" data-sortable="true"><b>Mã số sinh viên</b></th>
						        <th data-field="tensv"  data-sortable="true"><b>Họ tên sinh viên</b></th>
								<th data-field="email" data-sortable="true"><b>Email</b></th>
                                <th data-field="dgk" data-sortable="true"><b>Điểm giữa kì</b></th>
                                <th data-field="gk" data-sortable="true"><b>KPI giữa kì</b></th>
								<th data-field="dck" data-sortable="true"><b>Điểm cuối kì</b></th>
								<th data-field="ck" data-sortable="true"><b>KPI cuối kì</b></th>
								<th data-field="kpi" data-sortable="true"><b>KPI cả kì</b></th>
						    </tr>
                            </thead>
                            <tbody>
							

			<?php 
			 $stt = 1 ;
            $sql = "SELECT *  FROM users u, svdk s where u.username=s.masv and maloptc='$maloptc'";
            $query = mysqli_query($conn,$sql);
            while ($data = mysqli_fetch_array($query)) {
          ?>
            <tr>
              <td scope="row"><?php echo $stt++ ?></td>
              <td><?php echo $data["username"]; ?></td>
              <td><?php echo $data["name"]; ?></td>
			  <td><?php echo $data["email"]; ?></td>
              <td><?php echo $data["diemqt"]; ?></td>
			  <td><?php echo $data["kpigk"]; ?></td>
			  <td><?php echo $data["diemck"]; ?></td>
			  <td><?php echo $data["kpick"]; ?></td>
			  <td><?php echo $data["kpica"]; ?></td>
			 

              
			 
            </tr>
			

			<?php }?>
          </tbody>										
	
                                   
                              
						</table>
					 </div>
				</div>
			</div>
		</div>
		    
	</div>	<!--/.main-->	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-table.js"></script>	
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="js/jquery.tableToExcel.js"></script>
</body>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</html>