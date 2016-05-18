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

?>

<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title><?php echo $row['userEmail']; ?></title>
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
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">Оюутны карьер</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                        </ul>									
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
			
			<!--/down-->
							<div class="down">	
									  <ul>							
									  <li><a href="index.html"><img src="images/admin.jpg"></a></li>									  
									 </ul>				
									<ul>
									
									   <li><?php echo $row['userEmail']; ?></li>
									</ul>									
									<ul>	
	<hr />									
										<li><a class="tooltips" href="index.html"><span>Mэдээлэл</span><i class="lnr lnr-cog"></i></a></li>
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
										 <li id="menu-academico" ><a href="#"><i class="fa fa-file-text-o"></i> <span>Ui Elements</span> <span class="fa fa-angle-right" style="float: right"></span></a>
											<!-- <ul id="menu-academico-sub" >
												<li id="menu-academico-avaliacoes" ><a href="forms.html">Forms</a></li>
												<li id="menu-academico-boletim" ><a href="validation.html">Validation Forms</a></li>
												<li id="menu-academico-boletim" ><a href="table.html">Tables</a></li>
												<li id="menu-academico-boletim" ><a href="buttons.html">Buttons</a></li>
											  </ul>-->
										 </li>									
								</div>
							  </div>
        <!--/.fluid-container-->
		
        <script src="bootstrap/js/jquery-1.9.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/scripts.js"></script>
        
    </body>

</html>