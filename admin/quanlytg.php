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
<script src="https://code.jquery.com/jquery-latest.js"></script>
<script>
$(function(){
//Năm tự động điền vào select
    var seYear = $('#year');
    var date = new Date();
    var cur = date.getFullYear();

    seYear.append('<option value="">-- Year --</option>');
    for (i = cur; i >= 2017; i--) {
        seYear.append('<option value="'+i+'">'+i+'</option>');
    };
    
    //Tháng tự động điền vào select
    var seMonth = $('#month');
    var date = new Date();
    
    var month=new Array();
    month[1]="January";
    month[2]="February";
    month[3]="March";
    month[4]="April";
    month[5]="May";
    month[6]="June";
    month[7]="July";
    month[8]="August";
    month[9]="September";
    month[10]="October";
    month[11]="November";
    month[12]="December";

    seMonth.append('<option value="">-- Month --</option>');
    for (i = 12; i > 0; i--) {
        seMonth.append('<option value="'+i+'">'+month[i]+'</option>');
    };
    
    //Ngày tự động điền vào select
    function dayList(month,year) {
        var day = new Date(year, month, 0);
        return day.getDate();
    }    
    
    $('#year, #month').change(function(){
        //Đoạn code lấy id không viết bằng jQuery để phù hợp với đoạn code bên dưới
        var y = document.getElementById('year');
        var m = document.getElementById('month');
        var d = document.getElementById('day');
        
        var year = y.options[y.selectedIndex].value;
        var month = m.options[m.selectedIndex].value;
        var day = d.options[d.selectedIndex].value;
        if (day == ' ') {
            var days = (year == ' ' || month == ' ')? 31 : dayList(month,year);
            d.options.length = 0;
            d.options[d.options.length] = new Option('-- Day --',' ');
            for (var i = 1; i <= days; i++)
            d.options[d.options.length] = new Option(i,i);
        }
    });
});
</script>
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
				<li class="active">Quản lý thời gian học tập</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quản lý thời gian học tập</h1>
				
				
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
			$day=$_POST["day"];
			$month=$_POST["month"];
			$year=$_POST["year"];
			$date=date_create($year."-".$month."-".$day);
			
			$da= date_format($date, "Y-m-d");
			$dat=$date;

			$d=date_modify($date, "+7 days");
			
//echo date_format($date, "Y-m-d");
			if($d<=date('Y-m-d') &&$date >=date('Y-m-d')){
			?>	<div class="alert alert-danger">Bạn chỉ được phép sửa thời gian học trong vòng 7 ngày trước!</div>
			<?php } else {
  					
					if($tghoc <0 and $tghoc>=24){
						?>
						<div class="alert alert-danger">Vui lòng nhập đúng thời gian học!</div>
						<?php 
					}else
					{
						
					$sql="select * from quanlytghoc where username='$username' and ngay='$da' and mahp='$mahp'";
					$kt=mysqli_query($conn, $sql);
					if($kt===false) echo "false";
					if(mysqli_num_rows($kt)  >0){	
					$mysql="update quanlytghoc set tghoc ='$tghoc' where masv='$username' and ngay='$da' and mahp='$mahp' ";

					?>
						<div class="alert alert-success">Bạn đã cập nhật thời gian học môn học <?php echo $mahp;?> trong ngày <?php echo date_format($dat, "Y-m-d"); ?> !</div>
					<?php } else{
						//thực hiện việc lưu trữ dữ liệu vào db
	    				$sql = "INSERT INTO quanlytghoc (username,ngay,mahp,tghoc) VALUES ('$username','$da','$mahp','$tghoc')";
					    // thực thi câu $sql với biến conn lấy từ file connection.php
   						$q=mysqli_query($conn,$sql);
						
						?>						
						<div class="alert alert-success" role="alert">
					<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Bạn đã nhập thời gian học môn học <?php echo $mahp;?> trong ngày <?php echo date_format($dat, "Y-m-d"); ?> thành công</div>
					<?php
					}						  					
			  }
		}}
	?>
                                <form action="quanlytg.php" role="form" method="post">
									<div class="form-group">
                                    <label>Môn học trong kì</label>
									<p/>
									<?php
									$hocki="20191";
									$sql ="select s.MaHP, c.TenHP from svdk s, courselist c where s.mahp=c.MaHP and s.masv = '$username' and s.hocki='$hocki'";
									
									$query= mysqli_query($conn,$sql);
									$num=mysqli_num_rows($query );
									
									?>
									
									<select name= "mahp">
									<option value="" >Chọn môn học</option>
									<?php
									while($data=mysqli_fetch_array($query)){
									?>
									
									<option  value = "<?php echo $data["MaHP"];?>"><?php echo $data["TenHP"];?></option>
									<?php }?>
									</select>
									
									
                                </div>
								<div><label>Chọn ngày tháng</label>
								<p/>
								<select name="year" id="year" size="1"></select>
									<select name="month" id="month" size="1"></select>
									<select name="day" id="day" size="1">
									<option value=" " selected="selected">-- Day --</option>
									</select>
									</div>
									
								<div>
								<label>Thời gian học</label>
                                    <input name="tghoc" type ="number" min ="0" max="24" step ="0.25"  class="form-control" placeholder="Thời gian học" autofocus="on">
                                </div>
								
                                <button name="search" type="search" class="btn btn-primary">Tìm kiếm</button>
                                <button name="btn_submit" type="submit" class="btn btn-success">Lưu</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
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
						        <th data-field="d" data-sortable="true"><b>Ngày</b></th>
								<th data-field="mahp" data-sortable="true"><b>Mã học phần</b></th>
						        <th data-field="tenhp"  data-sortable="true"><b>Tên học phần</b></th>
								<th data-field="kl" data-sortable="true"><b>Thời gian học</b></th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
			if (isset($_POST["search"])) {
  			//lấy thông tin từ các form bằng phương thức POST
  			$mahp=$_POST["mahp"];
			$day=$_POST["day"];
			$month=$_POST["month"];
			$year=$_POST["year"];
			if($day <>"" and $month<>"" and $year<>""){
			$date=date_create($year."-".$month."-".$day);
			$d= date_format($date, "Y-m-d");}
			else $date="";
			 

			if($mahp==="" && $date !="") {			
					$sql="SELECT d.*,c.TenHP  FROM courselist as c, quanlytghoc as d where c.MaHP=d.mahp and  username='$username' and ngay ='$d'";
					$kt=mysqli_query($conn, $sql);
					if($kt===false) echo "false";
					$num=mysqli_num_rows($kt);
					
					?>
					<div class="alert alert-success" role="alert">
					<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg>Có <?php echo $num;?> kết quả được tìm thấy</div>
										<?php } else
	    				if($date==="" && $mahp!="") {			
					$sql="SELECT d.*,c.TenHP  FROM courselist as c, quanlytghoc as d where c.MaHP=d.mahp and  username='$username' and d.mahp='$mahp' ";
					$kt=mysqli_query($conn, $sql);
					if($kt===false) echo "false";
					$num=mysqli_num_rows($kt);
					
					?>
					<div class="alert alert-success" role="alert">
					<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg>Có <?php echo $num;?> kết quả được tìm thấy</div>
					<?php 
					} else  if($mahp !="" && $date!=""){			
					$sql="SELECT d.*,c.TenHP  FROM courselist as c, quanlytghoc as d where c.MaHP=d.mahp and  username='$username' and ngay ='$d' and mahp='$mahp'";
					$kt=mysqli_query($conn, $sql);
					$num=mysqli_num_rows($kt);
					?>
					<div class="alert alert-success" role="alert">
					<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg>Có <?php echo $num;?> kết quả được tìm thấy</div>
			<?php } else {
				$sql = "SELECT d.*,c.TenHP  FROM courselist as c, quanlytghoc as d where c.MaHP=d.mahp and username='$username' ";
            $kt = mysqli_query($conn,$sql);		?>
			<div class="alert alert-danger">Vui lòng nhập thông tin!</div><?php }

			$stt=1;
 while ($data = mysqli_fetch_array($kt)) {
          ?>
            <tr>
              <td scope="row"><?php echo $stt++ ?></td>
              <td><?php echo $data["ngay"]; ?></td>
              <td><?php echo $data["mahp"]; ?></td>
              <td><?php echo $data["TenHP"]; ?></td>
			  <td><?php echo $data["tghoc"]; ?></td>

            </tr>
				<?php }
			 			}
			////			
				if (!isset($_POST["search"]) or (isset($_POST["reset"]))){
            $stt = 1 ;$sum=0;
            $sql = "SELECT d.*,c.TenHP  FROM courselist as c, quanlytghoc as d where c.MaHP=d.mahp and username='$username' ";
            $query = mysqli_query($conn,$sql);			
            while ($data = mysqli_fetch_array($query)) {
          ?>
            <tr>
              <td scope="row"><?php echo $stt++ ?></td>
              <td><?php echo $data["ngay"]; ?></td>
              <td><?php echo $data["mahp"]; ?></td>
              <td><?php echo $data["TenHP"]; ?></td>
			  <td><?php echo $data["tghoc"]; ?></td>

            </tr>
				<?php }}
			 ?>
			
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