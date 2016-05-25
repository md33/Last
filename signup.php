<?php
session_start();
error_reporting(0);
require_once 'class.user.php';

$reg_user = new USER();

if($reg_user->is_logged_in()!="")
{
	$reg_user->redirect('home.php');
}
if(isset($_POST['btn-signup']))
{
	$uname = trim($_POST['txtuname']);
	$sisi = trim($_POST['txtsisi']);
	$email = trim($_POST['txtemail']);
	$upass = trim($_POST['txtpass']);
	$rpass = trim($_POST['txtpass1']);
	$code = md5(uniqid(rand()));
	if($upass == $rpass){
	$stmt = $reg_user->runQuery("SELECT * FROM tbl_users WHERE userEmail=:email_id");
	$stmt->execute(array(":email_id"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($stmt->rowCount() > 0)
	{
		$msg = "
		      <div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Энэ и-майл хаяг бүртгэлтэй  байна !!!
					</strong>
			  </div>
			  ";
	}
	else
	{
		if($reg_user->register($uname,$sisi,$email,$upass,$code))
		{			
			$id = $reg_user->lasdID();		
			$key = base64_encode($id);
			$id = $key;
			
			$message = "					
						Сайн байна уу  $uname,
						<br /><br />
						Өгөгдлийн нууцлал, аюулгүй байдал систем<br/>
						Та бүртгэлээ баталгаажууулахын тулд доорх хаяг дээр дарна уу !!!<br/>
						<br /><br />
						<a href='http://localhost/diplomweb/verify.php?id=$id&code=$code'>идэвхжүүлэх</a>
						<br /><br />
						Баярлалаа.,";
			//$message = utf8_decode($message);
			$subject = "Confirm registration";						
			$reg_user->send_mail($email,$message,$subject);	
			$msg = "
					<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Та $email и-майл хаягаараа идэвхжүүлснээр бүртгэл амжилттай болно.
					</strong>
			  		</div>
					";
		}
		else
		{
			echo "Алдаа";
		}		
	 }
	}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Бүртгүүлэх</title>
    <!-- Bootstrap -->
	
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body id="login" class="index">
    <div class="container">
				<?php if(isset($msg)) echo $msg;  ?>
      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Бүртгүүлэх</h2><hr />
        <input type="text" class="input-block-level" placeholder="Хэрэглэгчийн нэр" name="txtuname" required />
<!--        <input type="text" class="input-block-level" placeholder="Сиси хаяг" name="txtsisi" required />-->
        <input type="email" class="input-block-level" placeholder="И-майл хаяг" name="txtemail" required />
        <input type="password" class="input-block-level" placeholder="Нууц үг" name="txtpass" required />
		<input type="password" class="input-block-level" placeholder="Нууц үг давтах" name="txtpass1" required />
     	<hr />
        <button class="btn btn-large btn-primary" type="submit" name="btn-signup">Бүртгүүлэх</button>
        <a href="index.php" style="float:right;" class="btn btn-large">Нэвтрэх</a>
      </form>

    </div> <!-- /container -->
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>