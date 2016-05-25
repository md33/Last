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
$stmt1 = $user_home->runQuery("SELECT * FROM tbl_lesson");
$rws=$stmt1->fetch(PDO::FETCH_ASSOC);

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
    
    <body class="th home">
        <div class="sidebar-menu">
			
			
							<div class="down">	
									<ul>
										<h6>Оюутны карьер</h6>
										<hr />
									</ul>
									  <ul>							
									  <li><a href="index.html"><img src="assets/images/admin.jpg"></a></li>									  
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
  <div class="page-header">
    <h1 id="timeline">Төлөвлөгөө</h1>
  </div>
  <ul class="timeline">
    <li>
      <div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>
      <div class="timeline-panel">
        <div class="timeline-heading">
          <h4 class="timeline-title">Намар</h4>          
        </div>
        <div class="timeline-body">
         <p>.................................................................................................
		 ......................................................................................................
		 ......................................................................................................</p>
        </div>
      </div>
    </li>
    <li class="timeline-inverted">
      <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
      <div class="timeline-panel">
        <div class="timeline-heading">
          <h4 class="timeline-title">Хавар</h4>
        </div>
        <div class="timeline-body">
                <p>.................................................................................................
		 ......................................................................................................
		 ......................................................................................................</p>
        </div>
      </div>
    </li>   
  </ul>
</div>
							  </main>
        <!--/.fluid-container-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script> 
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/scripts.js"></script>
        
    </body>

</html>