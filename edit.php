<?php
session_start();
require_once 'class.user.php';
error_reporting(0);
$user_home = new USER();

if(!$user_home->is_logged_in())
{
	$user_home->redirect('index.php');
}

$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['save']))
{
	$name = trim($_POST['txtemail']);
	$sisi = trim($_POST['txtemail']);
	$email = trim($_POST['txtemail']);
	$stmt = $user_home->runQuery("UPDATE `tbl_users` SET `userName`=:name,`sisi_id`=:sisi,`userEmail`=:email WHERE userID=:uid");
	$stmt->execute(array(":uid"=>$_SESSION['userSession']));
	$stmt->execute(array(":name"=>$name));
	$stmt->execute(array(":sisi"=>$sisi));
	$stmt->execute(array(":email"=>$email));
	$user_home->redirect('index.php');
}
if(isset($_POST['cancel']))
{
$user_home->redirect('index.php');
}
?>
<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>Нүүр хуудас</title>
        <!-- Bootstrap -->
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
		<link href="assets/style.css" rel="stylesheet" media="screen">
		<link href="assets/icon-font.min.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
    </head>
    
    <body class="th">
        <div class="sidebar-menu">
			
			
							<div class="down">	
									<ul>
										<h6>Оюутны карьер</h6>
										<hr />
									</ul>
									  <ul>							
									  <li><a href="index.html"><img src="images/admin.jpg"></a></li>									  
									 </ul>				
									<ul>
									
									   <li><?php echo $row['userEmail']; ?></li>
									</ul>									
									<ul>	
									<hr />									
										<li><a class="tooltips" href="index.html"><span>Мэдээлэл</span><i class="lnr lnr-user"></i></a></li>
										<li><a class="tooltips" href="logout.php"><span>Гарах</span><i class="lnr lnr-power-switch"></i></a></li>
										</ul>
									</div>
							   <!--//down-->
                           <div class="menu">
									<ul id="menu" >	
										 <li><a href="index.html"><i class="fa fa-tachometer selected"></i> <span>Төлөвлөгөө</span></a></li>
										 <li id="menu-academico" ><a href="#"><i class="fa fa-table"></i> <span>Карьер</span> <span class="fa fa-angle-right" style="float: right"></span></a>
										   <!--<ul id="menu-academico-sub" >
											<li id="menu-academico-avaliacoes" ><a href="tabs.html">Карьер харах</a></li>
											<li id="menu-academico-boletim" ><a href="widget.html">Карьер</a></li>
											<li id="menu-academico-avaliacoes" ><a href="calender.html">Calendar</a></li>
										
										  </ul>	-->
										  <li><a href="index.html"><i class="fa fa-tachometer"></i> <span>Сонжоо</span></a></li>
										</li>
												</ul>
								</div>
							  </div>
							  <main class="main">
							  		<div class="container">
									    <h1>Хувийн мэдээлэл</h1>
									  	<hr>

										<div class="row">
									      <!-- left column -->
									      
									      
									      <!-- edit form column -->
									      <div class="col-md-9 personal-info">
									        <div class="alert alert-info alert-dismissable">
									          <a class="panel-close close" data-dismiss="alert">×</a> 
									          <i class="fa fa-coffee"></i>
									          This is an <strong>.alert</strong>. Use this to show important messages to the user.
									        </div>									        											       

									        <form class="form-horizontal" role="form" id="1489666072" method="post">
									          <div class="form-group">
									            <label class="col-lg-3 control-label">Хэрэглэгчийн нэр :</label>
									            <div class="col-lg-8">
									              <input class="form-control" type="text" value=<?php echo $row['userName']; ?>>
									            </div>
									          </div>
									          <div class="form-group">
									            <label class="col-lg-3 control-label">Сиси хааг :</label>
									            <div class="col-lg-8">
									              <input class="form-control" type="text" value=<?php echo $row['sisi_id']; ?>>
									            </div>
									          </div>									     
									          <div class="form-group">
									            <label class="col-lg-3 control-label">И-майл хаяг:</label>
									            <div class="col-lg-8">
									              <input class="form-control" type="text" value=<?php echo $row['userEmail']; ?>>
									            </div>
									          </div>									      									   
									          							        
									          <div class="form-group" >
									            <label class="col-md-3 control-label"></label>
									            <div class="col-md-8">
									              <button class="btn btn-primary" type="submit" name="save">Хадгалах</button>
									              
									              <span></span>
									              <button class="btn btn-primary" type="submit" name="cancel">Цуцлах</button>
									            </div>
									          </div>
									        </form>

									      </div>
									  </div>
									</div>
									<hr>
							  </main>
        <!--/.fluid-container-->        
         <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script> 
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/scripts.js"></script>
        
    </body>

</html>