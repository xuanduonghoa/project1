<?php
 session_start();
if(!isset($_SESSION['username'])){
header('Location: login.php');}
else{
	$username=$_SESSION['username'];
} ?>
<?php
require_once('../admin/bdd.php');
require_once("../lib/connection.php");
$sql = "SELECT id, title,note, start, end, color FROM events where username='$username'";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Trang chủ-BKKPI</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
	<!-- FullCalendar -->
	<link href='css/fullcalendar.css' rel='stylesheet' />


    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
	#calendar {
		max-width: 1000px;
	}
	.col-centered{
		float: none;
		margin: 0 auto;
	}
    </style>




<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>
<script>
b{color: red;
font-size: 16px;
}
	</script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
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
				<li class="active"><a href="index.php"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>Quản lý thời gian biểu</a></li>
			<li ><a href="muctieuht.php"><svg class="glyph stroked pen tip "><use xlink:href="#stroked-notepad"/></svg>Quản lý học tập</a></li>
			<li ><a href="kpi.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>KPI học tập</a></li>
			<li ><a href="qlchitieusv.php"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý chi tiêu</a></li>
			<li ><a href="qlttsv.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Sửa thông tin sinh viên</a></li>
			<li ><a href="quanlytk.php"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg>Quản lý tài khoản</a></li>
            <li ><a href="dkht.php"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg>Đăng kí môn học</a></li>
			<li ><a href="ttph.php"><svg class="glyph stroked heart"><use xlink:href="#stroked-heart"/></svg>Phụ huynh</a></li>
   </ul>

	</div><!--/.sidebar-->
		
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	
		
		

    <!-- Page Content -->
	 
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Thời gian biểu</h1>
                <div  id="calendar" class="col-centered">
                </div>
				
        </div>
        <!-- /.row -->
		
		<!-- Modal -->
		<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="addEvent.php">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Thêm sự kiện</h4>
			  </div>
			  <div class="modal-body">
				<div class="form-group">
					<label for="title" class="col-sm-2 control-label">Chủ đề</label>
					<div class="col-sm-10">
					<?php
									
									$sql ="SELECT *  FROM courselist as c, svdk as d, loptc l where c.MaHP=l.mahp and l.maloptc=d.maloptc and masv='$username' and l.hocki='$hocki'";
									$query= mysqli_query($conn,$sql);
									$num=mysqli_num_rows($query );
									
									;?>
					  <select name="title" class="form-control" id="title">
						  <option value="">Chọn chủ đề</option>
						 <?php
									while($data=mysqli_fetch_array($query)){
									?>
									
									<option  value = "<?php echo $data["TenHP"];?>"><?php echo $data["TenHP"];?></option>
									<?php }?>
						  <option value="Rèn luyện thể dục">Rèn luyện thể dục</option>
						  <option value="Xây dựng kĩ năng">Xây dựng kĩ năng</option>
						  <option value="Giải trí">Giải trí</option>
						  <option value="Cuộc hẹn">Cuộc hẹn</option>
						  <option value="Sự kiện">Sự kiện</option>
						  <option value="Sinh nhật">Sinh nhật</option>
						  </select>
					</div>
					</div>
				
				  <div class="form-group">
					<label for="note" class="col-sm-2 control-label">Ghi chú</label>
					<div class="col-sm-10">
					  <input type="text" name="note" class="form-control" id="note" placeholder="Ghi chú">
					</div>
				  </div>
				
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Ngày bắt đầu</label>
					<div class="col-sm-10">
					  <input type="datetime" name="start" class="form-control" id="start" >
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Ngày kết thúc</label>
					<div class="col-sm-10">
					  <input type="datetime" name="end" class="form-control" id="end" >
					</div>
				  </div>
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				<button type="submit" class="btn btn-primary" name="save">Lưu</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
		
		
		
		<!-- Modal -->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="editEventTitle.php">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Sửa sự kiện</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Chủ đề</label>
					<div class="col-sm-10">
					<?php
									
									$sql ="SELECT *  FROM courselist as c, svdk as d, loptc l where c.MaHP=l.mahp and l.maloptc=d.maloptc and masv='$username' and l.hocki='$hocki'";
									$query= mysqli_query($conn,$sql);
									$num=mysqli_num_rows($query );
									
									;?>
					  <select name="title" class="form-control" id="title">
						  <option value="">Chọn chủ đề</option>
						 <?php
									while($data=mysqli_fetch_array($query)){
									?>
									
									<option  value = "<?php echo $data["TenHP"];?>"><?php echo $data["TenHP"];?></option>
									<?php }?>
						  <option value="Rèn luyện thể dục">Rèn luyện thể dục</option>
						  <option value="Xây dựng kĩ năng">Xây dựng kĩ năng</option>
						  <option value="Giải trí">Giải trí</option>
						  <option value="Cuộc hẹn">Cuộc hẹn</option>
						  <option value="Sự kiện">Sự kiện</option>
						  <option value="Sinh nhật">Sinh nhật</option>						  </select>
					</div>
					</div>
				  
				  <div class="form-group">
					<label for="note" class="col-sm-2 control-label">Ghi chú</label>
					<div class="col-sm-10">
					  <input type="text" name="note" class="form-control" id="note" placeholder="Ghi chú">
					</div>
				  </div>
				  
				   <input type="hidden" name="id" class="form-control" id="id">
				  <div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
						<label>Mức độ hoàn thành</label>
						  <div class="radio">
						  
							<label class="text-success"><input type="radio"  name="ht" value="100">100%</label>
							<label class="text-primary"><input type="radio"  name="ht" value="75">75%</label>
							<label class="text-warning"><input type="radio"  name="ht" value="50">50%</label>
							<label class="text-warning"><input type="radio"  name="ht" value="25">25%</label>
							<label class="text-danger"><input type="radio"  name="ht" value="0">0%</label>
						  </div>
						</div>
					</div>
				    <div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label class="text-danger"><input type="checkbox"  name="delete">Xóa sự kiện</label>
						  </div>
						</div>
					</div>	
					
				  
				 
				 
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				<button type="submit" class="btn btn-primary">Lưu thay đổi</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>

		
    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<!-- FullCalendar -->
	<script src='js/moment.min.js'></script>
	<script src='js/fullcalendar.min.js'></script>
	
	<script>

	$(document).ready(function() {
		var d = new Date();
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			

			defaultDate: d,
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			select: function(start, end) {
				
				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd').modal('show');
			},
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #note').val(event.note);
					
					$('#ModalEdit #color').val(event.color);
					$('#ModalEdit').modal('show');
				});
			},
			eventDrop: function(event, delta, revertFunc) { // si changement de position

				edit(event);

			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

				edit(event);

			},
			events: [
			<?php foreach($events as $event): 
			
				$start = explode(" ", $event['start']);
				$end = explode(" ", $event['end']);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event['start'];
				}
				if($end[1] == '00:00:00'){
					$end = $end[0];
				}else{
					$end = $event['end'];
				}
			?>
				{
					id: '<?php echo $event['id']; ?>',
					//username: '<?php echo $username; ?>',
					title: '<?php echo $event['title']; ?>',
					note: '<?php echo $event['note']; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					color: '<?php echo $event['color']; ?>',
				},
			<?php endforeach; ?>
			]
		});
		
		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}
			
			id =  event.id;
			
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			
			$.ajax({
			 url: 'editEventDate.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'OK'){
						alert('Saved');
					}else{
						alert('Could not be saved. try again.'); 
					}
				}
			});
		}
		
	});
	
</script>
<div>
<div>
						<b style="color:#0071c5;" value="#0071c5">&#9724; Chưa hoàn thành (0%)</b>
						  <b style="color:#40E0D0;" value="#40E0D0">&#9724; Hoàn thành tốt (100%)</b>
						  <b style="color:#008000;" value="#008000">&#9724; Hoàn thành 	(75%)	</b>	  
						  <b style="color:#FFD700;" value="#FFD700">&#9724; Đang hoàn thành (50%)</b>
						  <b style="color:#FF8C00;" value="#FF8C00">&#9724; Mới bắt đầu (25%)</b>
						  <b style="color:#FF0000;" value="#FF0000">&#9724; Không hoàn thành (0%)</b></div>
	<div>
					<button type="button" class="btn btn-primary">Thống kê</button>
	<button type="button" class="btn btn-primary" >Lịch sử hoạt động</button>

	<div>					 
<h2>Lịch sử hoạt động</h2>
<fieldset>
		<legend>Ngày hôm nay</legend>
		<ul>
		<?php $sql="select *,time(time) tg,date(time) date  from sv_history h LEFT JOIN events e on h.id=e.id where h.username='20172017' and date(time)=curdate() order by time desc";
		$q=mysqli_query($conn, $sql);
		while($data= mysqli_fetch_array($q)){
			if(strcmp($data["action"],"xóa")==0 ) {?>
		<div class="alert alert-danger">Bạn đã xóa <?php echo $data["old"];?> lúc <?php echo $data["tg"];?>, <?php echo $data["date"];?></div>
			<?php }
else  if(strcmp($data["action"],"cập nhật")==0 ){		?>
		<div class= "alert alert-warning">Bạn đã cập nhật sự kiện <?php echo $data["title"];?> <?php if($data["note"] != null) echo " với ghi chú '".$data["note"]."'";?> tại mục <?php echo $data["tencot"];?> từ <?php echo $data["old"];?> thành <?php echo $data["content"];?>
		lúc <?php echo $data["tg"];?>, <?php echo $data["date"]; 
		?>
		</div>
<?php 
		}
		else if(strcmp($data["action"],"thêm")==0 ) {?>
		<div class="alert alert-success">Bạn đã thêm <?php echo $data["content"];?> 
		lúc <?php echo $data["tg"];?>, <?php echo $data["date"]; ?></div>
			<?php }
		
		}?>
		</ul>
		</fieldset>
		<fieldset>
		<legend>Ngày hôm qua</legend>
		<ul>
		<?php $sql="select *,time(time) tg,date(time) date  from sv_history h LEFT JOIN events e on h.id=e.id where h.username='20172017' and date(time)=curdate()-1 order by time desc";
		$q=mysqli_query($conn, $sql);
		while($data= mysqli_fetch_array($q)){
			if(strcmp($data["action"],"xóa")==0 ) {?>
		<div class="alert alert-danger">Bạn đã xóa <?php echo $data["old"];?> lúc <?php echo $data["tg"];?>, <?php echo $data["date"];?></div>
			<?php }
else  if(strcmp($data["action"],"cập nhật")==0 ){		?>
		<div class= "alert alert-warning">Bạn đã cập nhật sự kiện <?php echo $data["title"];?> <?php if($data["note"] != null) echo " với ghi chú '".$data["note"]."'";?> tại mục <?php echo $data["tencot"];?> từ <?php echo $data["old"];?> thành <?php echo $data["content"];?>
		lúc <?php echo $data["tg"];?>, <?php echo $data["date"]; 
		?>
		</div>
<?php 
		}
		else if(strcmp($data["action"],"thêm")==0 ) {?>
<div class="alert alert-success">Bạn đã thêm <?php echo $data["content"];?> 		lúc <?php echo $data["tg"];?>, <?php echo $data["date"]; ?></div>
			<?php }
		
		}?>
		</ul>
		</fieldset>
		<fieldset>
		<legend>Tuần này</legend>
		<ul>
		<?php $sql="select *,time(time) tg,date(time) date  from sv_history h LEFT JOIN events e on h.id=e.id where h.username='20172017' and weekofyear(h.time)=weekofyear(curdate()) order by time desc";
		$q=mysqli_query($conn, $sql);
		while($data= mysqli_fetch_array($q)){
			if(strcmp($data["action"],"xóa")==0 ) {?>
		<div class="alert alert-danger">Bạn đã xóa <?php echo $data["old"];?> lúc <?php echo $data["tg"];?>, <?php echo $data["date"];?></div>
			<?php }
else  if(strcmp($data["action"],"cập nhật")==0 ){		?>
		<div class= "alert alert-warning">Bạn đã cập nhật sự kiện <?php echo $data["title"];?> <?php if($data["note"] != null) echo " với ghi chú '".$data["note"]."'";?> tại mục <?php echo $data["tencot"];?> từ <?php echo $data["old"];?> thành <?php echo $data["content"];?>
		lúc <?php echo $data["tg"];?>, <?php echo $data["date"]; 
		?>
		</div>
<?php 
		}
		else if(strcmp($data["action"],"thêm")==0 ) {?>
<div class="alert alert-success">Bạn đã thêm <?php echo $data["content"];?> 		lúc <?php echo $data["tg"];?>, <?php echo $data["date"]; ?></div>
			<?php }
		
		}?>
		</ul>
		</fieldset>
		<fieldset>
		<legend>Tháng này</legend>
		<ul>
		<?php $sql="select *,time(time) tg,date(time) date  from sv_history h LEFT JOIN events e on h.id=e.id where h.username='20172017' and month(h.time)=month(curdate()) order by time desc";
		$q=mysqli_query($conn, $sql);
		while($data= mysqli_fetch_array($q)){
			if(strcmp($data["action"],"xóa")==0 ) {?>
		<div class="alert alert-danger">Bạn đã xóa <?php echo $data["old"];?> lúc <?php echo $data["tg"];?>, <?php echo $data["date"];?></div>
			<?php }
else  if(strcmp($data["action"],"cập nhật")==0 ){		?>
		<div class= "alert alert-warning">Bạn đã cập nhật sự kiện <?php echo $data["title"];?> <?php if($data["note"] != null) echo " với ghi chú '".$data["note"]."'";?> tại mục <?php echo $data["tencot"];?> từ <?php echo $data["old"];?> thành <?php echo $data["content"];?>
		lúc <?php echo $data["tg"];?>, <?php echo $data["date"]; 
		?>
		</div>
<?php 
		}
		else if(strcmp($data["action"],"thêm")==0 ) {?>
<div class="alert alert-success">Bạn đã thêm <?php echo $data["content"];?> 		lúc <?php echo $data["tg"];?>, <?php echo $data["date"]; ?></div>
			<?php }
		
		}?>
		</ul>
		</fieldset>
</div>
</div>

</body>

</html>
