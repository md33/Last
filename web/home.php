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
          <h4 class="timeline-title">Mussum ipsum cacilds</h4>          
        </div>
        <div class="timeline-body">
          <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo.
            Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
        </div>
      </div>
    </li>
    <li class="timeline-inverted">
      <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
      <div class="timeline-panel">
        <div class="timeline-heading">
          <h4 class="timeline-title">Mussum ipsum cacilds</h4>
        </div>
        <div class="timeline-body">
          <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo.
            Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
          <p>Suco de cevadiss, é um leite divinis, qui tem lupuliz, matis, aguis e fermentis. Interagi no mé, cursus quis, vehicula ac nisi. Aenean vel dui dui. Nullam leo erat, aliquet quis tempus a, posuere ut mi. Ut scelerisque neque et turpis posuere
            pulvinar pellentesque nibh ullamcorper. Pharetra in mattis molestie, volutpat elementum justo. Aenean ut ante turpis. Pellentesque laoreet mé vel lectus scelerisque interdum cursus velit auctor. Lorem ipsum dolor sit amet, consectetur adipiscing
            elit. Etiam ac mauris lectus, non scelerisque augue. Aenean justo massa.</p>
        </div>
      </div>
    </li>   
  </ul>
</div>
							  </main>
        <!--/.fluid-container-->
        <script src="bootstrap/js/jquery-1.9.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/scripts.js"></script>
        
    </body>

</html>