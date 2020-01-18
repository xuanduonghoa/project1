
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Đăng ký thành viên</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>BachKhoa</span>KPI</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Admin <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
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
		</form>
		<ul class="nav menu">
			<li class="active"><a href="index.html"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li><a href="thanhvien.html"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thành viên</a></li>
			<li><a href="category.html"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>Quản lý danh mục</a></li>
			<li><a href="product.html"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý sản phẩm</a></li>
			<li><a href="comment.html"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"/></svg> Quản lý bình luận</a></li>
			<li><a href="ads.html"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"/></svg> Quản lý quảng cáo</a></li>
			<li><a href="setting.html"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> Cấu hình</a></li>
		</ul>
-->
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                
				<li class="active">Đăng kí</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Đăng kí thành viên</h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-8">
		<?php
		require_once("../lib/connection.php");
		if (isset($_POST["btn_submit"])) {
  			//lấy thông tin từ các form bằng phương thức POST
  			$username = $_POST["username"];
  			$password = $_POST["password"];
 			 $name = $_POST["name"];
  			$email = $_POST["email"];
			$level=$_POST["level"];
			$cmt=$_POST["cmt"] ; 
			$gt=$_POST["gioitinh"];
			$repassword=$_POST["repassword"];
			
			  if($password <> $repassword){?>
					<div class="alert alert-danger">Bạn vui lòng nhập đúng lại password!!!!</div>
			<?php } else{
  					// Kiểm tra tài khoản đã tồn tại chưa
  					$sql="select * from users where username='$username'";
					$kt=mysqli_query($conn, $sql);
					if(mysqli_num_rows($kt)  > 0){
						?>
						<div class="alert alert-danger">Tài khoản đã tồn tại !</div>
						<?php 
					}else{
						//thực hiện việc lưu trữ dữ liệu vào db
							$sql="insert into users (username, name, gioitinh,email,cmt,password,level) values ('$username','$name', '$gt','$email','$cmt','$password','$level')";
					    // thực thi câu $sql với biến conn lấy từ file connection.php
   						$query= mysqli_query($conn,$sql);
						switch ($level){
							case 2: $_SESSION['username']=$username; header('Location: index.php'); break;
							case 3: $_SESSION['username']=$username; header('Location: qlhtsv.php'); break;
							case 4: $_SESSION['username']=$username; header('Location: giaodienGV.php'); break;
						}?>						
						<div class="alert alert-success" role="alert">
					<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Bạn đã đăng ký thành công</div>
					<?php
					}						  					
			  }
	}
	?>
								<div><a href ="login.php" ><h4><b>Đăng nhập</b></h4></a></div>
                                <form action="add_user.php" role="form" method="post">
								 <div class="form-group">
                                    <label>Tên tài khoản</label>
                                    <input name="username" required class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Họ & Tên</label>
                                    <input name="name" required class="form-control" placeholder="">
                                </div>
								<div class="form-group">
									<label>Giới tính</label>
									
									<input name="gioitinh" required type="radio"  value="Nam"/>Nam
									<input name="gioitinh" required type="radio"  value="Nu"/>Nữ
									<input name="gioitinh" required type="radio"  value="Khac"/>Khác
									
								</div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email"  type="text" class="form-control">
                                </div>
								<div class="form-group">
                                    <label>Số CMT/CCCD</label>
                                    <input name="cmt" required type="text" class="form-control">
                                </div>
								
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input name="password" required type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nhập lại mật khẩu</label>
                                    <input name="repassword" required type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Quyền</label>
                                    <select name="level" class="form-control" style="width:150px;">
                                        
                                        <option value="2" >Sinh viên</option>
										<option value="3">Phụ huynh</option>
										<option value="4">Giảng viên</option>
                                    </select>
									
                                </div>
                                <button name="btn_submit" type="submit" class="btn btn-success">Thêm mới</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
								</div>

                            </div>
                        </form>
						
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->	
</body>

</html>
