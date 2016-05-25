<?php
session_start();
error_reporting(0);
require_once 'class.user.php';
$user_login = new USER();

if($user_login->is_logged_in()!="")
{
	$user_login->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
	$email = trim($_POST['txtemail']);
	$upass = trim($_POST['txtupass']);
	
  $word = array("'","/","include","connect","requre","or","select","union","from","drop","table","java","script");
  foreach ($word as $color) {
    # code...
  }
	if($user_login->login($email,$upass))
	{
		$user_login->redirect('home.php');
	}
}
?>

<!DOCTYPE html>
<html>
  <head>
    <script>
      function checkPassword(){
        if($('#password').val().length !=0)
        {
          var pattern= /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}/;
          if(!pattern.test($('#password').val()))
          {
            $('#password').addClass('form-group has-error').removeClass('form-group has-success');    
          }else
          {
            $('#password').addClass('form-group has-success').removeClass('form-group );
          }
        }
      }
    </script>
    <title>Нэвтрэх</title>
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
		<?php 
		if(isset($_GET['inactive']))
		{
			?>
            <div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
				<strong>Та и-майл хаягаа идэвхжүүлэнэ үү !!!</strong>
			</div>
            <?php
		}
		?>
        <form class="form-signin" method="post">
        <?php
        if(isset($_GET['error']))
		{
			?>
            <div class='alert alert-success'>
				<button class='close' data-dismiss='alert'>&times;</button>
				<strong>И-майл эсвэл нууц үг буруу !!!</strong> 
			</div>
            <?php
		}
		?>
        <h2 class="form-signin-heading"><center>Нэвтрэх</center></h2><hr />
        <input type="email" class="input-block-level" placeholder="И-майл хаяг" name="txtemail"/>
        <input type="password" class="input-block-level" placeholder="Нууц үг" name="txtupass" />
     	<hr />
        <button class="btn btn-large btn-primary "  type="submit" name="btn-login">Нэвтрэх</button>
        <a href="signup.php" style="float:right;" class="btn btn-large btn-primary ">Бүртгүүлэх</a>
        <hr />
        <a href="fpass.php">Нууц үг мартсан? </a>
      </form>

    </div> <!-- /container -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script> 
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>