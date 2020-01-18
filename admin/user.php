<?php
session_start();
if(!isset($_SESSION['username'])){
	header('Location: login.php');
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
<!--<script type="text/javascript">
 
         function testConfirmDialog()  {
 
              var result = confirm("Bạn muốn xóa tài khoản?");
 
              if(result)  {
				 
                  alert("OK Next lesson!");
              } else {
                  alert("Bye!");
              }
         }
 
      </script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
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
}</script>
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
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="thanhvien.html"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thành viên</a></li>
			
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="quan_ly_thanh_vien.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
              <li class="active">Danh sách thành viên</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách thành viên</h1>
			</div>
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="add_user.php" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm thành viên
            </a>
        </div>
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
					<div><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Tìm kiếm tên đăng nhập">	      
	 <input type="text" id="myInputHT" onkeyup="myFunctionHT()" placeholder="Tìm kiếm tên người dùng"></div>
                        <table id="myTable"
                            data-toolbar="#toolbar"
                            data-toggle="table">

						    <thead>
						    <tr>
						        <th data-field="id" data-sortable="true"><b>STT</b></th>
								<th data-field="username" data-sortable="true"><b>Tên đăng nhập</b></th>
						        <th data-field="name"  data-sortable="true"><b>Họ & Tên</b></th>
								<th data-field="gioitinh" data-sortable="true"><b>Giới tính</b></th>
                                <th data-field="email" data-sortable="true"><b>Email</b></th>
								<th data-field="cmt" data-sortable="true"><b>Số CMT/CCCD</b></th>
                                <th>Quyền</th>
                                <th>Hành động</th>
						    </tr>
                            </thead>
                            <tbody>
							<?php
            $stt = 1 ;
            $sql = "SELECT * FROM users";
            // thực thi câu $sql với biến conn lấy từ file connection.php
            $query = mysqli_query($conn,$sql);
            while ($data = mysqli_fetch_array($query)) {
          ?>
            <tr>
              <td scope="row"><?php echo $stt++ ?></td>
              <td><?php echo $data["username"]; ?></td>
              <td><?php echo $data["name"]; ?></td>
			  <td><?php echo $data["gioitinh"]; ?></td>
			  
              <td><?php echo $data["email"]; ?></td>
			  <td><?php echo $data["cmt"]; ?></td>
              <td>
                <?php
                    switch ($data["level"]) {
						case 1: ?>
					<span class="label label-danger">Admin</span>
                      <?php break;
                    case 2:
					?>
					<span class="label label-success">Sinh viên</span>
					<?php break;
                     case 3:
                     ?>
					<span class="label label-default">Phụ huynh</span>
					<?php break;
					case 4:?>

					<span class="label label-warning">Giảng viên</span>
					<?php 
					
					}
                ?>
              </td>
			  <td class="form-group">
                                        <a href="chinh-sua-thanh-vien.php?username=<?php echo $data["username"]; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                       <!-- <a href="xoa-thanh-vien.php?username=<?php echo $data["username"]; ?>"class="btn btn-danger" onclick="testConfirmDialog()"><i class="glyphicon glyphicon-remove"></i>	</a>	-->
			</td><?php }?>
            </tr>
          
          </tbody>										
	<?php
	
		if (isset($_GET["username"])) {
			
			
		    	$username = $_GET["username"];
			
		    	$sql = "delete from users where username = '$username'";
			mysqli_query($conn, $sql);}
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